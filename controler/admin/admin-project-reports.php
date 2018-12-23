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
<ul class="dropdown-menu">
        <li><a href="user-profile.html"><i class="fa fa-user"></i>Profile</a></li>
        <li><a href="#"><i class="fa fa-cog"></i>Settings</a></li>
        <li><a href="#"><i class="fa fa-envelope-o"></i>Messages</a></li>
        <li><a href="/gcpm/logout"><i class="fa fa-power-off"></i>Logout</a></li>
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
<?php 
// Projects 
$projects = new ProjectDetails();

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
                <li><a href="#">Home</a></li>												
                <li class="active"><span> <a href="admin-dashboard"> Dashboard </a> </span></li>
        </ol>

        <h1> All Projects </h1>
</div>

<div class="pull-right hidden-xs">
        <div class="xs-graph pull-left">
                <div class="graph-label">
                        <b> <i class="fa fa-shopping-cart"></i> <?=$total_companies['TOTAL_COMPANIES']?></b> Clients
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




<div class="row">

<div class="col-lg-6">
<div class="main-box">
<header class="main-box-header clearfix">
<h2> Project Views </h2>
</header>

<div class="main-box-body clearfix">
<form class="form-horizontal" role="form">

<div class="form-group form-group-select2">
<label> </label>
<select style="width: 300px; display: none;" class="sel2" id="sel-project-view" tabindex="-1">
<option value=""> Select project status to view details  </option> 
<option value="OpenProjects"> Open Projects  </option> 
<option value="ClosedProjects"> Closed Projects </option> 
<option value="RuningProjects"> Running Projects </option> 
<option value="BeginingProjects"> Beginning Projects </option> 
<option value="AllProjects"> All Projects Projects </option> 
</select>
</div>

</form>
</div>								
</div>
</div>  <!-- ./col-lg-6 -->


<div class="col-lg-6">
<div class="main-box">
<header class="main-box-header clearfix">
        <h2> Project Search </h2>
</header>

<div class="main-box-body clearfix">

    <form action="" class="form-inline" role="form" name="fmr-id-search" id="frmSearch">
                <div class="form-group">
                        <label class="sr-only" for="SearchByID"> Search </label>
                        <input type="text" class="form-control" id="keywords"  name="keywords" placeholder="What are you looking for?">
                </div>
        <button type="button" class="btn btn-success" id="btn-project-search" name="btn-project-search"> <i class="fa fa-search"> Search </i> </button>                                                                                                                                                                            

        </form>
   </div>								
</div>
</div>


</div> <!-- ./row -->



<!-- Shows Search Results -->
<div class="row" id="SearchResults">

</div> <!-- ./SearchResults -->


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

<!-- Tables  scripts -->
<!-- Tables  scripts -->
        <script src="/gcpm/js/jquery.dataTables.js"></script>
        <script src="/gcpm/js/dataTables.fixedHeader.js"></script>
        <script src="/gcpm/js/dataTables.tableTools.js"></script>
        <script src="/gcpm/js/jquery.dataTables.bootstrap.js"></script>

<script src="/gcpm/js/select2.min.js"></script>

<script src="/gcpm/js/typeahead.js"></script>
<script src="/gcpm/js/typeahead.min.js"></script>

<script src="/gcpm/jquey/admin-search-projects.js"></script>
<script src="/gcpm/jquey/admin-project-reports.js"></script>

<!-- theme scripts -->
<script src="/gcpm/js/scripts.js"></script>
<script src="/gcpm/js/pace.min.js"></script>


<!-- this tables scripts -->
<script>
$(document).ready(function() {




//nice select boxes
$('.sel2').select2();

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

