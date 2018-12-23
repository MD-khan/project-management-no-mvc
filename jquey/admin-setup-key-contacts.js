$(document).ready( function() { 
    
     $('#btn-show-add-key-con-frm').click( function() {
         $('#section-add-key').show();
          });
          
         $('.btn-cls-fm').click( function() {
         $('#section-add-key').hide();
          });
    

    $('#btn-key-contacts').click(function(e) {
        
       e.preventDefault();
     
       
       var DATA = $('#frm-setup-keycontacts-accounts').serializeArray(); 
       
              
                
        $.ajax( {
                   type: "POST",                 
                   url: "php/process-key-contact-setup.php",
                   data: DATA,
                   cache: false,
                   success: function(response) {
                       if( response == "inserted"){                        
                         
                          $('.ack-key').css("color", "green").html("A ney key contact has been created")                                                        
                            location.reload( true );                         
                          }// if
                       
                       else if( response == "not_inserted"){                           
                       $('.ack-key').css("color", "red").html("Ops! Something went wrong") 
                       }// if
                       
                        else if( response == "empty"){                           
                       $('.ack-key').css("color", "red").html("All the fields are required") 
                       }// if
                       
                                          
                        
                   }// success
               })// ajax
        
    });

});