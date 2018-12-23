<?php 
include 'header.php';
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
<div class="col-lg-12">
<div class="row">
<div class="col-lg-12">
<div id="content-header" class="clearfix">
<div class="pull-left">
<ol class="breadcrumb">
<li><a href="/gcpm/admin-dashboard">Home</a></li>
<li><span> <a href="/gcpm/admin-add-projects"> Projects </a> </span></li>
<li class="active"><span>Add Projects </span></li>
</ol>

<h1> ADD PROJECTS </h1>
</div>


<div class="pull-right hidden-xs">
<div class="xs-graph pull-left">
<div class="graph-label">
<b><i class="fa fa-shopping-cart"></i> 838</b> Orders
</div>
<div class="graph-content spark-orders"></div>
</div>

<div class="xs-graph pull-left mrg-l-lg mrg-r-sm">
<div class="graph-label">
<b>&dollar;12.338</b> Revenues
</div>
<div class="graph-content spark-revenues"></div>
</div>
</div>
</div>
</div>
</div>


<!--  Form Add Projec -->        
<div class="row">
<div class="col-lg-6 col-lg-offset-3">
<div class="main-box">
<header class="main-box-header clearfix">
<h2 style="font-weight: bold; color:rgb(10, 161, 232); border-bottom: 1px solid rgb(10, 161, 232); "> Add Project Details </h2>
<span class="ack-project-adds">  </span>
</header>

<div class="main-box-body clearfix">

<form role="form" id="frm-add-projects" name="frm-add-projects">

<div class="form-group">
<label for="project-name"> Project Name </label>
<input type="text" class="form-control"  name="project-name" id="project-name" placeholder="Enter Project Name">
</div> <!-- ./form-group -->

<?php
$obj_pproject_type = new ProjectTypes();
$categories = $obj_pproject_type->fetch_project_types_all_name( $_SESSION['admin_db_id'] );

if ( $categories) {

?>

<div class="form-group">

<label> Project Type </label>   

<select class="form-control sel2" id="project-type" name="project-type"> 

<option value=""> select project type  </option>
<?php
foreach ( $categories as $category ){ ?>                                                                                                                

<option value="<?=$category['project_cat_id']?>"> <?=$category['project_category']?> </option> 
<?php } ?>

</select>

</div> <!-- ./form-group -->

<?php 

$obj_company  = new ComapnyDetails();
$companies = $obj_company->get_company_details( $_SESSION['admin_db_id'] );

if($companies ) {

?>
<div class="form-group">
<label data-toggle="tooltip" data-placement="bottom" title="If company is not listed, you need to add it"> Select Company </label>
<select class="form-control sel2" id="company_name" name="company_name">
<option value=""> select company </option>
<?php
foreach ($companies as $company) { ?>
<option value="<?=$company['company_id']?>"> <?=$company['company_name']?> </option>
<?php  } ?>     


</select>

</div> <!-- ./form-group -->
<?php } else { ?>

<h4 style="color: red"> You haven't setup clients account yet. Please setup client account </h4>
<a href="http://goingclearprojects.com/gcpm/admin-add-clients"> Add Clients  </a>
<?php 
} ?>


<div class="form-group select-contact">


</div> <!-- ./form-group -->                                                                                                

<?php 
$members = new TeamMembers();
// 3 is members deg_id which is web manager
$web_managers = $members->web_managers( $_SESSION['admin_db_id'], 2) // 2 is manager 
?>

<div class="form-group">
<label for="project-assign-web-manager"> Assign Web Manager </label>

<select class="form-control" id="project-assign-web-manager" 
name="project-assign-web-manager" >
<?php
if ($web_managers) { ?>
<option value="0"> Select Web Manager </option>
<?php 
foreach ( $web_managers as $manager ) { ?>
<option value="<?=$manager['member_user_id']?>"> <?=$manager['member_fname']?>  <?=$manager['member_lname']?> </option>

<?php } // foreach ?>

<?php } else { ?>
<option value="0"> No Web Manager Found </option>
<?php } ?>                                                                                               



</select>

</div> <!-- ./form-group -->




<div class="form-group">
<label for="project-cost"> Project Cost </label>
<input type="text" class="form-control"  name="project-cost" id="project-cost" placeholder="Enter Cost">
</div> <!-- ./form-group -->


<div class="form-group">
<label for="project-start-date"> Start Date </label>

<input style="width:300px" type="text" class="form-control datepickerDate" name="project-start-date" id="project-start-date">
</div> <!-- ./form-group -->



<div class="form-group form-group-select2">
<label> Project Status </label>
<select  style="width:300px" class="form-control" name="project-status" id="project-status">
<option value=""> Please Select Project Status  </option>
<option value="Begin"> Begin  </option>
<option value="Running"> Running  </option>
<option value="Complete"> Complete  </option>
</select>                                                                                                        
</div> <!-- ./form-group -->

<div class="form-group" id="end-date-toggles" style="display: none;">
<label for="project-start-date"> Project End Date </label>
<input style="width:300px" type="text" class="form-control datepickerDate" name="project-end-date" id="project-end-date" placeholder="Enter Project End Date">
</div> <!-- ./form-group -->

<div class="form-group">
<button type="button" class="btn btn-lg btn-success center-block"  name="btn-project-submit" id="btn-project-submit">
SUBMIT
</button>
</div> <!-- ./form-group -->


<?php } 

else { ?>

<h2> You need to add project type before adding a new project   </h2>
<a  href="http://goingclearprojects.com/gcpm/admin-project-types">  Add project Types </a> 
<?php  } ?>


</form>                                                                            													














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

 

<!-- global scripts -->
<script src="js/demo-skin-changer.js"></script> <!-- only for demo -->

<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.nanoscroller.min.js"></script>

<script src="js/demo.js"></script> <!-- only for demo -->

<!-- this page specific scripts -->
<script src="js/moment.min.js"></script>
<script src="js/jquery-jvectormap-1.2.2.min.js"></script>
<script src="js/jquery-jvectormap-world-merc-en.js"></script>
<script src="js/gdp-data.js"></script>
<script src="js/flot/jquery.flot.min.js"></script>
<script src="js/flot/jquery.flot.resize.min.js"></script>
<script src="js/flot/jquery.flot.time.min.js"></script>
<script src="js/flot/jquery.flot.threshold.js"></script>
<script src="js/flot/jquery.flot.axislabels.js"></script>
<script src="js/jquery.sparkline.min.js"></script>
<script src="js/skycons.js"></script>

<!-- Forms specific scripts -->
<script src="js/jquery.maskedinput.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/moment.min.js"></script>
<script src="js/daterangepicker.js"></script>
<script src="js/bootstrap-timepicker.min.js"></script>
<script src="js/select2.min.js"></script>
<script src="js/hogan.js"></script>
<script src="js/typeahead.min.js"></script>
<script src="js/jquery.pwstrength.js"></script>

<script src="jquey/on-change-retirve-clients.js"></script>
<script src="jquey/admin-add-projects.js"></script>

<script src="js/bootstrap-editable.min.js"></script>
<script src="js/select2.min.js"></script>
<script src="js/moment.min.js"></script>


<!-- theme scripts -->
<script src="js/scripts.js"></script>
<script src="js/pace.min.js"></script>

<!-- this page specific inline scripts -->
<script>
$(document).ready(function() {               



//masked inputs
$("#maskedDate").mask("99/99/9999");
$("#maskedPhone").mask("(999) 999-9999");
$("#maskedPhoneExt").mask("(999) 999-9999? x99999");
$("#maskedTax").mask("99-9999999");
$("#maskedSsn").mask("999-99-9999");

$("#maskedProductKey").mask("a*-999-a999",{placeholder:" ",completed:function(){alert("You typed the following: "+this.val());}});

$.mask.definitions['~']='[+-]';
$("#maskedEye").mask("~9.99 ~9.99 999");

//datepicker
$('.datepickerDate').datepicker({
format: 'DD, d MM, yy'
});

$('#datepickerDateComponent').datepicker();

//daterange picker
$('#datepickerDateRange').daterangepicker();

//timepicker
$('#timepicker').timepicker({
minuteStep: 5,
showSeconds: true,
showMeridian: false,
disableFocus: false,
showWidget: true
}).focus(function() {
$(this).next().trigger('click');
});

//autocomplete simple
$('#exampleAutocompleteSimple').typeahead({                              
prefetch: '/data/countries.json',
limit: 10
});

//autocomplete with templating
$('#exampleAutocomplete').typeahead({                              
name: 'twitter-oss',                                                        
prefetch: '/data/repos.json',                                             
template: [                                                              
'<p class="repo-language">{{language}}</p>',                              
'<p class="repo-name">{{name}}</p>',                                      
'<p class="repo-description">{{description}}</p>'                         
].join(''),                                                                 
engine: Hogan                                                               
});

//password strength meter
$('#examplePwdMeter').pwstrength({
label: '.pwdstrength-label'
});

// Toggles Project Status and Project End Date
$('#project-status').change(function() {
var status = $('#project-status').val();
if (status == "Complete") { 
$('#end-date-toggles').toggle();
}
else 
$('#end-date-toggles').hide();

});




}); // documents 



</script>

</body>
</html>

