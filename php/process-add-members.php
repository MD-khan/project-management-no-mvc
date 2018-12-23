<?php
require '../php/session.php';
sec_session_start();

require '../autoloader.php';


 
$member_fname = $_POST['member-fname'];
$member_lname = $_POST['member-lname'];
$designation_id = $_POST['member-designation'];
$member_phone = $_POST['member-phone'];
$member_email = $_POST['member-email'];
$member_pass = $_POST['member-pass'];
 
 

$admin_id  = $_SESSION['admin_db_id'];



if ( !empty($member_fname) && !empty($member_lname) && !empty($designation_id) &&  !empty($member_phone) 
        && !empty($member_email) && !empty($member_pass) ) {
    

// Secure data
$dataSecure = new SecureData();

$designation_id = intval($designation_id);
$admin_id = intval($admin_id);

$designation_id =  $dataSecure->data_filters($designation_id);
$admin_id =  $dataSecure->data_filters($admin_id);
$member_fname =  $dataSecure->data_filters($member_fname);
$member_lname =  $dataSecure->data_filters($member_lname);
$member_phone =  $dataSecure->data_filters($member_phone);
$member_email =  $dataSecure->data_filters($member_email);
$member_pass =  $dataSecure->data_filters($member_pass);



$members = new TeamMembers();
$members->getMemberInfo( $admin_id, $designation_id, $member_fname, $member_lname, $member_phone, $member_email, $member_pass);

$setup_members = $members->setMemberInfo();



// $mail = new  MailClinetCredential();


if($setup_members) {
    echo"inserted";
    //$mail->mail_clients_credential($c_email, $c_fname, $c_email, $c_pass);
    // sending email to client
    
} else {
    echo "insert-error";
}

        } else {
            echo "empty";
        }


