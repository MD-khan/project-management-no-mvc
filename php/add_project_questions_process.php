<?php
require '../php/session.php';
sec_session_start();
require '../autoloader.php';

$dataSecure = new SecureData();
$company_name =  $dataSecure->data_filters($company_name);
 
$data = [
    
    'phase_id'              => $dataSecure->data_filters( $_POST['phase'] ),
    'question_category_id'  => $dataSecure->data_filters( $_POST['question_category_id'] ),
    'project_type_id'       => $dataSecure->data_filters( $_POST['project_type_id'] ),
    'admin_id'              => $dataSecure->data_filters( $_POST['admin_id'] ),
    'team_id'               => $dataSecure->data_filters( $_POST['team_id'] ),
    'question'              => $dataSecure->data_filters( $_POST['question'] ),
    'description'           => $dataSecure->data_filters( $_POST['description'] )    
];

    if ( !empty( $data ) ) {
    $question = new Questions();
    $question->setQuestionProperties($data);
    $is_save = $question->save_question();

    if ( $is_save ) {

        echo '<span class="green"> A new Question has been addedd </span>';
    }else {
        echo '<span class="red"> Something went wrong! Please try again </span>';
    }

} else {
    
   echo '<span class="red"> All fields are required </span>';
}

