$(document).ready(function() { 
    
    $('#add_qsn_cat').click(function() {
       
        var data = $('#frm-add-qsn-cat').serializeArray();
        // alert(data);
         console.log(data);
    });
});