$(document).ready(function() {
    
    $('#btn-show-add-desig-frm').click( function() {
         $('#section-add-desig').show();
          });
          
         $('.btn-cls-fm').click( function() {
         $('#section-add-desig').hide();
          });
    
    
    $('#btn-deg-submit').click(function() {
     
      var DATA = $('#frm-add-designation').serializeArray();
       
        console.log(DATA);
         
         $.ajax( {
                   type: "POST",                 
                   url: "/gcpm/php/process-add-member-designation.php",
                   data: DATA,
                   cache: false,
                   success: function(response) {
                       if( response == "inserted"){
                                                                                  
                            location.reload( true ); 
                         
                         $( '#frm-add-designation' ).each(function(){
                             this.reset();
                                });
                       }// if
                       
                       else if( response == "insert-error"){                           
                         $('#ack-members').css("color", "red")
                           .html("Something Went Wrong! Please Try Again")    
                       }// if
                       
                       
                       else if( response == "empty"){                           
                         $('#ack-members').css("color", "red")
                           .html("All Fields are required!")    
                       }// if
                       
                                          
                        
                   }// success
               })// ajax
      
    });
});