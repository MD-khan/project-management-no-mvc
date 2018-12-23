<?php

require '../php/session.php';
sec_session_start();

require '../autoloader.php';

 
$values = $_POST;
echo "<pre>";
print_r($values);
echo "</pre>";
  

$values = $_FILES;
echo "<pre>";
print_r($values);
echo "</pre>";
 


// print_r(array_keys($_POST));

$client_ans_id = null;
 $project_qsn_id = $_POST['project_qsn_id']; 
 $qsn_cat_id= $_POST['qsn_categories'];
 
$qsn_phase_id = $_POST['phasesegory'];
$project_cat_id = $_POST['project_cat_id'];
$project_id = $_POST['project_id'];
 
$results = false;

$answer = new ClientAnswer();
 

// Insert Input type values 
$InputValues = $_POST['InputValues']; //array

if( !empty($InputValues) ){   
     
$qsn_cat_id_index = 0; 
$qsn_cat_count = sizeof($qsn_cat_id);
 

     foreach ( $InputValues as $input => $input_ans ) {
         
         $input_main_ans[$input] = $input_ans;
        
        $answer->get_client_answer( $input, $project_cat_id, $qsn_phase_id,  $qsn_cat_id[$qsn_cat_id_index],
                                  $project_id, $input_main_ans[$input]);
         
        $qsn_cat_id_index++;
         if( $qsn_cat_id_index >= $qsn_cat_count ) {
                $qsn_cat_id_index = 0;
            }
        
         $results =  $answer->inser_client_answers();     
         
         $results = true;
     }
    
}
 
// Insert  Check box values 
$check_values = $_POST['check_values']; //array


 if( !empty($check_values) ){     
     
      foreach ( $check_values as $check => $check_ans ) {
         $ck=  implode(",", $check_ans);
         
        $answer->get_client_answer( $check, $project_cat_id, $qsn_phase_id,  $qsn_cat_id[$qsn_cat_id_index],
                                  $project_id, $ck);
        
        
        $qsn_cat_id_index++;
         if( $qsn_cat_id_index >= $qsn_cat_count ) {
                $qsn_cat_id_index = 0;
            }
         $results =  $answer->inser_client_answers();   
        //  var_dump($re);
          $results = true;
     }
     
}
  
 

// Insert  radio values
$radio_values = $_POST['radio_fields']; 
 if( !empty($radio_values) ){     
     foreach ( $radio_values as $index => $radion_ans ) {
         $main_ans[$index] = $radion_ans;       
         
         // index is $project_qsn_id here 
         
        $answer->get_client_answer( $index, $project_cat_id, $qsn_phase_id,  $qsn_cat_id[$qsn_cat_id_index],
                                    $project_id, $main_ans[$index] );
      
         $qsn_cat_id_index++;
         if( $qsn_cat_id_index >= $qsn_cat_count ) {
                $qsn_cat_id_index = 0;
            }
        
         $results =  $answer->inser_client_answers();
           $results = true;
     // var_dump($re);
          
     }
    
}

// Insert Sub Answers 

// Sub input type
$SubInputValues = $_POST['SubInputValues']; //array

if( !empty($SubInputValues) ){   
  
     foreach ( $SubInputValues as $sub_input => $sub_input_ans ) {
         
         $input_sub_ans[$sub_input] = $sub_input_ans;
        
        $answer->get_sub_client_answer( $sub_input, $project_cat_id, $qsn_phase_id, $project_id, $input_sub_ans[$sub_input]);
                 
         $results =  $answer->inser_client_sub__answers();
          $results = true;
       // var_dump($results);
     }
    
}



// Insert  Sub Check box values 
$sub_check_values = $_POST['sub_check_values']; //array


 if( !empty($sub_check_values) ){     
     
      foreach ( $sub_check_values as $sub_check => $sub_check_ans ) {
         $sub_ck=  implode(",", $sub_check_ans);
         
        $answer->get_sub_client_answer( $sub_check, $project_cat_id, $qsn_phase_id, $project_id, $sub_ck);
        
         $results =  $answer->inser_client_sub__answers();   
          $results = true;
      //  var_dump($results);
     }
    
}



// Insert  Sub Radio values 
$sub_radio_values = $_POST['sub_radio_values']; //array

if( !empty($sub_radio_values) ){     
     foreach ( $sub_radio_values as $sub_radio => $sub_radio_ans ) {
         $sub_radio_ans[$sub_radio] = $sub_radio_ans;       
        
        $answer->get_sub_client_answer( $sub_radio, $project_cat_id, $qsn_phase_id, $project_id, $sub_radio_ans[$sub_radio] );
       
         $results =  $answer->inser_client_sub__answers();
           $results = true;
      // var_dump($results);
     }
}



// upload files 
 if( !empty( $_FILES["sub_file_upload"] ) ) {
 
 $uploads_dir = '../img/img_ans/';  
foreach ($_FILES["sub_file_upload"]["error"] as $key => $error) {
     
    if ($error == UPLOAD_ERR_OK) { //  There is no error, the file uploaded with success.
         $tmp_name = $_FILES["sub_file_upload"]["tmp_name"][$key];         
        $name = $_FILES["sub_file_upload"]["name"][$key]; // name of the image   
        
        $imageFileType = pathinfo($name,PATHINFO_EXTENSION); // get image extention name 
        $image_name = pathinfo($name,PATHINFO_BASENAME ); // get image name with extention        
       
        $image_path =  $uploads_dir.$name;
        
        move_uploaded_file($tmp_name, "$uploads_dir/$name");
        
        // $key is the qsn_id
        $answer->get_sub_client_answer( $key, $project_cat_id, $qsn_phase_id, $project_id, $image_path);
        $results =  $answer->inser_client_sub__answers(); 
        
        // insert image path into database   
      
    }
}
    
 }
?>
 
