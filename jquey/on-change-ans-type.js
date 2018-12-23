$(document).ready( function() {
    
    $('#ans-type').change(function() {
       
       var input_type = $('#ans-type').val();
        
        if( input_type == "Radio Button" ) {
            
            $('#radio_button').show();
              $('#checkbox').hide();
        }
        
         else if( input_type == "Check Box" ) {
             $('#radio_button').hide();
             $('#checkbox').show();
        }
           else {
               
                 $('#radio_button').hide();
                $('#checkbox').hide();
           }
       
    });
    
    
    
    
    $('input:radio[name="sub-questions"]').change(function(){
        if ($(this).is(':checked') && $(this).val() == 'Yes') {
            $('#sub-quesn-section').show();
        } else {
             $('#sub-quesn-section').hide();
        }
    });
    
    
   $('#sub_ans_type').change(function() {
       
       var input_type = $('#sub_ans_type').val();
        
        if( input_type == "Radio Button" ) {
            
            $('#sub_radio_button').show();
              $('#sub-checkbox').hide();
        }
        
         else if( input_type == "Check Box" ) {
             $('#sub_radio_button').hide();
             $('#sub-checkbox').show();
        }
           else {
               
                 $('#sub_radio_button').hide();
                $('#sub-checkbox').hide();
           }
       
    });
    
    
    
});