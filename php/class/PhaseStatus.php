<?php
require_once 'Dbconnection.php';  
class PhaseStatus {
    
    private $db;
    
    private $phase_id, $project_id;
    private $id = null;
    public $total_questions, $total_approved, $no_of_aprv_due, $approved, $approval_date;


    //Construction
    public function __construct() {
        $this->db = new Dbconnection();
        $this->db = $this->db->dbCon();
    }
    
    
    public function getPhaseProperty( $data ){
        
        $this->project_id = $data['project_id'];
        $this->phase_id = $data['phase_id'];
        $this->total_questions = $data['total_questions'];         
        $this->approved      = $data['is_approve']; 
        $this->approval_date = $data['approval_date'];
    }
    
    public function setTotalQuestions() {        
        
        //Check if values already inserted
        $show = $this->show_total_questions_for_a_phase( $this->project_id, $this->phase_id );
        
        if (  !$show  ) { 
         //insert
            $statement = $this->db->prepare( "INSERT INTO phase_status ( id, phase_id, project_id, total_questions, approved, approved_date, date ) "
                                             . "VALUES(?, ?, ?, ?, ?, ?, ? ) " );

            $statement->bindParam(1,  $this->id);
            $statement->bindParam(2,  $this->phase_id );
            $statement->bindParam(3,  $this->project_id );
            $statement->bindParam(4,  $this->total_questions );        
            $statement->bindParam(5,  $this->approved );
            $statement->bindParam(6,  $this->approval_date );
            $statement->bindParam(7,  $reg_time);

            $result = $statement->execute() ? true : false;
        
        } else {
            //update if exist
              $sql = "UPDATE `phase_status`   
                     SET  
                        `total_questions` = :total_questions,
                        `approved`        = :approved,
                        `approved_date`   = :approved_date
                     WHERE `project_id`   = :project_id AND `phase_id` = :phase_id ";
       
        $statement = $this->db->prepare($sql);
        
        $statement->bindValue(":total_questions", $this->total_questions );          
        $statement->bindValue(":approved", $this->approved );
        $statement->bindValue(":approved_date", $this->approval_date );
        $statement->bindValue(":project_id", $this->project_id );
        $statement->bindValue(":phase_id", $this->phase_id );
         
         
        $update = $statement->execute();
        
        return $update ? TRUE : FALSE ;
        } 
    
    }
    
    public function show_total_questions_for_a_phase( $project_id, $phase_id ) {
        
         error_reporting(E_ALL); 
         ini_set("display_errors", 1);
         
        try 
        {
            
         $sql = "SELECT * FROM  `phase_status` WHERE  `project_id` = $project_id  AND  `phase_id` = $phase_id ";
 
            
            $statement = $this->db->query($sql);
           
            $statement->setFetchMode(PDO::FETCH_ASSOC);                   
            $error = $statement->errorInfo();
            
            if ( $error[0] !== '00000') { // if success 
                     echo '<pre>';
                         print_r( $error );
                     echo '</pre>';
                    
                }else {
                    $results = array();     
                     while( $row = $statement->fetch() ) {  
                            $results[] = $row;                 
                        }
                    return $results;      
                }
        }
        catch(Exception $e)
        {
            echo($e->getMessage());
        }
         
     }
     
     
     /*
      * Get single phase approval date
      */
    public function get_phase_approval_date( $project_id, $phase_id ) {         
         
        $sql = "SELECT  `approved_date` FROM  `phase_status` 
                  WHERE  `project_id` = $project_id AND  `phase_id` = $phase_id  LIMIT 1";               
            
        $statement = $this->db->query( $sql);
        $statement->setFetchMode(PDO::FETCH_ASSOC);   
        $row = $statement->fetch();
       
       return $row;
            
    }
    
    
    /*
     * Is pahse approved
     * get the phase approval status
     */
    public function is_phase_approved( $project_id, $phase_id ) {
        
         $sql = "SELECT  `approved` FROM  `phase_status` 
                  WHERE  `project_id` = $project_id AND  `phase_id` = $phase_id  LIMIT 1";               
            
        $statement = $this->db->query( $sql);
        $statement->setFetchMode(PDO::FETCH_ASSOC);   
        $row = $statement->fetch();
            
        if ( $row['approved'] === '1') { // approved
            
            return TRUE;
            
         } elseif ( $row['approved'] === '0') {
             
             return FALSE;
         }
            
    }




    /*
     * Restruc Phase pages
     * IF the current phase is not approved, next page access will be denied 
     */
    public function phase_page_restiction( $project_id, $phase_id  ){
        
        switch ( $phase_id ) {      
            
            
            case $phase_id == 2: // Design
                // check is phase one is being approved
                $is_pahse_approved = $this->is_phase_approved($project_id, 1);
                
                if( $is_pahse_approved ) {  
                    
                   return TRUE; //yes approved
                   
                }else {
                    
                     return FALSE; // not approved yet 
                }
                
                break;
            
             case $phase_id == 3: // Development
                // check is phase one is being approved
                $is_pahse_approved = $this->is_phase_approved($project_id, 2);
                
                  if( $is_pahse_approved ) {  
                    
                   return TRUE; //yes approved
                   
                }else {
                    
                     return FALSE; // not approved yet 
                }
                
                break;
            
             case $phase_id == 4: // Content
                // check is phase one is being approved
                $is_pahse_approved = $this->is_phase_approved($project_id, 3);
                
            
                 if( $is_pahse_approved ) {  
                    
                   return TRUE; //yes approved
                   
                }else {
                    
                     return FALSE; // not approved yet 
                }
                break;
            
             case $phase_id == 5: // Responsive
               // check is phase one is being approved
                $is_pahse_approved = $this->is_phase_approved($project_id, 4);
                
             
                 if( $is_pahse_approved ) {  
                    
                   return TRUE; //yes approved
                   
                }else {
                    
                     return FALSE; // not approved yet 
                }
                
                break;
            
             case $phase_id == 6: // Training
                // check is phase one is being approved
                $is_pahse_approved = $this->is_phase_approved($project_id, 5);
                
             
                 if( $is_pahse_approved ) {  
                    
                   return TRUE; //yes approved
                   
                }else {
                    
                     return FALSE; // not approved yet 
                }
                
                break;
            
             case $phase_id == 7: // QA & Testing
                // check is phase one is being approved
                $is_pahse_approved = $this->is_phase_approved($project_id, 6);
                
             
                 if( $is_pahse_approved ) {  
                    
                   return TRUE; //yes approved
                   
                }else {
                    
                     return FALSE; // not approved yet 
                }
                
                break;
            
             case $phase_id == 8: // Pre-Launc
                // check is phase one is being approved
                $is_pahse_approved = $this->is_phase_approved($project_id, 7);
                
            
                 if( $is_pahse_approved ) {  
                    
                   return TRUE; //yes approved
                   
                }else {
                    
                     return FALSE; // not approved yet 
                }
                
                break;
                
             case $phase_id == 9: // Launch
                // check is phase one is being approved
                $is_pahse_approved = $this->is_phase_approved($project_id, 8);
                
             
                 if( $is_pahse_approved ) {  
                    
                   return TRUE; //yes approved
                   
                }else {
                    
                     return FALSE; // not approved yet 
                }
                break;
            
             case $phase_id == 10: // Post Launch 
                // check is phase one is being approved
                $is_pahse_approved = $this->is_phase_approved($project_id, 9);
                
             
                 if( $is_pahse_approved ) {  
                    
                   return TRUE; //yes approved
                   
                }else {
                    
                     return FALSE; // not approved yet 
                }
                
                break;
            
             case $phase_id == 11: // Warranty
               // check is phase one is being approved
                $is_pahse_approved = $this->is_phase_approved($project_id, 10);
             
                 if( $is_pahse_approved ) {  
                    
                   return TRUE; //yes approved
                   
                }else {
                    
                     return FALSE; // not approved yet 
                }
                
                break;
                
                default:
                     return TRUE;
            
        }
    }
    
    
    /*
     * Set phase end date
     * Fist phase start date is the same date of project start date
     * Fist phase end date is the date when last question od this phase get approved
     * Next phase start date is the fist phase end date and Ending date is when last question get approved
     * Next phase start date rules:
     * 1. Must be bussiness day
     * 2. Not the holly U.S holydays
     * 
     */
    public function phase_time_tracks( $project_id, $phase_id ) {
        
        //get the project start date:
        $project_start_date = $this->get_single_project_info( $project_id );
        
        $start_date_phase_1 = $project_start_date['project_start_date'];
        $end_date_phase_1  = $this->get_phase_approval_date($project_id, 1);
        
        // Get the end dates for all the phase
        $end_date_p_2 = $this->get_phase_approval_date($project_id, 2);
        
        $end_date_p_3 = $this->get_phase_approval_date($project_id, 3);
        
        $end_date_p_4 = $this->get_phase_approval_date($project_id, 4);
        
        $end_date_p_5 = $this->get_phase_approval_date($project_id, 5);
        
        $end_date_p_6 = $this->get_phase_approval_date($project_id, 6);
        
        $end_date_p_7 = $this->get_phase_approval_date($project_id, 7);
        
        $end_date_p_8 = $this->get_phase_approval_date($project_id, 8);
        
        $end_date_p_9 = $this->get_phase_approval_date($project_id, 9);
        
        $end_date_p_10 = $this->get_phase_approval_date($project_id, 10);
        
        $end_date_p_11 = $this->get_phase_approval_date($project_id, 11);
         
        $phase_initial_date = "N/A";
        $phase_end_date = "N/A";
        
        switch ( $phase_id ) {      
            
            case $phase_id == 1: // Specs and planing       
                
                echo "Start: ".date('F d, Y', strtotime( $start_date_phase_1 ) ). "  <br>";  
                  echo 'End: ';
                if( $end_date_phase_1['approved_date'] ) {
                    
                      echo  date('F d, Y', strtotime( $end_date_phase_1['approved_date']) ) ." <br>";
                }else {
                    echo $phase_end_date ;
                }
                
            
            break; 
        
            case $phase_id == 2: // Design
               
                echo "Start: ";
                if ( $end_date_phase_1['approved_date'] == NULL ) {
                    echo $phase_initial_date;
                }else {
                     $is_bussiness_day = $this->is_bussiness_day( $end_date_phase_1['approved_date'] );
                      echo  date('F d, Y', strtotime( $is_bussiness_day ) );
                }
            
            
                echo "<br>";
                echo 'End: ';
                
                if ( $end_date_p_2['approved_date'] === NULL) {
                       echo $phase_end_date ;
                }else {
                    echo date('F d, Y', strtotime( $end_date_p_2['approved_date'] ) ) ;
                }
                //var_dump($end_date['approved_date']);
            
            break; 
            
            
            case $phase_id == 3: // Development 
                
                echo "Start: ";
                if ( $end_date_p_2['approved_date'] == NULL ) {
                    echo $phase_initial_date;
                }else {
                     $is_bussiness_day = $this->is_bussiness_day( $end_date_p_2['approved_date'] );
                      echo  date('F d, Y', strtotime( $is_bussiness_day ) );
                }
            
                echo "<br>";
                echo 'End: ';            
                    if ( $end_date_p_3['approved_date'] === NULL) {
                       echo $phase_end_date ;
                    }else {
                        echo date('F d, Y', strtotime( $end_date_p_3['approved_date'] ) ) ;
                    }
            
            break; 
            
            case $phase_id == 4: // Content  
                
                 echo "Start: ";
                if ( $end_date_p_3['approved_date'] == NULL ) {
                    echo $phase_initial_date;
                }else {
                     $is_bussiness_day = $this->is_bussiness_day( $end_date_p_3['approved_date'] );
                      echo  date('F d, Y', strtotime( $is_bussiness_day ) );
                }
            
                echo "<br>";
                echo 'End: ';            
                    if ( $end_date_p_4['approved_date'] === NULL) {
                        echo $phase_end_date ;
                    }else {
                        echo date('F d, Y', strtotime( $end_date_p_4['approved_date'] ) ) ;
                    }            
            break; 
            
            case $phase_id == 5: // Responsive   
               
                echo "Start: ";
                if ( $end_date_p_4['approved_date'] == NULL ) {
                    echo $phase_initial_date;
                }else {
                     $is_bussiness_day = $this->is_bussiness_day( $end_date_p_4['approved_date'] );
                      echo  date('F d, Y', strtotime( $is_bussiness_day ) );
                }
                echo "<br>";
                echo 'End: ';            
                    if ( $end_date_p_5['approved_date'] === NULL) {
                         echo $phase_end_date ;
                    }else {
                        echo date('F d, Y', strtotime( $end_date_p_5['approved_date'] ) ) ;
                    }            
            break; 
            
            
            case $phase_id == 6: // Training    
               
                  echo "Start: ";
                if ( $end_date_p_5['approved_date'] == NULL ) {
                    echo $phase_initial_date;
                }else {
                     $is_bussiness_day = $this->is_bussiness_day( $end_date_p_5['approved_date'] );
                      echo  date('F d, Y', strtotime( $is_bussiness_day ) );
                }
            
                echo "<br>";
                echo 'End: ';            
                    if ( $end_date_p_6['approved_date'] === NULL) {
                        echo $phase_end_date ;
                    }else {
                        echo date('F d, Y', strtotime( $end_date_p_6['approved_date'] ) ) ;
                    }            
            break; 
            
            case $phase_id == 7: // Training    
               
                echo "Start: ";
                if ( $end_date_p_6['approved_date'] == NULL ) {
                    echo $phase_initial_date;
                }else {
                     $is_bussiness_day = $this->is_bussiness_day( $end_date_p_6['approved_date'] );
                      echo  date('F d, Y', strtotime( $is_bussiness_day ) );
                }
            
                echo "<br>";
                echo 'End: ';            
                    if ( $end_date_p_7['approved_date'] === NULL) {
                       echo $phase_end_date ;
                    }else {
                        echo date('F d, Y', strtotime( $end_date_p_7['approved_date'] ) ) ;
                    }            
            break; 
            
            
            case $phase_id == 8: // Pre-Launc     
            
                 echo "Start: ";
                if ( $end_date_p_7['approved_date'] == NULL ) {
                    echo $phase_initial_date;
                }else {
                     $is_bussiness_day = $this->is_bussiness_day( $end_date_p_7['approved_date'] );
                      echo  date('F d, Y', strtotime( $is_bussiness_day ) );
                }
            
                echo "<br>";
                echo 'End: ';            
                    if ( $end_date_p_8['approved_date'] === NULL) {
                        echo $phase_end_date ;
                    }else {
                        echo date('F d, Y', strtotime( $end_date_p_8['approved_date'] ) ) ;
                    }            
            break; 
            
            case $phase_id == 9: // Launch     
            
                 echo "Start: ";
                if ( $end_date_p_8['approved_date'] == NULL ) {
                    echo $phase_initial_date;
                }else {
                     $is_bussiness_day = $this->is_bussiness_day( $end_date_p_8['approved_date'] );
                      echo  date('F d, Y', strtotime( $is_bussiness_day ) );
                }
            
                echo "<br>";
                echo 'End: ';            
                    if ( $end_date_p_9['approved_date'] === NULL) {
                         echo $phase_end_date ;
                    }else {
                        echo date('F d, Y', strtotime( $end_date_p_9['approved_date'] ) ) ;
                    }            
            break; 
            
            case $phase_id == 10: // Post Launch    
                
                echo "Start: ";
                if ( $end_date_p_9['approved_date'] == NULL ) {
                    echo $phase_initial_date;
                }else {
                     $is_bussiness_day = $this->is_bussiness_day( $end_date_p_9['approved_date'] );
                      echo  date('F d, Y', strtotime( $is_bussiness_day ) );
                }
            
                echo "<br>";
                echo 'End: ';            
                    if ( $end_date_p_10['approved_date'] === NULL) {
                         echo $phase_end_date ;
                    }else {
                        echo date('F d, Y', strtotime( $end_date_p_10['approved_date'] ) ) ;
                    }            
            break; 
            
            
            case $phase_id == 11: // Warranty 
             echo "Start: ";
                if ( $end_date_p_10['approved_date'] == NULL ) {
                    echo $phase_initial_date;
                }else {
                     $is_bussiness_day = $this->is_bussiness_day( $end_date_p_10['approved_date'] );
                      echo  date('F d, Y', strtotime( $is_bussiness_day ) );
                }
            
                echo "<br>";
                echo 'End: ';            
                    if ( $end_date_p_11['approved_date'] === NULL) {
                         echo $phase_end_date ;
                    }else {
                        echo date('F d, Y', strtotime( $end_date_p_11['approved_date'] ) ) ;
                    }            
            break; 
            
        }

        
    }
    
    
    /*
     * Find Next Bussiness day 
     */
    public function is_bussiness_day( $date ) {
        $tmpDate = $date;
        $holidays = 
            [
             '2015-11-26', // Thanksgiving Day
             '2015-12-25', // Thanksgiving Day
             '2016-01-01', // New Year's Day
             '2016-01-18', // Martin Luther King Day
             '2016-02-15', // Washington's Birthday
             '2016-05-30', // Memorial Day
             '2016-07-04', // Independence Day
             '2016-09-05', // Labor Day
             '2016-10-10', // Columbus Day
             '2016-11-11', // Veterans Day
             '2016-11-24', // Thanksgiving Day
             '2016-12-25', // Christmas Day
             '2016-12-26' // 'Christmas Day' observed
            
            ];
        $i = 1;
        $nextBusinessDay = date('Y-m-d', strtotime($tmpDate . ' +' . $i . ' Weekday'));

        while (in_array($nextBusinessDay, $holidays)) {
            $i++;
            $nextBusinessDay = date('Y-m-d', strtotime($tmpDate . ' +' . $i . ' Weekday'));
        }
        return $nextBusinessDay;
    }


    //get project start date
    public function get_single_project_info( $project_id ) {  
        
        $sql = "SELECT  `project_start_date` FROM  `projects` WHERE  `project_id` = $project_id LIMIT 1";
        
        $statement = $this->db->query($sql);
        
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        
        if ($statement->rowCount() > 0) {
            $row = $statement->fetch();
            return $row;
         } else {
                return FALSE;
             } 
     }  
    
            
   
     
     /*
      * Do project approved after 30 days of the warranty phase
      */
     public function do_project_complete( $project_id, $phase_id ) {
         
         //Check if warranty phase complete 
         $is_waranty_approved = $this->is_phase_approved($project_id, $phase_id);
         
         if(  $is_waranty_approved ) {
             
             $approved_date = $this->get_phase_approval_date($project_id, $phase_id);
             // make next thirty day
             $next_30_days = date('Y-m-d H:m:s', strtotime( $approved_date['approved_date'] .'+1 minutes' ) );
             $today = date("Y-m-d H:m:s");  
                
                    
                if( $today >= $next_30_days ) {
                    //update the project end date when 30 days over
                     $project_status = 'closed';
                     $end_date = $next_30_days;
                     $this->update_project_status( $project_id, $project_status, $end_date);
                     return TRUE;
                }            
         } else {
             // if warranty phase open again, update project status to open
                 $project_status = 'open';
                 $end_date = '0000-00-00 00:00:00';
                 $this->update_project_status( $project_id, $project_status, $end_date);
               return FALSE;
         }
         
     }
     
      public function update_project_status( $project_id, $project_status, $end_date ) {       
     
        $sql = "UPDATE `projects`   
               SET  
              `project_status` = :project_status,
              `project_end_date` = :project_end_date
              WHERE `project_id` = :project_id";
       
        $statement = $this->db->prepare($sql);
        
        $statement->bindValue(":project_status", $project_status ); 
        $statement->bindValue(":project_end_date", $end_date );
        $statement->bindValue(":project_id", $project_id );         
         
        $update = $statement->execute();   
    
     }
     
     
     
  
}

            
/*           
$obj = new PhaseStatus();

$show = $obj->do_project_complete( 131, 11 ); 
 * 
 */
            
            

            
            
            
        