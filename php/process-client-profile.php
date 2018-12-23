<?php
require '../php/session.php';
sec_session_start();

require '../autoloader.php';


// change request member password
if(isset($_POST['client_profile'])){
        
        $client_db_id = intval( $_SESSION['client_db_id'] );  
   
        // match current password with new password
        $current_pass = $_POST['client_current_pass'];
        $client_new_password = $_POST['client_new_pass'];
         
        if( !empty($current_pass) && !empty($client_new_password)){
            
            $dataSecure = new SecureData();
            $current_pass =  $dataSecure->data_filters($current_pass);
            $client_new_password =  $dataSecure->data_filters($client_new_password);
            
            $current_pass = md5( $current_pass );
            $client_new_password = md5( $client_new_password );
            
            $client = new ClientsInfo();
            $db_pass = $client->match_client_password( $client_db_id );
            $client_old_pass = $db_pass['client_password'];

            $match_pass = $current_pass === $client_old_pass? TRUE : FALSE;
        
                if($match_pass) {
                         // Update the password                              
                    $result = $client->update_client_password( $client_new_password, $client_db_id );
                                   
                        echo "ok";             
                 
                } else {
                    echo "no";
                }
        }else {
            echo "empty";
            }
} 
