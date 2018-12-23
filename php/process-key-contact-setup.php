<?php
require '../php/session.php';
sec_session_start();

require '../autoloader.php';



$company_id = $_POST['company_name'];
$admin_id  = $_SESSION['admin_db_id'];

$c_fname = $_POST['key-fname'];
$c_lname = $_POST['key-lname'];
$c_phone = $_POST['key-phone'];
$c_email = $_POST['key-email'];
$c_pass = $_POST['key-pass'];

if ( !empty($company_id) &&  !empty($c_fname) && !empty($c_lname) 
        && !empty($c_phone) && !empty($c_email) && !empty($c_pass)) {
    

// Secure data
$dataSecure = new SecureData();

$company_id = intval($company_id);
$admin_id = intval($admin_id);

$company_id =  $dataSecure->data_filters($company_id);
$admin_id =  $dataSecure->data_filters($admin_id);
$c_fname =  $dataSecure->data_filters($c_fname);
$c_lname =  $dataSecure->data_filters($c_lname);
$c_phone =  $dataSecure->data_filters($c_phone);
$c_email =  $dataSecure->data_filters($c_email);
$c_pass =  $dataSecure->data_filters($c_pass);



$clients = new SetupClientAccount();
$clients->getClientInfo( $admin_id, $company_id, $c_fname, $c_lname, $c_phone, $c_email, $c_pass);

$setup_clients = $clients->setClinetInfo();



$mail = new  MailClinetCredential();


if($setup_clients) {
    echo"inserted";
    $mail->mail_clients_credential($c_email, $c_fname, $c_email, $c_pass);
    // sending email to client
    
} else {
    echo "not_inserted";
}


} else {
    echo"empty";
}
