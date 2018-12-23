<?php
require '../autoloader.php';

$filter = new SecureData();

$data = [
    
    'company_id'         =>  $filter->data_filters($_POST['company-id']),
    'admin_id'          =>  $filter->data_filters($_POST['admin_id']),
    'member_id'         =>  $filter->data_filters($_POST['member_id']),
    'profile-details'   =>  $filter->data_filters($_POST['profile-details'])
];

if ( !empty($data) ) {
    
    //save to database
    $profile = new SiteProfile();
    $profile->setFileProperty( $data );
    $is_save = $profile->save();
    
     
    if ( $is_save ) {
        
        echo '<span class="green"> Site profile has been saved successfully </span> ';
    }else {
        
        echo 'Somthing went wrong. Please try again';
    } 
    
}
