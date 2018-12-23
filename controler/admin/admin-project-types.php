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
                    <li><span>Projects</span></li>
                    <li class="active"><span>Project Types  </span></li>
            </ol>

        <h1> PROJECT TYPES DETAILS </h1>
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

<!--  Project Type success message    -->               
<span class="ack-success">  </span>
<?php                            
$project_type = new ProjectTypes();
$project_info = $project_type->fetch_project_types( $_SESSION['admin_db_id']);                                     


function limit_words($string, $word_limit){

$words = explode(" ",$string);
return implode(" ", array_splice($words, 0, $word_limit));
}


?>      

<!-- Form Add projec Types Hide in default  -->                    
<div class="row" id="section-add-project-types" style="display: none;">
<div class="col-lg-6 col-lg-offset-3">
<div class="main-box">
    <header class="main-box-header clearfix">
        <label class="btn btn-default btn-sm btn-cls-fm" style="float: right;"> <i class="fa fa-times"></i> Close </label>
        <h2 style="font-weight: bold; color:rgb(10, 161, 232); border-bottom: 1px solid rgb(10, 161, 232); "> Add Project Types </h2>

        <span class="ack"> </span>
    </header>

    <div class="main-box-body clearfix">

        <form action="" method="post" novalidate="novalidate" role="form" id="frm_add_projects_types" name="frm_add_projects_types">

                    <div class="form-group">
                        <label for="project_types"> <strong>Project Type </strong></label>
                            <input type="text" class="form-control"  name="project_types" id="project_types" placeholder="Enter Project Type">
                    </div> <!-- ./form-group -->



                    <div class="form-group">
                        <label for="project_types_descrip"> <strong> Description </strong> </label>
                            <textarea rows="6"  type="texta" class="form-control"  name="project_types_descrip" id="project_types_descrip"> </textarea>

                    </div> <!-- ./form-group -->


                     <div class="form-group">
                         <input type="submit" value="SUBMIT" class="btn btn-lg btn-success center-block"  name="btn-project-types-submit" id="btn-project-types-submit">
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
<h2> Project Types Details  </h2>

<button class="btn wizard-next btn-primary  pull-right" id="btn-show-prjt-typs-frm"> Add project Types  </button>

</header>

<div class="main-box-body clearfix">
<div class="table-responsive">

<?php 
if( empty($project_info)) {     
echo "<span style='color:red; font-size:24px;'> You haven't added any projet type yet </span>";
}   else { 


?>                                                             

<table id="table-example" class="table table-hover">
<thead>
<tr>
<th>Name</th>
<th> Times Used </th>
<th>  Date Created </th>
<th> Descriptions</th>                                                                                                                         
</tr>
</thead>

<tbody>


<?php 
foreach ( $project_info as $info) {                                                                        

?>                                                                   

<tr>
<td><a href='admin-project-add-project-question/id/<?=$info['project_cat_id']?>'>  
   <?php 
        echo $info['project_category'];
      ?>
   </a> </td>
<td> 
 <?php
  $times = $project_type->project_types_used_in_project( $info['project_cat_id'] );
        if ($times['TIMES_IN_PROJECTS']) {
             echo $times['TIMES_IN_PROJECTS'];
        } else {
            echo "Unused";

        }

 ?>
</td>
<td>  <?=date('m/d/Y', strtotime($info['date']))?>  </td>
<td>  

   <?php 
   $content = $info['descriptions'];                                                                             
   echo limit_words($content,20) ."<a href=''> Read More... </a>    ";
   ?>

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
<script src="js/jquery.dataTables.js"></script>
<script src="js/dataTables.fixedHeader.js"></script>
<script src="js/dataTables.tableTools.js"></script>
<script src="js/jquery.dataTables.bootstrap.js"></script>

<!-- theme scripts -->
<script src="js/scripts.js"></script>
<script src="js/pace.min.js"></script>

<!-- Adds project types -->
<script src="jquey/admin-adds-project-types.js"> </script>

<!-- Data validation -->



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

