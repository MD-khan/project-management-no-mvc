<?php

require '../php/session.php';
sec_session_start();

require '../autoloader.php';


$ticket_id = $_POST['ticket_id'];
 
$is_approved = $_POST['do-aproved-ticket'];

$filter = new SecureData();
$ticket_id = $filter->data_filters( $ticket_id );
$is_approved = $filter->data_filters( $is_approved );

if( $is_approved == 'on' ) {
    
    $is_approved = 1;
} else {
     $is_approved = 0;
    
}


$update = new Tickets();
$set_update = $update->update_ticket_approve(  $ticket_id, $is_approved );
 

 


 