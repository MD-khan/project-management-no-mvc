<?php
require '../php/session.php';
sec_session_start();
require '../autoloader.php';

//set site edit profile url bases on the user
if( isset( $_SESSION['client_logged_in'])) {    
    $url = "siteprofile-edit-client";     
}elseif( isset( $_SESSION['member_logged_in'])) {     
    $url = "siteprofile-edit-team";  
}elseif( isset( $_SESSION['admin_logged_in'])) {     
    $url = "siteprofile-edit-admin";  
}


$obj = new SiteProfile();

$company_id = intval( $_REQUEST['company-id'] );
$site_profiles = $obj->show_site_profile( $company_id );

if ( $site_profiles ) { ?>

<div style="border: 4px dotted #006dcc; padding: 5px; margin-top: 10px;">
    <h4>Site profile exist: </h4>
    <p>  <?=$site_profiles['details'] ?> </p>
    <a href="/gcpm/<?=$url?>/com_id/<?=$company_id?>" class="btn btn-primary" role="button"> Edit </a> 
   </div>
    
<?php
    
}else {
    echo 'no';
}


