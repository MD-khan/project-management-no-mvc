<?php

require '../php/session.php';
sec_session_start();

require '../autoloader.php';

use \Eventviva\ImageResize;
 

  $allowed =  array('gif','png' ,'jpg','jpeg','bmp');

   
   if( !empty( $_FILES["client-pic"]['name'] ) ) {   
    
       
        //resize image 
      //  $resize_img = new ImageResize( $_FILES["client-pic"]['name']  );
      //  $resize_img->resizeToBestFit(300, 300);
       // $resize_img->save($_FILES["client-pic"]['name']);
         
   
        $uploads_dir = '../img/client/'; 
          
        if ($error == UPLOAD_ERR_OK) { //  There is no error, the file uploaded with success.
        $tmp_name = $_FILES["client-pic"]["tmp_name"];         
        $name = $_FILES["client-pic"]["name"]; // name of the image   
        
        $imageFileType = pathinfo($name,PATHINFO_EXTENSION); // get image extention name 
        
        //allow      
        if(!in_array( $imageFileType, $allowed ) ) {
            echo 'type-error';
            exit();
        }
        
        $image_name = pathinfo($name,PATHINFO_BASENAME ); // get image name with extention        
       
        $image_path =  $uploads_dir.$name;
        
        
        move_uploaded_file($tmp_name, "$uploads_dir/$name");
        
        $client_db_id = intval( $_SESSION['client_db_id'] );  
        // $key is the qsn_id
        $image = new ClientsInfo();
        $image_update = $image->update_client_image( $image_path, $client_db_id );
        
            if($image_update){
                echo 'ok';
            }
        
        // insert image path into database   
        
            
    }
         }else {
             echo 'no';
}
        
 
    
      if( !empty( $_FILES["company-pic"]['name'] ) ) {   
    
    
        $uploads_dir = '../img/client/'; 
          
        if ($error == UPLOAD_ERR_OK) { //  There is no error, the file uploaded with success.
        $tmp_name = $_FILES["company-pic"]["tmp_name"];         
        $name = $_FILES["company-pic"]["name"]; // name of the image   
        
        $imageFileType = pathinfo($name,PATHINFO_EXTENSION); // get image extention name 
        //allow      
        if(!in_array( $imageFileType, $allowed ) ) {
            echo 'type-error';
            exit();
        }
        $image_name = pathinfo($name,PATHINFO_BASENAME ); // get image name with extention        
       
        $image_path =  $uploads_dir.$name;
        
        move_uploaded_file($tmp_name, "$uploads_dir/$name");
        
        $client_company_id = intval( $_SESSION['client_compny_id'] );  
        // $key is the qsn_id
        $image = new ClientsInfo();
        $image_update = $image->update_company_image( $image_path, $client_company_id );
        
            if($image_update){
                echo 'ok';
            }
        
        // insert image path into database   
        
            
    }
         }else {
             echo 'no';
}
         
         
         
         
         

      if( !empty( $_FILES["admin_pic"]['name'] ) ) {   
    
    
        $uploads_dir = '../img/admin/'; 
          
        if ($error == UPLOAD_ERR_OK) { //  There is no error, the file uploaded with success.
        $tmp_name = $_FILES["admin_pic"]["tmp_name"];         
        $name = $_FILES["admin_pic"]["name"]; // name of the image   
        
        $imageFileType = pathinfo($name,PATHINFO_EXTENSION); // get image extention name 
        //allow      
        if(!in_array( $imageFileType, $allowed ) ) {
            echo 'type-error';
            exit();
        }
        $image_name = pathinfo($name,PATHINFO_BASENAME ); // get image name with extention        
       
        $image_path =  $uploads_dir.$name;
        
        move_uploaded_file($tmp_name, "$uploads_dir/$name");
        
        $admin_id = intval( $_SESSION['admin_db_id'] );  
        // $key is the qsn_id
        $image = new ADminInfo();
        $image_update = $image->update_admin_image( $image_path, $admin_id );
        
            if($image_update){
                echo 'ok';
            }
        
        // insert image path into database   
        
            
    }
         } else {
             echo 'no';
}
 
      
