<?php

require '../php/session.php';
sec_session_start();

require '../autoloader.php';


$projet_id = $_POST['project_id'];
$question_id = $_POST['project_question_id'];

$is_approved = $_POST['do-aproved'];


if( $is_approved == 'on' ) {
    
    $is_approved = 1;
} else {
     $is_approved = 0;
    
}

echo $is_approved;
$update = new ClientAnswer();

$ans = $update->fetch_answer( $question_id, $projet_id );

foreach ($ans as $single_ans ){    
   
    $set_update = $update->update_ansere_approval($single_ans['client_ans_id'], $is_approved );
}

 


 