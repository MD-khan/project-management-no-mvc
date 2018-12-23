<?php
require '../autoloader.php';
 
if ( isset($_POST['phase_id']) ) {
   
    $phase_id = intval($_POST['phase_id'] ); 
    
    $obj = new ProjectTypes();
    $categories = $obj->show_question_categories( $phase_id );
    
    if( $categories ) {
?>
<div class="form-group">
<label> <strong> Select a Question Category </strong> </label>  
<select class="form-control"  name="question_category_id" id="question_category_id" >
       <option value=""> Select a Category </option> 
       <?php foreach ( $categories as $key => $category ) { ?>
        <option value="<?=$category['qsn_cat_id']?>"> <?=$category['qsn_categories']?> </option> 
       <?php } ?>
</select>
<span class="gray small Italic"> *You should select a category which is listed on this page </span>
</div>
   
<?php
    } // if categories 
}