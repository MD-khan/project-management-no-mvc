<?php 
include 'header.php';

global $request_array;

if($request_array[1] == 'com_id')
{   
// $_SESSION['project_cat_db_id'] =$request_array[2];

$company_id = intval($request_array[2]);
}
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
</header

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
include_once 'template-parts/left-navigation.php';
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
<li class="active"><span> CLIENT DETAILS  </span></li>
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
 


</div>
</div>
 
    
    
    <div class="row">


    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="main-box clearfix profile-box-contact">
    <div class="main-box-body clearfix">
    <div class="profile-box-header gray-bg clearfix">
        
    <img src="/gcpm/img/clients/brand-logos/company-logo110-110.jpg" alt="" class="profile-img img-responsive">

    
            
            
        <?php 
    $obj_company = new ComapnyDetails();
    $company_info = $obj_company->get_single_company_details( $company_id );
 
    ?>

    <h2> <?=$company_info['company_name']?> </h2>
    <div class="job-position">
        Address 
    </div>
    <ul class="contact-details">
        <li>
                <i class="fa fa-map-marker"></i> 
                <?=$company_info['company_city']?>, 
                <?=$company_info['company_state']?>,
                <?=$company_info['company_zipcode']?>,
                <?=$company_info['company_country']?>,

        </li>
        <li>
                <i class="fa fa-globe"></i> 
                <?=$company_info['company_website']?> 													</li>
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

    // List all the open projects
    $open_project_list = $obj_project->client_open_projects_list( $company_id );
    ?>


    <div class="profile-box-footer clearfix">
    <a href="#">
        <span class="value"> <?=$total_open_projects?> </span>
        <span class="label"> Open Projects </span>
    </a>
    <a href="#">
        <span class="value"> <?=$total_projects?></span>
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
         
        if( $client_info) {
                $c = 0;
                foreach ( $client_info as $c_info ) {
              
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
      
       
    </ul>
    </div>

    <div class="profile-box-footer clearfix">
    <a href="#">
        <span class="value"> Office </span>
        <span class="label"> <?=$company_info['company_phone']?>  </span>
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
         <?php   
       
       
       }
            }
            ?> 
    </div>

   

    
    

<footer id="footer-bar" class="row">
<?php include_once 'template-parts/footer.php'; ?>
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
 

<!-- theme scripts -->
<script src="/gcpm/js/scripts.js"></script>
<script src="/gcpm/js/pace.min.js"></script>  


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

