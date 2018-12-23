<?php 
require '../php/session.php';
sec_session_start();
require '../autoloader.php';



if( isset( $_POST['key_contact'] )){
    
    $client_id = intval( $_POST['key_contact'] );
    $client = new ClientsInfo();
    $info = $client->get_client_info($client_id);
  
    
    if( $info) {
          
    $company = new ComapnyDetails();
    $com_info = $company->get_single_company_details($info['company_id']);
    ?>
    

<h2><?=$info['client_key_fname']?>  <?=$info['client_key_lname']?>  </h2>

                        <div class="job-position">
                           <?=$info['title']?>
                        </div>

                        <ul class="contact-details">
                            <ul class="contact-details">
                                <li>
                                    <i class="fa fa-map-marker"></i>                                  
                                    <?=$com_info['company_city']?>,
                                    <?=$com_info['company_state']?>
                                    <?=$com_info['company_zipcode']?>
                                </li>
                            <li>
                                <i class="fa fa-envelope"></i>
                                 <?=$info['client_key_email']?>
                            </li>

                        <li>
                        <i class="fa fa-phone"></i>
                        <?=$info['client_key_phone']?>,
                        <i class="fa fa-mobile"></i>
                        <?=$info['key_mobile']?>
                        </li>
                       </ul>  

<?php
    
  } 
}  
 