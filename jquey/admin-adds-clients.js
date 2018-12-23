$(document).ready(function() {
    
   
         $('#btn-show-add-clients-frm').click( function() {
         $('#section-add-clients').show();
          });
          
         $('.btn-cls-fm').click( function() {
         $('#section-add-clients').hide();
          });
    
     // Add Clients  
    
    $('#btn-clients-submit').click(function() {
      
      var DATA = $('#frm-add-companies').serializeArray();
       
      // console.log(DATA);
         $.ajax( {
                   type: "POST",                 
                   url: "php/process-add-clients.php",
                   data: DATA,
                   cache: false,
                   success: function(response) {
                       if( response == "inserted"){     
                             $('#section-add-clients').hide();  
                            //location.reload( true );                                                       
                         
                       }// if
                       
                       else if( response == "insert-error"){                           
                         $('.ack-clients').css("color", "red")
                           .html("Something Went Wrong! Please Try Again")    
                       }// if
                       
                       
                       else if( response == "empty"){                           
                         $('.ack-clients').css("color", "red")
                           .html("All Fields are required!")    
                       }// if
                       
                                          
                        
                   },// success
                   
                   complete: function() {                    
                          $('.ack-clients-top').css({
                              'font-size' : '24px',
                              'color' : 'green'
                          }). html("A new client has been added. Please add key contact for this company");                         
       
                     }            
                    
               })// ajax
      
    });
});