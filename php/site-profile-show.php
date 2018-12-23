<?php
//include  '../autoloader.php';

$admi_id = intval($_SESSION['admin_db_id']);
$obj = new SiteProfile();
$site_profiles = $obj->show_site_profiles( $admin_id );

//set site edit profile url bases on the user
if( isset( $_SESSION['client_logged_in'])) {    
    $url = "siteprofile-edit-client";     
}elseif( isset( $_SESSION['member_logged_in'])) {     
    $url = "siteprofile-edit-team";  
}elseif( isset( $_SESSION['admin_logged_in'])) {     
    $url = "siteprofile-edit-admin";  
}

if( $site_profiles ) { ?>
 
<div class="main-box clearfix">
    
    <div class="main-box-header">
            <h2> All Site Profiles  </h2>
    </div>
    
    <div class="main-box-body clearfix">
        <div class="table-responsive">
            <table id="table-example" class="table table-hover">
                <thead>
                        <tr>															
                            <th><span>  Company ID </span></th>
                            <th><span> Company </span></th>
                            <th><span> Details  </span></th> 
                            <th><span> Action  </span></th> 
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php foreach ($site_profiles as $profile_data ) {?>
                        <tr>
                            <td> <?=$profile_data['company_id']?> </td>
                            <td> <?=$profile_data['company_name']?> </td>
                            <td> <?=$profile_data['details']?> </td>
                            <td>  <a href="/gcpm/<?= $url ?>/com_id/<?=$profile_data['company_id']?>" class="btn btn-primary" role="button"> Edit </a>  </td>
                        </tr>
                        <?php } ?>
                    </tbody>
            </table>
        </div>
    </div>
</div>
<?php } ?>