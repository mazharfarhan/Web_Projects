
$().ready(function() {
    
jQuery.validator.addMethod("noSpace", function(value, element) {

    if(value == null || (!value.match(/\S/))) {
   return false;     
 }
    else {
     
        return true;
    }
});
    
    
 var validator = $("#searchform").validate( {
     
   rules: {
     street: { 
       required: true,
       noSpace: true     
     },
         
     city: { 
       required: true,
       noSpace: true     
     },
       
     state: {
       required: true,
    }
       
   },
     
   messages: {
      street: "Please enter the street address",   
      city: "Please enter the city", 
      state: "Please select a state",  
   }
 });
    
    
$("#rest").on('click', function() {
   
    validator.resetForm();
    return;
    
});
        
});


