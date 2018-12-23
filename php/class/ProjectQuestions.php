<?php
require_once 'Dbconnection.php';  
class ProjectQuestions {
    
    private $questions;
    private $sub_question;
    private $answer_type;
    private  $sub_answer_type;
    private $input_field_name;
    private $sub_input_field_name;
    private $field_values;
    private $sub_field_values;
    private $required;
    private $sub_required;




    private $qsn_id = NULL;
    private $project_cat_id;
    private $admin_id;
    private $question_qsn_phase_id;
    private $question_cat_id;






    //Construction
    public function __construct() {
        $this->db = new Dbconnection();
        $this->db = $this->db->dbCon();
    }
    
    // ====================== Admin ================================================================
    
    //get questm
    public function get_project_questions($cat_id, $admin_id, $question_phs_id, $qsn_cat_id,  $questions ) {        
        $this->project_cat_id = $cat_id;      
        $this->admin_id = $admin_id;
        $this->question_qsn_phase_id = $question_phs_id;
        $this->question_cat_id = $qsn_cat_id;
        $this->questions = $questions;       
        }
            
        
        
    
    // Inset Qyestions 
    public function insert_project_questions() {
        
        date_default_timezone_set('America/New_York');
        
        $reg_time = date('Y-m-d: G:H:i:s');
        $statement = $this->db->prepare( "INSERT INTO project_questions ( project_qsn_id, project_cat_id, admin_id, qsn_phase_id, qsn_cat_id, questions, date)"
                                                                            
                                         . "VALUES(?, ?, ?, ?, ?, ?, ? ) " );
        
        $statement->bindParam(1,  $this->qsn_id);
        $statement->bindParam(2,  $this->project_cat_id);
        $statement->bindParam(3,  $this->admin_id);
        $statement->bindParam(4,  $this->question_qsn_phase_id);
        $statement->bindParam(5,  $this->question_cat_id);
        $statement->bindParam(6,  $this->questions);       
        $statement->bindParam(7,  $reg_time);
        
        $result = $statement->execute() ? true : false;
        return $result;
    }
    
    
    
    // fetch project questions 
      public function fetch_quetions( $admi_id, $project_type_id ) {      
        
         $statement = $this->db->query('SELECT * FROM `project_questions`
                                        LEFT JOIN admin_user ON project_questions.`admin_id` = admin_user.admin_user_id
                                        WHERE project_questions.admin_id = '.$admi_id.' '
                                       . 'AND project_questions.`project_cat_id` = '.$project_type_id.' ORDER BY   `project_qsn_id` DESC ');
        
        $statement->setFetchMode(PDO::FETCH_ASSOC);
          $statement->setFetchMode(PDO::FETCH_ASSOC); 
            
            $questons = array();
            while( $row = $statement->fetch() ) {
                $questons [] = $row;
                }
                return $questons;
           } // fetch_quetions
    
    // ========================================CLIENTS===============================================================
    
           
           
           
     // fetch project categories 
      public function fetch_quetion_categories( $client_id, $project_type_id ) {      
        
         
         $statement = $this->db->query('SELECT * FROM `question_category`
                                        LEFT JOIN project_questions ON project_questions.`qsn_cat_id` = question_category.`qsn_cat_id`
                                        LEFT JOIN clients ON clients.admin_user_id = question_category.`admin_id`
                                        WHERE project_questions.project_cat_id = '.$project_type_id.'
                                        AND clients.client_id = '.$client_id.'
                                        GROUP BY `qsn_category`
                                        ');
          
        
        $statement->setFetchMode(PDO::FETCH_ASSOC);
           $questons = array();
            while( $row = $statement->fetch() ) {
                $questons [] = $row;
                }
                return $questons;
           } // fetch_quetio    
           
           
           
             // fetch project categories 
      public function fetch_qestions_by_qsn_cat_id( $client_id, $project_type_id, $quesn_cat_id ) {      
        
          $sql = 'SELECT * FROM `question_category`
                                        LEFT JOIN project_questions ON project_questions.`qsn_cat_id` = question_category.`qsn_cat_id`
                                        LEFT JOIN clients ON clients.admin_user_id = question_category.`admin_id`
                                         WHERE clients.client_id = '.$client_id. '
                                        AND  ( project_questions.project_cat_id = '.$project_type_id.' AND question_category.qsn_cat_id = '.$quesn_cat_id.')

                                        ';
          
         $statement = $this->db->query($sql);
        
        $statement->setFetchMode(PDO::FETCH_ASSOC);
         
            
            $questons = array();
            while( $row = $statement->fetch() ) {
                $questons [] = $row;
                }
                return $questons;
           } // fetch_quetio    
           
          
           
   // fetch single question 
   public function fetch_single_question( $qns_id ){
       
         $sql = "SELECT * FROM  `project_questions` WHERE `qsn_id` = $qns_id LIMIT 1";
         
         $statement = $this->db->query($sql);
         
         $statement->setFetchMode(PDO::FETCH_ASSOC);
          
          if ($statement->rowCount() > 0) {
            $row = $statement->fetch();
            return $row;
          } else {
                return FALSE;
             }
   }
           
           
       
    // fetch project questions 
      public function fetch_quetions_make_fields( $client_id, $project_type_id ) {      
        
         $statement = $this->db->query('SELECT * FROM `project_questions`
                                        LEFT JOIN admin_user ON project_questions.`admin_id` = admin_user.admin_user_id
                                        LEFT JOIN clients ON clients.admin_user_id = project_questions.`admin_id`
                                        WHERE clients.client_id = '.$client_id.'
                                        AND project_questions.`project_cat_id` = '.$project_type_id.' 
                                        ORDER BY   `project_qsn_id` DESC ');
        
        $statement->setFetchMode(PDO::FETCH_ASSOC);
          $statement->setFetchMode(PDO::FETCH_ASSOC); 
            
            $questons = array();
            while( $row = $statement->fetch() ) {
                $questons [] = $row;
                }
                return $questons;
           } // fetch_quetio    
           
      
    
} //class

 
/***
// Test insert 
$ob = new ProjectQuestions();
 
  $ob->get_project_questions("1", "2", "3", "4", "5","6", "7", "8","", "9", "10", "11", "12", "13", "14");
  $re = $ob->insert_project_questions();
 
  var_dump($re);
 * 
 */
  