<?php
require '../php/session.php';
sec_session_start();
require '../autoloader.php';
 
if( isset($_POST['inValue']) ) {
   
    $project_name = $_POST['inValue'];
    
// preventiing sql injecctions
    $dataSecure = new SecureData();
    $project_name =  $dataSecure->data_filters($project_name);
    
    $project = new ProjectDetails();
    $result = $project->has_project( $project_name );
     
    if ( $result ) {
        echo 'yes';
    }
        
 }