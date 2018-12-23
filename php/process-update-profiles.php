<?php
require '../php/session.php';
sec_session_start();

require '../autoloader.php';


// change request member password
if(isset($_POST['member_profile'])){
        
        $member_db_id = intval( $_SESSION['team_db_id'] );  
        // match current password with new password
        $current_pass = $_POST['member_current_pass'];
        $member_new_password = $_POST['member_new_pass'];  
        
       
        if( !empty($current_pass) && !empty($member_new_password)){
           
         $dataSecure = new SecureData();
         $current_pass =  $dataSecure->data_filters( $current_pass );
         $member_new_password =  $dataSecure->data_filters( $member_new_password );  
            
         $current_pass = md5( $current_pass );         
         $member_new_password = md5( $member_new_password ); 
            
         $member = new TeamMembers();
         $retrive_currrent_pass = $member->match_member_password($member_db_id);
         $member_old_pass = $retrive_currrent_pass['member_password'];
        
         $match_pass = $current_pass === $member_old_pass? TRUE : FALSE;
        
                if($match_pass) {
                         // Update the password
                    $update = new TeamMembers();            
                    $result = $update->update_member_password( $member_new_password, $member_db_id );
                                   
                        echo "ok";             
                 
                } else {
                    echo "no";
                }
        }else {
            echo "empty";
            }
} 




// change request member password
if(isset($_POST['admin_profile'])){
        
         $admin_db_id = intval( $_SESSION['admin_db_id'] );  
         
        // match current password with new password
        $current_pass = $_POST['admin_current_pass'];
        $admin_new_password = $_POST['admin_new_pass'];
          
        if( !empty($current_pass) && !empty($admin_new_password)){  
             
            $dataSecure = new SecureData();
            $current_pass =  $dataSecure->data_filters($current_pass);
            $admin_new_password =  $dataSecure->data_filters($admin_new_password);
            
            
            $admin_new_password = md5( $admin_new_password );
            $current_pass = md5($current_pass);   
            
            $admin = new ADminInfo();
            $pass_frm_db = $admin->match_admin_password( $admin_db_id );
            $admin_old_pass = $pass_frm_db['admin_password'];
                
        
        $match_pass = $current_pass === $admin_old_pass ? TRUE : FALSE;
        
                if($match_pass) {
                         // Update the password
                    $update = new ADminInfo();            
                    $result = $update->update_admin_password( $admin_new_password, $admin_db_id );
                                   
                        echo "ok";             
                 
                } else {
                    echo "no";
                }
        }else {
            echo "empty";
            }
} 
