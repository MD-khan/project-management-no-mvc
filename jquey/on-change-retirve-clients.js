$(document).ready( function () {
    
   $(document).ready(function(e) {
    
	$('#company_name').change( function() {
			
			var company_name = $('#company_name').val();
                          		
			
			 $.ajax( { 
			 	 type: "POST", 
				 url: "php/process_requests.php",
				 data:  {action: "get_select_contacts",company_id:company_name},			 	
			 }).done(function(response){
                             jQuery(".select-contact").html(response);
                         });		
		
		});
	
	
});
    
    
});