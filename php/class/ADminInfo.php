<?php 
// include 'autoloader.php';
// require_once 'Dbconnection.php';  
class ADminInfo {
    
      private $db;
      
      //Construction
    public function __construct() {
        $this->db = new Dbconnection();
        $this->db = $this->db->dbCon();
    }
    
   public function get_admin_details() {
       $statement = $this->db->query('SELECT * FROM admin_user ');
       $statement->setFetchMode(PDO::FETCH_ASSOC);       
       $row = $statement->fetch();       
       return $row;
   }
   
   
    public function get_admin_name( $admin_id ) {
       $statement = $this->db->query("SELECT * FROM admin_user WHERE admin_user_id = $admin_id ");
       $statement->setFetchMode(PDO::FETCH_ASSOC);       
       $row = $statement->fetch();       
       return $row;
   }
   
   
   // Customer Login 
    public function admin_login( $email, $pass ) {
        
        try {
                if(!empty($email) && !empty($pass)){	
		$STM = $this->db->prepare( "select * from admin_user "
                        . "where admin_email=?"
                        . "AND admin_password=? " );
		$STM->bindParam(1,$email);
                $STM->bindParam(2,$pass);
		$STM->execute();
		$STM->setFetchMode(PDO::FETCH_ASSOC);
		$row = $STM->fetch();			
                }//if 1
				
					 	
			 }catch (PDOException $e) {
    	//Do your error handling here
  		  $message = $e->getMessage();
			}
		//error handle	  
       
       return $row;
       
   } //get_client_info
   
   
   
   //match member paswword 
   // client Login 
    public function match_admin_password( $admin_id ) {
               
         
                if( !empty($admin_id)){	
		$STM = $this->db->prepare("select admin_password from admin_user where admin_user_id=?");
		$STM->bindParam(1,$admin_id);		
               
                $STM->execute();
		$STM->setFetchMode(PDO::FETCH_ASSOC);
		$row = $STM->fetch();	
                return $row;
                }
	 
   } //get_client_info
   
   
   
   //Update member password
   public function update_admin_password($password, $admin_id ) {
       
       $sql = "UPDATE `admin_user`   
              SET `admin_password` = :password             
              WHERE `admin_user_id` = :user_id";
       
        $statement = $this->db->prepare($sql);
        $statement->bindValue(":password", $password );
        $statement->bindValue(":user_id", $admin_id );
        $update = $statement->execute();
   }
   
   //Update admin password by email
   public function reset_admin_password($password, $email ) {
       
       $sql = "UPDATE `admin_user`   
              SET `admin_password` = :password             
              WHERE `admin_email` = :user_id";
       
        $statement = $this->db->prepare($sql);
        $statement->bindValue(":password", $password );
        $statement->bindValue(":user_id", $email );
        $update = $statement->execute();
        
         return $update ? TRUE :  FALSE;
   }
   
   
   
     //Update client image
   public function update_admin_image($image_path, $admin_id ) {
       
        $sql = 'UPDATE admin_user SET image_path = "'.$image_path.'" WHERE admin_user_id= "'.$admin_id.'"  LIMIT 1';
        
        $STM = $this->db->prepare($sql);
               
        $update = $STM->execute() ? true : false;
        
        return $update;
   }
   
   
   
   
   // Get image path 
    public function get_admin_image_path( $admin_id ) {
       
         if( !empty($admin_id) ){	
		$STM = $this->db->prepare("select image_path from admin_user where admin_user_id=?");
		$STM->bindParam(1,$admin_id );
		$STM->execute();		
		$row = $STM->fetch();	
                
                return $row;
         }
   }
   
   
    
}// class


 /***
// Test class 
$obj = new ADminInfo();
 
 // $result = $obj->get_admin_details();
 $result = $obj->admin_login("paul.scott@goingclear.com", "123" );
 echo $result['admin_fname'];
  * 
  */
  


 