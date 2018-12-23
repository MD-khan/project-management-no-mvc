<?php 
include 'header.php';
global $request_array;

if($request_array[1] == 'id')
{   
// $_SESSION['project_cat_db_id'] =$request_array[2];

$project_cat_id = intval($request_array[2]);

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
<li class="active"> <span> <a href="/gcpm/admin-project-types"> PROJECT TYPES </a> </span></li>
<li><span> PROJECT TYPES QUESTIONS </span></li>
</ol>

<h1> PROJECT TYPES QUESTIONS </h1>
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

<!-- ADD QUESTIONS  -->	
<div class="row" id="section_frm_ad_qsn" style="">
<div class="col-lg-6 col-lg-offset-3">
<div class="main-box">
<label class="btn btn-default btn-sm btn-cls-fm-qsn" style="float: right;"> <i class="fa fa-times"></i> Close </label>
<header class="main-box-header clearfix">
<h2 style="font-weight: bold; color:rgb(10, 161, 232); border-bottom: 1px solid rgb(10, 161, 232); "> Add Questions  </h2>
</header>

<div class="main-box-body clearfix">
<span class="ack-qsn">  </span>
<form action="" role="form" id="frm_add_qsns" name="frm_add_qsns">
<input type="hidden" name="project_id" value="<?=$project_cat_id?>">
<?php 
$project = new ProjectTypes();
$project_type = $project->fetch_project_types_name($project_cat_id);
$question_categories = $project->fetch_question_categories( $_SESSION['admin_db_id'] );
$pahses = $project->fetch_phases( $_SESSION['admin_db_id'] );
?>


<div class="form-group">
<strong> Project Type </strong>
<label class="label label-primary"> <?php echo $project_type['project_category']; ?> </label>                                                                                                    

<input type="hidden" class="form-control"  name="project_types" id="project_types" value="<?php echo $project_type['project_category']; ?>" disabled>
</div> <!-- ./form-group -->

<div class="form-group">
<label> <strong> Question categories  </strong> </label>
<?php if ($question_categories) {  ?>
<select class="form-control"  name="qsn_cat">

<option value=""> Select a question category  </option>
<?php 
foreach ( $question_categories as $question_category ) {
?>
<option value="<?=$question_category['qsn_cat_id']?>"> <?=$question_category['qsn_category']?>  </option>
<?php } // foreach ?>  

</select>
<?php   } else { ?>
<div> 
  
<h2> You haven't added any question category yet   </h2>

 <a data-toggle="modal" href="#myModal" class="btn btn-primary mrg-b-lg"> Add Question category </a>
 
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title"> Add Question Category  </h4>
</div>
<div class="modal-body">
<form role="form" id='frm-add-qsn-cat' method='post'>
<div class="form-group">
<label for="qsn_cat_name">Question Category</label>
<input type="text" class="form-control" id="qsn_cat_name" placeholder="Enter Question Category">
</div>
 
</form>

</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<button type="button" class="btn btn-primary" id="add_qsn_cat"> Save  </button>
</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
 
  
<?php } ?>                                                                                                         

</div> <!-- ./form-group -->   

<div class="form-group">
<label> <strong> Phases  </strong> </label>
<?php if ($pahses) {  ?>
<select class="form-control"  name="phase_cat">

<option value=""> Select a phase   </option>
<?php 
foreach ( $pahses as $pahse ) {
?>
<option value="<?=$pahse['phase_id']?>"> <?=$pahse['phase_category']?>  </option>
<?php } // foreach ?>  

</select>
<?php   } else { ?>
<div> 
<h2> You haven't added any phase yet </h2>

<a href="#"> Add phase </a>
 
</div>
<?php } ?>

</div> <!-- ./form-group -->   



<div class="form-group">
<label for="qsn_name"> <strong> Enter Question:</strong> </label>
<textarea class="form-control"  name="qsn_name" id="qsn_name" rows="2">   </textarea>                                                                                                         
</div> <!-- ./form-group -->



<div class="form-group">
<label> <strong> Select Answer type  </strong> </label>
<select class="form-control" id="ans-type" name="ans-type">
<option value=""> Select Answer type  </option>
<option value="Input Box"> Input Box </option>
<option value="Radio Button"> Radio Button  </option>
<option value="Check Box"> Check Box </option>
<option value="File Upload">  File Upload </option>

</select>                                                                                                        
</div> <!-- ./form-group -->                                                                                               


<!-- check box -->
<div id="checkbox" style="display: none;">   

<div class="form-group">
<label for="field_name"> <strong> Check Box Name </strong> </label>
<input type="text" class="form-control" name="ckh_field_name" id="ckh_field_name" placeholder="Enter Check box name">
<span class="help-block"> Example: Color </span>
</div>

<div class="form-group">
<label for="field_name"> <strong> Check Box Values </strong> </label>
<input  type="text" class="form-control" name="chk_field_values" id="chk_field_values" placeholder="Enter values separated by comma ">
<span class="help-block"> Example: Red, Green, Blue </span>
</div>                                                                                                 

</div> <!-- ./checkbox -->  


<!-- radio button -->
<div id="radio_button" style="display: none">   

<div class="form-group">
<label for="field_name"> <strong> Radio Button Name </strong> </label>
<input type="text" class="form-control" name="opt_field_name" id="field_name" placeholder="Enter Radio Button name">
<span class="help-block"> Example: Gender </span>
</div>

<div class="form-group">
<label for="radio_valus"> <strong> Radio Button Values </strong> </label>
<input  type="text" class="form-control" name="opt_field_values" id="field_values" placeholder="Enter values separated by comma ">
<span class="help-block"> Example: Male, Female </span>
</div>                                                                                                 

</div> <!-- ./radio_button -->  






<div class="form-group">
<div class="row">
<div class="col-sm-4"> <label> <strong> Is required ? </strong> </label> </div>
<div class="col-sm-8"> 
<input type="radio" name="required" value="Yes" checked> Yes <br>
<input type="radio" name="required" value="NO"> No
</div>
</div>                                                                                                         
</div> <!-- ./form-group -->


<div class="form-group">
<div class="row">
<div class="col-sm-4"> <label> <strong> Has sub-question ? </strong> </label> </div>
<div class="col-sm-8"> 
<input type="radio" name="sub-questions" value="Yes"> Yes <br>
<input type="radio" name="sub-questions" value="No" checked> No
</div>
</div>                                                                                                         
</div> <!-- ./form-group -->


<div id="sub-quesn-section" style="display: none"> 
<div class="form-group">
<label for="sub_qsn_name"> <strong> Enter Sub-question:</strong> </label>
<textarea class="form-control"  name="sub_qsn_name"  rows="2">   </textarea>                                                                                                         
</div> <!-- ./form-group -->



<div class="form-group">
<label> <strong> Select Sub-question's answer type  </strong> </label>
<select class="form-control" id="sub_ans_type" name="sub_ans_type">
<option value=""> Select Answer type  </option>
<option value="Input Box"> Input Box </option>
<option value="Radio Button"> Radio Button  </option>
<option value="Check Box"> Check Box </option>
<option value="File Upload">  File Upload </option>

</select>                                                                                                        
</div> <!-- ./form-group -->    


<!-- csub-heck box -->
<div id="sub-checkbox" style="display: none;">   

<div class="form-group">
<label for="field_name"> <strong> Check Box Name </strong> </label>
<input type="text" class="form-control" name="sub_ckh_field_name" id="ckh_field_name" placeholder="Enter Check box name">
<span class="help-block"> Example: Color </span>
</div>

<div class="form-group">
<label for="field_name"> <strong> Check Box Values </strong> </label>
<input  type="text" class="form-control" name="sub_chk_field_values" id="chk_field_values" placeholder="Enter values separated by comma ">
<span class="help-block"> Example: Red, Green, Blue </span>
</div>                                                                                                 

</div> <!-- ./sub_radio_button -->  


<!-- sub_radio button -->
<div id="sub_radio_button" style="display: none">   

<div class="form-group">
<label for="field_name"> <strong> Radio Button Name </strong> </label>
<input type="text" class="form-control" name="sub_opt_field_name" id="field_name" placeholder="Enter Radio Button name">
<span class="help-block"> Example: Gender </span>
</div>

<div class="form-group">
<label for="radio_valus"> <strong> Radio Button Values </strong> </label>
<input  type="text" class="form-control" name="sub_opt_field_values" id="field_values" placeholder="Enter values separated by comma ">
<span class="help-block"> Example: Male, Female </span>
</div>                                                                                                 

</div> <!-- ./radio_button -->  


<div class="form-group">
<div class="row">
<div class="col-sm-4"> <label> <strong> Is sub-question required ? </strong> </label> </div>
<div class="col-sm-8"> 
<input type="radio" name="sub-required" value="Yes"> Yes <br>
<input type="radio" name="sub-required" value="NO"> No
</div>
</div>                                                                                                         
</div> <!-- ./form-group -->

</div> <!-- ./sub-quesn-section -->


<div class="form-group">
<button type="submit" class="btn btn-lg btn-success center-block"  name="btn-qsn-submit" id="btn-qsn-submit">
SUBMIT
</button>
</div> <!-- ./form-group -->

</form>                                                                                                     




</div>
</div>
</div>

</div>	






<!--  Table QUESTIONS Display -->        
<div class="row">
<div class="col-lg-12">
<div class="main-box clearfix">
<header class="main-box-header clearfix">
<h2> <strong> Project Type: </strong> <label class="label label-primary"> <?php echo $project_type['project_category']; ?> </label> </h2>
<button class="btn wizard-next btn-warning  pull-right" id="btn_opn_ad_qsns"> ADD QUESTIONS  </button>
</header>

<div class="main-box-body clearfix">
<div class="table-responsive">
<table id="table-example" class="table table-hover">
<thead>
<tr>
    <th> QUESTIONS </th>
    <th> answer types  </th>
    <th> Fields Name  </th>
    <th> Field's Values  </th>
    <th>  Phases </th>
    <th>  Required </th>                                                                                                                         
</tr>
</thead>

<tbody>

<?php 
$ob_qsns = new ProjectQuestions();
$qsn_fetch = $ob_qsns->fetch_quetions( $_SESSION['admin_db_id'], $project_cat_id );

if ( $qsn_fetch ) {

foreach ( $qsn_fetch as $qsn_info ) {
?> 

<tr>	
<td> <?=$qsn_info['questions']?> </td>
<td> <?=$qsn_info['ans_types']?> </td>
<td> 
<?php 
if ( empty($qsn_info['input_field_name'])) {
    echo "N/A";
    } else {
        echo $qsn_info['input_field_name'];
    }
?>                                                                                             

</td>
<td> 
<?php 
if ( empty($qsn_info['field_values'])) {
    echo "N/A";
    } else {
        echo $qsn_info['field_values'];
    }
?>                                                                                             

</td>
<td> <?=$qsn_info['qsn_phase']?> </td>
<td> <?=$qsn_info['required']?> </td>                                                                  
</tr>   

<?php 
}
} else 
echo "<h3> You haven't added any QUESTION yet for the <strong> ".$project_type['project_category']."  </strong> project type </h3>";
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


<script src="/gcpm/jquey/admin-ads-project-qsns.js"></script>
<script src="/gcpm/jquey/on-change-ans-type.js"></script>
<script src="/gcpm/jquey/admin-add-qsn-cat.js"></script>


<!-- theme scripts -->
<script src="/gcpm/js/scripts.js"></script>
<script src="/gcpm/js/pace.min.js"></script>

<!-- this page specific scripts -->
<script src="/gcpm/js/modernizr.custom.js"></script>
<script src="/gcpm/js/classie.js"></script>
<script src="/gcpm/js/modalEffects.js"></script>

 
<!-- this page specific inline scripts -->
<script>
$(document).ready(function() {               



//CHARTS
function gd(year, day, month) {
return new Date(year, month - 1, day).getTime();
}

if ($('#graph-bar').length) {
var data1 = [
[gd(2015, 1, 1), 838], [gd(2015, 1, 2), 749], [gd(2015, 1, 3), 634], [gd(2015, 1, 4), 1080], [gd(2015, 1, 5), 850], [gd(2015, 1, 6), 465], [gd(2015, 1, 7), 453], [gd(2015, 1, 8), 646], [gd(2015, 1, 9), 738], [gd(2015, 1, 10), 899], [gd(2015, 1, 11), 830], [gd(2015, 1, 12), 789]
];

var data2 = [
[gd(2015, 1, 1), 342], [gd(2015, 1, 2), 721], [gd(2015, 1, 3), 493], [gd(2015, 1, 4), 403], [gd(2015, 1, 5), 657], [gd(2015, 1, 6), 782], [gd(2015, 1, 7), 609], [gd(2015, 1, 8), 543], [gd(2015, 1, 9), 599], [gd(2015, 1, 10), 359], [gd(2015, 1, 11), 783], [gd(2015, 1, 12), 680]
];

var series = new Array();

series.push({
data: data1,
bars: {
show : true,
barWidth: 24 * 60 * 60 * 12000,
lineWidth: 1,
fill: 1,
align: 'center'
},
label: 'Revenues'
});
series.push({
data: data2,
color: '#e84e40',
lines: {
show : true,
lineWidth: 3,
},
points: { 
fillColor: "#e84e40", 
fillColor: '#ffffff', 
pointWidth: 1,
show: true 
},
label: 'Orders'
});

$.plot("#graph-bar", series, {
colors: ['#03a9f4', '#f1c40f', '#2ecc71', '#3498db', '#9b59b6', '#95a5a6'],
grid: {
tickColor: "#f2f2f2",
borderWidth: 0,
hoverable: true,
clickable: true
},
legend: {
noColumns: 1,
labelBoxBorderColor: "#000000",
position: "ne"       
},
shadowSize: 0,
xaxis: {
mode: "time",
tickSize: [1, "month"],
tickLength: 0,
// axisLabel: "Date",
axisLabelUseCanvas: true,
axisLabelFontSizePixels: 12,
axisLabelFontFamily: 'Open Sans, sans-serif',
axisLabelPadding: 10
}
});

var previousPoint = null;
$("#graph-bar").bind("plothover", function (event, pos, item) {
if (item) {
if (previousPoint != item.dataIndex) {

previousPoint = item.dataIndex;

$("#flot-tooltip").remove();
var x = item.datapoint[0],
y = item.datapoint[1];

showTooltip(item.pageX, item.pageY, item.series.label, y );
}
}
else {
$("#flot-tooltip").remove();
previousPoint = [0,0,0];
}
});

function showTooltip(x, y, label, data) {
$('<div id="flot-tooltip">' + '<b>' + label + ': </b><i>' + data + '</i>' + '</div>').css({
top: y + 5,
left: x + 20
}).appendTo("body").fadeIn(200);
}
}

//WORLD MAP
$('#world-map').vectorMap({
map: 'world_merc_en',
backgroundColor: '#ffffff',
zoomOnScroll: false,
regionStyle: {
initial: {
fill: '#e1e1e1',
stroke: 'none',
"stroke-width": 0,
"stroke-opacity": 1
},
hover: {
"fill-opacity": 0.8
},
selected: {
fill: '#8dc859'
},
selectedHover: {
}
},
markerStyle: {
initial: {
fill: '#e84e40',
stroke: '#e84e40'
}
},
markers: [
{latLng: [38.35, -121.92], name: 'Los Angeles - 23'},
{latLng: [39.36, -73.12], name: 'New York - 84'},
{latLng: [50.49, -0.23], name: 'London - 43'},
{latLng: [36.29, 138.54], name: 'Tokyo - 33'},
{latLng: [37.02, 114.13], name: 'Beijing - 91'},
{latLng: [-32.59, 150.21], name: 'Sydney - 22'},
],
series: {
regions: [{
values: gdpData,
scale: ['#6fc4fe', '#2980b9'],
normalizeFunction: 'polynomial'
}]
},
onRegionLabelShow: function(e, el, code){
el.html(el.html()+' ('+gdpData[code]+')');
}
});

/* SPARKLINE - graph in header */
var orderValues = [10,8,5,7,4,4,3,8,0,7,10,6,5,4,3,6,8,9];

$('.spark-orders').sparkline(orderValues, {
type: 'bar', 
barColor: '#ced9e2',
height: 25,
barWidth: 6
});

var revenuesValues = [8,3,2,6,4,9,1,10,8,2,5,8,6,9,3,4,2,3,7];

$('.spark-revenues').sparkline(revenuesValues, {
type: 'bar', 
barColor: '#ced9e2',
height: 25,
barWidth: 6
});

/* ANIMATED WEATHER */
var skycons = new Skycons({"color": "#03a9f4"});
// on Android, a nasty hack is needed: {"resizeClear": true}

// you can add a canvas by it's ID...
skycons.add("current-weather", Skycons.SNOW);

// start animation!
skycons.play();


//tooltip init
$('#exampleTooltip').tooltip();

//nice select boxes
$('.sel2').select2();

$('#sel2Multi').select2({
placeholder: 'Select a Country',
allowClear: true
});

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
format: 'mm-dd-yyyy'
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

<?php

/* 
* To change this license header, choose License Headers in Project Properties.
* To change this template file, choose Tools | Templates
* and open the template in the editor.
*/

