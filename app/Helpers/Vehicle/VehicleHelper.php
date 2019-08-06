<?php
namespace App\Helpers\Vehicle;

use App\Models\Vehicles;


class VehicleHelper
{
    /**
     * Simple helper to invoke the markdown parser
     * @return String
     */
    public static function parseEscapedMarkedown($str)
    {
        $Parsedown = new \Parsedown();
        if ($str) {
            return $Parsedown->text(e($str));
        }
    }
    /**
     * The importer has formatted number strings since v3,
     * so the value might be a string, or an integer.
     * If it's a number, format it as a string.
     * @return String
     */
    public static function formatCurrencyOutput($cost)
    {
        if (is_numeric($cost)) {
            return number_format($cost, 2, '.', '');
        }
        // It's already been parsed.
        return $cost;
    }
   
    /**
     * Format currency using comma for thousands until local info is property used.
     *
     * @return String
     */
    public static function ParseFloat($floatString)
    {
        $LocaleInfo = localeconv();
        $floatString = str_replace(",", "", $floatString);
        $floatString = str_replace($LocaleInfo["decimal_point"], ".", $floatString);
        // Strip Currency symbol
        // If no currency symbol is set, default to KSH because Murica
        $currencySymbol = $LocaleInfo['currency_symbol'];
        if (empty($currencySymbol)) {
            $currencySymbol = 'Ksh';
        }
        $floatString = str_replace($currencySymbol, '', $floatString);
        return floatval($floatString);
    }

    
    
    /**
     * Introspects into the model validation to see if the field passed is required.
     * This is used by the blades to add a required class onto the HTML element.
     * This isn't critical, but is helpful to keep form fields in sync with the actual
     * model level validation.
     *
     * This does not currently handle form request validation requiredness :(
     *
     */
    public static function checkIfRequired($class, $field)
    {
        $rules = $class::rules();
        foreach ($rules as $rule_name => $rule) {
            if ($rule_name == $field) {
                if (strpos($rule, 'required') === false) {
                    return false;
                } else {
                    return true;
                }
            }
        }
    }
    /**
     * Check to see if the given key exists in the array, and trim excess white space before returning it
     *
     * @param $array array
     * @param $key string
     * @param $default string
     * @return string
     */
    public static function array_smart_fetch(array $array, $key, $default = '')
    {
        array_change_key_case($array, CASE_LOWER);
        return array_key_exists(strtolower($key), array_change_key_case($array)) ? e(trim($array[ $key ])) : $default;
    }
    /**
     * Gracefully handle decrypting the legacy data (encrypted via mcrypt) and use the new
     * decryption method instead.
     *
     * This is not currently used, but will be.
     *
     * @param CustomField $field
     * @param String $string
     * @return string
     */
    public static function gracefulDecrypt(CustomField $field, $string)
    {
        if ($field->isFieldDecryptable($string)) {
            try {
                Crypt::decrypt($string);
                return Crypt::decrypt($string);
            } catch (DecryptException $e) {
                return 'Error Decrypting: '.$e->getMessage();
            }
        }
        return $string;
    }
    public static function formatStandardApiResponse($status, $payload = null, $messages = null) {
        $array['status'] = $status;
        $array['messages'] = $messages;
        if (($messages) &&  (is_array($messages)) && (count($messages) > 0)) {
            $array['messages'] = $messages;
        }
        ($payload) ? $array['payload'] = $payload : $array['payload'] = null;
        return $array;
    }
    /*
    Possible solution for unicode fieldnames
    */
    public static function make_slug($string) {
        return preg_replace('/\s+/u', '_', trim($string));
    }
    public static function getFormattedDateObject($date, $type = 'datetime', $array = true) {
        if ($date=='') {
            return null;
        }
        $settings = Setting::getSettings();
        $tmp_date = new \Carbon($date);
        if ($type == 'datetime') {
            $dt['datetime'] = $tmp_date->format('Y-m-d H:i:s');
            $dt['formatted'] = $tmp_date->format($settings->date_display_format .' '. $settings->time_display_format);
        } else {
            $dt['date'] = $tmp_date->format('Y-m-d');
            $dt['formatted'] = $tmp_date->format($settings->date_display_format);
        }
        if ($array == 'true') {
            return $dt;
        }
        return $dt['formatted'];
    }
    // Nicked from Drupal :)
    // Returns a file size limit in bytes based on the PHP upload_max_filesize
    // and post_max_size
    public static function file_upload_max_size() {
        static $max_size = -1;
        if ($max_size < 0) {
            // Start with post_max_size.
            $post_max_size = Helper::parse_size(ini_get('post_max_size'));
            if ($post_max_size > 0) {
                $max_size = $post_max_size;
            }
            // If upload_max_size is less, then reduce. Except if upload_max_size is
            // zero, which indicates no limit.
            $upload_max = Helper::parse_size(ini_get('upload_max_filesize'));
            if ($upload_max > 0 && $upload_max < $max_size) {
                $max_size = $upload_max;
            }
        }
        return $max_size;
    }
    public static function file_upload_max_size_readable() {
        static $max_size = -1;
        if ($max_size < 0) {
            // Start with post_max_size.
            $post_max_size = Helper::parse_size(ini_get('post_max_size'));
            if ($post_max_size > 0) {
                $max_size = ini_get('post_max_size');
            }
            // If upload_max_size is less, then reduce. Except if upload_max_size is
            // zero, which indicates no limit.
            $upload_max = Helper::parse_size(ini_get('upload_max_filesize'));
            if ($upload_max > 0 && $upload_max < $max_size) {
                $max_size = ini_get('upload_max_filesize');
            }
        }
        return $max_size;
    }
    public static function parse_size($size) {
        $unit = preg_replace('/[^bkmgtpezy]/i', '', $size); // Remove the non-unit characters from the size.
        $size = preg_replace('/[^0-9\.]/', '', $size); // Remove the non-numeric characters from the size.
        if ($unit) {
            // Find the position of the unit in the ordered string which is the power of magnitude to multiply a kilobyte by.
            return round($size * pow(1024, stripos('bkmgtpezy', $unit[0])));
        }
        else {
            return round($size);
        }
    }
    public static function filetype_icon($filename) {
        $extension = substr(strrchr($filename,'.'),1);
        if ($extension) {
            switch ($extension) {
                case 'jpg':
                case 'jpeg':
                case 'gif':
                case 'png':
                    return "fa fa-file-image-o";
                    break;
                case 'doc':
                case 'docx':
                    return "fa fa-file-word-o";
                    break;
                case 'xls':
                case 'xlsx':
                    return "fa fa-file-excel-o";
                    break;
                case 'zip':
                case 'rar':
                    return "fa fa-file-archive-o";
                    break;
                case 'pdf':
                    return "fa fa-file-pdf-o";
                    break;
                case 'txt':
                    return "fa fa-file-text-o";
                    break;
                case 'lic':
                    return "fa fa-floppy-o";
                    break;
                default:
                    return "fa fa-file-o";
            }
        }
        return "fa fa-file-o";
    }
    public static function show_file_inline($filename) {
        $extension = substr(strrchr($filename,'.'),1);
        if ($extension) {
            switch ($extension) {
                case 'jpg':
                case 'jpeg':
                case 'gif':
                case 'png':
                    return true;
                    break;
                default:
                    return false;
            }
        }
        return false;
    }
}