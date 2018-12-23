<?php
require '../php/session.php';
sec_session_start();
require '../autoloader.php';
//preventiing sql injecctions
$dataSecure = new SecureData();  

//Get Data
$data = [   
    'admin_id'        => $dataSecure->data_filters( $_POST['admin_id'] ),
    'team_id'         => $dataSecure->data_filters( $_POST['team_id'] ),   
    'project_id'        => $dataSecure->data_filters( $_POST['project_id'] ),
    'phase_id'        => $dataSecure->data_filters( $_POST['phase_id'] ),
    'project_type_id' => $dataSecure->data_filters( $_POST['project_type_id'] ),
    'question_cat_id' => $dataSecure->data_filters( $_POST['question_category_id'] ),
    'question'        => $dataSecure->data_filters( $_POST['question'] ),
    'description'     => $dataSecure->data_filters( $_POST['description'] ),   
];


$additional_question = new CustomizedQuestions();    

$additional_question->get_question_details( $data );

$is_save = $additional_question->save_additional_question();

if( $is_save){
    
    echo '<spna class="green"> An Addtional Question has been added </span> ';
}else {
    
    echo '<spna class="red"> Something went wrong! Try again</span> ';
}