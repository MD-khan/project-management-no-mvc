<?php
require '../php/session.php';
sec_session_start();

require '../autoloader.php';

//var_dump($_POST);
 
$msg = "Your Password has been updated"
        . "<a href='http://goingclearprojects.com/gcpm/'> Click here to login </a>";

if( !empty($_POST['security-code']) || !empty($_POST['pass1']) || !empty($_POST['pass2'])  ) {
    
     $g_code = $_POST['g-code']; // code sent to email
     
     $user_entry_code = $_POST['security-code'];
     
     $email = $_POST['email'];
     
     $password = $_POST['pass1'];
     
     if ( strcmp( $g_code, $user_entry_code ) !== 0) {
        exit();
    }
    
    //update password 
    
    //cheking if user email exist 
    $obj_pass = new Passwords();
    
    $match = $obj_pass->is_match($email);
    
        if( $match ) {
            
            $password = md5( $password );
             
            //update the password
            
            $member = new TeamMembers(); 
            $m_reset = $member->reset_member_password($password, $email);
            
            $admin = new ADminInfo();            
            $a_reset = $admin->reset_admin_password($password, $email);
            
            $client = new ClientsInfo();            
            $c_reset =  $client->reset_client_password($password, $email);
            
                if( $m_reset ) {
                    
                    echo "Hi Member " . $msg;
                }
                
            
                else if( $a_reset ) {
                    echo "Hi Admin " . $msg;
                }
                
                else if( $c_reset ) {
                    echo "Hi Client " . $msg;
                }
    
    
           
            
        }
    
  
} else {
    echo "<span class='red'>All fields are required </span>";
}


