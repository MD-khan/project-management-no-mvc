<?php
require '../php/session.php';
sec_session_start();

require '../autoloader.php';
 

$dataSecure = new SecureData();
$company_name =  $dataSecure->data_filters($company_name);
 
$data = array(
    'company'    => $dataSecure->data_filters($_POST['company']),
    'street'     => $dataSecure->data_filters($_POST['street']),
    'city'       => $dataSecure->data_filters($_POST['city']),
    'state'      => $dataSecure->data_filters($_POST['state']),
    'zipcode'    => $dataSecure->data_filters($_POST['zipcode']),
    'country'    => $dataSecure->data_filters($_POST['country']),
    'website'    => $dataSecure->data_filters($_POST['website']),
    'phone'      => $dataSecure->data_filters($_POST['phone']),
    'company_id' => $dataSecure->data_filters($_POST['company_id'])
);

 



$company = new ComapnyDetails();

$update = $company->update_company( $data );

  
if($update ) {
    
   echo 'Company information has been updated';
}
