<?php 
require 'php/session.php';

sec_session_start();

/*
 if (isset($_SESSION['LAST_REQUEST_TIME'])) {
    if (time() - $_SESSION['LAST_REQUEST_TIME'] > 1) {
        // session timed out, last request is longer than 3 minutes ago
        $_SESSION = array();
        session_destroy();
         header('Location: lock-out');
    }
}
$_SESSION['LAST_REQUEST_TIME'] = time(); 
 * 
 */

if( !isset($_SESSION['logged_in'])) {
    header('Location: login');
} 

require 'autoloader.php';
 
/*
if (isset($_SESSION['most_recent_activity']) && 
    (time() -   $_SESSION['most_recent_activity'] > 6)) {

 //600 seconds = 10 minutes
 session_destroy();   
 //session_unset();  
 header('Location: login');
 

 }
 * 
 */



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title> 
        <?php
        $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $tokens = explode('/', $url);
        
        if( !empty($tokens[4])) {
             echo  $tokens[4] . " | GC Project Manager";
        } else echo "Login | GC Project Manager";
       
        
       // echo $tokens[sizeof($tokens)-1] . " | GC Project Manager";
        ?>
        </title>
	
	<!-- bootstrap -->
	<link rel="stylesheet" type="text/css" href="/gcpm/css/bootstrap/bootstrap.min.css" />
	
	<!-- RTL support - for demo only -->
	<script src="/gcpm/js/demo-rtl.js"></script>
	<!-- 
	If you need RTL support just include here RTL CSS file <link rel="stylesheet" type="text/css" href="css/libs/bootstrap-rtl.min.css" />
	And add "rtl" class to <body> element - e.g. <body class="rtl"> 
	-->
	
	<!-- libraries -->
         <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="/gcpm/css/libs/font-awesome.css" />
	<link rel="stylesheet" type="text/css" href="/gcpm/css/libs/nanoscroller.css" />

	<!-- global styles -->
	<link rel="stylesheet" type="text/css" href="/gcpm/css/compiled/theme_styles.css" />
        
        <!-- client-individual-project-status.php page specific styles -->
       <link rel="stylesheet" type="text/css" href="/gcpm/css/compiled/wizard.css">
        
	<!-- this page specific styles -->
	<link rel="stylesheet" href="/gcpm/css/libs/daterangepicker.css" type="text/css" />
	<link rel="stylesheet" href="/gcpm/css/libs/jquery-jvectormap-1.2.2.css" type="text/css" />
	<link rel="stylesheet" href="/gcpm/css/libs/weather-icons.css" type="text/css" />
	
        <!-- Forms styles -->
	<link rel="stylesheet" href="/gcpm/css/libs/datepicker.css" type="text/css" />
	<link rel="stylesheet" href="/gcpm/css/libs/daterangepicker.css" type="text/css" />
	<link rel="stylesheet" href="/gcpm/css/libs/bootstrap-timepicker.css" type="text/css" />
	<link rel="stylesheet" href="/gcpm/css/libs/select2.css" type="text/css" />
        
        <!-- Tables  styles -->
	<link rel="stylesheet" type="text/css" href="/gcpm/css/libs/dataTables.fixedHeader.css">
	<link rel="stylesheet" type="text/css" href="/gcpm/css/libs/dataTables.tableTools.css">
        
	<!-- Favicon -->	
        <link rel="icon" href="http://www.goingclear.com/wp-content/themes/goingclear/favicon.ico" type="image/x-icon">
       <!-- this page specific styles -->
	<link rel="stylesheet" type="text/css" href="css/libs/nifty-component.css"/>
         
	<!-- google font libraries -->
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,600,700,300' rel='stylesheet' type='text/css'>

	<!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
		<script src="js/respond.min.js"></script>
	<![endif]-->
        
        
        <style>
        label.btn span {
  font-size: 1.5em ;
}

label input[type="radio"] ~ i.fa.fa-circle-o{
    color: #c8c8c8;    display: inline;
}
label input[type="radio"] ~ i.fa.fa-check-circle-o{
    display: none;
}
label input[type="radio"]:checked ~ i.fa.fa-circle-o{
    display: none;
}
label input[type="radio"]:checked ~ i.fa.fa-check-circle-o{
    color: #7AA3CC;    display: inline;
}
label:hover input[type="radio"] ~ i.fa {
color: #7AA3CC;
}

label input[type="checkbox"] ~ i.fa.fa-square-o{
    color: #c8c8c8;    display: inline;
}
label input[type="checkbox"] ~ i.fa.fa-check-square-o{
    display: none;
}
label input[type="checkbox"]:checked ~ i.fa.fa-square-o{
    display: none;
}
label input[type="checkbox"]:checked ~ i.fa.fa-check-square-o{
    color: #7AA3CC;    display: inline;
}
label:hover input[type="checkbox"] ~ i.fa {
color: #7AA3CC;
}

div[data-toggle="buttons"] label.active{
    color: #7AA3CC;
}

div[data-toggle="buttons"] label {
display: inline-block;
padding: 6px 12px;
margin-bottom: 0;
font-size: 14px;
font-weight: normal;
line-height: 2em;
text-align: left;
white-space: nowrap;
vertical-align: top;
cursor: pointer;
background-color: none;
border: 0px solid 
#c8c8c8;
border-radius: 3px;
color: #c8c8c8;
-webkit-user-select: none;
-moz-user-select: none;
-ms-user-select: none;
-o-user-select: none;
user-select: none;
}

div[data-toggle="buttons"] label:hover {
color: #7AA3CC;
}

div[data-toggle="buttons"] label:active, div[data-toggle="buttons"] label.active {
-webkit-box-shadow: none;
box-shadow: none;
}

        
        </style>
        
</head>
<body>