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

<body id="login-page-full">
<div id="login-full-wrapper">
<div class="container">
<div class="row">
<div class="col-xs-12">
<div id="login-box">
<div id="login-box-holder">
<div class="row">
<div class="col-xs-12">
<header id="login-header">
<div id="login-logo">
 
<img src="img/admins/gc-logo-white-for-gcpm.png" alt=""/>
</div>

</header>
<div id="login-box-inner">
<span class="text-center log-ack">  </span>
<form class="frm-login" role="form" action="" autocomplete="off">
<div class="input-group">
        <span class="input-group-addon"><i class="fa fa-user"></i></span>
        <input class="form-control" name="user_id" id="user_id" type="text" placeholder="Email address">
</div>
<div class="input-group">
        <span class="input-group-addon"><i class="fa fa-key"></i></span>
        <input type="password" class="form-control" name="user_pass" id="user_pass" placeholder="Password">
</div>
<div id="remember-me-wrapper">
        <div class="row">
                <div class="col-xs-6">
                        <div class="checkbox-nice">
                                <input type="checkbox" id="remember-me" checked="checked" />
                                <label for="remember-me">
                                        Remember me
                                </label>
                        </div>
                </div>
                <a href="forgot-password-full.html" id="login-forget-link" class="col-xs-6">
                        Forgot password?
                </a>
        </div>
</div>
<div class="row">
        <div class="col-xs-12">
            <button type="button" class="btn btn-success col-xs-12" id="btn-user-login">Login</button>
        </div>
</div>


</form>
</div>
</div>
</div>
</div>

<div id="login-box-footer">
<div class="row">
<div class="col-xs-12">
Do not have an account? 
<a href="registration-full.html">
Register now
</a>
</div>
</div>
</div>
</div>
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
<script src="js/demo-skin-changer.js"></script> <!-- only for demo -->

<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.nanoscroller.min.js"></script>

<script src="js/demo.js"></script> <!-- only for demo -->

<!-- this page specific scripts -->


<!-- theme scripts -->
<script src="js/scripts.js"></script>

<!-- this page specific inline scripts -->



<script src="jquey/user-login.js"> </script>     
</body>
</html>