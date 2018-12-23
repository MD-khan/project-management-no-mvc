<?php
require '../php/session.php';
sec_session_start();

require '../autoloader.php';


$client_image = new ClientsInfo;    
$admin_image = new ADminInfo();
$member_image = new TeamMembers();

 
$project_question_id = $_REQUEST['project_question_id'];
$project_id = $_REQUEST['project_id'];

$answer = new ClientAnswer();

$question = new ProjectQuestions(); 
$specific_questions = $question->fetch_single_question($project_question_id);
 $answer_details =  $answer->fetch_answer($project_question_id, $project_id);
 ?>

<div class="main-box clearfix">
    <div class="main-box-header">
        <h3 class="green">  <?= ucwords($specific_questions["questions"]) ?> </h3>
    </div>
   
</div>

 
    
<?php 
  $answer_details =  $answer->fetch_answer($project_question_id, $project_id);
  
  
  if( $answer_details ) {
      
foreach ( $answer_details as $key=> $answer_value) {     
    $responser_client = $answer->get_name_who_did_response( $answer_value['client_id'] );  
    $client_image_path = $client_image->get_client_image_path( $answer_value['client_id'] );
   
    $responser_admin = $answer->get_admin_name($answer_value['admin_id']);
    $admin_image_path = $admin_image->get_admin_image_path( $answer_value['admin_id'] );
   
    
    $responser_member = $answer->get_team_member_who_did_response($answer_value['member_id']);
    $member_image_path = $member_image->get_member_image_path($answer_value['member_id']);
?>   
    
    <?php if($responser_admin) { ?> <div class="panel panel-info">  <?php } ?>
    <?php if($responser_member) { ?> <div class="panel panel-success">  <?php } ?>
    <?php if($responser_client) { ?> <div class="panel panel-warning">  <?php } ?>
    
        <div class="panel-heading question">
      
    <?php 
     // get client info  
         if ( $client_image_path ) {
         $c_image = str_ireplace ('../', '/gcpm/', $client_image_path['image_path']); 
          echo '<img src="'.$c_image.'" class="img-circle" alt="" width="25" height="25">   ';  
         }
         
          echo ucfirst($responser_client['client_key_fname']) ." " .ucfirst($responser_client['client_key_lname']);
          
         if ( $admin_image_path ) {
         $a_image = str_ireplace ('../', '/gcpm/', $admin_image_path['image_path']); 
          echo '<img src="'.$a_image.'" class="img-circle" alt="" width="25" height="25">   ';  
         }  
          echo ucfirst($responser_admin['admin_fname']) ." " .ucfirst($responser_admin['admin_lname']);
         
         if ( $member_image_path ) {
         $m_image = str_ireplace ('../', '/gcpm/', $member_image_path['image_path']); 
          echo '<img src="'.$m_image.'" class="img-circle" alt="" width="25" height="25">   ';  
         }  
         echo ucfirst($responser_member['member_fname']) ." " .ucfirst($responser_member['member_lname']);
     
         
         //show date 
         echo "\t\t |  ";           
         //$posted_date =  date('Y-m-j H:i:s', strtotime($show_ans['insert_date']));
         $posted_date = $answer_value['insert_date'];        
         date_default_timezone_set('America/New_York');
         $today =  date('Y-m-j H:i:s');        
          
        $datetime1 = new DateTime($posted_date);
        $datetime2 = new DateTime($today);
        
      
        
        $diff=$datetime2->diff($datetime1);
        
     /*
        echo '<br>' . $posted_date .'<br'
                . '>';
        echo  $today .'<br>';
        
         echo 'Second  ' . $diff->s .'<br>';
         echo 'Minute  ' . $diff->i .'<br>';
         echo 'Hour  ' . $diff->h .'<br>';
         echo 'Days  ' . $diff->days .'<br>';
      * 
      */
     
     switch ($diff) {
   
   
     case $diff->i < 60 && $diff->h===0:
         echo "Posted a moment ago";
         break;
     
     case  $diff->h < 24 && $diff->days == 0:
         echo "Posted $diff->h hour(s) ago";
         break;
     
     case  $diff->days < 2:
         echo "Posted $diff->days day ago";
         break;
     
    
     
    default:
       echo 'Posted on' .' '. date('M j, Y g:i:s A', strtotime($answer_value['insert_date']));
} 
         
    ?>
       
</div>
    
    

<div class="panel-body" answer>
 
         <?=$answer_value['main_ans']?>    
</div>
   </div> <!-- ./paneldifault -->
  <?php } } ?>
     
     
    
  



  