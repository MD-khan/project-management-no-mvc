<?php

 
require '../php/session.php';
sec_session_start();

require '../autoloader.php';

 $allowed =  array('gif','png' ,'jpg','jpeg','bmp');
if( !empty( $_FILES["member_pic"]['name'] ) ) {   
    
    
        $uploads_dir = '../img/team/'; 
          
        if ($error == UPLOAD_ERR_OK) { //  There is no error, the file uploaded with success.
        $tmp_name = $_FILES["member_pic"]["tmp_name"];         
        $name = $_FILES["member_pic"]["name"]; // name of the image   
        
        $imageFileType = pathinfo($name,PATHINFO_EXTENSION); // get image extention name 
        
        //allow      
        if(!in_array( $imageFileType, $allowed ) ) {
            echo 'type-error';
            exit();
        }
        
        
        $image_name = pathinfo($name,PATHINFO_BASENAME ); // get image name with extention        
       
        $image_path =  $uploads_dir.$name;
        
        move_uploaded_file($tmp_name, "$uploads_dir/$name");
        
        $member_db_id = intval( $_SESSION['team_db_id'] );  
        // $key is the qsn_id
        $image = new TeamMembers();
        $image_update = $image->update_member_image( $image_path, $member_db_id);
        
            if($image_update){
                echo 'ok';
            }
        
        // insert image path into database   
        
            
    }
 } else {
     echo 'no';
 }