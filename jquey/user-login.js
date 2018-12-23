   $(document).ready( function(e) {
            // User log-in process
            $('#btn-user-login').click( function (e) {
           
              e.preventDefault(); //Will prevent the submit...   
             var user_id = $('#user_id').val();
             var user_pass = $('#user_pass').val();
             
             if ( user_id != "" && user_pass !="") {
             
              var DATA = 'user_id='+user_id+'&user_pass='+user_pass;
               
               $.ajax( {
                   type: "POST",                 
                   url: "php/user-login-process.php",
                   data: DATA,
                   cache: false,
                   success: function(response) {
                       if( response == "client"){
                           
                          window.location = "http://goingclearprojects.com/gcpm/client-dashboard";       
                        // console.log("success");
                       }// if
                       
                       else if( response == "admin"){                           
                          window.location = "http://goingclearprojects.com/gcpm/admin-dashboard";       
                        // console.log("success");
                       }// if
                       
                       
                       else if( response == "incorrect"){
                         //  window.location = "http://google.com";       
                         $('.log-ack').css("color" , "red")
                                 .html("Username or Password incorrect!")
                       }// if
                       
                       else if( response == "empty_field"){
                         //  window.location = "http://google.com";       
                         $('#empty_field').html("Please Enter both user id and password")
                       }// if
                        
                   }// success
               })// ajax
               
               } else {
                    $('.log-ack').html("Please Enter both user id and password")
               }
               
            });
            
            }); //document 