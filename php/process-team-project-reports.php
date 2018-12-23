<?php 
require '../php/session.php';
sec_session_start();

require '../autoloader.php';

$projects = new ProjectDetails();

$request_key = $_POST['project_status'];

if ( $request_key == "OpenProjects") {
    

$open_project_details = $projects->admin_open_projects_list( $_SESSION['admin_db_id'] );
 
 if( $open_project_details ) { 

echo '<div class="row">
<div class="col-lg-12">
<div class="main-box clearfix">
<header class="main-box-header clearfix">
<h2> Open Projects  </h2>
</header>



<div class="main-box-body clearfix">
<div class="table-responsive">
<div class="DTTT btn-group"><a class="btn btn-primary DTTT_button_copy" id="ToolTables_table-example_6"><span>Copy</span><div style="position: absolute; left: 0px; top: 0px; width: 57px; height: 30px; z-index: 99;"><embed id="ZeroClipboard_TableToolsMovie_5" src="/gcpm/swf/copy_csv_xls_pdf.swf" loop="false" menu="false" quality="best" bgcolor="#ffffff" width="57" height="30" name="ZeroClipboard_TableToolsMovie_5" align="middle" allowscriptaccess="always" allowfullscreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="id=5&amp;width=57&amp;height=30" wmode="transparent"></div></a><a class="btn btn-primary DTTT_button_csv" id="ToolTables_table-example_7"><span>CSV</span><div style="position: absolute; left: 0px; top: 0px; width: 49px; height: 30px; z-index: 99;"><embed id="ZeroClipboard_TableToolsMovie_6" src="/gcpm/swf/copy_csv_xls_pdf.swf" loop="false" menu="false" quality="best" bgcolor="#ffffff" width="49" height="30" name="ZeroClipboard_TableToolsMovie_6" align="middle" allowscriptaccess="always" allowfullscreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="id=6&amp;width=49&amp;height=30" wmode="transparent"></div></a><a class="btn btn-primary DTTT_button_xls" id="ToolTables_table-example_8"><span>Excel</span><div style="position: absolute; left: 0px; top: 0px; width: 57px; height: 30px; z-index: 99;"><embed id="ZeroClipboard_TableToolsMovie_7" src="/gcpm/swf/copy_csv_xls_pdf.swf" loop="false" menu="false" quality="best" bgcolor="#ffffff" width="57" height="30" name="ZeroClipboard_TableToolsMovie_7" align="middle" allowscriptaccess="always" allowfullscreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="id=7&amp;width=57&amp;height=30" wmode="transparent"></div></a><a class="btn btn-primary DTTT_button_pdf" id="ToolTables_table-example_9"><span>PDF</span><div style="position: absolute; left: 0px; top: 0px; width: 50px; height: 30px; z-index: 99;"><embed id="ZeroClipboard_TableToolsMovie_8" src="/gcpm/swf/copy_csv_xls_pdf.swf" loop="false" menu="false" quality="best" bgcolor="#ffffff" width="50" height="30" name="ZeroClipboard_TableToolsMovie_8" align="middle" allowscriptaccess="always" allowfullscreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="id=8&amp;width=50&amp;height=30" wmode="transparent"></div></a><a class="btn btn-primary DTTT_button_print" id="ToolTables_table-example_10" title="View print view"><span>Print</span></a></div><div id="table-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"><div class="dataTables_length" id="table-example_length"><label>Show <select name="table-example_length" aria-controls="table-example" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div><div class="DTTT btn-group"><a class="btn btn-primary DTTT_button_collection" id="ToolTables_table-example_0"><span><i class="fa fa-cloud-download"></i>&nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down"></i></span></a></div><div id="table-example_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="table-example"></label></div><div class="clearfix"></div><table id="table-example" class="table table-hover dataTable no-footer" role="grid">
<thead>
 <tr>															
            <th><span> PROJECT ID </span></th>
            <th><span> PROJECT NAME</span></th>
            <th><span> SERVICES </span></th>
            <th><span> CLIENTS </span></th>
            <th><span> START DATE </span></th>            
            <th><span> STATUS </span></th>	
        </tr>
</thead>
<tbody>'; 
?>


<?php 

foreach ($open_project_details as $open_project) {
 echo "
        <tr role='row' class='odd'>            
           <td><span>
            
           <a href='phase-team/id/".$open_project['project_id']."/project_cat_id/".$open_project['project_cat_id']."/com_id/".$open_project['company_id']."'>  ".$open_project['project_id']."
               </a> </span></td>
            <td><span> 
             <a href='phase-team/id/".$open_project['project_id']."/project_cat_id/".$open_project['project_cat_id']."/com_id/".$open_project['company_id']."'>  ".$open_project['project_name']."
                </span></td>
            <td><span> ".$open_project['project_category']." </span></td>
            <td><span> ".$open_project['company_name']." </span></td>
           <td><span> ".date('M j, Y', strtotime($open_project['project_start_date']))." </span></td>
           <td><span> $".$open_project['project_cost']." </span></td>";
           ?>
            
           <?php 
               if( $open_project['project_status'] == "open") { 
                  echo ' <td class="text-center"> <span class="label label-default">  '.$open_project['project_status'].' </span> </td> '; 
                } 
                
              else if( $open_project['project_status'] == "Begin") { 
                  echo ' <td class="text-center"> <span class="label label-primary">  '.$open_project['project_status'].' </span> </td> '; 
                } 
                              
}
            ?>

<?php 
echo '
 </tbody>
</table><div class="dataTables_paginate paging_simple_numbers" id="table-example_paginate"><ul class="pagination pull-right"><li class="paginate_button previous disabled" aria-controls="table-example" tabindex="0" id="table-example_previous"><a href="#"><i class="fa fa-chevron-left"></i></a></li><li class="paginate_button active" aria-controls="table-example" tabindex="0"><a href="#">1</a></li><li class="paginate_button " aria-controls="table-example" tabindex="0"><a href="#">2</a></li><li class="paginate_button next" aria-controls="table-example" tabindex="0" id="table-example_next"><a href="#"><i class="fa fa-chevron-right"></i></a></li></ul></div></div>
</div>
</div>
</div>
</div>
</div>';

} // if 
else {
    echo "Something went wrong";
}



 
} // if open project selected

    //  completed projects
    else if ( $request_key == "ClosedProjects") { // if ClosedP rojects selected 
        
        
        
$project_details = $projects->admin_closed_projects_list( $_SESSION['admin_db_id'] );
 
 if( $project_details ) { 

echo '<div class="row">
<div class="col-lg-12">
<div class="main-box clearfix">
<header class="main-box-header clearfix">
<h2> Closed Projects  </h2>
</header>



<div class="main-box-body clearfix">
<div class="table-responsive">
<div class="DTTT btn-group"><a class="btn btn-primary DTTT_button_copy" id="ToolTables_table-example_6"><span>Copy</span><div style="position: absolute; left: 0px; top: 0px; width: 57px; height: 30px; z-index: 99;"><embed id="ZeroClipboard_TableToolsMovie_5" src="/gcpm/swf/copy_csv_xls_pdf.swf" loop="false" menu="false" quality="best" bgcolor="#ffffff" width="57" height="30" name="ZeroClipboard_TableToolsMovie_5" align="middle" allowscriptaccess="always" allowfullscreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="id=5&amp;width=57&amp;height=30" wmode="transparent"></div></a><a class="btn btn-primary DTTT_button_csv" id="ToolTables_table-example_7"><span>CSV</span><div style="position: absolute; left: 0px; top: 0px; width: 49px; height: 30px; z-index: 99;"><embed id="ZeroClipboard_TableToolsMovie_6" src="/gcpm/swf/copy_csv_xls_pdf.swf" loop="false" menu="false" quality="best" bgcolor="#ffffff" width="49" height="30" name="ZeroClipboard_TableToolsMovie_6" align="middle" allowscriptaccess="always" allowfullscreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="id=6&amp;width=49&amp;height=30" wmode="transparent"></div></a><a class="btn btn-primary DTTT_button_xls" id="ToolTables_table-example_8"><span>Excel</span><div style="position: absolute; left: 0px; top: 0px; width: 57px; height: 30px; z-index: 99;"><embed id="ZeroClipboard_TableToolsMovie_7" src="/gcpm/swf/copy_csv_xls_pdf.swf" loop="false" menu="false" quality="best" bgcolor="#ffffff" width="57" height="30" name="ZeroClipboard_TableToolsMovie_7" align="middle" allowscriptaccess="always" allowfullscreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="id=7&amp;width=57&amp;height=30" wmode="transparent"></div></a><a class="btn btn-primary DTTT_button_pdf" id="ToolTables_table-example_9"><span>PDF</span><div style="position: absolute; left: 0px; top: 0px; width: 50px; height: 30px; z-index: 99;"><embed id="ZeroClipboard_TableToolsMovie_8" src="/gcpm/swf/copy_csv_xls_pdf.swf" loop="false" menu="false" quality="best" bgcolor="#ffffff" width="50" height="30" name="ZeroClipboard_TableToolsMovie_8" align="middle" allowscriptaccess="always" allowfullscreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="id=8&amp;width=50&amp;height=30" wmode="transparent"></div></a><a class="btn btn-primary DTTT_button_print" id="ToolTables_table-example_10" title="View print view"><span>Print</span></a></div><div id="table-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"><div class="dataTables_length" id="table-example_length"><label>Show <select name="table-example_length" aria-controls="table-example" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div><div class="DTTT btn-group"><a class="btn btn-primary DTTT_button_collection" id="ToolTables_table-example_0"><span><i class="fa fa-cloud-download"></i>&nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down"></i></span></a></div><div id="table-example_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="table-example"></label></div><div class="clearfix"></div><table id="table-example" class="table table-hover dataTable no-footer" role="grid">
<thead>
<tr>															
            <th><span> PROJECT ID </span></th>
            <th><span> PROJECT NAME</span></th>
            <th><span> SERVICES </span></th>
            <th><span> CLIENTS </span></th>
            <th><span> START DATE </span></th>            
            <th><span> STATUS </span></th>	
        </tr>
</thead>
<tbody>'; 
?>


<?php 

foreach ($project_details as $closed_project) {
 echo "
        <tr role='row' class='odd'>            
           <td><span>
                 <a href='phase-team/id/".$closed_project['project_id']."/project_cat_id/".$closed_project['project_cat_id']."/com_id/".$closed_project['company_id']."'>  ".$closed_project['project_id']."
                  
                        </a> 
               </span></td>
            <td><span> 
               <a href='phase-team/id/".$closed_project['project_id']."/project_cat_id/".$closed_project['project_cat_id']."/com_id/".$closed_project['company_id']."'>  ".$closed_project['project_name']." </a>
                    </span></td>
            <td><span> ".$closed_project['project_category']." </span></td>
            <td><span> ".$closed_project['company_name']." </span></td>
           <td><span> ".date('M j, Y', strtotime($closed_project['project_start_date']))." </span></td>
           "
         . "<td class='text-center'> <span class='label label-success'> ".$closed_project['project_status'].
            " </span> "
         . "<br> "
         . date('M j, Y', strtotime($closed_project['project_end_date']))
         . " </td> ";
                    
                                            
}
            ?>

<?php 
echo '
 </tbody>
</table><div class="dataTables_paginate paging_simple_numbers" id="table-example_paginate"><ul class="pagination pull-right"><li class="paginate_button previous disabled" aria-controls="table-example" tabindex="0" id="table-example_previous"><a href="#"><i class="fa fa-chevron-left"></i></a></li><li class="paginate_button active" aria-controls="table-example" tabindex="0"><a href="#">1</a></li><li class="paginate_button " aria-controls="table-example" tabindex="0"><a href="#">2</a></li><li class="paginate_button next" aria-controls="table-example" tabindex="0" id="table-example_next"><a href="#"><i class="fa fa-chevron-right"></i></a></li></ul></div></div>
</div>
</div>
</div>
</div>
</div>';

} // if 





else {
    echo "Something went wrong";
}


        
        
    }
    
    // open Projects
    else if ( $request_key == "RuningProjects") { // if ClosedP rojects selected 
        
        
        
$project_details = $projects->admin_runing_projects_list( $_SESSION['admin_db_id'] );
 
 if( $project_details ) { 

echo '<div class="row">
<div class="col-lg-12">
<div class="main-box clearfix">
<header class="main-box-header clearfix">
<h2> open Projects  </h2>
</header>



<div class="main-box-body clearfix">
<div class="table-responsive">
<div class="DTTT btn-group"><a class="btn btn-primary DTTT_button_copy" id="ToolTables_table-example_6"><span>Copy</span><div style="position: absolute; left: 0px; top: 0px; width: 57px; height: 30px; z-index: 99;"><embed id="ZeroClipboard_TableToolsMovie_5" src="/gcpm/swf/copy_csv_xls_pdf.swf" loop="false" menu="false" quality="best" bgcolor="#ffffff" width="57" height="30" name="ZeroClipboard_TableToolsMovie_5" align="middle" allowscriptaccess="always" allowfullscreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="id=5&amp;width=57&amp;height=30" wmode="transparent"></div></a><a class="btn btn-primary DTTT_button_csv" id="ToolTables_table-example_7"><span>CSV</span><div style="position: absolute; left: 0px; top: 0px; width: 49px; height: 30px; z-index: 99;"><embed id="ZeroClipboard_TableToolsMovie_6" src="/gcpm/swf/copy_csv_xls_pdf.swf" loop="false" menu="false" quality="best" bgcolor="#ffffff" width="49" height="30" name="ZeroClipboard_TableToolsMovie_6" align="middle" allowscriptaccess="always" allowfullscreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="id=6&amp;width=49&amp;height=30" wmode="transparent"></div></a><a class="btn btn-primary DTTT_button_xls" id="ToolTables_table-example_8"><span>Excel</span><div style="position: absolute; left: 0px; top: 0px; width: 57px; height: 30px; z-index: 99;"><embed id="ZeroClipboard_TableToolsMovie_7" src="/gcpm/swf/copy_csv_xls_pdf.swf" loop="false" menu="false" quality="best" bgcolor="#ffffff" width="57" height="30" name="ZeroClipboard_TableToolsMovie_7" align="middle" allowscriptaccess="always" allowfullscreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="id=7&amp;width=57&amp;height=30" wmode="transparent"></div></a><a class="btn btn-primary DTTT_button_pdf" id="ToolTables_table-example_9"><span>PDF</span><div style="position: absolute; left: 0px; top: 0px; width: 50px; height: 30px; z-index: 99;"><embed id="ZeroClipboard_TableToolsMovie_8"src="/gcpm/swf/copy_csv_xls_pdf.swf" loop="false" menu="false" quality="best" bgcolor="#ffffff" width="50" height="30" name="ZeroClipboard_TableToolsMovie_8" align="middle" allowscriptaccess="always" allowfullscreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="id=8&amp;width=50&amp;height=30" wmode="transparent"></div></a><a class="btn btn-primary DTTT_button_print" id="ToolTables_table-example_10" title="View print view"><span>Print</span></a></div><div id="table-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"><div class="dataTables_length" id="table-example_length"><label>Show <select name="table-example_length" aria-controls="table-example" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div><div class="DTTT btn-group"><a class="btn btn-primary DTTT_button_collection" id="ToolTables_table-example_0"><span><i class="fa fa-cloud-download"></i>&nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down"></i></span></a></div><div id="table-example_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="table-example"></label></div><div class="clearfix"></div><table id="table-example" class="table table-hover dataTable no-footer" role="grid">
<thead>
<tr>															
            <th><span> PROJECT ID </span></th>
            <th><span> PROJECT NAME</span></th>
            <th><span> SERVICES </span></th>
            <th><span> CLIENTS </span></th>
            <th><span> START DATE </span></th>            
            <th><span> STATUS </span></th>	
        </tr>
</thead>
<tbody>'; 
?>


<?php 

foreach ($project_details as $closed_project) {
 echo "
        <tr role='row' class='odd'>            
           <td><span> <a href='phase-team/id/".$closed_project['project_id']."/project_cat_id/".$closed_project['project_cat_id']."/com_id/".$closed_project['company_id']."'>  ".$closed_project['project_id']." </a> </span></td>
            <td><span><a href='phase-team/id/".$closed_project['project_id']."/project_cat_id/".$closed_project['project_cat_id']."/com_id/".$closed_project['company_id']."'>  ".$closed_project['project_name']." </a> </span></td>
            <td><span> ".$closed_project['project_category']." </span></td>
            <td><span> ".$closed_project['company_name']." </span></td>
           <td><span> ".date('M j, Y', strtotime($closed_project['project_start_date']))." </span></td>
           "
         . "<td class='text-center'> <span class='label label-success'> ".$closed_project['project_status'].
            " </span> "        
         
         . " </td> ";
                    
                                            
}
            ?>

<?php 
echo '
 </tbody>
</table><div class="dataTables_paginate paging_simple_numbers" id="table-example_paginate"><ul class="pagination pull-right"><li class="paginate_button previous disabled" aria-controls="table-example" tabindex="0" id="table-example_previous"><a href="#"><i class="fa fa-chevron-left"></i></a></li><li class="paginate_button active" aria-controls="table-example" tabindex="0"><a href="#">1</a></li><li class="paginate_button " aria-controls="table-example" tabindex="0"><a href="#">2</a></li><li class="paginate_button next" aria-controls="table-example" tabindex="0" id="table-example_next"><a href="#"><i class="fa fa-chevron-right"></i></a></li></ul></div></div>
</div>
</div>
</div>
</div>
</div>';

} // if 





else {
    echo "Something went wrong";
}


        
        
    }
    
    // Beginig projects
    else if ( $request_key == "BeginingProjects") { // if ClosedP rojects selected 
        
        
        
$project_details = $projects->admin_begining_projects_list( $_SESSION['admin_db_id'] );
 
 if( $project_details ) { 

echo '<div class="row">
<div class="col-lg-12">
<div class="main-box clearfix">
<header class="main-box-header clearfix">
<h2> Beginning Projects  </h2>
</header>



<div class="main-box-body clearfix">
<div class="table-responsive">
<div class="DTTT btn-group"><a class="btn btn-primary DTTT_button_copy" id="ToolTables_table-example_6"><span>Copy</span><div style="position: absolute; left: 0px; top: 0px; width: 57px; height: 30px; z-index: 99;"><embed id="ZeroClipboard_TableToolsMovie_5" src="/gcpm/swf/copy_csv_xls_pdf.swf" loop="false" menu="false" quality="best" bgcolor="#ffffff" width="57" height="30" name="ZeroClipboard_TableToolsMovie_5" align="middle" allowscriptaccess="always" allowfullscreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="id=5&amp;width=57&amp;height=30" wmode="transparent"></div></a><a class="btn btn-primary DTTT_button_csv" id="ToolTables_table-example_7"><span>CSV</span><div style="position: absolute; left: 0px; top: 0px; width: 49px; height: 30px; z-index: 99;"><embed id="ZeroClipboard_TableToolsMovie_6" src="/gcpm/swf/copy_csv_xls_pdf.swf" loop="false" menu="false" quality="best" bgcolor="#ffffff" width="49" height="30" name="ZeroClipboard_TableToolsMovie_6" align="middle" allowscriptaccess="always" allowfullscreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="id=6&amp;width=49&amp;height=30" wmode="transparent"></div></a><a class="btn btn-primary DTTT_button_xls" id="ToolTables_table-example_8"><span>Excel</span><div style="position: absolute; left: 0px; top: 0px; width: 57px; height: 30px; z-index: 99;"><embed id="ZeroClipboard_TableToolsMovie_7" src="/gcpm/swf/copy_csv_xls_pdf.swf" loop="false" menu="false" quality="best" bgcolor="#ffffff" width="57" height="30" name="ZeroClipboard_TableToolsMovie_7" align="middle" allowscriptaccess="always" allowfullscreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="id=7&amp;width=57&amp;height=30" wmode="transparent"></div></a><a class="btn btn-primary DTTT_button_pdf" id="ToolTables_table-example_9"><span>PDF</span><div style="position: absolute; left: 0px; top: 0px; width: 50px; height: 30px; z-index: 99;"><embed id="ZeroClipboard_TableToolsMovie_8" src="/gcpm/swf/copy_csv_xls_pdf.swf" loop="false" menu="false" quality="best" bgcolor="#ffffff" width="50" height="30" name="ZeroClipboard_TableToolsMovie_8" align="middle" allowscriptaccess="always" allowfullscreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="id=8&amp;width=50&amp;height=30" wmode="transparent"></div></a><a class="btn btn-primary DTTT_button_print" id="ToolTables_table-example_10" title="View print view"><span>Print</span></a></div><div id="table-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"><div class="dataTables_length" id="table-example_length"><label>Show <select name="table-example_length" aria-controls="table-example" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div><div class="DTTT btn-group"><a class="btn btn-primary DTTT_button_collection" id="ToolTables_table-example_0"><span><i class="fa fa-cloud-download"></i>&nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down"></i></span></a></div><div id="table-example_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="table-example"></label></div><div class="clearfix"></div><table id="table-example" class="table table-hover dataTable no-footer" role="grid">
<thead>
 <tr>															
            <th><span> PROJECT ID </span></th>
            <th><span> PROJECT NAME</span></th>
            <th><span> SERVICES </span></th>
            <th><span> CLIENTS </span></th>
            <th><span> START DATE </span></th>            
            <th><span> STATUS </span></th>	
        </tr>
</thead>
<tbody>'; 
?>


<?php 

foreach ($project_details as $closed_project) {
  echo "
        <tr role='row' class='odd'>            
           <td><span> <a href='phase-team/id/".$closed_project['project_id']."/project_cat_id/".$closed_project['project_cat_id']."/com_id/".$closed_project['company_id']."'>  ".$closed_project['project_id']." </a> </span></td>
            <td><span> <a href='phase-team/id/".$closed_project['project_id']."/project_cat_id/".$closed_project['project_cat_id']."/com_id/".$closed_project['company_id']."'>  ".$closed_project['project_name']."</a> </span></td>
            <td><span> ".$closed_project['project_category']." </span></td>
            <td><span> ".$closed_project['company_name']." </span></td>
           <td><span> ".date('M j, Y', strtotime($closed_project['project_start_date']))." </span></td>
            "
         . "<td class='text-center'> <span class='label label-success'> ".$closed_project['project_status'].
            " </span>"                
         . " </td> ";
                    
                                            
}
            ?>

<?php 
echo '
 </tbody>
</table><div class="dataTables_paginate paging_simple_numbers" id="table-example_paginate"><ul class="pagination pull-right"><li class="paginate_button previous disabled" aria-controls="table-example" tabindex="0" id="table-example_previous"><a href="#"><i class="fa fa-chevron-left"></i></a></li><li class="paginate_button active" aria-controls="table-example" tabindex="0"><a href="#">1</a></li><li class="paginate_button " aria-controls="table-example" tabindex="0"><a href="#">2</a></li><li class="paginate_button next" aria-controls="table-example" tabindex="0" id="table-example_next"><a href="#"><i class="fa fa-chevron-right"></i></a></li></ul></div></div>
</div>
</div>
</div>
</div>
</div>';

} // if 





else {
    echo "Something went wrong";
}


        
        
    }
    
    // All projects
    else if ( $request_key == "AllProjects") { // if ClosedP rojects selected 
        
        
        
$project_details = $projects->admin_all_projects_list( $_SESSION['admin_db_id'] );
 
 if( $project_details ) { 

echo '<div class="row">
<div class="col-lg-12">
<div class="main-box clearfix">
<header class="main-box-header clearfix">
<h2> All Projects  </h2>
</header>



<div class="main-box-body clearfix">
<div class="table-responsive">
<div class="DTTT btn-group"><a class="btn btn-primary DTTT_button_copy" id="ToolTables_table-example_6"><span>Copy</span><div style="position: absolute; left: 0px; top: 0px; width: 57px; height: 30px; z-index: 99;"><embed id="ZeroClipboard_TableToolsMovie_5" src="/gcpm/swf/copy_csv_xls_pdf.swf" loop="false" menu="false" quality="best" bgcolor="#ffffff" width="57" height="30" name="ZeroClipboard_TableToolsMovie_5" align="middle" allowscriptaccess="always" allowfullscreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="id=5&amp;width=57&amp;height=30" wmode="transparent"></div></a><a class="btn btn-primary DTTT_button_csv" id="ToolTables_table-example_7"><span>CSV</span><div style="position: absolute; left: 0px; top: 0px; width: 49px; height: 30px; z-index: 99;"><embed id="ZeroClipboard_TableToolsMovie_6" src="/gcpm/swf/copy_csv_xls_pdf.swf" loop="false" menu="false" quality="best" bgcolor="#ffffff" width="49" height="30" name="ZeroClipboard_TableToolsMovie_6" align="middle" allowscriptaccess="always" allowfullscreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="id=6&amp;width=49&amp;height=30" wmode="transparent"></div></a><a class="btn btn-primary DTTT_button_xls" id="ToolTables_table-example_8"><span>Excel</span><div style="position: absolute; left: 0px; top: 0px; width: 57px; height: 30px; z-index: 99;"><embed id="ZeroClipboard_TableToolsMovie_7" src="/gcpm/swf/copy_csv_xls_pdf.swf" loop="false" menu="false" quality="best" bgcolor="#ffffff" width="57" height="30" name="ZeroClipboard_TableToolsMovie_7" align="middle" allowscriptaccess="always" allowfullscreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="id=7&amp;width=57&amp;height=30" wmode="transparent"></div></a><a class="btn btn-primary DTTT_button_pdf" id="ToolTables_table-example_9"><span>PDF</span><div style="position: absolute; left: 0px; top: 0px; width: 50px; height: 30px; z-index: 99;"><embed id="ZeroClipboard_TableToolsMovie_8" src="/gcpm/swf/copy_csv_xls_pdf.swf" loop="false" menu="false" quality="best" bgcolor="#ffffff" width="50" height="30" name="ZeroClipboard_TableToolsMovie_8" align="middle" allowscriptaccess="always" allowfullscreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="id=8&amp;width=50&amp;height=30" wmode="transparent"></div></a><a class="btn btn-primary DTTT_button_print" id="ToolTables_table-example_10" title="View print view"><span>Print</span></a></div><div id="table-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"><div class="dataTables_length" id="table-example_length"><label>Show <select name="table-example_length" aria-controls="table-example" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div><div class="DTTT btn-group"><a class="btn btn-primary DTTT_button_collection" id="ToolTables_table-example_0"><span><i class="fa fa-cloud-download"></i>&nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down"></i></span></a></div><div id="table-example_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="table-example"></label></div><div class="clearfix"></div><table id="table-example" class="table table-hover dataTable no-footer" role="grid">
<thead>
 <tr>															
            <th><span> PROJECT ID </span></th>
            <th><span> PROJECT NAME</span></th>
            <th><span> SERVICES </span></th>
            <th><span> CLIENTS </span></th>
            <th><span> START DATE </span></th>            
            <th><span> STATUS </span></th>	
        </tr>
</thead>
<tbody>'; 
?>


<?php 

foreach ($project_details as $closed_project) {
 echo "
        <tr role='row' class='odd'>            
           <td><span> <a href='phase-team/id/".$closed_project['project_id']."/project_cat_id/".$closed_project['project_cat_id']."/com_id/".$closed_project['company_id']."'>  ".$closed_project['project_id']." </a> </span></td>
            <td><span> <a href='phase-team/id/".$closed_project['project_id']."/project_cat_id/".$closed_project['project_cat_id']."/com_id/".$closed_project['company_id']."'>  ".$closed_project['project_name']."</a> </span></td>
            <td><span> ".$closed_project['project_category']." </span></td>
            <td><span> ".$closed_project['company_name']." </span></td>
           <td><span> ".date('M j, Y', strtotime($closed_project['project_start_date']))." </span></td>
            "
         . "<td class='text-center'> <span class='label label-success'> ".$closed_project['project_status'].
            " </span>"                
         . " </td> ";
                    
                                            
}
            ?>

<?php 
echo '
 </tbody>
</table><div class="dataTables_paginate paging_simple_numbers" id="table-example_paginate"><ul class="pagination pull-right"><li class="paginate_button previous disabled" aria-controls="table-example" tabindex="0" id="table-example_previous"><a href="#"><i class="fa fa-chevron-left"></i></a></li><li class="paginate_button active" aria-controls="table-example" tabindex="0"><a href="#">1</a></li><li class="paginate_button " aria-controls="table-example" tabindex="0"><a href="#">2</a></li><li class="paginate_button next" aria-controls="table-example" tabindex="0" id="table-example_next"><a href="#"><i class="fa fa-chevron-right"></i></a></li></ul></div></div>
</div>
</div>
</div>
</div>
</div>';

} // if 





else {
    echo "Something went wrong";
}


        
        
    }
    
    // 
    else {
        echo "Sorry! something went wrong";
    }