<?php
require '../php/session.php';
sec_session_start();

require '../autoloader.php';




$company_name = $_POST['company-name'];
$admin_id  = $_SESSION['admin_db_id'];

$company_street = $_POST['street'];
$company_city = $_POST['company-city'];
$company_state = $_POST['company-state'];
$company_zipcode = $_POST['company-zipcode'];
$company_country = $_POST['company-country'];
$company_phone = $_POST['company-phone'];
$company_website = $_POST['company-website'];




if( !empty($company_name) && !empty($company_city) && !empty($company_state) && !empty($company_zipcode) 
        && !empty($company_country) && !empty($company_phone) && !empty($company_website) && !empty($company_street) ) {
    


// preventiing sql injecctions
$dataSecure = new SecureData();
$company_name =  $dataSecure->data_filters($company_name);
$company_city =  $dataSecure->data_filters($company_city);
$company_state =  $dataSecure->data_filters($company_state);
$company_zipcode =  $dataSecure->data_filters($company_zipcode);
$company_country =  $dataSecure->data_filters($company_country);
$company_phone =  $dataSecure->data_filters($company_phone);
$company_website =  $dataSecure->data_filters($company_website);
$company_street =  $dataSecure->data_filters($company_street);



$company = new SetupCompany();
$company->getCompanyInfo($company_name, $admin_id, $company_street,$company_city, $company_state, $company_zipcode, 
            $company_country, $company_phone, $company_website); 

$insert_company = $company->setCompanyInfo();



if(insert_company) {
    echo"inserted";
} else {
    echo "not_inserted";
}



} else {
    echo"empty";
}