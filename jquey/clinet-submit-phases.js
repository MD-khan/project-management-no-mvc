$(document).ready(function() {
     
    $('#btn_submit_planing_phase').click(function( e ) {
        e.preventDefault();
       // var DATA = $('#frm-phase-planing').serialize();    // didn't work for file upload 
         var formData = new FormData($('#frm-phase-planing')[0]);
         console.log(formData);        
         $.ajax( {
                   type: "POST",                 
                   url: "/gcpm/php/process-add-specs-planing.php",
                   data: formData,
                   cache: false,
                   //async: false,
                    beforeSend: function() {
                     // setting a timeout
                         $('#btn_submit_planing_phase').html("it shouldn't take long!<br/> Submiting your answers...")
       
                     },
                   
                   success: function(response) {                                  
                      $('#acl-speck').html(response);         
                     //  if(response == 'ok') {
                       //   $('#acl-speck').css("color","green")
                         //         .html("<h3>Ansers have been added</h3>");
                       //}
                   },// success
                   
                    complete: function() {
                     // setting a timeout
                         //$('#btn_submit_planing_phase').html("Thanks! Your Ansers have been submitted")
                         location.reload( true );    
                     },                 
                   
                    contentType: false,
                     processData: false
                   
               })// ajax
               
                return false;
    });//
    
}); // document 