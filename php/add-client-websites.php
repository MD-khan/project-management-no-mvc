<?php
require '../php/session.php';
sec_session_start();

require '../autoloader.php';



// change request member password
if(isset($_POST['website'])){
     
    // get values
    $website = $_POST['website'];
    $website = filter_var($website, FILTER_SANITIZE_URL);
    
    
    //chek if website exitst
    $website_obj = new ClientsInfo();
    $web_list = $website_obj->get_websites( $_SESSION['client_compny_id'] );
    
    if( $web_list ) {
        foreach ( $web_list as $web ) {
            if( $web['website'] === $website) {
                echo "You have already added  " .$web['website'];
                exit();
            }
        }
    }
    
    
    // Validate url
        if (!filter_var($website, FILTER_VALIDATE_URL) === false) {
            
            echo("ok");
            
        }else {
            
            echo("$website is not a valid URL");
            exit();
            
        }
    
    $client_db_id = intval( $_SESSION['client_db_id'] );  
    $company_id = intval( $_SESSION['client_compny_id'] );
    
    
    
    if( !empty( $website ) ){
        
        $dataSecure = new SecureData();
        $website =  $dataSecure->data_filters( $website );
        
        
        $client = new ClientsInfo();       
        $client->get_web_site_info($client_db_id, $company_id, $website);
        $insert = $client->set_web_site_info();
         
            if( $insert ) {
                   
                echo "";             
                 
            }else {
                    echo "no";
                }
    }else{
           echo "empty";
        }
} 
