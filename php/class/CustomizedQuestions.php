<?php
//require_once 'Dbconnection.php';  

class CustomizedQuestions {
    
    private $db;
    
    private $question_id = null;
    private $admin_id, $member_id, $project_id, $phase_id, $project_type_id, $question_cat_id;
    private $question, $description;

 

    //Construction
    public function __construct() {
        $this->db = new Dbconnection();
        $this->db = $this->db->dbCon();
    }
    
     
    public function get_question_details ( $data ) {        
       
        $this->admin_id         = $data['admin_id'];       
        $this->member_id        = $data['team_id'];
        $this->project_id       = $data['project_id'];
        $this->phase_id         = $data['phase_id'];
        $this->project_type_id  = $data['project_type_id'];
        $this->question_cat_id  = $data['question_cat_id'];
        $this->question         = $data['question'];
        $this->description      = $data['description'];
        
    }
    
    
    public function save_additional_question () {        
       
        $reg_time = date('Y-m-d: G:H:i:s');            
        error_reporting(E_ALL); 
        ini_set("display_errors", 1);     
            
        try
            {   
                $sql = "INSERT INTO `customized_qsn` ( qsn_id, admin_id, member_id, project_id, phase_id, project_cat_id, question_cat_id, customize_qsn, descriptions, date) 
                       VALUES( ?, ?, ?, ?, ?, ?, ?, ?, ?, ? )";

                $statement = $this->db->prepare( $sql );
                $statement->bindParam(1,  $this->question_id );   
                $statement->bindParam(2,  $this->admin_id );  
                $statement->bindParam(3,  $this->member_id ); 
                $statement->bindParam(4,  $this->project_id ); 
                $statement->bindParam(5,  $this->phase_id );
                $statement->bindParam(6,  $this->project_type_id );
                $statement->bindParam(7,  $this->question_cat_id );
                $statement->bindParam(8,  $this->question );
                $statement->bindParam(9,  $this->description );
                $statement->bindParam(10,  $reg_time);

                $statement->execute();
                $error = $statement->errorInfo();

                if ( $error[0] !== '00000') { // if success 
                     echo '<pre>';
                         print_r( $error );
                     echo '</pre>';
                    
                }else {
                    return TRUE;
                }
 
        }
        catch(Exception $e)
        {
            echo($e->getMessage());
        }
        
    }
    
    /*
     * Show additional questions by project id, question category id and phase id
     */
    public function show_addtional_questions( $project_id, $phase_id, $question_cat_id ){
        
        error_reporting(E_ALL); 
        ini_set("display_errors", 1);
        
        try 
        {
           $sql = "SELECT * FROM  `customized_qsn` 
                WHERE  `project_id` = $project_id
                AND (
                    `phase_id` = $phase_id
                    AND  `question_cat_id` = $question_cat_id
                    )
                ORDER BY qsn_id ASC "; 
            
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
    
    
    public function total_c_questions( $project_id ) {
        
        $statement = $this->db->query('SELECT COUNT(`qsn_id`) AS TOTAL_QSN
                                        FROM `customized_qsn` 
                                        WHERE project_id = '.$project_id.' ');
      
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        
        if ($statement->rowCount() > 0) {
            $row = $statement->fetch();
            return $row;
         }else {
                return FALSE;
             }
        
    }
    
            
   // fetch single question 
   public function fetch_single_question( $qns_id ){
       
        $sql = "SELECT * FROM  `customized_qsn` WHERE  `qsn_id` = $qns_id LIMIT 1";
         
        $statement = $this->db->query($sql);
         
        $statement->setFetchMode(PDO::FETCH_ASSOC);
          
        if ($statement->rowCount() > 0) {
            $row = $statement->fetch();
            return $row;
        }else {
                return FALSE;
             }
   }
    
} //class

/**
$obj = new CustomizedQuestions();

$obj->get_question_details(1, 0, 0, 11, "sdfdsf");
$in = $obj->set_question_details();

var_dump($in);
 * 
 */