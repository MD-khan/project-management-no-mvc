<?php 
// require 'Dbconnection.php';

class MembersInfo {
    
      private $db;
      
      //Construction
    public function __construct() {
        $this->db = new Dbconnection();
        $this->db = $this->db->dbCon();
    }
   
    // fetch web managers by admin id
     public function fetch_web_managers($member_deg_id, $admin_id ) {
        
         $statement = $this->db->query('SELECT member_user_id, `member_fname`, `member_lname` FROM `team_members` 
                                        LEFT JOIN admin_user ON admin_user.admin_user_id= team_members.`admin_user_id`
                                        WHERE `member_deg_id` = '.$member_deg_id.' AND team_members.`admin_user_id` = '.$admin_id.' '); 
									     
      	 $statement->setFetchMode(PDO::FETCH_ASSOC);		 
		  $clients = array(); 
		   if ($statement->rowCount() > 0) {	 
            
                while( $row = $statement->fetch() ) {                 
                     $clients[] = $row;              
                 
                    }
                return $clients;  
            } else {
		return FALSE;
		}
     }
   
}// class


 
// Test class 
 //$obj = new RetriveProjecTypes();
 
// $result = $obj->get_project_types();
  
 
   

 