
$(document).ready(function(){   
    
    
    $('#btn-project-search').click(function() {
        
         var keywords = $('#keywords').val()
          
          if( $.trim(keywords) != '') {
		$.post('php/process-search-results.php', { keywords: keywords}, function(resullt) {
			$('#SearchResults').html(resullt);
		});
            }
          
    });
    
    
    
     $('#frmSearch').submit(function( e ) {
         e.preventDefault();
         var keywords = $('#keywords').val()
          
          if( $.trim(keywords) != '') {
		$.post('php/process-search-results.php', { keywords: keywords}, function(resullt) {
			$('#SearchResults').html(resullt);
		});
            }
          
    });
    
    
    
   
   
}); 