<?php

 // require_once 'Dbconnection.php';

class TeamMembers {
    
     
    public $member_fname;
    public $member_lname;
    
    public $member_phone;
    public $member_email;
    public $member_password;
        
    public $member_id = NULL;
    public $admin_id;
    public $member_deg_id;
    
    private $deg_id = null;


    private $designation;
    private $db;
    
    //Construction
    public function __construct() {
        $this->db = new Dbconnection();
        $this->db = $this->db->dbCon();
    }

    // get and filter team member  data 
    public function getMemberInfo( $admin_id, $m_deg_id, $m_fname, $m_lname,  $m_phone, $m_email, $m_pass){        
        $this->admin_id = $admin_id;
        $this->member_deg_id = $m_deg_id;
        $this->member_fname = $m_fname;
        $this->member_lname = $m_lname;
        $this->member_phone = $m_phone;
        $this->member_email = $m_email;        
        // set password hash
       // $hash = password_hash($m_pass, PASSWORD_DEFAULT);
        $this->member_password = $m_pass;
        
       
    } //setClientInfo 
 
    
    // Insert into database
    public function setMemberInfo(){
        
        $reg_time = date('Y-m-d: G:H:i:s');
        
        $statement = $this->db->prepare( "INSERT INTO team_members ( member_user_id, admin_user_id, member_deg_id, member_fname, 
                                        member_lname, member_phone, member_email, member_password, date ) 
                                        VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?) " );
        
        $statement->bindParam(1,  $this->member_id);
        $statement->bindParam(2,  $this->admin_id);
        $statement->bindParam(3,  $this->member_deg_id);
        $statement->bindParam(4,  $this->member_fname);
        $statement->bindParam(5,  $this->member_lname);      
        $statement->bindParam(6,  $this->member_phone);
        $statement->bindParam(7,  $this->member_email);
        $statement->bindParam(8,  md5($this->member_password));
        $statement->bindParam(9,  $reg_time);
        
        $result = $statement->execute() ? true : false;
        return $result;
    }
 
    
    // get member designation info
    public function get_deg(  $degignation, $admin_id ){
        $this->admin_id = $admin_id;
        $this->designation = $degignation;
    }
    
    // set member  designation info
    public function set_designation(){
        $statement = $this->db->prepare( "INSERT INTO member_designation ( member_deg_id, designation, admin_id
                                            ) VALUES(?, ?, ?) " );
        
        $statement->bindParam(1,  $this->deg_id);
        $statement->bindParam(2,  $this->designation);
        $statement->bindParam(3,  $this->admin_id);
       
        $result = $statement->execute() ? true : false;
        return $result;
        
    }


    // fetch members designations 
    public function members_designations( $admin_id ) {
         $statement = $this->db->query("SELECT * FROM `member_designation`");
         
       $statement->setFetchMode(PDO::FETCH_ASSOC);
       
      
       $statement->setFetchMode(PDO::FETCH_ASSOC);       
             $results = array();     
            while( $row = $statement->fetch() ) {  
                $results[] = $row;                 
            }
              return $results;      
    }
    
    
    
   // fetch only web manager from team members
    // fetch members designations 
    public function web_managers( $admin_id , $deg_id ) {
         $statement = $this->db->query('SELECT * FROM `member_designation` 
                                        LEFT JOIN team_members ON team_members.member_deg_id = member_designation.`member_deg_id`
                                        LEFT JOIN admin_user ON admin_user.`admin_user_id` = team_members.`admin_user_id`
                                        WHERE team_members.`admin_user_id` = '.$admin_id.'  
                                        AND member_designation.`member_deg_id`= '.$deg_id.' ');
        
       $statement->setFetchMode(PDO::FETCH_ASSOC);       
             $results = array();     
            while( $row = $statement->fetch() ) {  
                $results[] = $row;                 
            }
              return $results;      
    }
    
    
    // fetch GC team members 
    public function fetch_team( $admin_id ) {
         $statement = $this->db->query("SELECT * FROM `team_members`
                LEFT JOIN  member_designation ON member_designation.member_deg_id = team_members.`member_deg_id`
                WHERE `admin_user_id` = $admin_id");
         
      
       $statement->setFetchMode(PDO::FETCH_ASSOC);       
             $results = array();     
            while( $row = $statement->fetch() ) {  
                $results[] = $row;                 
            }
              return $results;      
    }
    
    // get total members
    public function total_member( $admin_id) {
         $statement = $this->db->query("SELECT COUNT(`member_user_id`)AS TOTAL_MEMBER FROM `team_members`  
                                WHERE  admin_user_id = $admin_id "); 
									     
      	  $statement->setFetchMode(PDO::FETCH_ASSOC);       
               
            $row = $statement->fetch();                        
            
              return $row;      
    }
    
    
    
    
    
    //member login
    
   // client Login 
    public function member_login( $email, $pass ) {
        $this->member_email = $email;
        $this->member_password = $pass;
        
        try {
                if(!empty($email) && !empty($pass)){	
		$STM = $this->db->prepare( "select * from team_members"
                        . " where member_email=?"
                        . "AND member_password=?" );
                
		$STM->bindParam( 1,$email );
                $STM->bindParam( 2,$pass );
		$STM->execute();
		$STM->setFetchMode(PDO::FETCH_ASSOC);
		$row = $STM->fetch();			
                }//if 1
				
        }catch (PDOException $e) {
            //Do your error handling here
  		 $message = $e->getMessage();	
                
        }	
       
       return $row;
       
       
   } //get_client_info
    
   
   
   //match member paswword 
   //
    public function match_member_password( $member_id ) {
               
         
                if( !empty($member_id)){	
		$STM = $this->db->prepare("select member_password from team_members where member_user_id=?");
		$STM->bindParam(1,$member_id);		
               
                $STM->execute();
		$STM->setFetchMode(PDO::FETCH_ASSOC);
		$row = $STM->fetch();	
                return $row;
                }
	 
       
       
   } // 
   
   //Update member password
   public function update_member_password($password, $member_id) {
       
       $sql = "UPDATE `team_members`   
              SET `member_password` = :password             
             WHERE `member_user_id` = :user_id";
       
        $statement = $this->db->prepare($sql);
        $statement->bindValue(":password", $password );
        $statement->bindValue(":user_id", $member_id );
        $update = $statement->execute();
   }
   
   
   
   //Update password by email
    public function reset_member_password($password, $email) {
       
       $sql = "UPDATE `team_members`   
              SET `member_password` = :password             
             WHERE `member_email` = :email";
       
        $statement = $this->db->prepare($sql);
        $statement->bindValue(":password", $password );
        $statement->bindValue(":email", $email );
        $update = $statement->execute();
        
        return $update ? TRUE :  FALSE;
   }
   
   
   
    //Update member password
   public function update_member_image($image_path, $member_id) {
       
        $sql = 'UPDATE team_members SET image_path = "'.$image_path.'" WHERE member_user_id= "'.$member_id.'"  LIMIT 1';
        
        $STM = $this->db->prepare($sql);
               
        $update = $STM->execute() ? true : false;
        
        return $update;
   }
   
   
   // Get image path 
    public function get_member_image_path($member_id) {
       
         if( !empty($member_id) ){	
		$STM = $this->db->prepare("select image_path from team_members where member_user_id=?");
		$STM->bindParam(1,$member_id);
		$STM->execute();		
		$row = $STM->fetch();	
                
                return $row;
         }
   }
   
   public function get_member_name( $member_id ) {
       $statement = $this->db->query("SELECT * FROM team_members WHERE member_user_id =$member_id ");
       $statement->setFetchMode(PDO::FETCH_ASSOC);       
       $row = $statement->fetch();       
       return $row;
   }
   
   
    
    
 
} //class 


/*  
// Test Data
 
$obj = new TeamMembers();
   
$re = $obj->get_member_image_path(18);
echo $re['image_path'];
 * 
 */
  
    
   