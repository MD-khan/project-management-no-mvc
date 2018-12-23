<?php 
ob_start();
require '../autoloader.php';


$client_image = new ClientsInfo;    
$admin_image = new ADminInfo();
$member_image = new TeamMembers();

//get data
$project_question_id = $_REQUEST['project_question_id'];
$project_id = $_REQUEST['project_id'];

$answer = new ClientAnswer();

//get questions
$question = new ProjectQuestions(); 
$specific_questions = $question->fetch_single_question($project_question_id);


//get file
$file = new ProjectFiles(); 
$files =  $file->show_files( $project_question_id, $project_id );
$total_files = $file->total_files( $project_question_id, $project_id );

 if( $files ) { ?>

<div class="panel panel-info">
    
    <div class="panel-heading">
         File(s) 
         <span class="label label-primary label-circle pull-right"> 
            <?=$total_files['TOTAL_FILE']?> 
         </span>  
    </div>
    
    <div class="panel-body">
<?php
     
     foreach ( $files as $key=> $file_info ) { 
         
         
        //get user information
         $responser_client = $answer->get_name_who_did_response( $file_info['client_id'] );  
        $client_image_path = $client_image->get_client_image_path( $file_info['client_id'] );

        $responser_admin = $answer->get_admin_name($file_info['admin_id']);
        $admin_image_path = $admin_image->get_admin_image_path( $file_info['admin_id'] );


        $responser_member = $answer->get_team_member_who_did_response( $file_info['team_id'] );
        $member_image_path = $member_image->get_member_image_path($file_info['team_id']);
         
       // get client info  
         
       $source = str_replace("..","/gcpm", $file_info['file_location'] );
       ?>
      
        <?php if ( $file_info['file_type'] === 'image/png' ||
                   $file_info['file_type'] === 'image/jpeg'  ||
                   $file_info['file_type'] === 'image/gif'  ||
                   $file_info['file_type'] === 'image/bmp'  ||
                   $file_info['file_type'] === 'image/vnd.microsoft.icon'  ||
                   $file_info['file_type'] === 'image/tiff'  ||
                   $file_info['file_type'] === 'image/svg+xml'                    
                    ) { ?>
     
            <span class="list-group">
                <a class="list-group-item" href="<?=$source?>" target="_blank" > <i class="fa fa-file-image-o"></i> <?=$file_info['file_name']?>  
                <span class="pull-right"> 
                    <?php 
                     if ( $client_image_path ) {
                        $c_image = str_ireplace ('../', '/gcpm/', $client_image_path['image_path']); 
                        echo '<img src="'.$c_image.'" class="img-circle" alt="" width="25" height="25">   ';  
                        echo ucfirst($responser_client['client_key_fname']) ." " .ucfirst($responser_client['client_key_lname']);
                    }
                    
                    if ( $admin_image_path ) {
                        $a_image = str_ireplace ('../', '/gcpm/', $admin_image_path['image_path']); 
                        echo '<img src="'.$a_image.'" class="img-circle" alt="" width="25" height="25">   ';  
                        echo ucfirst($responser_admin['admin_fname']) ." " .ucfirst($responser_admin['admin_lname']);
                    }
                    
                    if ( $member_image_path ) {
                        $m_image = str_ireplace ('../', '/gcpm/', $member_image_path['image_path']); 
                        echo '<img src="'.$m_image.'" class="img-circle" alt="" width="25" height="25">   '; 
                        echo ucfirst($responser_member['member_fname']) ." " .ucfirst($responser_member['member_lname']);
                    }  
                    
                     //show date 
                    echo "\t\t |  ";           
                    //$posted_date =  date('Y-m-j H:i:s', strtotime($show_ans['insert_date']));
                     $posted_date = $file_info['date'];        
                     date_default_timezone_set('America/New_York');
                     $today =  date('Y-m-j H:i:s');        

                     $datetime1 = new DateTime($posted_date);
                     $datetime2 = new DateTime($today);
                    
                     $diff=$datetime2->diff($datetime1);
                    
                    switch ($diff) {
                    
                        case $diff->i < 60 && $diff->h===0:
                            echo "Uploaded a moment ago";
                            break;

                        case  $diff->h < 24 && $diff->days == 0:
                            echo "Uploaded $diff->h hour(s) ago";
                            break;

                        case  $diff->days < 2:
                            echo "Uploaded $diff->days day ago";
                            break;
                        
                   default:
                      echo 'Uploaded' .' '. date('M j, Y g:i:s A', strtotime($file_info['date']));
               } 
                    
                    
                    ?>
                </span>
                </a> 
            </span> 
            <?php }  ?>

            <!-- display .text file -->
             <?php if ( $file_info['file_type'] === 'text/plain'  ) { ?>

            <span class="list-group">
                <a class="list-group-item" href="<?=$source?>" target="_blank" > <i class="fa fa-file-text"></i> <?=$file_info['file_name']?> 
                     <span class="pull-right"> 
                    <?php 
                     if ( $client_image_path ) {
                        $c_image = str_ireplace ('../', '/gcpm/', $client_image_path['image_path']); 
                        echo '<img src="'.$c_image.'" class="img-circle" alt="" width="25" height="25">   ';  
                        echo ucfirst($responser_client['client_key_fname']) ." " .ucfirst($responser_client['client_key_lname']);
                    }
                    
                    if ( $admin_image_path ) {
                        $a_image = str_ireplace ('../', '/gcpm/', $admin_image_path['image_path']); 
                        echo '<img src="'.$a_image.'" class="img-circle" alt="" width="25" height="25">   ';  
                        echo ucfirst($responser_admin['admin_fname']) ." " .ucfirst($responser_admin['admin_lname']);
                    }
                    
                    if ( $member_image_path ) {
                        $m_image = str_ireplace ('../', '/gcpm/', $member_image_path['image_path']); 
                        echo '<img src="'.$m_image.'" class="img-circle" alt="" width="25" height="25">   '; 
                        echo ucfirst($responser_member['member_fname']) ." " .ucfirst($responser_member['member_lname']);
                    }  
                    
                     //show date 
                    echo "\t\t |  ";           
                    //$posted_date =  date('Y-m-j H:i:s', strtotime($show_ans['insert_date']));
                     $posted_date = $file_info['date'];        
                     date_default_timezone_set('America/New_York');
                     $today =  date('Y-m-j H:i:s');        

                     $datetime1 = new DateTime($posted_date);
                     $datetime2 = new DateTime($today);
                    
                     $diff=$datetime2->diff($datetime1);
                    
                    switch ($diff) {
                    
                        case $diff->i < 60 && $diff->h===0:
                            echo "Uploaded a moment ago";
                            break;

                        case  $diff->h < 24 && $diff->days == 0:
                            echo "Uploaded $diff->h hour(s) ago";
                            break;

                        case  $diff->days < 2:
                            echo "Uploaded $diff->days day ago";
                            break;
                        
                   default:
                      echo 'Uploaded' .' '. date('M j, Y g:i:s A', strtotime($file_info['date']));
               } 
                    
                    
                    ?>
                </span>
                </a> 
            </span> 
            <?php }  ?>
            
            <!-- display  .doc file -->
             <?php if ( $file_info['file_type'] === 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'  ) { ?>

            <span class="list-group">
                <a class="list-group-item" href="<?=$source?>"target="_blank"> <i class="fa fa-file-word-o"></i> <?=$file_info['file_name']?>  
                 <span class="pull-right"> 
                    <?php 
                     if ( $client_image_path ) {
                        $c_image = str_ireplace ('../', '/gcpm/', $client_image_path['image_path']); 
                        echo '<img src="'.$c_image.'" class="img-circle" alt="" width="25" height="25">   ';  
                        echo ucfirst($responser_client['client_key_fname']) ." " .ucfirst($responser_client['client_key_lname']);
                    }
                    
                    if ( $admin_image_path ) {
                        $a_image = str_ireplace ('../', '/gcpm/', $admin_image_path['image_path']); 
                        echo '<img src="'.$a_image.'" class="img-circle" alt="" width="25" height="25">   ';  
                        echo ucfirst($responser_admin['admin_fname']) ." " .ucfirst($responser_admin['admin_lname']);
                    }
                    
                    if ( $member_image_path ) {
                        $m_image = str_ireplace ('../', '/gcpm/', $member_image_path['image_path']); 
                        echo '<img src="'.$m_image.'" class="img-circle" alt="" width="25" height="25">   '; 
                        echo ucfirst($responser_member['member_fname']) ." " .ucfirst($responser_member['member_lname']);
                    }  
                    
                     //show date 
                    echo "\t\t |  ";           
                    //$posted_date =  date('Y-m-j H:i:s', strtotime($show_ans['insert_date']));
                     $posted_date = $file_info['date'];        
                     date_default_timezone_set('America/New_York');
                     $today =  date('Y-m-j H:i:s');        

                     $datetime1 = new DateTime($posted_date);
                     $datetime2 = new DateTime($today);
                    
                     $diff=$datetime2->diff($datetime1);
                    
                    switch ($diff) {
                    
                        case $diff->i < 60 && $diff->h===0:
                            echo "Uploaded a moment ago";
                            break;

                        case  $diff->h < 24 && $diff->days == 0:
                            echo "Uploaded $diff->h hour(s) ago";
                            break;

                        case  $diff->days < 2:
                            echo "Uploaded $diff->days day ago";
                            break;
                        
                   default:
                      echo 'Uploaded' .' '. date('M j, Y g:i:s A', strtotime($file_info['date']));
               } 
                    
                    
                    ?>
                </span>
                </a> 
            </span> 
            <?php }  ?>
            
            <!-- display  .excel file -->
             <?php if ( $file_info['file_type'] === 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet') { ?>
              
            <span class="list-group">
                <a class="list-group-item" href="<?=$source?>" target="_blank"> <i class="fa fa-file-excel-o"></i> <?=$file_info['file_name']?> 
                 <span class="pull-right"> 
                    <?php 
                     if ( $client_image_path ) {
                        $c_image = str_ireplace ('../', '/gcpm/', $client_image_path['image_path']); 
                        echo '<img src="'.$c_image.'" class="img-circle" alt="" width="25" height="25">   ';  
                        echo ucfirst($responser_client['client_key_fname']) ." " .ucfirst($responser_client['client_key_lname']);
                    }
                    
                    if ( $admin_image_path ) {
                        $a_image = str_ireplace ('../', '/gcpm/', $admin_image_path['image_path']); 
                        echo '<img src="'.$a_image.'" class="img-circle" alt="" width="25" height="25">   ';  
                        echo ucfirst($responser_admin['admin_fname']) ." " .ucfirst($responser_admin['admin_lname']);
                    }
                    
                    if ( $member_image_path ) {
                        $m_image = str_ireplace ('../', '/gcpm/', $member_image_path['image_path']); 
                        echo '<img src="'.$m_image.'" class="img-circle" alt="" width="25" height="25">   '; 
                        echo ucfirst($responser_member['member_fname']) ." " .ucfirst($responser_member['member_lname']);
                    }  
                    
                     //show date 
                    echo "\t\t |  ";           
                    //$posted_date =  date('Y-m-j H:i:s', strtotime($show_ans['insert_date']));
                     $posted_date = $file_info['date'];        
                     date_default_timezone_set('America/New_York');
                     $today =  date('Y-m-j H:i:s');        

                     $datetime1 = new DateTime($posted_date);
                     $datetime2 = new DateTime($today);
                    
                     $diff=$datetime2->diff($datetime1);
                    
                    switch ($diff) {
                    
                        case $diff->i < 60 && $diff->h===0:
                            echo "Uploaded a moment ago";
                            break;

                        case  $diff->h < 24 && $diff->days == 0:
                            echo "Uploaded $diff->h hour(s) ago";
                            break;

                        case  $diff->days < 2:
                            echo "Uploaded $diff->days day ago";
                            break;
                        
                   default:
                      echo 'Uploaded' .' '. date('M j, Y g:i:s A', strtotime($file_info['date']));
               } 
                    
                    
                    ?>
                </span>
                </a> 
            </span> 
            <?php }  ?>
            
             <!-- display  .pdf file -->
             <?php if ( $file_info['file_type'] === 'application/pdf' || 
                        $file_info['file_type'] === 'image/vnd.adobe.photoshop' || 
                        $file_info['file_type'] === 'application/postscript' 
                         
                     ) { ?>

            <span class="list-group">
                <a class="list-group-item" href="<?=$source?>" target="_blank" > <i class="fa fa-file-pdf-o"></i> <?=$file_info['file_name']?> 
                 <span class="pull-right"> 
                    <?php 
                     if ( $client_image_path ) {
                        $c_image = str_ireplace ('../', '/gcpm/', $client_image_path['image_path']); 
                        echo '<img src="'.$c_image.'" class="img-circle" alt="" width="25" height="25">   ';  
                        echo ucfirst($responser_client['client_key_fname']) ." " .ucfirst($responser_client['client_key_lname']);
                    }
                    
                    if ( $admin_image_path ) {
                        $a_image = str_ireplace ('../', '/gcpm/', $admin_image_path['image_path']); 
                        echo '<img src="'.$a_image.'" class="img-circle" alt="" width="25" height="25">   ';  
                        echo ucfirst($responser_admin['admin_fname']) ." " .ucfirst($responser_admin['admin_lname']);
                    }
                    
                    if ( $member_image_path ) {
                        $m_image = str_ireplace ('../', '/gcpm/', $member_image_path['image_path']); 
                        echo '<img src="'.$m_image.'" class="img-circle" alt="" width="25" height="25">   '; 
                        echo ucfirst($responser_member['member_fname']) ." " .ucfirst($responser_member['member_lname']);
                    }  
                    
                     //show date 
                    echo "\t\t |  ";           
                    //$posted_date =  date('Y-m-j H:i:s', strtotime($show_ans['insert_date']));
                     $posted_date = $file_info['date'];        
                     date_default_timezone_set('America/New_York');
                     $today =  date('Y-m-j H:i:s');        

                     $datetime1 = new DateTime($posted_date);
                     $datetime2 = new DateTime($today);
                    
                     $diff=$datetime2->diff($datetime1);
                    
                    switch ($diff) {
                    
                        case $diff->i < 60 && $diff->h===0:
                            echo "Uploaded a moment ago";
                            break;

                        case  $diff->h < 24 && $diff->days == 0:
                            echo "Uploaded $diff->h hour(s) ago";
                            break;

                        case  $diff->days < 2:
                            echo "Uploaded $diff->days day ago";
                            break;
                        
                   default:
                      echo 'Uploaded' .' '. date('M j, Y g:i:s A', strtotime($file_info['date']));
               } 
                    
                    
                    ?>
                </span>
                </a> 
            </span> 
            <?php }  ?>
             
              <!-- display  .zip file -->
             <?php if ( $file_info['file_type'] === 'application/zip' ||
                        $file_info['file_type'] === 'application/x-zip-compressed'
                     ) { ?>

            <span class="list-group">
                <a class="list-group-item" href="<?=$source?>" target="_blank" > <i class="fa fa-file-archive-o"></i> <?=$file_info['file_name']?>  
                 <span class="pull-right"> 
                    <?php 
                     if ( $client_image_path ) {
                        $c_image = str_ireplace ('../', '/gcpm/', $client_image_path['image_path']); 
                        echo '<img src="'.$c_image.'" class="img-circle" alt="" width="25" height="25">   ';  
                        echo ucfirst($responser_client['client_key_fname']) ." " .ucfirst($responser_client['client_key_lname']);
                    }
                    
                    if ( $admin_image_path ) {
                        $a_image = str_ireplace ('../', '/gcpm/', $admin_image_path['image_path']); 
                        echo '<img src="'.$a_image.'" class="img-circle" alt="" width="25" height="25">   ';  
                        echo ucfirst($responser_admin['admin_fname']) ." " .ucfirst($responser_admin['admin_lname']);
                    }
                    
                    if ( $member_image_path ) {
                        $m_image = str_ireplace ('../', '/gcpm/', $member_image_path['image_path']); 
                        echo '<img src="'.$m_image.'" class="img-circle" alt="" width="25" height="25">   '; 
                        echo ucfirst($responser_member['member_fname']) ." " .ucfirst($responser_member['member_lname']);
                    }  
                    
                     //show date 
                    echo "\t\t |  ";           
                    //$posted_date =  date('Y-m-j H:i:s', strtotime($show_ans['insert_date']));
                     $posted_date = $file_info['date'];        
                     date_default_timezone_set('America/New_York');
                     $today =  date('Y-m-j H:i:s');        

                     $datetime1 = new DateTime($posted_date);
                     $datetime2 = new DateTime($today);
                    
                     $diff=$datetime2->diff($datetime1);
                    
                    switch ($diff) {
                    
                        case $diff->i < 60 && $diff->h===0:
                            echo "Uploaded a moment ago";
                            break;

                        case  $diff->h < 24 && $diff->days == 0:
                            echo "Uploaded $diff->h hour(s) ago";
                            break;

                        case  $diff->days < 2:
                            echo "Uploaded $diff->days day ago";
                            break;
                        
                   default:
                      echo 'Uploaded' .' '. date('M j, Y g:i:s A', strtotime($file_info['date']));
               } 
                    
                    
                    ?>
                </span>
                </a> 
            </span> 
            <?php }  ?>
              
               <!-- display  .zip file -->
             <?php if ( $file_info['file_type'] === 'application/vnd.ms-excel' ||
                        $file_info['file_type'] === 'application/vnd.ms-excel' ||
                        $file_info['file_type'] === 'application/vnd.ms-excel' 
                     ) { ?>              
                <span class="list-group">
                    <a class="list-group-item" href="<?=$source?>" target="_blank" > <i class="fa fa-file"></i> <?=$file_info['file_name']?> 
                     <span class="pull-right"> 
                    <?php 
                     if ( $client_image_path ) {
                        $c_image = str_ireplace ('../', '/gcpm/', $client_image_path['image_path']); 
                        echo '<img src="'.$c_image.'" class="img-circle" alt="" width="25" height="25">   ';  
                        echo ucfirst($responser_client['client_key_fname']) ." " .ucfirst($responser_client['client_key_lname']);
                    }
                    
                    if ( $admin_image_path ) {
                        $a_image = str_ireplace ('../', '/gcpm/', $admin_image_path['image_path']); 
                        echo '<img src="'.$a_image.'" class="img-circle" alt="" width="25" height="25">   ';  
                        echo ucfirst($responser_admin['admin_fname']) ." " .ucfirst($responser_admin['admin_lname']);
                    }
                    
                    if ( $member_image_path ) {
                        $m_image = str_ireplace ('../', '/gcpm/', $member_image_path['image_path']); 
                        echo '<img src="'.$m_image.'" class="img-circle" alt="" width="25" height="25">   '; 
                        echo ucfirst($responser_member['member_fname']) ." " .ucfirst($responser_member['member_lname']);
                    }  
                    
                     //show date 
                    echo "\t\t |  ";           
                    //$posted_date =  date('Y-m-j H:i:s', strtotime($show_ans['insert_date']));
                     $posted_date = $file_info['date'];        
                     date_default_timezone_set('America/New_York');
                     $today =  date('Y-m-j H:i:s');        

                     $datetime1 = new DateTime($posted_date);
                     $datetime2 = new DateTime($today);
                    
                     $diff=$datetime2->diff($datetime1);
                    
                    switch ($diff) {
                    
                        case $diff->i < 60 && $diff->h===0:
                            echo "Uploaded a moment ago";
                            break;

                        case  $diff->h < 24 && $diff->days == 0:
                            echo "Uploaded $diff->h hour(s) ago";
                            break;

                        case  $diff->days < 2:
                            echo "Uploaded $diff->days day ago";
                            break;
                        
                   default:
                      echo 'Uploaded' .' '. date('M j, Y g:i:s A', strtotime($file_info['date']));
               } 
                    
                    
                    ?>
                </span>
                    </a> 
                </span> 
            <?php }  ?>
    
    
  
            <?php    } ?>
    
 </div>
</div>  
  <?php    } ?>
