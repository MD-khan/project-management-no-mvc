<?php
require '../php/session.php';
sec_session_start();
require '../autoloader.php';


$filter = new SecureData();


if ( !empty($_POST['project-type']) && !empty($_POST['client-name']) && !empty($_POST['company_name'])
        && !empty($_POST['project-assign-web-manager']) && !empty($_POST['project-name']) && !empty($_POST['project-status'])
        && !empty($_POST['project-cost']) && !empty($_POST['project-start-date']) ) {   
    


$project_type = $filter->data_filters($_POST['project-type']);
$admin_id =  $filter->data_filters($_SESSION['admin_db_id']);
$client_id =  $filter->data_filters($_POST['client-name']);
$company_id = $filter->data_filters($_POST['company_name']);

$web_manager_id = $filter->data_filters($_POST['project-assign-web-manager']);
$project_name =  $filter->data_filters($_POST['project-name']);
$project_status = $filter->data_filters($_POST['project-status']);
$project_cost = $filter->data_filters($_POST['project-cost']);
$project_start_date = $filter->data_filters($_POST['project-start-date']);
$project_end_date = $filter->data_filters($_POST['project-end-date']);



$admin_id = intval($admin_id);

 // print_r ($_POST);
 // var_dump($admin_id);
$project = new AddNewProjects();
$project->getProjectInfo($project_type, $admin_id, $client_id, $web_manager_id, $company_id, $project_name, 
        $project_status, $project_cost, $project_start_date, $project_end_date);
 

$insert_pro = $project->setProjectInfo();







if($insert_pro) {
    echo"inserted";
} else {
    echo "not_inserted";
}


} else {
    echo "empty";
}