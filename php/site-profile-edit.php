<?php
require '../autoloader.php';

$filter = new SecureData();

$data = [
    
    'company_id'         =>  $filter->data_filters($_POST['company_id']),   
    'profile-details'   =>  $filter->data_filters($_POST['profile-details'])
];
 
$site_profile = new SiteProfile();
$update = $site_profile->update_site_profile($data);

if ( $update ) {
    
    echo '<span class="green"> Site Profile has been updated </span>';
} else {
    echo 'Something went wrong! Please try again ';
}



