<?php
require '../php/session.php';
sec_session_start();

require '../autoloader.php';
  
$admin_id =  $_POST['admin_id'];
$client_id =  $_POST['clinent_id'];
$company_id = $_POST['company_id'];
$team_id = $_POST['gc_team_id'];
$ticket_id = $_POST['ticket_id'];
$title = $_POST['subject'];
$project_id = $_POST['project-name'];
$contents = $_POST['tickets'];


$filter = new SecureData();
$admin_id = $filter->data_filters($admin_id);
$client_id = $filter->data_filters($client_id);
$company_id = $filter->data_filters($company_id);
$title = $filter->data_filters($title);
$project_id = $filter->data_filters($project_id);

 

$ticket = new Tickets();
$ticket->get_ticket_reply_info ( $ticket_id, $admin_id, $client_id, $company_id, $team_id, $project_id, $title, $contents );


$insert = $ticket->set_tiket_reply_info();

if( $insert) { 
    echo 'ok';
} else {
    echo 'no';
}

 