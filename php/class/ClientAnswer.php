<?php
// require_once 'Dbconnection.php';  
class ClientAnswer {
     
    private $db;
    private $answer_id = null;
    private $project_id, $phase_id, $question_id, $admin_id, $team_id, $client_id, $content;

    //Construction
    public function __construct() {
        $this->db = new Dbconnection();
        $this->db = $this->db->dbCon();
    }
    
    
    // Set Answer properties
    public function set_answer_properties( $data ) {        
         
        $this->project_id   = $data['project_id']; 
        $this->phase_id     = $data['phase_id'];
        $this->question_id  = $data['question_id'];
        $this->admin_id     = $data['admin_id'];
        $this->team_id      = $data['team_id'];
        $this->client_id    = $data['client_id'];
        $this->content      = $data['content'];
    }
       
    
    // Save Answers 
    public function save(){
        date_default_timezone_set('America/New_York');   
        $reg_time = date('Y-m-d: G:H:i:s');            
        error_reporting(E_ALL); 
        ini_set("display_errors", 1);
     
            try
            {   
                $sql = "INSERT INTO `clinet_answer` ( client_ans_id, project_qsn_id, project_id, phase_id, client_id, admin_id, member_id, main_ans, insert_date) 
                       VALUES( ?, ?, ?, ?, ?, ?, ?, ?, ? )";

                $statement = $this->db->prepare( $sql );
                $statement->bindParam(1,  $this->answer_id );   
                $statement->bindParam(2,  $this->question_id );  
                $statement->bindParam(3,  $this->project_id ); 
                $statement->bindParam(4,  $this->phase_id ); 
                $statement->bindParam(5,  $this->client_id );
                $statement->bindParam(6,  $this->admin_id );
                $statement->bindParam(7,  $this->team_id );
                $statement->bindParam(8,  $this->content );
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
 
            }
            catch(Exception $e)
            {
                echo($e->getMessage());
            }
    }
 
     // Insert Custom answers 
    public function save_custom() {             
        
        date_default_timezone_set('America/New_York');   
        $reg_time = date('Y-m-d: G:H:i:s');            
        error_reporting(E_ALL); 
        ini_set("display_errors", 1);
     
            try
            {   
                $sql = "INSERT INTO `client_answer_custom` ( client_ans_id, project_qsn_id, project_id, phase_id, client_id, admin_id, member_id, main_ans, insert_date) 
                       VALUES( ?, ?, ?, ?, ?, ?, ?, ?, ? )";

                $statement = $this->db->prepare( $sql );
                $statement->bindParam(1,  $this->answer_id );   
                $statement->bindParam(2,  $this->question_id );  
                $statement->bindParam(3,  $this->project_id ); 
                $statement->bindParam(4,  $this->phase_id ); 
                $statement->bindParam(5,  $this->client_id );
                $statement->bindParam(6,  $this->admin_id );
                $statement->bindParam(7,  $this->team_id );
                $statement->bindParam(8,  $this->content );
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
 
            }
            catch(Exception $e)
            {
                echo($e->getMessage());
            }
    }
   
    
     
    //get sub answers
    public function get_sub_client_answer( $project_qsn_id, $project_cat_id, 
                                        $qsn_phase_id, $project_id,   $sub_ans ) {        
       
        $this->project_qsn_id = $project_qsn_id;
        $this->project_cat_id = $project_cat_id;
        $this->qsn_phase_id = $qsn_phase_id;  
         $this->project_id = $project_id;     
        $this->sub_ans = $sub_ans;
        }
        
     // Inset sub answers 
        
     // get the client name who answered the questions
     public function get_name_who_did_response( $client_id ) {
         
        $statement = $this->db->query("SELECT `client_key_fname`, `client_key_lname` FROM `clients` 
                                        LEFT JOIN clinet_answer on clinet_answer.client_id = clients.`client_id`
                                        WHERE clinet_answer.`client_id` = $client_id ");
      
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        if ($statement->rowCount() > 0) {
            $row = $statement->fetch();
            return $row;
         } else {
                return FALSE;
             }
        
         
     }
      
     
     
       // get the client name who answered the questions
     public function get_team_member_who_did_response( $member_id ) {
         
        $statement = $this->db->query("SELECT `member_fname`, `member_lname` FROM `team_members`
                                        LEFT JOIN clinet_answer on clinet_answer.member_id = team_members.`member_user_id`
                                        WHERE clinet_answer.`member_id` = $member_id ");
      
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        if ($statement->rowCount() > 0) {
            $row = $statement->fetch();
            return $row;
         } else {
                return FALSE;
             }
        
         
     }
     
     
     
     
      // get the admin name who answered the questions
     public function get_admin_name( $admin_id ) {
         
        $statement = $this->db->query("SELECT `admin_fname`, `admin_lname` FROM `admin_user` 
                                        LEFT JOIN clinet_answer on clinet_answer.admin_id = admin_user.`admin_user_id`
                                        WHERE clinet_answer.`admin_id` = $admin_id LIMIT 1 ");
      
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        if ($statement->rowCount() > 0) {
            $row = $statement->fetch();
            return $row;
         } else {
                return FALSE;
             }
        
         
     }

 
     public function inser_client_sub__answers() {
        
        $reg_time = date('Y-m-d: G:H:i:s');
        
        $qsl = "INSERT INTO client_sub_ans ( client_sub_ans_id, project_qsn_id, project_cat_id, qsn_phase_id,
                 project_id, sub_ans, insert_date ) VALUES(?, ?, ?, ?, ?, ?, ?)";
        $statement = $this->db->prepare( $qsl );
        
        $statement->bindParam(1,  $this->clinet_sub_ans_id);
        $statement->bindParam(2,  $this->project_qsn_id);
        $statement->bindParam(3,  $this->project_cat_id);
        $statement->bindParam(4,  $this->qsn_phase_id);  
        $statement->bindParam(5,  $this->project_id);  
        $statement->bindParam(6,  $this->sub_ans);
        $statement->bindParam(7,  $reg_time);
        
        $result = $statement->execute() ? true : false;
        return $result;
    }
   
        
    
    
    function update_answere( $main_ans, $qsn_id  ) {
        
         $sql = "UPDATE `clinet_answer`   
                SET `main_ans` = :main_ans               
                WHERE `project_qsn_id` = :project_qsn_id";         
          
          $statement = $this->db->prepare( $sql );  
          $statement->bindValue(":main_ans", $main_ans);
          $statement->bindValue(":project_qsn_id", $qsn_id);
          $result = $statement->execute() ? true : false;
           return $result;
    }
    
    
    
       // fetch project questions and answers 
      public function fetch_quetions_show_answer( $project_id ) {      
        
          $sql = "SELECT * FROM  project_questions
LEFT JOIN clinet_answer ON clinet_answer.`project_qsn_id` = project_questions.`project_qsn_id`
LEFT JOIN client_sub_ans ON client_sub_ans.project_qsn_id = project_questions.`project_qsn_id`

WHERE  client_sub_ans.project_id = $project_id OR clinet_answer.project_id = $project_id";
          
         $statement = $this->db->query( $sql );
        
        $statement->setFetchMode(PDO::FETCH_ASSOC);
          $statement->setFetchMode(PDO::FETCH_ASSOC); 
            
            $questons = array();
            while( $row = $statement->fetch() ) {
                $questons [] = $row;
                }
                return $questons;
           } // fetch_quetio        
   
           
      // fetch project answers 
      public function fetch_answer( $question_id , $project_id ) {      
        
          $sql = "SELECT * FROM `clinet_answer` "
                  . "WHERE `project_qsn_id` = $question_id "
                  . "AND project_id = $project_id ORDER BY client_ans_id";
          
         $statement = $this->db->query( $sql );
        
        $statement->setFetchMode(PDO::FETCH_ASSOC);        
            
            $questons = array();
            while( $row = $statement->fetch() ) {
                $questons [] = $row;
                }
                return $questons;
           } // fetch_quetio  
           
        
            // fetch project answers 
    public function fetch_c_answers( $question_id , $project_id ) {      
        
        $sql = "SELECT * FROM `client_answer_custom` "
                  . "WHERE `project_qsn_id` = $question_id "
                  . "AND project_id = $project_id ORDER BY client_ans_id";
          
        $statement = $this->db->query( $sql );
        
        $statement->setFetchMode(PDO::FETCH_ASSOC);        
            
        $questons = array();
            while( $row = $statement->fetch() ) {
                $questons [] = $row;
                }
                return $questons;
    } // fetch_quetio  
           
   
           
           //count totoal comments / answers 
           
        public function total_comments( $project_qsn_id, $project_id ) {
        
        $statement = $this->db->query('SELECT COUNT(`client_ans_id`) AS TOTAL_COMMENTS
                                        FROM `clinet_answer` 
                                        WHERE project_qsn_id = '.$project_qsn_id.' AND project_id = '.$project_id.' ');
      
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        if ($statement->rowCount() > 0) {
            $row = $statement->fetch();
            return $row;
         } else {
                return FALSE;
             }
        
        }
        
        
          public function total_comment_custom( $project_qsn_id ) {
        
        $statement = $this->db->query('SELECT COUNT(`client_ans_id`) AS TOTAL_COMMENTS
                                        FROM `client_answer_custom` 
                                        WHERE project_qsn_id = '.$project_qsn_id.' ');
      
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        if ($statement->rowCount() > 0) {
            $row = $statement->fetch();
            return $row;
         } else {
                return FALSE;
             }
        
        }
        
        
        
           
     public function get_feedback( $feedback, $note, $project_id){
         $this->feedback = $feedback;
         $this->note = $note;
         $this->project_id = $project_id;
     }


     public function admin_anser_feedback() {
         $qsl = "INSERT INTO anser_feedback ( anser_feedback_id, feedback, note, project_id
                  ) VALUES(?, ?, ?, ?)";
        $statement = $this->db->prepare( $qsl );
        
        $statement->bindParam(1,  $this->anser_feedback_id);
        $statement->bindParam(2,  $this->feedback);
        $statement->bindParam(3,  $this->note);
        $statement->bindParam(4,  $this->project_id);        
        
        $result = $statement->execute() ? true : false;
        return $result;
     }
    
     
     public function fetch_admin_feedback( $project_id) {
         $sql = "SELECT * FROM `anser_feedback` WHERE `project_id` = $project_id";          
         $statement = $this->db->query( $sql );
        
        $statement->setFetchMode(PDO::FETCH_ASSOC);   
        $row = $statement->fetch();
            
             
                return $row;
     }
     
     
     
          
     //Answere approving 
      public function update_ansere_approval( $answer_id, $is_approve ) {
        
        $sql = "UPDATE clinet_answer"
                . " SET aproved= $is_approve "
                . "WHERE client_ans_id= $answer_id "
                . " LIMIT 1";
        
        $STM = $this->db->prepare($sql);
               
        $update = $STM->execute() ? true : false;
        
        return $update;
            
     }
     
     
     
          
     //Answere approving 
      public function update_ansere_approval_custom( $answer_id, $is_approve ) {
        
        $sql = "UPDATE client_answer_custom"
                . " SET aproved= $is_approve "
                . "WHERE client_ans_id= $answer_id "
                . " LIMIT 1";
        
        $STM = $this->db->prepare($sql);
               
        $update = $STM->execute() ? true : false;
        
        return $update;
            
     }
     
     //fetch aprroved 
    public function fetch_aprroved_answer( $project_qsn_id, $project_d ) {
         $sql = "SELECT * FROM `clinet_answer` WHERE `project_qsn_id` = $project_qsn_id AND project_id = $project_d";          
         $statement = $this->db->query( $sql );
        
        $statement->setFetchMode(PDO::FETCH_ASSOC);   
        $row = $statement->fetch();
            
             
                return $row;
    }
     
    
     //fetch aprroved 
    public function fetch_aprroved_answer_custom( $project_qsn_id, $project_d ) {
         $sql = "SELECT * FROM `client_answer_custom` WHERE `project_qsn_id` = $project_qsn_id AND project_id = $project_d";          
         $statement = $this->db->query( $sql );
        
        $statement->setFetchMode(PDO::FETCH_ASSOC);   
        $row = $statement->fetch();
            
             
                return $row;
    }
    
    
    
}// class

 
// test
        
 /*
$obj = new ClientAnswer();

$re = $obj->fetch_quetions_show_answer(1, 5);
echo "<pre>";
print_r($re);
 echo "</pre>";       


  $data = array(
                array(
                "project_qsn_id" => 1,
                "project_cat_id" => 1,
                "qsn_phase_id" => 1,
                "qsn_cat_id" => 1,
                "main_ans" => "a",
                "sub_ans" => "b"
                ),
                 array(
                "project_qsn_id" => 2,
                "project_cat_id" => 2,
                "qsn_phase_id" => 2,
                "qsn_cat_id" => 2,
                "main_ans" => "aa",
                "sub_ans" => "bb"
                ),
                
                 array(
                "project_qsn_id" => 3,
                "project_cat_id" => 3,
                "qsn_phase_id" => 3,
                "qsn_cat_id" => 3,
                "main_ans" => "aaa",
                "sub_ans" => "bbb"
                ),
  );
  
  
  foreach ($data as $key => $row  ) {
      $project_qsn_id = $row['project_qsn_id'];
      $project_cat_id = $row['project_cat_id'];
      $qsn_phase_id = $row['qsn_phase_id'];
      $qsn_cat_id = $row['qsn_cat_id'];
      $main_ans = $row['main_ans'];
      $sub_ans = $row['sub_ans'];
       
     //$obj->get_client_answer($row['project_qsn_id'], $row['project_cat_id'], $row['qsn_phase_id'], $row['qsn_cat_id'], $row['main_ans'], $row['sub_ans']);
      $obj->get_client_answer($project_qsn_id, $project_cat_id, $qsn_phase_id, $qsn_cat_id, $main_ans, $sub_ans);
   // $obj->get_client_answer(1, 2, 3, 4, "Main Ans", "Sub Ans");
      $re =  $obj->inser_client_answers( );
       // var_dump($re);
  }
 
   echo "<pre>";
  print_r($data);
  echo "</pre>";
  //$re = $obj->inser_client_answers( );
  // var_dump($re);
   
  
  
  
  
$obj = new ClientAnswer();

  $obj->get_feedback("yes", "note", 1 ) ;
  $result = $obj->admin_anser_feedback();
  
  var_dump($result);
  * 
  */
  
   
 