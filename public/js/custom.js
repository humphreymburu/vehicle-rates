jQuery(document).ready(function ()
    {
            jQuery('select[name="country"]').on('change',function(){
               var countryID = jQuery(this).val();
               console.log(countryID);
               if(countryID)
               {
                  jQuery.ajax({
                     url : 'vehicle/getcosts/' +countryID,
                     type : "GET",
                     dataType : "json",
                     success:function(data)
                     {
                        console.log(data);
                        jQuery('select[name="state"]').empty();
                        jQuery.each(data, function(key,value){
                           $('select[name="state"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                     }
                  });
               }
               else
               {
                  $('select[name="state"]').empty();
               }
            })
    });


jQuery(document).ready(function ()
{
    jQuery('select[name="subscription"]').on('change',function(){
      var countryID = jQuery(this).val();
      console.log(countryID);
      if(countryID)
      {
         jQuery.ajax({
            url : 'vehicle/getsubs/' +countryID,
            type : "GET",
            dataType : "json",
            success:function(data)
            {
               console.log(data);
               jQuery('select[name="subs"]').empty();
               jQuery.each(data, function(key,value){
                  $('select[name="subs"]').append('<option value="'+ key +'">'+ value +'</option>');
               });
            }
         });
      }
      else
      {
         $('select[name="subs"]').empty();
      }
   })

}); 