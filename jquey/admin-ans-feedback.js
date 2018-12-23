$(document).ready(function () {
    
    $("input:radio[name=ans-aproved]").click(function() {
             var value = $(this).val();
            
             if(value == "no") {
               $('#send-note').show();
             } else {
                  $('#send-note').hide();
             }
        });
    
    
    $('#btn-answers-feedback').click(function() {
        
       
      var data = $('#frm-ans-feedback').serializeArray();
     
      
     $.ajax( {
                   type: "POST",                 
                   url: "/gcpm/php/process-answer-feedback.php",
                   data: data,
                   cache: false,
                   success: function(response) {
                       if( response == 'yes'){     
                         $('#btn-answers-feedback').hide();
                       }// if
                                              
                   },// success
                   complete: function() {                        
                           $('#btn-answers-feedback').html("Your responses have been sent")          
       
                     }            
                   
                   
                    
               })// ajax
    });
});
