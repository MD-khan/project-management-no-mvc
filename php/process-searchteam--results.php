<?php
require '../php/session.php';
sec_session_start();

require '../autoloader.php';

$admin_id = $_SESSION['admin_db_id'];

$keywords = $_POST['keywords'];

$secure = new SecureData();

$keywords = $secure->data_filters($keywords);


$search = new SearchProjects();
$results = $search->project_search($keywords, $admin_id);

if( $results) {
   
echo "<div class='col-lg-12'>
        <div class='main-box clearfix'>
            <header class='main-box-header clearfix'>
                <h2> Search Results for <strong> ".$keywords." </strong> </h2>
            </header>
                                                               

    <div class='main-box-body clearfix'>
        <div class='table-responsive'>
        <table id='table-example' class='table table-hover'>
        
    <thead>
        <tr>															
            <th><span> PROJECT ID </span></th>
            <th><span> PROJECT NAME</span></th>
            <th><span> SERVICES </span></th>
            <th><span> CLIENTS </span></th>
            <th><span> START DATE </span></th>             
            <th><span> STATUS </span></th>	
        </tr>
    </thead>    
    
<tbody>";
?>
 

<?php   
     
    foreach ( $results as $result) {
       
    echo " <tr>															
            <td><span> <a href='phase-team/id/".$result['project_id']."/project_cat_id/".$result['project_cat_id']."/com_id/".$result['company_id']."'>  ".$result['project_id']." </a> </span></td>
            <td><span> <a href='phase-team/id/".$result['project_id']."/project_cat_id/".$result['project_cat_id']."/com_id/".$result['company_id']."'>  ".$result['project_name']." </a> </span></td>
            <td><span> ".$result['project_category']." </span></td>
            <td><span> ".$result['company_name']." </span></td>
           <td><span> ".date('M j, Y', strtotime($result['project_start_date']))." </span></td>
            
           <td><span> ".$result['project_status']." </span></td>
</tr>";
    }
    
    ?>
   




    <?php
        echo "
                                                    <tbody>
                                                             
                                                    </tbody>
                                                    
                                                </table>
                                            </div>
                                         </div> <!--  ./main-box-body -->
				</div> <!-- ./main-box -->
                            </div> <!-- ./col-lg-12 -->";
    ?>                                                                                                    
                                                 
<?php 

    } else {
        echo "<div class='col-lg-12'>
        <div class='main-box clearfix'>
            <header class='main-box-header clearfix'>
                <h2> You search ".$keywords." did not match any projects  </h2>
        </header>";
    }

?>       
       
    
