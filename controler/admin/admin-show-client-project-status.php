<?php 
include 'header.php';
global $request_array;

if($request_array[1] == 'id')
{   
    // $_SESSION['project_cat_db_id'] =$request_array[2];
    
    $project_id = intval($request_array[2]);
    $project_cat_id = intval($request_array[4]);
    $company_id = intval($request_array[6]);
    
   // var_dump($company_id);
   }
?>
<div id="theme-wrapper">

    <?php include_once 'template-parts/top-menu-bar.php'; ?>    
		
    
 <div id="page-wrapper" class="container">
      
  
<div class="row">
        <div id="nav-col">
            <section id="col-left" class="col-left-nano">
                <div id="col-left-inner" class="col-left-nano-content">
                        <div id="user-left-box" class="clearfix hidden-sm hidden-xs dropdown profile2-dropdown">
                        <?php require 'template-parts/admin-small-pic.php'; ?>

                        <div class="user-box">

                                    <span class="name">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                    <?=$_SESSION['admin_fname']?> <?=$_SESSION['admin_lname']?>
                                                    <i class="fa fa-angle-down"></i>
                                            </a>
                                            <?php require 'template-parts/left-nav-user-box.php'; ?>
                                    </span>

                                    <span class="status">
                                            <i class="fa fa-circle"></i> Online
                                    </span>
                            </div>




                    </div>
                    <div class="collapse navbar-collapse navbar-ex1-collapse" id="sidebar-nav">	
                        <?php 
                        // Dispaly Left side Navigation
                        require 'template-parts/left-navigation.php';
                        ?>
                    </div>
            </div>
            </section>
                        <div id="nav-col-submenu"></div>
                </div>
    
    
                <div id="content-wrapper">

                    
                    <div class="row">
<?php 
// Projects 
$projects = new ProjectDetails();

// Totals Projects
$total_projects = $projects->total_projects( $_SESSION['admin_db_id'] );

// Totals Open projects
$total_open_projects = $projects->total_open_projetcs( $_SESSION['admin_db_id'] );

// Total Revenues
$total_revenues = $projects->total_revenues( $_SESSION['admin_db_id'] );

//  Company 
$company = new ComapnyDetails();
//Total companies 
$total_companies = $company->total_companies( $_SESSION['admin_db_id'] )
?>
                        
                        
                        
<div class="col-lg-12">
        <div class="row">
            <div class="col-lg-12">
<div id="content-header" class="clearfix">
<div class="pull-left">
<ol class="breadcrumb">
<li><a href="/gcpm/admin-dashboard">Home</a></li>												
<li class="active"><span> Dashboard  </span></li>
</ol>

    <h1> PROJECT STATUS </h1>
</div>

<div class="pull-right hidden-xs">
<div class="xs-graph pull-left">
<div class="graph-label">
<b><i class="fa fa-shopping-cart"></i> <?=$total_companies['TOTAL_COMPANIES']?></b> Clients
</div>
<div class="graph-content spark-orders"></div>
</div>

<div class="xs-graph pull-left mrg-l-lg mrg-r-sm">
<div class="graph-label">
<b>&dollar;<?=$total_revenues['TOTAL_REVENUES']?></b> Revenues
</div>
<div class="graph-content spark-revenues"></div>
</div>
</div>
</div>
</div>
</div>


</div>
</div>
                    
                    
  
                    
                    
                    
<div class="row">								
<?php 
    $company_info = $company->get_single_company_details($company_id);
?>								
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="main-box clearfix profile-box-contact">
<div class="main-box-body clearfix">
<div class="profile-box-header gray-bg clearfix">
<img src="/gcpm/img/clients/brand-logos/company-logo110-110.jpg" alt="" class="profile-img img-responsive">


<h2> <?=$company_info['company_name']?> </h2>
<div class="job-position">
Address 
</div>
<ul class="contact-details">
<li>
<i class="fa fa-map-marker"></i> 
<?=$company_info['company_city']?>
<?=$company_info['company_state']?>,
<?=$company_info['company_zipcode']?>,
<?=$company_info['company_country']?>,
 <?=$company_info['company_phone']?>,
</li>
<li>
<i class="fa fa-globe"></i> 
       <?=$company_info['company_website']?>
</li>
<li>
<i class="fa fa-phone"></i> 
<?=$company_info['company_phone']?>
</li>
</ul>
</div>

<?php 
    $obj_project = new ProjectDetails();
    $total_projects = $obj_project->client_total_projects($company_id );
    $total_open_projects = $obj_project->client_open_projects( $company_id );

?>


<div class="profile-box-footer clearfix">
<a href="#">
<span class="value">  <?=$total_open_projects?> </span>
<span class="label"> Open Projects </span>
</a>
<a href="#">
<span class="value">  <?=$total_projects?> </span>
<span class="label"> Total Projects </span>
</a>
  <a href="#">
        <span class="value"> 
            <?php 
             $result ="";
             $starttime = strtotime($company_info['date']); 
             $today =  time();
            
                $datediff = $today - $starttime;
                
                $seconds = floor($datediff);
                $minutes = floor($datediff/(60));
                $hour = floor($datediff/(60*60));    
             
              
              $days = floor($datediff/(60*60*24));
              
              
              if( $days <= 31 ) {
                   echo round($days, 0, PHP_ROUND_HALF_UP);
                   $result ="Day(s)";
                   
              } else if( ! $days < 31 ) {
                    $months = intval($days) / 30 ;
                    echo round($months , 0, PHP_ROUND_HALF_UP);
                   $result ="Month(s)";
              } else if(  $days < 365 ) {                   
                     $years = $month / 12 ;
                    echo round($years, 0, PHP_ROUND_HALF_UP);
                   $result ="Years(s)";
                 
              }
            ?>
            
        </span>
        <span class="label"> <?php echo $result." ". "with GC" ?></span>
    </a>
</div>
</div>
</div>
</div>

 <?php 
   
         $client_key = new ClientsInfo();
        $client_info = $client_key->get_key_contacts ( $company_id );
        
        
        
 ?>   
    
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="main-box clearfix profile-box-contact">
<div class="main-box-body clearfix">
<div class="profile-box-header gray-bg clearfix">
<img src="/gcpm/img/samples/kunis-300.jpg" alt="" class="profile-img img-responsive">
<h2>  Key Contact </h2>
<div class="job-position">
 
</div>
    <ul class="contact-details">
        
       <?php 
        if( $client_info) {                
                foreach ( $client_info as $c_info ) {
              
       ?>
        <li>
                <i class="fa fa-user"></i> 
                 <?=$c_info['client_key_fname']?>, 
                 <?=$c_info['client_key_lname']?>, 
        </li>
        
        <li>
                <i class="fa fa-envelope"></i>
                 <?=$c_info['client_key_email']?>, 
        </li>
   
        <li>
                <i class="fa fa-phone"></i> 
                   <?=$c_info['client_key_phone']?>, 
        </li>
      <?php 
                }
        }
      
?>
       
    </ul>

</div>

<div class="profile-box-footer clearfix">
<a href="#">
<span class="value"> Office </span>
<span class="label"> <?=$company_info['company_phone']?> </span>
</a>
<a href="#">
<span class="value"> Cell </span>
<span class="label">  N/A </span>
</a>
<a href="#">
<span class="value"> Others </span>
<span class="label"> N/A </span>
</a>
</div>
</div>
</div>
</div>

</div>
                

                    
     <?php 
     $project_info = $obj_project->get_single_project_info($project_id);
     ?>               
                    
   <div class="row">
     <div class="col-lg-12">
        <div class="main-box clearfix" style="min-height: 820px;">
          <header class="main-box-header clearfix">

               
            <label> Project Name: <strong> <?=$project_info['project_name']?> </strong> </label> <br>
            <label> Start Date: <strong> 
                    
                    <?php 
                   // date("Y",$project_info['project_start_date']);
                    echo date('M d, Y', $project_info['project_start_date'] )
                    ?>
                </strong> </label>
            </header>

    <div class="main-box-body clearfix">

        <div id="myWizard" class="wizard">
                <div class="wizard-inner">
                        <ul class="steps">
                                <li data-target="#step1" class="active"> <span class="badge badge-primary"> 1 </span> Specs and Planing  <span class="chevron"></span></li>
                                <li data-target="#step2"><span class="badge">2</span>  Design   <span class="chevron"></span></li>
                                <li data-target="#step3"><span class="badge">3</span>  Development  <span class="chevron"></span></li>
                                <li data-target="#step4"><span class="badge">4</span>  Content Integration  <span class="chevron"></span></li>
                                <li data-target="#step5"><span class="badge">5</span>  Mobile Friendly  <span class="chevron"></span></li>
                                <li data-target="#step6"><span class="badge">6</span>   QA Test    <span class="chevron"></span></li>
                                <li data-target="#step7"><span class="badge">7</span>   Training    <span class="chevron"></span></li>
                                <li data-target="#step8"><span class="badge">8</span>   Launch   <span class="chevron"></span></li>
                                <li data-target="#step9"><span class="badge">9</span>   Post Launch    <span class="chevron"></span></li>
                        </ul>

                        <div class="actions">
                                <button type="button" class="btn btn-default btn-mini btn-prev"> <i class="icon-arrow-left"></i>Prev</button>
                                <button type="button" class="btn btn-success btn-mini btn-next" data-last="Finish">Next<i class="icon-arrow-right"></i></button>
                        </div>
                </div>
               
            
<div class="step-content">


<div class="step-pane active" id="step1">
    <br>
<span class="specs"> </span>
                                
                                   
<div class="col-lg-12">
<div class="main-box clearfix">
    
    <header class="main-box-header clearfix">
    <h2>  Specs and Planing </h2>
    </header>


<div class="main-box-body clearfix">
    
<div class="table-responsive">
<table class="table table-bordered">
    <?php 
        $obj_qsns = new ClientAnswer();
        $ans = $obj_qsns->fetch_quetions_show_answer( $project_id );
        
        if( $ans ) {      
    ?>
    <thead>
        <tr>
            <th><span> Main Questions </span></th>
            <th><span>  Main Answers  </span></th>
            <th><span> Sub Questions </span></th>
            <th><span> Sub Answers  </span></th>
              <th><span> STATUS  </span></th>
        </tr>
    </thead>


<tbody>

    <?php 
    foreach ( $ans as $key => $value ) {
    ?>
    <tr>
        <td>
           
          <?=$value['questions'] ?  ucfirst($value['questions']) : "N/A"?>
        </td>        
       
        <td>
             <?=ucfirst($value['main_ans'])?>
        </td>
        
        <td>
             <?=$value['sub_questions'] ? ucfirst($value['sub_questions']): "N/A"?>
        </td>        
       
        <td>
           <?php
            $patern = preg_match ( "/^.*\.(jpg|jpeg|png|gif)$/i", $value['sub_ans']); 
             if( $patern ) {
                 $img_path = str_replace("..","/gcpm", $value['sub_ans']);                
               ?>
            <a href="<?=$img_path?>"> 
             <img src="<?=$img_path?>" alt="" width="50" height="50"> 
              </a>
            <?php
             } 
             echo $value['sub_ans'];
             ?>
            
            
        </td>
        
        <td>
             Active 
        </td>

    </tr>
     <?php 
    } //foreach
     ?>

</tbody>
     </table>
    
   <form name="frm-ans-feedback" id="frm-ans-feedback" method="post" >
<div class="form-group">
    <span id="apr"></span>
<label>   Approved? </label>

<div class="radio">
    <input type="radio" name="ans-aproved" class="ans-aproved" id="optionsRadios1" value="yes" checked="">
<label for="optionsRadios1">
Yes
</label>
</div>

<div class="radio">
<input type="radio" name="ans-aproved" class="ans-aproved" id="optionsRadios2" value="no">
<label for="optionsRadios2">
No
</label>
</div>

<div class="form-group" id="send-note" style="display: none;"> 
    <label> Send Note  </label> <br>
   <textarea name="send-note"  rows="4" cols="50"> </textarea>
    
</div>

</div>
       <input type="hidden" name="project_id" value="<?=$project_id?>">
      <button class="btn btn-success" id="btn-answers-feedback"> Send for Approval  </button> 
    </form>
                     
    
    <?php 
        } else { ?>
   <h2> Nothing found ! </h2>
        <?php } ?>
</div>
   
</div>
</div>
</div>
                                          
                                

</div> <!-- ./step 1 -->




<div class="step-pane" id="step2">
<br>
<h4>  Step 2: Design </h4>
<div class="alert alert-success fade in">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<i class="fa fa-check-circle fa-fw fa-lg"></i>
<strong>Well done!</strong> You successfully read this important alert message.
</div>
<div class="alert alert-info fade in">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<i class="fa fa-info-circle fa-fw fa-lg"></i>
<strong>Heads up!</strong> This alert needs your attention, but it's not super important.
</div>
<div class="alert alert-warning fade in">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<i class="fa fa-warning fa-fw fa-lg"></i>
<strong>Warning!</strong> Best check yo self, you're not looking too good.
</div>
<div class="alert alert-danger fade in">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<i class="fa fa-times-circle fa-fw fa-lg"></i>
<strong>Oh snap!</strong> Change a few things up and <a href="#" class="alert-link">try submitting again</a>.
</div>
</div>

<div class="step-pane" id="step3">
<br>
<h4> Step 3: Development </h4>

<div class="form-group">
<label for="maskedDate">Date</label>
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
<input type="text" class="form-control" id="maskedDate">
</div>
<span class="help-block">ex. 99/99/9999</span>
</div>

<div class="form-group">
<label for="maskedPhone">Phone</label>
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-phone"></i></span>
<input type="text" class="form-control" id="maskedPhone">
</div>
<span class="help-block">ex. (999) 999-9999</span>
</div>

<div class="form-group">
<label for="maskedPhoneExt">Phone + Ext</label>
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-mobile-phone"></i></span>
<input type="text" class="form-control" id="maskedPhoneExt">
</div>
<span class="help-block">ex. (999) 999-9999? x99999</span>
</div>
</div>



<div class="step-pane" id="step4">
<br>
<h4> Step 4:  Content Integration  </h4>
</div> 


<div class="step-pane" id="step5">
<br>
<h4> Step 5:  Mobile Friendly  </h4>
</div> 


<div class="step-pane" id="step6">
<br>
<h4> Step 6:   QA Test  </h4>
</div> 


<div class="step-pane" id="step7">
<br>
<h4> Step 7:   Training  </h4>
</div> 


<div class="step-pane" id="step8">
<br>
<h4> Step 8:    Launch  </h4>
</div> 





<div class="step-pane" id="step9">
<br>
<h4> Step :    Post Launch  </h4>

<div class="alert alert-success fade in" style="margin: 100px 0;">
<i class="fa fa-check-circle fa-fw fa-lg"></i>
<strong>Congratulation!</strong> You have successfully finished our nice wizard.
</div>
</div>
                
            


</div>
</div>
</div>

</div>
</div>
</div>

                               
                   
                    

<footer id="footer-bar" class="row">
 <?php include_once 'footer.php';?>
</footer>

                


</div>
</div>



     
</div>
</div>
	

        <!-- 
            Configuration tools 
        <div id="config-tool" class="closed">
		<a id="config-tool-cog">
			<i class="fa fa-cog"></i>
		</a>
		
		<div id="config-tool-options">
			<h4>Layout Options</h4>
			<ul>
				<li>
					<div class="checkbox-nice">
						<input type="checkbox" id="config-fixed-header" />
						<label for="config-fixed-header">
							Fixed Header
						</label>
					</div>
				</li>
				<li>
					<div class="checkbox-nice">
						<input type="checkbox" id="config-fixed-sidebar" />
						<label for="config-fixed-sidebar">
							Fixed Left Menu
						</label>
					</div>
				</li>
				<li>
					<div class="checkbox-nice">
						<input type="checkbox" id="config-fixed-footer" />
						<label for="config-fixed-footer">
							Fixed Footer
						</label>
					</div>
				</li>
				<li>
					<div class="checkbox-nice">
						<input type="checkbox" id="config-boxed-layout" />
						<label for="config-boxed-layout">
							Boxed Layout
						</label>
					</div>
				</li>
				<li>
					<div class="checkbox-nice">
						<input type="checkbox" id="config-rtl-layout" />
						<label for="config-rtl-layout">
							Right-to-Left
						</label>
					</div>
				</li>
			</ul>
			<br/>
			<h4>Skin Color</h4>
			<ul id="skin-colors" class="clearfix">
				<li>
					<a class="skin-changer" data-skin="" data-toggle="tooltip" title="Default" style="background-color: #34495e;">
					</a>
				</li>
				<li>
					<a class="skin-changer" data-skin="theme-white" data-toggle="tooltip" title="White/Green" style="background-color: #2ecc71;">
					</a>
				</li>
				<li>
					<a class="skin-changer blue-gradient" data-skin="theme-blue-gradient" data-toggle="tooltip" title="Gradient">
					</a>
				</li>
				<li>
					<a class="skin-changer" data-skin="theme-turquoise" data-toggle="tooltip" title="Green Sea" style="background-color: #1abc9c;">
					</a>
				</li>
				<li>
					<a class="skin-changer" data-skin="theme-amethyst" data-toggle="tooltip" title="Amethyst" style="background-color: #9b59b6;">
					</a>
				</li>
				<li>
					<a class="skin-changer" data-skin="theme-blue" data-toggle="tooltip" title="Blue" style="background-color: #2980b9;">
					</a>
				</li>
				<li>
					<a class="skin-changer" data-skin="theme-red" data-toggle="tooltip" title="Red" style="background-color: #e74c3c;">
					</a>
				</li>
				<li>
					<a class="skin-changer" data-skin="theme-whbl" data-toggle="tooltip" title="White/Blue" style="background-color: #3498db;">
					</a>
				</li>
			</ul>
		</div>
	</div>
        -->
 
	
	
	 <!-- global scripts -->
	<script src="/gcpm/js/demo-skin-changer.js"></script> <!-- only for demo -->
	
	<script src="/gcpm/js/jquery.js"></script>
	<script src="/gcpm/js/bootstrap.js"></script>
	<script src="/gcpm/js/jquery.nanoscroller.min.js"></script>
	
	<script src="/gcpm/js/demo.js"></script> <!-- only for demo -->
	
	<!-- this page specific scripts -->
	<script src="/gcpm/js/moment.min.js"></script>
	<script src="/gcpm/js/jquery-jvectormap-1.2.2.min.js"></script>
	<script src="/gcpm/js/jquery-jvectormap-world-merc-en.js"></script>
	<script src="/gcpm/js/gdp-data.js"></script>
	<script src="/gcpm/js/flot/jquery.flot.min.js"></script>
	<script src="/gcpm/js/flot/jquery.flot.resize.min.js"></script>
	<script src="/gcpm/js/flot/jquery.flot.time.min.js"></script>
	<script src="/gcpm/js/flot/jquery.flot.threshold.js"></script>
	<script src="/gcpm/js/flot/jquery.flot.axislabels.js"></script>
	<script src="/gcpm/js/jquery.sparkline.min.js"></script>
	<script src="/gcpm/js/skycons.js"></script>
	
        <!-- Forms specific scripts -->
	<script src="/gcpm/js/jquery.maskedinput.min.js"></script>
	<script src="/gcpm/js/bootstrap-datepicker.js"></script>
	<script src="/gcpm/js/moment.min.js"></script>
	<script src="/gcpm/js/daterangepicker.js"></script>
	<script src="/gcpm/js/bootstrap-timepicker.min.js"></script>
	<script src="/gcpm/js/select2.min.js"></script>
	<script src="/gcpm/js/hogan.js"></script>
	<script src="/gcpm/js/typeahead.min.js"></script>
	<script src="/gcpm/js/jquery.pwstrength.js"></script>
	
        <!-- widgets -->
	<script src="/gcpm/js/wizard.js"></script>
	<script src="/gcpm/js/jquery.maskedinput.min.js"></script> 
        
        
        <script src="/gcpm/jquey/admin-ans-feedback.js"></script>
         
              
        
	<!-- theme scripts -->
	<script src="/gcpm/js/scripts.js"></script>
	<script src="/gcpm/js/pace.min.js"></script>
        
        
        
	
        
        <!-- this page specific inline scripts -->
	<script>
	$(document).ready(function() {
		$(function () {
		$('#myWizard').wizard();
		
		//masked inputs
		$("#maskedDate").mask("99/99/9999");
		$("#maskedPhone").mask("(999) 999-9999");
		$("#maskedPhoneExt").mask("(999) 999-9999? x99999");
	});
	   
	});
	</script>
	
</body>
</html>

