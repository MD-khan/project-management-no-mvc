<?php 
include 'header.php';
?>
<div id="theme-wrapper">
<header class="navbar" id="header-navbar">
<div class="container">
<?php 
// Navigation brannd logos
require 'template-parts/brand-logos.php';
?>

<div class="clearfix">
<button class="navbar-toggle" data-target=".navbar-ex1-collapse" data-toggle="collapse" type="button">
<span class="sr-only">Toggle navigation</span>
<span class="fa fa-bars"></span>
</button>

<div class="nav-no-collapse navbar-left pull-left hidden-sm hidden-xs">
<ul class="nav navbar-nav pull-left">
<li>
<a class="btn" id="make-small-nav">
<i class="fa fa-bars"></i>
</a>
</li>
<li class="dropdown hidden-xs">
<a class="btn dropdown-toggle" data-toggle="dropdown">
<i class="fa fa-bell"></i>
<span class="count">8</span>
</a>
<ul class="dropdown-menu notifications-list">
<li class="pointer">
<div class="pointer-inner">
<div class="arrow"></div>
</div>
</li>
<li class="item-header">You have 6 new notifications</li>
<li class="item">
<a href="#">
<i class="fa fa-comment"></i>
<span class="content">New comment on ‘Awesome P...</span>
<span class="time"><i class="fa fa-clock-o"></i>13 min.</span>
</a>
</li>
<li class="item">
<a href="#">
<i class="fa fa-plus"></i>
<span class="content">New user registration</span>
<span class="time"><i class="fa fa-clock-o"></i>13 min.</span>
</a>
</li>
<li class="item">
<a href="#">
<i class="fa fa-envelope"></i>
<span class="content">New Message from George</span>
<span class="time"><i class="fa fa-clock-o"></i>13 min.</span>
</a>
</li>
<li class="item">
<a href="#">
<i class="fa fa-shopping-cart"></i>
<span class="content">New purchase</span>
<span class="time"><i class="fa fa-clock-o"></i>13 min.</span>
</a>
</li>
<li class="item">
<a href="#">
<i class="fa fa-eye"></i>
<span class="content">New order</span>
<span class="time"><i class="fa fa-clock-o"></i>13 min.</span>
</a>
</li>
<li class="item-footer">
<a href="#">
View all notifications
</a>
</li>
</ul>
</li>
<li class="dropdown hidden-xs">
<a class="btn dropdown-toggle" data-toggle="dropdown">
<i class="fa fa-envelope-o"></i>
<span class="count">16</span>
</a>
<ul class="dropdown-menu notifications-list messages-list">
<li class="pointer">
<div class="pointer-inner">
<div class="arrow"></div>
</div>
</li>
<li class="item first-item">
<a href="#">
<img src="img/samples/messages-photo-1.png" alt=""/>
<span class="content">
    <span class="content-headline">
            George Clooney
    </span>
    <span class="content-text">
            Look, just because I don't be givin' no man a foot massage don't make it 
            right for Marsellus to throw...
    </span>
</span>
<span class="time"><i class="fa fa-clock-o"></i>13 min.</span>
</a>
</li>
<li class="item">
<a href="#">
<img src="img/samples/messages-photo-2.png" alt=""/>
<span class="content">
    <span class="content-headline">
            Emma Watson
    </span>
    <span class="content-text">
            Look, just because I don't be givin' no man a foot massage don't make it 
            right for Marsellus to throw...
    </span>
</span>
<span class="time"><i class="fa fa-clock-o"></i>13 min.</span>
</a>
</li>
<li class="item">
<a href="#">
<img src="img/samples/messages-photo-3.png" alt=""/>
<span class="content">
    <span class="content-headline">
            Robert Downey Jr.
    </span>
    <span class="content-text">
            Look, just because I don't be givin' no man a foot massage don't make it 
            right for Marsellus to throw...
    </span>
</span>
<span class="time"><i class="fa fa-clock-o"></i>13 min.</span>
</a>
</li>
<li class="item-footer">
<a href="#">
View all messages
</a>
</li>
</ul>
</li>
<li class="dropdown hidden-xs">
<a class="btn dropdown-toggle" data-toggle="dropdown">
New Item
<i class="fa fa-caret-down"></i>
</a>
<ul class="dropdown-menu">
<li class="item">
<a href="#">
<i class="fa fa-archive"></i> 
New Product
</a>
</li>
<li class="item">
<a href="#">
<i class="fa fa-shopping-cart"></i> 
New Order
</a>
</li>
<li class="item">
<a href="#">
<i class="fa fa-sitemap"></i> 
New Category
</a>
</li>
<li class="item">
<a href="#">
<i class="fa fa-file-text"></i> 
New Page
</a>
</li>
</ul>
</li>
<li class="dropdown hidden-xs">
<a class="btn dropdown-toggle" data-toggle="dropdown">
English
<i class="fa fa-caret-down"></i>
</a>
<ul class="dropdown-menu">
<li class="item">
<a href="#">
Spanish
</a>
</li>
<li class="item">
<a href="#">
German
</a>
</li>
<li class="item">
<a href="#">
Italian
</a>
</li>
</ul>
</li>
</ul>
</div>

<div class="nav-no-collapse pull-right" id="header-nav">
<ul class="nav navbar-nav pull-right">
<li class="mobile-search">
<a class="btn">
<i class="fa fa-search"></i>
</a>

<div class="drowdown-search">
<form role="search">
<div class="form-group">
<input type="text" class="form-control" placeholder="Search...">
<i class="fa fa-search nav-search-icon"></i>
</div>
</form>
</div>

</li>
<li class="dropdown profile-dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">
<?php require 'template-parts/admin-small-pic.php'; ?>
<span class="hidden-xs">  <?=$_SESSION['admin_fname']?> <?=$_SESSION['admin_lname']?> </span> <b class="caret"></b>
</a>
<?php require 'template-parts/left-nav-user-box.php'; ?>
</li>
<li class="hidden-xxs">
<a class="btn">
<i class="fa fa-power-off"></i>
</a>
</li>
</ul>
</div>
</div>
</div>
</header>
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
<ul class="dropdown-menu">
    <li><a href="user-profile.html"><i class="fa fa-user"></i>Profile</a></li>
    <li><a href="#"><i class="fa fa-cog"></i>Settings</a></li>
    <li><a href="#"><i class="fa fa-envelope-o"></i>Messages</a></li>
    <li><a href="logout"><i class="fa fa-power-off"></i>Logout</a></li>
</ul>
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
<li><span> <a href="/gcpm/admin-to-clients">Clients </a> </span></li>
 
</ol>

<h1> CLIENTS DETAILS </h1>
</div>

<div class="pull-right hidden-xs">
<div class="xs-graph pull-left">
<div class="graph-label">
<b><i class="fa fa-shopping-cart"></i> 838</b> Orders
</div>
<div class="graph-content spark-orders"></div>
</div>

<div class="xs-graph pull-l
     eft mrg-l-lg mrg-r-sm">
<div class="graph-label">
<b>&dollar;12.338</b> Revenues
</div>
<div class="graph-content spark-revenues"></div>
</div>
</div>
</div>
</div>
</div>

<!--  Project Type success message    -->               
<span class="ack-success">  </span>
<?php                            
$client = new ClientsInfo();
$client_info = $client->get_clients( $_SESSION['admin_db_id']);                                     

?>      

<!-- Form Add   Types Hide in default  -->                    
<div class="row" id="section-add-clients" style="display: none;">
<div class="col-lg-6 col-lg-offset-3">
<div class="main-box">
<header class="main-box-header clearfix">
     <label class="btn btn-default btn-sm btn-cls-fm" style="float: right;"> <i class="fa fa-times"></i> Close </label>
   <span class="ack-clients"> </span>
     <h2 style="font-weight: bold; color:rgb(10, 161, 232); border-bottom: 1px solid rgb(10, 161, 232); "> Add Client Details </h2>
 
</header>

<div class="main-box-body clearfix">

<form role="form" id="frm-add-companies" name="frm-add-companies">

<div class="form-group">
<label for="company-name"> <strong> Company Name </strong> </label>
<input type="text" class="form-control"  name="company-name" id="company-name" placeholder="Enter company Name">
</div> <!-- ./form-group -->

<div class="form-group">
<label for="company-city"> <strong>Company City </strong> </label>
<input style="width: 300px;" type="text" class="form-control"  name="company-city" id="company-city" placeholder="Enter City">
</div> <!-- ./form-group -->

<div class="form-group">
<label for="company-state"> <strong>Company State </strong> </label>
<input style="width: 300px;" type="text" class="form-control"  name="company-state" id="company-city" placeholder="Enter State">
</div> <!-- ./form-group -->

<div class="form-group">
<label for="company-state"> <strong>Zip Code </strong> </label>
<input style="width: 300px;" type="text" class="form-control"  name="company-zipcode" id="company-zipcode" placeholder="Enter Zip Code">
</div> <!-- ./form-group -->

<div class="form-group form-group-select2">
<label> <strong> Company's Country </strong> </label>
<select class="sel2" id="company-country" name="company-country">
<option value="United States">United States</option> 
<option value="United Kingdom">United Kingdom</option> 
<option value="Afghanistan">Afghanistan</option> 
<option value="Albania">Albania</option> 
<option value="Algeria">Algeria</option> 
<option value="American Samoa">American Samoa</option> 
<option value="Andorra">Andorra</option> 
<option value="Angola">Angola</option> 
<option value="Anguilla">Anguilla</option> 
<option value="Antarctica">Antarctica</option> 
<option value="Antigua and Barbuda">Antigua and Barbuda</option> 
<option value="Argentina">Argentina</option> 
<option value="Armenia">Armenia</option> 
<option value="Aruba">Aruba</option> 
<option value="Australia">Australia</option> 
<option value="Austria">Austria</option> 
<option value="Azerbaijan">Azerbaijan</option> 
<option value="Bangladesh">Bangladesh</option> 
<option value="India">India</option> 
<option value="Slovakia">Slovakia</option> 
</select>
</div>

<div class="form-group">
<label for="company-phone"> <strong> Company's Phone </strong></label>
<input style="width: 300px;" type="text" class="form-control maskedPhone"  name="company-phone" id="company-phone" placeholder="Enter Phone Number">
</div> <!-- ./form-group -->

<div class="form-group">
<label for="company-website"> <strong> Company's Web Site </strong></label>
<input style="width: 300px;" type="text" class="form-control"  name="company-website" id="company-website" placeholder="Enter Web Site">
</div> <!-- ./form-group -->




<div class="form-group">
<button type="button" class="btn btn-lg btn-primary center-block"  name="btn-clients-submit" id="btn-clients-submit">
SUBMIT
</button>
</div> <!-- ./form-group -->

</form>                                                                          



</div>
</div>
</div>
</div>		

<!-- Form Add key contact  in default  -->                    
<div class="row" id="section-add-key" style="display: none;">
<div class="col-lg-6 col-lg-offset-3">
<div class="main-box">
<header class="main-box-header clearfix">
     <label class="btn btn-default btn-sm btn-cls-fm" style="float: right;"> <i class="fa fa-times"></i> Close </label>
<h2 style="font-weight: bold; color:rgb(10, 161, 232); border-bottom: 1px solid rgb(10, 161, 232); "> Add key contact  </h2>

</header>

<div class="main-box-body clearfix">
<form role="form" id="frm-setup-keycontacts-accounts" name="frm-setup-keycontacts-accounts">                                                                                           


<?php 

$obj_company  = new ComapnyDetails();
$companies = $obj_company->get_company_details( $_SESSION['admin_db_id'] );                                                                                                                                                                                                      

?>

<div class="form-group">
<label data-toggle="tooltip" data-placement="bottom" title="If company is not listed, you need to add it"> Select Company </label>
<select class="form-control sel2" id="company_name" name="company_name" 
     data-toggle="tooltip" data-placement="bottom" 
       title="If not listed, add your client first, then setup key contacts! ">
        <?php if($companies) { ?>
    <option value=""> select company </option>
     <?php
       foreach ($companies as $company) { ?>
      <option value="<?=$company['company_id']?>"> <?=$company['company_name']?> </option>
        <?php } } else { ?>   
      <option value=""> No company found  </option>
        <?php } ?>
</select>

</div> <!-- ./form-group -->

<div class="row">
<div class="form-group col-sm-5">
<label for="key-fname"> <strong>First Name </strong> </label>
<input type="text" class="form-control"  name="key-fname" id="key-fname" placeholder="Enter First Name">
</div> <!-- ./form-group -->


<div class="form-group col-sm-5">
<label for="key-fname"> <strong>Last Name </strong> </label>
<input type="text" class="form-control"  name="key-lname" id="key-lname" placeholder="Enter Last Number">
</div> <!-- ./form-group -->

</div> <!-- ./row -->


<div class="form-group">
<label for="key-phone"> <strong> Phone </strong></label>
<input style="width: 240px;" type="text" class="form-control maskedPhone"  name="key-phone" id="key-phone" placeholder="Enter Key Person's Phone Number">
</div> <!-- ./form-group -->


<div class="form-group">
<label for="key-email"> <strong> Email </strong> </label>
<input style="width: 240px;" type="text" class="form-control" 
       name="key-email" id="key-email" 
       placeholder="Enter Key Person's email address" 
       data-toggle="tooltip" data-placement="bottom" 
       title="This would be person's login ID">
</div> <!-- ./form-group -->



<div class="form-group">
<label for="key-pass"> <strong> Password </strong> </label>
<input style="width: 240px;" type="password" class="form-control" 
       name="key-pass" id="key-pass" 
       placeholder="Enter Passwoord" >                                                                                                          
</div> <!-- ./form-group -->


<div class="form-group">
<button type="button" class="btn btn-lg btn-primary center-block"  name="btn-key-contacts" id="btn-key-contacts">
 SUBMIT
</button>
</div> <!-- ./form-group -->

</form>  

    
</div>
</div>
</div>
</div>		


<!--  Table  PRoject Types Display -->  

<div class="row">
<div class="col-lg-12">
<div class="main-box clearfix">
<header class="main-box-header clearfix">

    <div class="pull-right">  
<button class="btn wizard-next btn-primary  " id="btn-show-add-clients-frm"> Add Client  </button>
<button class="btn wizard-next btn-primary   " id="btn-show-add-key-con-frm"> Add Key contact  </button>
</div>

 <span class="ack-clients-top"> </span>
<h2> Clients <span class="label label-primary label-circle">
 <?php  
    $total_companies = $client->get_total_companies($_SESSION['admin_db_id']);
      echo $total_companies['TOTAL_CLIENTS'];
     ?> 
    </span> 
</h2>

</header>

<div class="main-box-body clearfix">
<div class="table-responsive">

<?php 
if( empty($client_info)) {     
echo "<span style='color:red; font-size:24px;'> You haven't added any clients type yet </span>";
}   else { 


?>                                                             

<table id="table-example" class="table table-hover">
<thead>
<tr>
<th>ID</th>
<th>Name</th>  
<th> Total Projets </th>  
<th> Date Entered </th>  
<th> Action </th>  
</tr>
</thead>

<tbody>


<?php 
foreach ( $client_info as $info) {                                                                        

?>                                                                   

<tr>
<td>

<a href='admin-companies-details/com_id/<?=$info['company_id']?>'>  
    
<?php 
echo $info['company_id'];
?>
</a>
</td>

<td> 
    <a href='admin-companies-details/com_id/<?=$info['company_id']?>'>  
<?=$info['company_name']?>
    </a>
</td>
 

<td> 
<?php
$total = $client->get_clients_total_projets( $info['company_id'] );
if ($total['TIMES_IN_PROJECTS']) {
echo $total['TIMES_IN_PROJECTS'];
} else {
echo "No projects found";

}

?>
</td>

<td><?=date('m/d/Y', strtotime($info['date']))?>  </td>

<td>
    <a href='edit-admin-client/com_id/<?=$info['company_id']?>'>  
     Edit  </a> 
</td>



</tr>

<?php                                                                      
} // foreach
}//else 

?>                                       


</tbody>
</table>
</div>
</div>
</div>
</div>
</div>




</div>
</div>

<footer id="footer-bar" class="row">
 <p id="footer-copyright" class="col-xs-12">
Powered by GoingClear Interactive
</p>
</footer>
</div>
</div>
</div>
</div>
<!-- 
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
<script src="/gcpm/js/jquery.dataTables.js"></script>
<script src="/gcpm/js/dataTables.fixedHeader.js"></script>
<script src="/gcpm/js/dataTables.tableTools.js"></script>
<script src="/gcpm/js/jquery.dataTables.bootstrap.js"></script>

<!-- theme scripts -->
<script src="/gcpm/js/scripts.js"></script>
<script src="/gcpm/js/pace.min.js"></script>

<!-- Adds project types -->
<script src="/gcpm/jquey/admin-adds-project-types.js"> </script>

<script src="/gcpm/jquey/admin-adds-clients.js"></script>
<script src="/gcpm/jquey/admin-setup-key-contacts.js"></script>


<!-- this page specific inline scripts -->
<script>
$(document).ready(function() {






var table = $('#table-example').dataTable({
'info': false,
'sDom': 'lTfr<"clearfix">tip',
'oTableTools': {
'aButtons': [
{
'sExtends':    'collection',
'sButtonText': '<i class="fa fa-cloud-download"></i>&nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down"></i>',
'aButtons':    [ 'csv', 'xls', 'pdf', 'copy', 'print' ]
}
]
}
});

var tt = new $.fn.dataTable.TableTools( table );
$( tt.fnContainer() ).insertBefore('div.dataTables_wrapper');

var tableFixed = $('#table-example-fixed').dataTable({
'info': false,
'pageLength': 50
});

new $.fn.dataTable.FixedHeader( tableFixed );



});
</script>

</body>
</html>

