<?php
require '../php/session.php';
sec_session_start();


require '../autoloader.php';





$admin_id = $_SESSION['admin_db_id'];
$cat_id = $_POST['project_id']; 

$question_cat_id = $_POST['qsn_cat'];
$pahse_cat_id = $_POST['phases'];

$question = $_POST['qsn_name'];
$ans_type = $_POST['ans-type'];

// assing values depenads on the ans type user selsect
// 
if ( $ans_type == "Check Box") {
    
$input_field_name = $_POST['ckh_field_name'];
$input_field_values = $_POST['chk_field_values'];

} else if ( $ans_type == "Radio Button") {
    
$input_field_name = $_POST['opt_field_name'];
$input_field_values = $_POST['opt_field_values'];
} else {
    $input_field_name = "n/a";
    $input_field_values = "n/a";
}

$is_required = $_POST['required'];

$sub_question = $_POST['sub_qsn_name'];


$sub_ans_type = $_POST['sub_ans_type'];

if ( $sub_ans_type == "Check Box") {
    
$sub_input_field_name = $_POST['sub_ckh_field_name'];
$sub_input_field_values = $_POST['sub_chk_field_values'];

} else if ( $sub_ans_type == "Radio Button") {
    
$sub_input_field_name = $_POST['sub_opt_field_name'];
$sub_input_field_values = $_POST['sub_opt_field_values'];
} else {
    $sub_input_field_name = "n/a";
    $sub_input_field_values = "n/a";
}

$sub_is_required = $_POST['sub-required'];




if ( !empty($question) && !empty($ans_type) && !empty($is_required) && !empty($pahse_cat_id) ) {    


// Secure data
$dataSecure = new SecureData();
 
$ans_type =  $dataSecure->data_filters($ans_type);
$question =  $dataSecure->data_filters($question);
$is_required =  $dataSecure->data_filters($is_required);
$input_field_name =  $dataSecure->data_filters($input_field_name);
$input_field_values =  $dataSecure->data_filters($input_field_values);

$sub_question =  $dataSecure->data_filters($sub_question);
$sub_ans_type =  $dataSecure->data_filters($sub_ans_type);
$sub_input_field_name =  $dataSecure->data_filters($sub_input_field_name);
$sub_input_field_values =  $dataSecure->data_filters($sub_input_field_values);
$sub_is_required =  $dataSecure->data_filters($sub_is_required);


$obj = new ProjectQuestions();
$obj->get_project_questions( $cat_id, $admin_id, $pahse_cat_id, $question_cat_id, $question, $sub_question, $ans_type, $sub_ans_type,
                              $input_field_name, $sub_input_field_name, $input_field_values, $sub_input_field_values,
                              $is_required, $sub_is_required ); 

$result = $obj->insert_project_questions();

if( $result ) {
    echo "success";
}
else {
    echo "insert-error";
}
 

} else {
    echo "empty-fields";
}
