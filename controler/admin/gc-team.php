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
<li><span> <a href="/gcpm/gc-team">GC TEAM </a> </span></li>
 
</ol>

<h1> GC TEAM DETAILS </h1>
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
$member = new TeamMembers();
$member_info = $member->fetch_team( $_SESSION['admin_db_id']);                                     

?>      

<!-- Form Add   Types Hide in default  -->                    
<div class="row" id="section-add-member" style="display: none;">
<div class="col-lg-6 col-lg-offset-3">
<div class="main-box">
<header class="main-box-header clearfix">
     <label class="btn btn-default btn-sm btn-cls-fm" style="float: right;"> <i class="fa fa-times"></i> Close </label>
   <span class="ack-clients"> </span>
     <h2 style="font-weight: bold; color:rgb(10, 161, 232); border-bottom: 1px solid rgb(10, 161, 232); "> Add GC Team Member </h2>
 
</header>

<div class="main-box-body clearfix">

<form role="form" id="frm-add-members" name="frm-add-members">

<div class="form-group">
<label for="member-fname"> <strong> First Name </strong> </label>
<input type="text" class="form-control"  name="member-fname" id="member-fname" placeholder="Enter Member's First Name">
</div> <!-- ./form-group -->

<div class="form-group">
<label for="member-lname"> <strong> Last Name  </strong> </label>
<input  type="text" class="form-control"  name="member-lname" id="member-lname" placeholder="Enter Member's Last Name">
</div> <!-- ./form-group -->

<div class="form-group form-group-select2">
<label for="member-designation"> <strong> Member's Designation </strong> </label>

<?php
$desig = new TeamMembers();
$degInfo = $desig->members_designations($_SESSION['admin_db_id']);
?> 
<select style="width:300px" class="sel2" id="member-designation" name="member-designation">
<?php if( $degInfo) { ?>
<option value=""> Select member's designation </option> 

<?php foreach ($degInfo as $degs) { ?>
<option value="<?=$degs['member_deg_id']?>"> <?=$degs['designation']?>  </option> 
<?php } ?>
<?php } else { ?>
<option value=""> You have't added designation yet </option> 
<?php } ?>
</select>
</div>

<div class="form-group">
<label for="member-phone"> <strong> Member's Phone </strong></label>
<input style="width: 300px;" type="text" class="form-control maskedPhone"  name="member-phone" id="member-phone" placeholder="Enter Member's Phone Number">
</div> <!-- ./form-group -->

<div class="form-group">
<label for="member-email"> <strong> Member's Email </strong></label>
<input  type="text" class="form-control" 
name="member-email" id="member-email"
placeholder="Enter Member's Email Address"
data-toggle="tooltip" data-placement="bottom" title="Email ID will be member's user ID">
</div> <!-- ./form-group -->

<div class="form-group">
<label for="member-pass"> <strong> Password </strong> </label>
<input  type="password" class="form-control" 
name="member-pass" id="member-pass" 
placeholder="Enter Passwoord" >                                                                                                             
</div> <!-- ./form-group -->



<div class="form-group">
<button type="button" class="btn btn-lg btn-primary center-block"  name="btn-member-submit" id="btn-member-submit">
SUBMIT
</button>
</div> <!-- ./form-group -->

</form>                                                                      



</div>
</div>
</div>
</div>		

<!-- Form Add Designation  in default  -->                    
<div class="row" id="section-add-desig" style="display:none;">
<div class="col-lg-6 col-lg-offset-3">
<div class="main-box">
<header class="main-box-header clearfix">
     <label class="btn btn-default btn-sm btn-cls-fm" style="float: right;"> <i class="fa fa-times"></i> Close </label>
<h2 style="font-weight: bold; color:rgb(10, 161, 232); border-bottom: 1px solid rgb(10, 161, 232); "> Add Member Designation  </h2>

</header>

<div class="main-box-body clearfix">
 
    <form name="frm-add-designation" id="frm-add-designation" method="post">  
    
    <div class="form-group">
<label for="company-name"> <strong> Designation: </strong> </label>
<input type="text" class="form-control"  name="desig"  placeholder="Enter Designation">
</div> <!-- ./form-group -->

<button type="button" class="btn btn-lg btn-primary center-block"  name="btn-deg-submit" id="btn-deg-submit">
ADD
</button>
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
<button class="btn wizard-next btn-primary  " id="btn-show-add-member-frm"> Add Member  </button>
<button class="btn wizard-next btn-primary   " id="btn-show-add-desig-frm"> Add Designation  </button>
</div>

 <span class="ack-clients-top"> </span>
<h2> Team members <span class="label label-primary label-circle">
 <?php  
    $total_member = $member->total_member($_SESSION['admin_db_id']);
      echo $total_member['TOTAL_MEMBER'];
     ?> 
    </span> 
</h2>

</header>

<div class="main-box-body clearfix">
<div class="table-responsive">

<?php 
if( empty($member_info)) {     
echo "<span style='color:red; font-size:24px;'> You haven't added member </span>";
}   else { 


?>                                                             

<table id="table-example" class="table table-hover">
<thead>
<tr>
<th>ID</th>
<th>Name</th>  
<th> Designation </th> 
<th> email </th>  
<th> Date Entered </th>  

</tr>
</thead>

<tbody>


<?php 
foreach ( $member_info as $info) {                                                                        

?>                                                                   

<tr>
<td>

<a href='#'>  
    
<?php 
echo $info['member_user_id'];
?>
</a>
</td>

<td> 
    <a href='#'>  
<?=$info['member_fname']?> <?=$info['member_lname']?>
    </a>
</td>
 

<td> 
 <?=$info['designation']?>
</td>

<td> <?=$info['member_email']?>  </td>

<td>
     <?=date('m/d/Y', strtotime($info['date']))?>
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

<script src="/gcpm/jquey/admin-add-members.js"></script>
<script src="/gcpm/jquey/add-member-designation.js"></script>
add-member-designation

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

