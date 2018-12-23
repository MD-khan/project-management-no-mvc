<?php
require '../php/session.php';
sec_session_start();

require '../autoloader.php';

$admin_id = $_SESSION['admin_db_id'];

// var_dump($admin_id);
$project =  new ProjectTypes();

$project_types = $_POST['project_types'];
$project_description = $_POST['project_types_descrip'];




// Secure data
$dataSecure = new SecureData();

$project_types =  $dataSecure->data_filters($project_types);
$project_description =  $dataSecure->data_filters($project_description);
$admin_id =  $dataSecure->data_filters($admin_id);


if( !empty($project_types) && !empty($project_description) && !empty($admin_id) ) {
   $project->get_project_types($admin_id, $project_types, $project_description);    
   
   $insert = $project->insert_project_types();
        
    if($insert) {
        echo "success";
    }
} else 
{
    echo "insert-error";
}