     jQuery.validator.setDefaults({
      debug: true,
      success: "valid"
      });
      $( "#frm_details" ).validate({
         ignore: '*:not([name])', //Fixes your name issue
        rules: {
          para113: {
            required: true,
           
          }
        }
      });


  
You can also use the anchor but then you have to submit the form manually (fiddle). You also shouldn't initialize the validation on a click event. Initialize it on load and then just submit the form to trigger validation.

$(document).ready(function(){
    $("#frm_details").validate( {  
        ignore: '*:not([name])', //Fixes your name issue
        rules : {  
            para113 : "required"  
        },
        messages: {
            para113: {
                required: "Please enter name"
            }
        }  
    });  

    $("#sub").click(function(){
        $("#frm_details").submit();    
    });   
});