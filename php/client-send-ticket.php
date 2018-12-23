<?php
require '../php/session.php';
sec_session_start();

require '../autoloader.php';
  
$admin_id =  $_POST['admin_id'];
$client_id =  $_POST['clinent_id'];
$company_id = $_POST['company_id'];
$team_id = $_POST['gc_team_id'];
  
$title = $_POST['subject'];
$priority = $_POST['prioriity'];
$specific_link = $_POST['specific-link'];
$web_id = $_POST['website-name'];
$content = $_POST['tickets'];


$filter = new SecureData();
$admin_id = $filter->data_filters($admin_id);
$client_id = $filter->data_filters($client_id);
$company_id = $filter->data_filters($company_id);
$title = $filter->data_filters($title);
$priority = $filter->data_filters($priority);
$specific_link = $filter->data_filters($specific_link);
  

 

$data = [
    
    'admin_id'      => $admin_id,
    'client_id'     => $client_id,
    'company_id'    => $company_id,
    'member_id'     => $team_id,
    'web_id'        => $web_id,
    'title'         => $title,
    'priority'      => $priority,
    'link'          => $specific_link,
    'content'       => $content
    
];


$ticket = new Tickets();
$ticket->get_client_ticket_info( $data );


$insert = $ticket->set_client_tiket_info();

if( $insert) { 
    echo 'ok';
} else {
    echo 'no';
}

 