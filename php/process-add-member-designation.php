<?php
require '../php/session.php';
sec_session_start();

require '../autoloader.php';


  $designation = $_POST['desig']; 
  $admin_id  = $_SESSION['admin_db_id'];
 

if ( !empty( $designation ) ) {
    

// Secure data
$dataSecure = new SecureData();
 
$admin_id = intval($admin_id);

$designation =  $dataSecure->data_filters($designation);

$members = new TeamMembers();
$members->get_deg( $designation, $admin_id);

$add_deg = $members->set_designation();



// $mail = new  MailClinetCredential();


if($add_deg) {
    echo"inserted";
    //$mail->mail_clients_credential($c_email, $c_fname, $c_email, $c_pass);
    // sending email to client
    
} else {
    echo "insert-error";
}

        } else {
            echo "empty";
        }


