<?php

class Questions {
    
    private $db;
    private $question_id = null;
    private $question_cat_id, $phase_d, $project_type_id, $admin_id, $team_id;
    private $question, $description;
   
    //Construction
    public function __construct() {
        $this->db = new Dbconnection();
        $this->db = $this->db->dbCon();
    }
    
    public function setQuestionProperties( $data ) {
        
        $this->question_cat_id      = $data['question_category_id'];
        $this->phase_d              = $data['phase_id'];
        $this->project_type_id      = $data['project_type_id'];
        $this->admin_id             = $data['admin_id'];
        $this->team_id              = $data['team_id'];
        $this->question             = $data['question'];
        $this->description          = $data['description'];
    }
    
    
    /*
     * Save question information
     */
    public function save_question() {
        
        date_default_timezone_set('America/New_York');
        $reg_time = date('Y-m-d: G:H:i:s');
          
        error_reporting(E_ALL); 
        ini_set("display_errors", 1);
        
        try {
            
            $sql = "INSERT INTO project_questions ( qsn_id, project_cat_id, admin_id, team_id, phase_id, qsn_cat_id, questions, descriptions, date)"
                    . " VALUES(?, ?, ?, ?, ?, ?, ?,?,? )";
            
            $statement = $this->db->prepare( $sql );
            
        $statement->bindParam(1,  $this->question_id );
        $statement->bindParam(2,  $this->project_type_id );
        $statement->bindParam(3,  $this->admin_id );
        $statement->bindParam(4,  $this->team_id );
        $statement->bindParam(5,  $this->phase_d );
        $statement->bindParam(6,  $this->question_cat_id ); 
        $statement->bindParam(7,  $this->question );  
        $statement->bindParam(8,  $this->description );  
        $statement->bindParam(9,  $reg_time);
        
        $statement->execute();
        
        $error = $statement->errorInfo();
        if ( $error[0] !== '00000') { // if success 
            
             echo '<pre>';
                 print_r( $error );
             echo '</pre>';
                    
        }else {
            return TRUE;
        }
        
        } catch (Exception $ex) {
            
             echo($e->getMessage());
        }
    }
    
    /*
     * Show question based on the project type
     */
    public function showProjectTypeQuestions( $project_type_id ) {
        
         error_reporting(E_ALL); 
         ini_set("display_errors", 1);
         
        try 
        {
            $sql = "SELECT * 
                    FROM  `project_questions` 
                    WHERE  `project_cat_id` = $project_type_id ";
                    
 
            
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
     * Get questions with project type ID and Phase ID
     */
    public function show_questions( $project_type_id, $phase_id ) {
        
         error_reporting(E_ALL); 
         ini_set("display_errors", 1);
         
        try 
        {
            $sql = "SELECT * FROM `question_category`
                                        LEFT JOIN project_questions ON project_questions.`qsn_cat_id` = question_category.`qsn_cat_id`
                                        WHERE project_questions.project_cat_id = $project_type_id
                                        AND  project_questions.phase_id =  $phase_id "
                                       . "GROUP BY `question_category`.`qsn_cat_id`";
         
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
     * Get questions with project type ID and Phase ID
     */
    public function show_questions_by_category_id( $question_category_id, $project_type_id ) {
        
         error_reporting(E_ALL); 
         ini_set("display_errors", 1);
         
        try 
        {
            $sql = "SELECT * FROM  `project_questions` WHERE  `project_cat_id` =$project_type_id
                    AND  `qsn_cat_id` = $question_category_id
                   LIMIT 0 , 30";
                   
                      
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
    * Count Total questions for a Project Type
    */
     
    
    
        
} //class