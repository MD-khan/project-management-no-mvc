$(document).ready(function() { 
    

$('#btn_opn_ad_qsns').click(function() {
    $('#section_frm_ad_qsn').toggle();
});
 
 
 $('.btn-cls-fm-qsn').click(function() {
    $('#section_frm_ad_qsn').hide();
});
 
 
  $('#btn-qsn-submit').bind( "click submit", function(e) {
   e.preventDefault(); //Will prevent the submit...   
        var DATA = $('#frm_add_qsns').serializeArray();
           console.log(DATA);    
         $.ajax( {
                   type: "POST",                 
                   url: "/gcpm/php/process_add_project_questions.php",
                   data: DATA,
                   cache: false,
                   success: function(response) {
                       if( response == "success"){                                                                                     
                        location.reload( true );                        
                        }// if
                       
                       else if( response == "insert-error"){                           
                         alert("Something Went Wrong! Please contact to Administrator");
                       }// if
                       
                       
                       else if( response == "empty-fields"){                           
                         $('.ack-qsn').css({
                              'color' : 'red',
                              'font-size': '18px'
                         }).html("Please fill up all the input fields")
                       }// if
                                          
                        
                   }// success
               })// ajax
  }); 
 
 
}); //documents
    

