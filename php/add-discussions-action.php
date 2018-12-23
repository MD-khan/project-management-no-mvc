<?php
require '../php/session.php';
sec_session_start();
require '../autoloader.php'; 

$dataSecure = new SecureData();
// get data 
$data = [
    
    'project_id'    => $dataSecure->data_filters( $_POST['project_id'] ),
    'phase_id'      => $dataSecure->data_filters( $_POST['phase_id'] ),
    'question_id'   => $dataSecure->data_filters( $_POST['project_question_id'] ),
    'admin_id'      => $dataSecure->data_filters( $_POST['admin_id'] ),
    'team_id'       => $dataSecure->data_filters( $_POST['member_id'] ),
    'client_id'     => $dataSecure->data_filters( $_POST['client_id'] ),
    'content'       => $_POST['discussions'],    
];

$answer = new ClientAnswer();
$answer->set_answer_properties( $data );

$is_save = $answer->save();
 
   
  