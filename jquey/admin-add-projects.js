$(document).ready( function () {
    
    $('#btn-project-submit').click(function(e) {
         e.preventDefault(); //Will prevent the submit...   
        
         var DATA = $('#frm-add-projects').serializeArray();
          console.log(DATA);
         $.ajax( {
                   type: "POST",                 
                   url: "php/process_add_projetcs.php",
                   data: DATA,
                   cache: false,
                   success: function(response) {
                       if( response == "inserted"){
                        // alert('success');
                         $('.ack-project-adds').css("color", "green")
                           .html("A new project has been added")        
                         $( '#frm-add-projects' ).each(function(){
                              this.reset();
                            });
                       }// if
                       
                       else if( response == "not_inserted"){                           
                         $('.ack-project-adds').css("color", "red")
                           .html("Something went wrong! please try again")  
                       }// if
                       
                        else if( response == "empty"){                           
                         $('.ack-project-adds').css("color", "red")
                           .html("All the fields are required")  
                       }// if
                       
                                          
                        
                   }// success
               })// ajax
      
    }); // btn-project-submit
});