<?php
// print_r($_POST);
 include_once '../autoloader.php';
// get data 
   $project_id = $_POST['project_id'];
   $feedback = $_POST['ans-aproved'];
  
   $note = $_POST['send-note'];

   if( empty($note)) {
       $note="";
   }
 $feed = new ClientAnswer();
  
 $feed->get_feedback($feedback, $note, $project_id);
 $result = $feed->admin_anser_feedback();
 
 if($result) {
     echo "yes";
 }