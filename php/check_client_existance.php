<?php
require '../php/session.php';
sec_session_start();
require '../autoloader.php';
 
if( isset($_POST['inValue']) ) {
   
    $email = $_POST['inValue'];

    //preventiing sql injecctions
    $dataSecure = new SecureData();  
    //$email =  $dataSecure->data_filters( $email  );

    $client = new ClientsInfo();
    $all_emails = $client->get_email();
    //var_dump($all_emails);
        
        
        foreach ( $all_emails as $single_email ) {

            if( $single_email['client_key_email'] === $email ){
                echo  'yes';  
                exit;
            } 
        }

        
 }