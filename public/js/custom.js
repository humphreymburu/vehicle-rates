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
                  $('select[name="subs"]').append('<option value="'+ value +'">'+ value +'</option>');
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


jQuery(document).ready(function ()
{
    jQuery('select[name="capacity"]').on('change',function(){
      var countryID = jQuery(this).val();
      console.log(countryID);
      if(countryID)
      {
         jQuery.ajax({
            url : 'vehicle/getoils/' +countryID,
            type : "GET",
            dataType : "json",
            success:function(data)
            {
               console.log(data);
               jQuery('select[name="oils"]').empty();
               jQuery.each(data, function(key,value){
                  $('select[name="oils"]').append('<option value="'+ value +'">'+ value +'</option>');
               });
            }
         });
      }
      else
      {
         $('select[name="oils"]').empty();
      }
   })

}); 

jQuery(document).ready(function ()
{
    jQuery('select[name="capacity"]').on('change',function(){
      var countryID = jQuery(this).val();
      console.log(countryID);
      if(countryID)
      {
         jQuery.ajax({
            url : 'vehicle/getdrives/' +countryID,
            type : "GET",
            dataType : "json",
            success:function(data)
            {
               console.log(data);
               jQuery('select[name="drives"]').empty();
               jQuery.each(data, function(key,value){
                  $('select[name="drives"]').append('<option value="'+ value +'">'+ value +'</option>');
               });
            }
         });
      }
      else
      {
         $('select[name="drives"]').empty();
      }
   })

}); 

jQuery(document).ready(function ()
{
    jQuery('select[name="capacity"]').on('change',function(){
      var countryID = jQuery(this).val();
      console.log(countryID);
      if(countryID)
      {
         jQuery.ajax({
            url : 'vehicle/getservices/' +countryID,
            type : "GET",
            dataType : "json",
            success:function(data)
            {
               console.log(data);
               jQuery('select[name="services"]').empty();
               jQuery.each(data, function(key,value){
                  $('select[name="services"]').append('<option value="'+ value +'">'+ value +'</option>');
               });
            }
         });
      }
      else
      {
         $('select[name="services"]').empty();
      }
   })

}); 

jQuery(document).ready(function ()
{
    jQuery('select[name="capacity"]').on('change',function(){
      var countryID = jQuery(this).val();
      console.log(countryID);
      if(countryID)
      {
         jQuery.ajax({
            url : 'vehicle/getdrives/' +countryID,
            type : "GET",
            dataType : "json",
            success:function(data)
            {
               console.log(data);
               jQuery('select[name="drives"]').empty();
               jQuery.each(data, function(key,value){
                  $('select[name="drives"]').append('<option value="'+ value +'">'+ value +'</option>');
               });
            }
         });
      }
      else
      {
         $('select[name="drives"]').empty();
      }
   })

}); 

jQuery(document).ready(function ()
{
    jQuery('select[name="drives"]').on('change',function(){
      var countryID = jQuery(this).val();
      console.log(countryID);
      if(countryID)
      {
         jQuery.ajax({
            url : 'vehicle/getservices/' +countryID,
            type : "GET",
            dataType : "json", 
            success:function(data)
            {
               console.log("testting", data);
               jQuery('select[name="services"]').empty();
               jQuery.each(data, function(key,value){
                  $('select[name="services"]').append('<option value="'+ value +'">'+ value +'</option>');
               });
            }
         });
      }
      else
      {
         $('select[name="services"]').empty();
      }
   })

}); 

jQuery(document).ready(function ()
{
    jQuery('select[name="capacity"]').on('change',function(){
      var countryID = jQuery(this).val();
      console.log(countryID);
      if(countryID)
      {
         jQuery.ajax({
            url : 'vehicle/getdrives/' +countryID,
            type : "GET",
            dataType : "json",
            success:function(data)
            {
               console.log(data);
               jQuery('select[name="drives"]').empty();
               jQuery.each(data, function(key,value){

               
               //console.log(data.length);
					//op+='<option value="0" selected disabled>chose product</option>';
					//op+='<option value="'+data[i].id+'">'+data[i].drive+'</option>';
				   $('select[name="drives"]').append('<option value="'+value +'">'+ value +'</option>');
               console.log("test", value.drive);
               });
            }
         });
      }
      else
      {
         $('select[name="drives"]').empty();
      }
   })

}); 

jQuery(document).ready(function ()
{
    jQuery('select[name="capacity"]').on('change',function(){
      var countryID = jQuery(this).val();
      console.log(countryID);
      if(countryID)
      {
         jQuery.ajax({
            url : 'vehicle/getrepairs/' +countryID,
            type : "GET",
            dataType : "json",
            success:function(data)
            {
               console.log(data);
               jQuery('select[name="repairs"]').empty();
               jQuery.each(data, function(key,value){
                  $('select[name="repairs"]').append('<option value="'+ value +'">'+ value +'</option>');
               });
            }
         });
      }
      else
      {
         $('select[name="repairs"]').empty();
      }
   })

}); 
jQuery(document).ready(function ()
{
    jQuery('select[name="capacity"]').on('change',function(){
      var countryID = jQuery(this).val();
      console.log(countryID);
      if(countryID)
      {
         jQuery.ajax({
            url : 'vehicle/gettyres/' +countryID,
            type : "GET",
            dataType : "json",
            success:function(data)
            {
               console.log(data);
               jQuery('select[name="tyres"]').empty();
               jQuery.each(data, function(key,value){

                  $('select[name="tyres"]').append('<option value="'+ value +'">'+ value +'</option>');
               });
            }
         });
      }
      else
      {
         $('select[name="tyres"]').empty();
      }
   })

}); 







