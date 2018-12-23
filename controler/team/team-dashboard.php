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
<a href="/gcpm/team-dashboard" class="dropdown-toggle" data-toggle="dropdown">
<?=ucfirst($_SESSION['admin_fname'])?> <?=ucfirst($_SESSION['admin_lname'])?>
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

<h1> DASHBOARD </h1>
</div>
 
    
</div>
</div>
</div>


<!--  Widgets  -->
<div class="row">

<div class="col-lg-3 col-sm-6 col-xs-12">
<div class="main-box infographic-box colored green-bg">
<i class="fa fa-anchor"></i>
<span class="headline">Open Projects </span>
<span class="value"> <?=$total_open_projects['TOTAL_OPEN_PROJECT'];?> </span>
</div>
</div>


<div class="col-lg-3 col-sm-6 col-xs-12">
<div class="main-box infographic-box colored emerald-bg">
<i class="fa fa-archive"></i>                                                                              
<span class="headline">Projects</span>
<span class="value"> <?=$total_projects['TOTAL_PROJETCS'];?> </span>
</div>
</div>


<div class="col-lg-3 col-sm-6 col-xs-12">
<div class="main-box infographic-box colored red-bg">
<i class="fa fa-rocket"></i>
<span class="headline"> To Do's </span>
<span class="value"> 50 </span>
</div>
</div>

<div class="col-lg-3 col-sm-6 col-xs-12">
<div class="main-box infographic-box colored purple-bg">
<i class="fa fa-bookmark-o"></i>
<span class="headline"> Open Leads </span>
<span class="value"> <small> 20 </small></span>
</div>
</div>
</div>


<!--  Table Open Projects  -->        
<div class="row">
<div class="col-lg-12">
<div class="main-box clearfix">
<header class="main-box-header clearfix">
<h2> Open Projects  </h2>
</header>


    <?php 
    $obj_open_projects = new ProjectDetails();
    $project_details = $obj_open_projects->admin_open_projects_list( $_SESSION['admin_db_id'] );

    if($project_details) { 
    ?>

<div class="main-box-body clearfix">
<div class="table-responsive">
<table id="table-example" class="table table-hover">
    <thead>
        <tr>															
            <th><span> PROJECT ID </span></th>
            <th><span> PROJECT NAME</span></th>
            <th><span> SERVICES </span></th>
            <th><span> CLIENTS </span></th>
            <th><span> START DATE </span></th>
            <th><span> COST </span></th>
            <th><span> STATUS </span></th>	
        </tr>
    </thead>

<tbody>
<?php 
foreach ( $project_details as $open_projet  ) { ?>

<tr>
    <td> 
    <a href='admin-show-client-project-status/id/<?=$open_projet['project_id']?>/project_cat_id/<?=$open_projet['project_cat_id']?>/com_id/<?=$open_projet['company_id']?>'>
    <?=$open_projet['project_id']?> 
    </a>
    </td>
    
    <td> 
     <a href='admin-show-client-project-status/id/<?=$open_projet['project_id']?>/project_cat_id/<?=$open_projet['project_cat_id']?>/com_id/<?=$open_projet['company_id']?>'>
    <?=$open_projet['project_name']?> 
    </a>
    </td>
    
    <td> <?=$open_projet['project_category']?> </td>
    
    <td> <?=$open_projet['company_name']?> </td>

    <td> <?=date('M j, Y', strtotime($open_projet['project_start_date']))?> </td>
    
    <td>$<?=$open_projet['project_cost']?> </td>  
    
    <?php 
         if( $open_projet['project_status'] == "Running") { ?>
            <td class="text-center"> <span class="label label-default">  <?=$open_projet['project_status']?> </span> </td>     
    <?php 
         } else { ?>
    <td class="text-center"> <span class="label label-success">   <?=$open_projet['project_status']?> </span> </td>       
      <?php }?> 
</tr>


<?php }//foreach  ?>

<?php } else { ?>

<h3> You don't have any projects to view </h3>
<p> How to add project? </p>
<p>
    1. Go to client page <br>
    2. Click on add client <br>
    3. add key contact <br>
    4. add project type
    4. now go to add project page and add project <br>
</p>
<?php
} ?>  
    </tbody
    
</table>
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
	
	<!-- Tables  scripts -->
        <script src="/gcpm/js/jquery.dataTables.js"></script>
        <script src="/gcpm/js/dataTables.fixedHeader.js"></script>
        <script src="/gcpm/js/dataTables.tableTools.js"></script>
        <script src="/gcpm/js/jquery.dataTables.bootstrap.js"></script>
	
	<!-- theme scripts -->
        <script src="/gcpm/js/scripts.js"></script>
        <script src="/gcpm/js/pace.min.js"></script>
        
	
	<!-- this tables scripts -->
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

