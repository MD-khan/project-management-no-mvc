$(document).ready(function() {
    
    $('#btn-show-add-member-frm').click( function() {
         $('#section-add-member').show();
          });
          
         $('.btn-cls-fm').click( function() {
         $('#section-add-member').hide();
          });
    
    
    $('#btn-member-submit').click(function() {
     
      var DATA = $('#frm-add-members').serializeArray();
       
        console.log(DATA);
         
         $.ajax( {
                   type: "POST",                 
                   url: "/gcpm/php/process-add-members.php",
                   data: DATA,
                   cache: false,
                   success: function(response) {
                       if( response == "inserted"){
                           
                          $('.ack-key').css("color", "green").html("A new member has been created")                                                        
                            location.reload( true ); 
                         
                         $( '#frm-add-members' ).each(function(){
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