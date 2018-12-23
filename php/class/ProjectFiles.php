<?php 

date_default_timezone_set('America/New_York');        
// require_once 'Dbconnection.php';  
class ProjectFiles {
     
    public $id = null;
    private $file_name, $file_type, $file_size, $file_location;
    private $admin_id, $team_id, $client_id;
    private $project_id, $phase_id, $question_id, $ticket_id, $web_id;
    private $db;
    
   
      
    //Construction
    public function __construct() {
        
        $this->db = new Dbconnection();
        
        $this->db = $this->db->dbCon();
    }
    
    
    public function setFileProperty( $data ) {
        
        $this->file_name     = $data['name'];
        $this->file_type     = $data['type'];
        $this->file_size     = $data['size'];
        $this->file_location =$data['file_loc'];
        $this->admin_id      = $data['admin_id'];
        $this->team_id       = $data['team_id'];
        $this->client_id     = $data['client_id'];
        $this->project_id    = $data['project_id'];
        $this->question_id   = $data['question_id'];
        $this->ticket_id     = $data['ticket_id'];
        $this->web_id        = $data['web_id']; 
        $this->phase_id      = $data['phase_id']; 
    }
    
    
    public function save() {       
      
        $reg_time = date('Y-m-d: G:H:i:s');
        
          
        $sql = "INSERT INTO project_files ( file_id, file_name, file_location, file_size, file_type,
                project_id, phase_id, project_qsn_id, admin_id,team_id,client_id, date ) VALUES( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? )";
        
        $statement = $this->db->prepare( $sql );
        
        $statement->bindParam(1,  $this->id );
        $statement->bindParam(2,  $this->file_name);      
        $statement->bindParam(3,  $this->file_location);
        $statement->bindParam(4,  $this->file_size );
        $statement->bindParam(5,  $this->file_type );
        $statement->bindParam(6,  $this->project_id );
        $statement->bindParam(7,  $this->phase_id );
        $statement->bindParam(8,  $this->question_id);
        $statement->bindParam(9,  $this->admin_id );        
        $statement->bindParam(10,  $this->team_id );        
        $statement->bindParam(11,  $this->client_id );        
        $statement->bindParam(12,  $reg_time);
        
       $result = $statement->execute() ? true : false;
        return $result;
        
    }
    
    public function show_files( $question_id, $project_id ) {
        
        $sql = "SELECT * FROM `project_files` WHERE `project_qsn_id` = $question_id AND project_id = $project_id ORDER BY  `file_id` DESC";
        
        $statement = $this->db->query( $sql) ; 
									     
      	$statement->setFetchMode(PDO::FETCH_ASSOC);		 
        
        $data = array(); 
         
        if ($statement->rowCount() > 0) {	 
            
            while( $row = $statement->fetch() ) { 
                
                     $data[] = $row;              
                                 
            }
            
        return $data;      
        
        }else {
            return FALSE;
	}
    }
    
    
    //get total files 
    public function total_files($question_id, $project_id) {
        
        $sql = "SELECT COUNT(file_id) AS TOTAL_FILE FROM `project_files` WHERE `project_qsn_id` = $question_id AND project_id = $project_id";
         
        $statement = $this->db->query( $sql) ; 
          
        $statement->setFetchMode(PDO::FETCH_ASSOC);
            
        if ($statement->rowCount() > 0) {
              
            $row = $statement->fetch();
          
        return $row;
                      
        }else{
              
            return FALSE;
                
        }
    }
   
    // ************************************* *****************************************************************************
    
    /*
     * Project file: Custome
     */
    public function save_custom() {       
      
        $reg_time = date('Y-m-d: G:H:i:s');
        
          
        $sql = "INSERT INTO project_file_custome ( file_id, file_name, file_location, file_size, file_type,
                project_id, project_qsn_id, admin_id,team_id,client_id, date ) VALUES( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? )";
        
        $statement = $this->db->prepare( $sql );
        
        $statement->bindParam(1,  $this->id );
        $statement->bindParam(2,  $this->file_name);      
        $statement->bindParam(3,  $this->file_location);
        $statement->bindParam(4,  $this->file_size );
        $statement->bindParam(5,  $this->file_type );
        $statement->bindParam(6,  $this->project_id );
        $statement->bindParam(7,  $this->question_id);
        $statement->bindParam(8,  $this->admin_id );        
        $statement->bindParam(9,  $this->team_id );        
        $statement->bindParam(10,  $this->client_id );        
        $statement->bindParam(11,  $reg_time);
        
       $result = $statement->execute() ? true : false;
        return $result;
        
    }
    
    public function show_files_custom( $question_id, $project_id ) {
        
        $sql = "SELECT * FROM `project_file_custome` WHERE `project_qsn_id` = $question_id AND project_id = $project_id ORDER BY  `file_id` DESC";
        
        $statement = $this->db->query( $sql) ; 
									     
      	$statement->setFetchMode(PDO::FETCH_ASSOC);		 
        
        $data = array(); 
         
        if ($statement->rowCount() > 0) {	 
            
            while( $row = $statement->fetch() ) { 
                
                     $data[] = $row;              
                                 
            }
            
        return $data;      
        
        }else {
            return FALSE;
	}
    }
    
    
    //get total files 
    public function total_files_custom($question_id, $project_id) {
        
        $sql = "SELECT COUNT(file_id) AS TOTAL_FILE FROM `project_file_custome` WHERE `project_qsn_id` = $question_id AND project_id = $project_id";
         
        $statement = $this->db->query( $sql) ; 
          
        $statement->setFetchMode(PDO::FETCH_ASSOC);
            
        if ($statement->rowCount() > 0) {
              
            $row = $statement->fetch();
          
        return $row;
                      
        }else{
              
            return FALSE;
                
        }
    }
    
    
    //***************************** Ticket *************************************************************
    
     public function save_ticket_file() {       
      
        $reg_time = date('Y-m-d: G:H:i:s');
        
          
        $sql = "INSERT INTO project_file_ticket ( file_id, file_name, file_location, file_size, file_type,
                ticket_id, web_id, admin_id,team_id,client_id, date ) VALUES( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? )";
        
        $statement = $this->db->prepare( $sql );
        
        $statement->bindParam(1,  $this->id );
        $statement->bindParam(2,  $this->file_name);      
        $statement->bindParam(3,  $this->file_location);
        $statement->bindParam(4,  $this->file_size );
        $statement->bindParam(5,  $this->file_type );
        $statement->bindParam(6,  $this->ticket_id );
        $statement->bindParam(7,  $this->web_id );
        $statement->bindParam(8,  $this->admin_id );        
        $statement->bindParam(9,  $this->team_id );        
        $statement->bindParam(10,  $this->client_id );        
        $statement->bindParam(11,  $reg_time);
        
       $result = $statement->execute() ? true : false;
        return $result;
        
    }
    
    public function show_files_ticket( $ticket_id, $web_id ) {
        
        $sql = "SELECT * FROM `project_file_ticket` WHERE `ticket_id` = $ticket_id AND web_id = $web_id ORDER BY  `file_id` DESC";
        
        $statement = $this->db->query( $sql) ; 
									     
      	$statement->setFetchMode(PDO::FETCH_ASSOC);		 
        
        $data = array(); 
         
        if ($statement->rowCount() > 0) {	 
            
            while( $row = $statement->fetch() ) { 
                
                     $data[] = $row;              
                                 
            }
            
        return $data;      
        
        }else {
            return FALSE;
	}
    }
   
   //get total files 
    public function total_files_ticket( $ticket_id, $web_id ) {
        
        $sql = "SELECT COUNT(file_id) AS TOTAL_FILE FROM `project_file_ticket` WHERE `ticket_id` = $ticket_id AND web_id = $web_id";
         
        $statement = $this->db->query( $sql) ; 
          
        $statement->setFetchMode(PDO::FETCH_ASSOC);
            
        if ($statement->rowCount() > 0) {
              
            $row = $statement->fetch();
          
        return $row;
                      
        }else{
              
            return FALSE;
                
        }
    } 
    
    
    
    
    
    
}// class
 

 