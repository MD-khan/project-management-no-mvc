<?php 
include 'header.php';

global $request_array;

if($request_array[1] == 'id')
{   
    // $_SESSION['project_cat_db_id'] =$request_array[2];
    
    $project_id = intval($request_array[2]);
    $project_cat_id = intval($request_array[4]);
    
    //var_dump($project_cat_id);
   }
?>
	<div id="theme-wrapper">
		<?php include_once 'template-parts/client-top-nav.php'; ?>       
		<div id="page-wrapper" class="container">
			<div class="row">
				 <?php require 'template-parts/client-left-nav.php'; ?>
				<div id="content-wrapper">
					<div class="row">
						<div class="col-lg-12">
<div class="row">
    <div class="col-lg-12">
<div id="content-header" class="clearfix">
    <div class="pull-left">
<ol class="breadcrumb">
    <li><a href="/gcpm/client-dashboard">Home</a></li>
<li class="active"><span>Dashboard</span></li>
</ol>

<h1>Dashboard</h1>
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
                                                    
                                                    
 <div class="row">
     <div class="col-lg-12">
        <div class="main-box clearfix" style="min-height: 820px;">
          <header class="main-box-header clearfix">

        <?php 
        $obj_project = new ProjectDetails();
        $project_info = $obj_project->get_project_name( $project_id )
        ?>

            <h2> Project Status  </h2>
            <label> Project Name: <strong> <?=$project_info['project_name']?> </strong> </label> <br>
            <label> Start Date: <strong> 
                   <?php 
                   echo  date('F d, Y', strtotime($project_info['project_start_date']) );
                   ?>


                </strong> </label>
            </header>

    <div class="main-box-body clearfix">

        <div id="myWizard" class="wizard">
                <div class="wizard-inner">
                        <ul class="steps">
                            
                                <li data-target="#step1" class="active"> <span class="badge badge-primary"> 1 </span> Specs and Planing  <span class="chevron"></span></li>
                                <li data-target="#step2"><span class="badge">2</span>  Design   <span class="chevron"></span></li>
                                <li data-target="#step3"><span class="badge">3</span>  Development  <span class="chevron"></span></li>
                                <li data-target="#step4"><span class="badge">4</span>  Content Integration  <span class="chevron"></span></li>
                                <li data-target="#step5"><span class="badge">5</span>  Mobile Friendly  <span class="chevron"></span></li>
                                <li data-target="#step6"><span class="badge">6</span>   QA Test    <span class="chevron"></span></li>
                                <li data-target="#step7"><span class="badge">7</span>   Training    <span class="chevron"></span></li>
                                <li data-target="#step8"><span class="badge">8</span>   Launch   <span class="chevron"></span></li>
                                <li data-target="#step9"><span class="badge">9</span>   Post Launch    <span class="chevron"></span></li>
                        </ul>

                        <div class="actions">
                                <button type="button" class="btn btn-default btn-mini btn-prev"> <i class="icon-arrow-left"></i>Prev</button>
                                <button type="button" class="btn btn-success btn-mini btn-next" data-last="Finish">Next<i class="icon-arrow-right"></i></button>
                        </div>
                </div>
               
            
            
         <?php  
         $question = new ProjectQuestions(); 
         
         // For fethc question categories
         $question_categories = $question->fetch_quetion_categories( $_SESSION['client_db_id'], $project_cat_id);
         ?>
    
           
<div class="step-content">


<div class="step-pane active" id="step1">
<br/>


<h1>  Specs and Planing </h1>	

 
<?php 
// check if clients answered all the questions 
$obj_qsns = new ClientAnswer();
 $ans = $obj_qsns->fetch_quetions_show_answer( $project_id );
 
   if ( !$ans) { 
    ?>     
   
                                
<div class="container">
  
<div class="row">
<div class="col-lg-12">
        <div class="main-box clearfix">
            <?php  if ( $question_categories)  { ?>
            <header class="main-box-header clearfix">
            <h2> Things we need for your website </h2>
            <span id="acl-speck"> </span>
        </header>

           
    <div class="main-box-body clearfix">
    
  <form enctype="multipart/form-data" name="frm-phase-planing" id="frm-phase-planing" method="post">
   
<div class="panel-group accordion" id="accordion">
        
    
    <?php 
        $dataTarget = 0;
        foreach( $question_categories as $question_category )
        
        { 
      ?>
     
    <div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title">
<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion"  href="<?php echo"#".$dataTarget ?>">
   <?=$question_category['qsn_category']?>  &nbsp; &nbsp;  <small> (Click to collapse ) </small> 
    </a>
</h4>
       <input type="hidden" name="qsn_categories[]" value="<?=$question_category['qsn_cat_id']?>">
        <input type="hidden" name="phase_category" value="<?=$question_category['qsn_phase_id']?>">
        <input type="hidden" name="project_cat_id" value="<?=$project_cat_id?>" >
        <input type="hidden" name="project_id" value="<?=$project_id?>" >
</div>

<div id="<?=$dataTarget?>" class="panel-collapse collapse" style="height: 2px;">

    <div class="panel-body">

<?php 

        $specific_questions = $question->fetch_qestions_by_qsn_cat_id( $_SESSION['client_db_id'], $project_cat_id, $question_category['qsn_cat_id'] );
        
        foreach ( $specific_questions as $index => $specific_question ) { 
        if( $specific_question['ans_types'] == "Input Box") { 

?>

<div class="form-group">
        <label for="inputVAL"> <strong> <?php echo $specific_question['questions'] ; ?>  </strong> </label>
          <input type="hidden" name="project_qsn_id[]" value="<?=$specific_question['project_qsn_id']?>">
         <input type="text" class="form-control"  name="InputValues[<?=$specific_question['project_qsn_id']?>]" placeholder="<?=$specific_question['questions']?>">
</div> <!-- ./form-group -->   


<?php }  // if anstype input   ?>

 <?php
 if( $specific_question['ans_types'] == "Check Box") {
        $input_values = $specific_question['field_values'];
        $opt_values = explode(",",  $input_values );
        $count = sizeof($opt_values);

        ?>

<div class="form-group">


      <label for="<?=$specific_question['questions']?>"> <strong> <?php echo $specific_question['questions'] ; ?>  </strong> </label>
        <input type="hidden" name="project_qsn_id[]" value="<?=$specific_question['project_qsn_id']?>">
      <div class="row">                                           
            <?php 
                for ( $i=0; $i<$count; $i++ ) {
            ?>
             <div class="col-sm-12"> 
                 <input type="checkbox" name="check_values[<?=$specific_question['project_qsn_id']?>][]"  value="<?=$opt_values[$i]?>">    <?=strtoupper($opt_values[$i])?>

             </div> 
                <?php } ?>                                

      </div> <!-- ./row --> 


</div>  <!-- ./form-group -->  

<?php }  // if Check Box  ?>


<?php
if( $specific_question['ans_types'] == "Radio Button") {
$input_values = $specific_question['field_values'];
$opt_values = explode(",",  $input_values );                                         
$count = sizeof($opt_values);

?>
<div class="form-group">
      <label for="<?=$specific_question['questions']?>"> <strong> <?php echo $specific_question['questions'] ; ?>  </strong> </label>
        <input type="hidden" name="project_qsn_id[]" value="<?=$specific_question['project_qsn_id']?>">
          <div class="row"> 
          <?php 
                for ( $i=0; $i<$count; $i++ ) {
            ?>
                <div class="col-sm-12"> 
                    <input type="radio" name="radio_fields[<?=$specific_question['project_qsn_id']?>]<?=$specific_question['input_field_name']?>" value="<?=$opt_values[$i]?>">   <?=strtoupper($opt_values[$i])?>
                 </div> 
          <?php } ?>                                

         </div> <!-- ./row --> 


    </div>  <!-- ./form-group -->   

<?php }  // if anstype Radio Button  ?>


<?php
if( $specific_question['ans_types'] == "File Upload") { ?>
<div class="form-group">
             <label for="<?=$specific_question['questions']?>"> <strong> <?php echo $specific_question['questions'] ; ?>  </strong> </label>
               <input type="hidden" name="project_qsn_id[]" value="<?=$specific_question['project_qsn_id']?>">
            <input type="file" class="form-control"  name="main_file_upload[<?=$specific_question['project_qsn_id']?>]" > 
    </div> <!-- ./form-group --> 

<?php }  // if anstype File Upload"  ?>

<?php 
// if has sub0qsn
if ($specific_question['sub_questions']) { ?>

    <?php  if( $specific_question['sub_ans_type'] == "Input Box") { ?>
        <div class="form-group">
                    <label for="sub-input"> <strong> <?php echo $specific_question['sub_questions'] ; ?>  </strong> </label>  
                   
                    <input type="text" class="form-control"  name="SubInputValues[<?=$specific_question['project_qsn_id']?>]" placeholder="<?=$specific_question['sub_questions']?>">
         </div> <!-- ./form-group -->   
    <?php } // sub-qsn type input box ?>




   <?php  if( $specific_question['sub_ans_type'] == "Check Box") {
            $sub_input_values = $specific_question['sub_field_values'];
            $sub_opt_values = explode(",",  $sub_input_values );
            $sub_count = sizeof($sub_opt_values);
         ?>
      <div class="form-group">
      <label for="<?=$specific_question['sub_questions']?>"> <strong> <?php echo $specific_question['sub_questions'] ; ?>  </strong> </label>
     
           <div class="row"> 
            <?php 
                for ( $i=0; $i<$sub_count; $i++ ) {
            ?>
                <div class="col-sm-12"> 
                    <input type="checkbox" name="sub_check_values[<?=$specific_question['project_qsn_id']?>][]"  value="<?=$sub_opt_values[$i]?>">    <?=strtoupper($sub_opt_values[$i])?>
                </div> 
                <?php } ?>                                

             </div> <!-- ./row --> 


    </div>  <!-- ./form-group -->     
    <?php } // sub-qsn type Check Box ?>



<?php
if( $specific_question['sub_ans_type'] == "Radio Button") {
            $sub_input_values = $specific_question['sub_field_values'];
            $sub_opt_values = explode(",",  $sub_input_values );
            $sub_count = sizeof($sub_opt_values);

?>
<div class="form-group">
    
      <label for="<?=$specific_question['sub_questions']?>"> <strong> <?php echo $specific_question['sub_questions'] ; ?>  </strong> </label>
       
           <div class="row"> 
            <?php 
                for ( $i=0; $i<$sub_count; $i++ ) {
            ?>
          <div class="col-sm-12"> 
              <input type="radio" name="sub_radio_values[<?=$specific_question['project_qsn_id']?>]" value="<?=$sub_opt_values[$i]?>">   <?=strtoupper($sub_opt_values[$i])?>

          </div> 
                <?php } ?>                                

      </div> <!-- ./row --> 


</div>  <!-- ./form-group -->   

<?php }  // if anstype Radio Button  ?>


<?php
if( $specific_question['sub_ans_type'] == "File Upload") { ?>
<div class="form-group">

<label for="<?=$specific_question['sub_questions']?>"> <strong> <?php echo $specific_question['sub_questions'] ; ?>  </strong> </label>
    
<input type="file" class="form-control"  name="sub_file_upload[<?=$specific_question['project_qsn_id']?>]"  > 
    </div> <!-- ./form-group --> 

<?php }  // if anstype File Upload"  ?>




<?php } // if has sub-qsn ?>




<?php } //foreach  ?>

</div>
</div>
    
    </div>  <!-- ./panel -->
    
       <?php
        $dataTarget++;
            }
       ?>       
     
    

     <?php } else { ?>
    <h1> No Project requirements are  being assigned yet  </h1>
     <?php } ?>
    </div> <!-- ./accordion -->
    <button type="submit" class="btn btn-success" id="btn_submit_planing_phase"> Submit  </button>
    
   </form>   
        
    </div> <!-- ./main-box-body -->
</div>
</div>

</div>

       
<?php 

 } else { ?>
 
    <h4> Thank you for answering the questions </h4>
    <?php 
     // get admin feedback
      $feed = new ClientAnswer();
      $result = $feed->fetch_admin_feedback($project_id);
    ?>
    <h1>
        <?php 
        if( $result['feedback'] == "no" ) { ?>
            Status:  Pending
       </h1>
    
        <?php 
        }  if( $result['feedback'] == "yes" ) { ?>
    <h2> Status:  Approved</h2>
    <?php
        }
        ?>
        
         
   
<div class="table-responsive">
<table class="table table-bordered">
    <?php 
        $obj_qsns = new ClientAnswer();
        $ans = $obj_qsns->fetch_quetions_show_answer( $project_id );
        
        if( $ans ) {      
    ?>
    <thead>
        <tr>
            <th><span> Main Questions </span></th>
            <th><span>  Main Answers  </span></th>
            <th><span> Sub Questions </span></th>
            <th><span> Sub Answers  </span></th>
              <th><span> STATUS  </span></th>
        </tr>
    </thead>


<tbody>
    
    <?php 
    foreach ( $ans as $key => $value ) {
    ?>
    <tr>
        <td>
           
          <?=$value['questions'] ?  ucfirst($value['questions']) : "N/A"?>
        </td>        
       
        <td>
             <?=ucfirst($value['main_ans'])?>
        </td>
        
        <td>
             <?=$value['sub_questions'] ? ucfirst($value['sub_questions']): "N/A"?>
        </td>        
       
        <td>
           <?php
            $patern = preg_match ( "/^.*\.(jpg|jpeg|png|gif)$/i", $value['sub_ans']); 
             if( $patern ) {
                 $img_path = str_replace("..","/gcpm", $value['sub_ans']);                
               ?>
            <a href="<?=$img_path?>"> 
             <img src="<?=$img_path?>" alt="" width="50" height="50"> 
              </a>
            <?php
             } 
             echo $value['sub_ans'];
             ?>
            
            
        </td>
        
        <td>
             Active 
        </td>

    </tr>
     <?php 
    } //foreach
     ?>

</tbody>
     </table>
            <!-- 
            <button class="btn btn-success"> Send for Approval  </button>  
            -->
    <?php 
        } else { ?>
   <h2> Nothing found ! </h2>
        <?php } ?>
</div>
 <?php
 }
?>
                        </div> <!-- ./step 1 -->

                </div>
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
	
        <!-- widgets -->
	<script src="/gcpm/js/wizard.js"></script>
	<script src="/gcpm/js/jquery.maskedinput.min.js"></script> 
        
        
        <script src="/gcpm/jquey/clinet-submit-phases.js"></script>
         
              
        
	<!-- theme scripts -->
	<script src="/gcpm/js/scripts.js"></script>
	<script src="/gcpm/js/pace.min.js"></script>
        
        
        
        
	
        
        <!-- this page specific inline scripts -->
	<script>
	$(document).ready(function() {
            
             
             
		$(function () {
		$('#myWizard').wizard();
		
		//masked inputs
		$("#maskedDate").mask("99/99/9999");
		$("#maskedPhone").mask("(999) 999-9999");
		$("#maskedPhoneExt").mask("(999) 999-9999? x99999");
	});
	   
           
          
           
	});
	</script>
	
</body>
</html>

