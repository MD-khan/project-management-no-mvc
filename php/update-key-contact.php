<?php
 
require '../php/session.php';
sec_session_start();

require '../autoloader.php';
 
$filter = new SecureData();
 

$data = [
    
    'phone'   => $filter->data_filters( $_POST['phone'] ),
    'mobile'  => $filter->data_filters( $_POST['mobile'] ),
    'email'   => $filter->data_filters( $_POST['email'] ),
    'id'      => $filter->data_filters( $_POST['client_id'] )
];

$client = new ClientsInfo();

$update = $client->update_key_contact( $data );

if( $update ) {
    
    echo " <span class='green'> Key contact has been updated </span>";
    
} else {
    
     echo "<span class='red'> Something went wrong, Try again!</span>";
}

