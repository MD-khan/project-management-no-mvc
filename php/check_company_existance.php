<?php
require '../php/session.php';
sec_session_start();
require '../autoloader.php';
 
if( isset($_POST['inValue']) ) {
   
    $company_name = $_POST['inValue'];
 
    $company= new ComapnyDetails();
    $all_companies = $company->get_company_details( $_SESSION['admin_db_id'] );
    
   // var_dump( $all_companies['company_name'] );
        
        
        foreach ( $all_companies as  $single_company ) {

            if( strtolower($single_company['company_name']) === strtolower($company_name) ){
                echo  'yes';  
                exit;
            } 
        }

        
 }