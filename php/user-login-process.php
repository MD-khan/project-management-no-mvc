<?php
require '../php/session.php';
sec_session_start();
require '../autoloader.php';
 

 //$user_id = "paul.scott@goingclear.com";
 //$user_pass = "123";
 
$filter = new SecureData();
$user_id = $filter->data_filters($_POST['user_id']);
$user_pass = $filter->data_filters($_POST['user_pass']);


 $client = new ClientsInfo(); 
 $clinent_data = $client->client_login( $user_id, $user_pass);  
 $client_id = $clinent_data['client_key_email'];
 $client_pass = $clinent_data['client_password'];
 //sets client details
 $client_db_id = $clinent_data['client_id'];
 $client_admin_id = $clinent_data['admin_user_id'];
 $client_company_id = $clinent_data['company_id'];
 $client_fname = $clinent_data['client_key_fname'];
 $client_lname = $clinent_data['client_key_lname'];
 $client_phone = $clinent_data['client_key_phone'];
 $client_db_id = $clinent_data['client_id'];
 
 
 //Admin
    $admin = new ADminInfo();
    $admin_data = $admin->admin_login($user_id, $user_pass );
    $admin_id = $admin_data['admin_email'];
    $admin_pass = $admin_data['admin_password'];
    
    $admin_fname = $admin_data['admin_fname'];
    $admin_lname = $admin_data['admin_lname'];
    $admin_db_id = $admin_data['admin_user_id'];
      
    
 if( $user_id == $client_id && $user_pass == $client_pass ) {    
    echo "client";
    // set clients info
    $_SESSION['client_db_id'] =  $client_db_id; 
    $_SESSION['client_admn_id'] = $client_admin_id;
    $_SESSION['client_compny_id'] = $client_company_id;
    $_SESSION['client_fname'] = $client_fname;
    $_SESSION['client_lname'] = $client_lname;
    $_SESSION['client_phone'] = $client_phone;
    $_SESSION['client_email'] = $client_id;
    
    //check login
    $_SESSION['logged_in'] = $client_db_id; 
     
 } else if( $user_id == $admin_id && $user_pass == $admin_pass ) {    
     echo "admin"; 
     // collects Admin info
   $_SESSION['admin_db_id'] = $admin_db_id;
   $_SESSION['admin_fname'] = $admin_fname;
   $_SESSION['admin_lname'] = $admin_lname; 
   $_SESSION['admin_email'] = $admin_id;
    
    $_SESSION['logged_in'] = $admin_db_id; 
      
  }
  else {
     echo "incorrect";
  }
      