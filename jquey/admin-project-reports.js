$(document).ready(function(){  

    $('#sel-project-view').change(function() {
       var project_status = $('#sel-project-view').val();
       
       
       if( $.trim(project_status) != '') {
		$.post('php/process-admin-project-reports.php', { project_status: project_status}, function(resullt) {
			$('#SearchResults').html(resullt);
		});
            }
    });

});

