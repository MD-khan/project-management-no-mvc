$(document).ready(function() {
            
                     
         // Add Project Types 
         $('#btn-show-prjt-typs-frm').click( function() {
         $('#section-add-project-types').show();
          });
          
          $('.btn-cls-fm').click(function() {
             $('#section-add-project-types').hide();
          });
          
        
         $('#btn-project-types-submit').click(function (e) {
                e.preventDefault(); //Will prevent the submit...   
               var project_types = $('#project_types').val();
               var project_types_descrip = $('#project_types_descrip').val();                
            
               
              // console.log(project_types);
              // console.log(project_types_descrip);
               
               if( project_types == "" || project_types_descrip == "") {
                   $('.ack').css("color", "red")
                           .html("Please Enter both project Types and Description!")                 
               } else {
                   
                   
                  var DATA = 'project_types='+project_types+'&project_types_descrip='+project_types_descrip;
                   
                   $.ajax( {
                   type: "POST",                 
                   url: "php/process-add-project-types.php",
                   data: DATA,
                   cache: false,
                   success: function(response) {
                       if( response == "success"){
                        $('#section-add-project-types').hide();  
                          
                          $('.ack-success').css({
                              'font-size' : '24px',
                              'color' : 'green'
                          })
                           .html("A new project type has been added ").hide(5000);                            
                            location.reload( true );                          
                          
                       }// if
                       
                       else if( response == "insert-error"){                           
                         $('.ack').css("color", "red")
                           .html("Something Went Wrong! Please Try Again")    
                       }// if
                       
                                          
                        
                   }// success
               })// ajax
             
             } // else 
               
               
                // Hiding 
              //  
               
                
            });
         
        
        
  }); //document 
  
