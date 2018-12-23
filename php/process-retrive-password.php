<?php
require '../php/session.php';
sec_session_start();

require '../autoloader.php';


$email = $_POST['retrival-email'];



if( !empty($email) ) {
    


// preventiing sql injecctions
$dataSecure = new SecureData();
$email =  $dataSecure->data_filters($email);


// matching email to all the users  and send password
$password = new Passwords();
$password->is_match($email);
$result = $password->send_email();
 

            if($result) {
                echo"ok";
            } else {
                echo "no";
            }
 
} else {
    echo "empty";
}
