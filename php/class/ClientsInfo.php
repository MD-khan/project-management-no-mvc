<?php 
 
 require_once 'Dbconnection.php';  
class ClientsInfo {
    
    private $company_id, $client_id;
    private $website;
    private $web_id = null;


    private $db;
    
    
    public $client_email;
    public $client_pass;


    //Construction
    public function __construct() {
        $this->db = new Dbconnection();
        $this->db = $this->db->dbCon();
    }
    
    
    public function get_client_company_id( $comid ) {
         $this->company_id = $comid;
    }
    
     
   // Get Clients Name by company id
 	  public function get_client_names( $company_id ) {
   		 $statement = $this->db->query('SELECT `client_key_fname`, `client_key_lname`, client_id FROM `clients` 
                                                LEFT JOIN companies ON companies.company_id = clients.`company_id` WHERE 
						clients.`company_id` = '. $company_id.''); 
									     
      	 
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
      
    // get single company info 
    public  function get_single_company($company_id) {
         $statement = $this->db->query("SELECT * FROM `companies` WHERE `company_id` = $company_id"); 
          $statement->setFetchMode(PDO::FETCH_ASSOC);
          
          $row = $statement->fetch();                        
            
              return $row;      
    }






    // Get Clients Name by company id
 	  public function get_key_contacts ( $company_id ) {
   		 $statement = $this->db->query('SELECT * FROM `clients` 
                                                LEFT JOIN companies ON companies.company_id = clients.`company_id` WHERE 
						clients.`company_id` = '. $company_id.''); 
									     
      	 
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
      
      
      
    
    // Get copmanies and clients info 
       public function get_clients( $admin_id ) {
   		 $statement = $this->db->query("SELECT *  FROM `companies`                                 
                                WHERE admin_user_id = $admin_id GROUP BY companies.company_id" ); 
									     
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
      
   // Get copmanies total projets 
       public function get_clients_total_projets( $company_id ) {
   		 $statement = $this->db->query("SELECT COUNT(`company_id`)AS TIMES_IN_PROJECTS FROM `projects`  
                                WHERE  company_id = $company_id "); 
									     
      	  $statement->setFetchMode(PDO::FETCH_ASSOC);       
               
            $row = $statement->fetch();                        
            
              return $row;      
      }
      
      
   
   // Cleints by admin id
   public function get_client_info( $client_id ) {
       
       $statement = $this->db->query("SELECT * FROM clients WHERE `client_id` = $client_id ORDER BY client_id DESC");
       $statement->setFetchMode(PDO::FETCH_ASSOC);
       
       $row = $statement->fetch();
       
       return $row;
       
   } //get_client_info
   
   
   // Total Clients  by admin id
   public function get_total_clients() {
       
       $statement = $this->db->query('SELECT COUNT(`client_id`) AS TOTAL_CLIENTS FROM clients');
       $statement->setFetchMode(PDO::FETCH_ASSOC);
        
       if ($statement->rowCount() > 0) {
            $row = $statement->fetch();
            return $row;
         } else {
                return FALSE;
             }
        
       
   }  
    
    // Total Clients  by admin id
   public function get_total_companies( $admin_id ) {
       
       $statement = $this->db->query("SELECT COUNT(`company_id`) AS TOTAL_CLIENTS FROM companies"
               . " WHERE admin_user_id = $admin_id");
       $statement->setFetchMode(PDO::FETCH_ASSOC);
        
       if ($statement->rowCount() > 0) {
            $row = $statement->fetch();
            return $row;
         } else {
                return FALSE;
             }
        
       
   } //get_client_info
   
   
   
   // get key contac person name 
   public function get_key_contanct( $client_id ) {
        $statement = $this->db->query("SELECT * FROM `clients` WHERE `client_id` = $client_id ");
      
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        
       if ($statement->rowCount() > 0) {
            $row = $statement->fetch();
            return $row;
         } else {
                return FALSE;
             }
       
   }
   
   
    // get key contac person name 
   public function get_key_name( $company_id ) {
        $statement = $this->db->query("SELECT * FROM `clients` WHERE `company_id` = $company_id ");
      
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        
       if ($statement->rowCount() > 0) {
            $row = $statement->fetch();
            return $row;
         } else {
                return FALSE;
             }
       
   }
   
   
   // get key contac person name 
   public function get_email() {
        
       $statement = $this->db->query("SELECT client_key_email FROM `clients`");         
       $statement->setFetchMode(PDO::FETCH_ASSOC);
       $results = array();     
       
       while( $row = $statement->fetch() ) {  
                $results[] = $row;                 
            }
        return $results;  
      
    }







   // client Login 
    public function client_login( $email, $pass ) {
       
        try {
            if(!empty($email) && !empty($pass)){	
            $STM = $this->db->prepare("select * from clients "
                    . "where client_key_email=?"
                    . "AND client_password=?");
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
	 
        return $row;
       
   }  
  
   
    
   
   // update comapny info
   public function update_company( $com_id , $company_name ) {
        
        $sql = "UPDATE companies"
                . " SET company_name= $company_name "
                . "WHERE company_id= $com_id";


        $statement = $this->db->prepare($sql);
          
        
        $statement->execute();
        
       // echo $statement->rowCount() . " records UPDATED successfully";
        }


         
   // Get image path 
    public function get_client_image_path( $client_id ) {
       
         if( !empty($client_id) ){	
		$STM = $this->db->prepare("select image_path from clients where client_id=?");
		$STM->bindParam(1,$client_id);
		$STM->execute();		
		$row = $STM->fetch();	
                
                return $row;
         }
   }
   
   
   
   public function get_client_company_path( $company_id ) {
       
         if( !empty($company_id) ){	
		$STM = $this->db->prepare("select image_path from companies where company_id=?");
		$STM->bindParam(1,$company_id);
		$STM->execute();		
		$row = $STM->fetch();	
                
                return $row;
         }
   }
   
    public function match_client_password( $client_id ) {               
         
                if( !empty($client_id)){	
		$STM = $this->db->prepare("select client_password from clients where client_id=?");
		$STM->bindParam(1,$client_id);		
               
                $STM->execute();
		$STM->setFetchMode(PDO::FETCH_ASSOC);
		$row = $STM->fetch();	
                return $row;
                }
	 
       
       
   } //get_client_info
   
  
   //Update member password
   public function update_client_password($password, $client_id) {
        
        $sql = "UPDATE `clients`   
                SET `client_password` = :password             
                WHERE `client_id` = :user_id";
       
        $statement = $this->db->prepare($sql);
        $statement->bindValue(":password", $password );
        $statement->bindValue(":user_id", $client_id );
        $update = $statement->execute();
          
   }
   
   
   //Update member password
   public function reset_client_password($password, $email) {
        
        $sql = "UPDATE `clients`   
                SET `client_password` = :password             
                WHERE `client_key_email` = :user_id";
       
        $statement = $this->db->prepare($sql);
        $statement->bindValue(":password", $password );
        $statement->bindValue(":user_id", $email );
        $update = $statement->execute();
        
         return $update ? TRUE :  FALSE;
          
   }
   
   
   
     //Update client image
   public function update_client_image($image_path, $client_id ) {
       
        $sql = 'UPDATE clients SET image_path = "'.$image_path.'" WHERE client_id= "'.$client_id.'"  LIMIT 1';
        
        $STM = $this->db->prepare($sql);
               
        $update = $STM->execute() ? true : false;
        
        return $update;
   }
   
   
   
     //Update client image
   public function update_company_image($image_path, $company_id ) {
       
        $sql = 'UPDATE companies SET image_path = "'.$image_path.'" WHERE company_id= "'.$company_id.'"  LIMIT 1';
        
        $STM = $this->db->prepare($sql);
               
        $update = $STM->execute() ? true : false;
        
        return $update;
   }
   
   
   public function update_key_contact( $data ){
        
        $sql = "UPDATE `clients`   
              SET 
                  `client_key_phone`    = :phone,
                  `key_mobile`          = :mobile,
                  `client_key_email`    = :email
                   
              WHERE `client_id` = :id";
       
        $statement = $this->db->prepare($sql);
        
        $statement->bindValue(":phone",   $data['phone'] );
         $statement->bindValue(":mobile", $data['mobile'] );
        $statement->bindValue(":email",   $data['email'] );         
        $statement->bindValue(":id",      $data['id'] );
         
         
        $update = $statement->execute();
        
        return $update ? TRUE : FALSE ;
       
   }

   

   // Client Web Site 
    public function get_web_site_info( $client_id, $company_id, $website ){
       
       $this->client_id = $client_id;
       $this->company_id = $company_id;
       $this->website = $website;       
    }
    
    
    public function set_web_site_info() {
        
        // date_default_timezone_set('US/Eastern');
        date_default_timezone_set('America/New_York');
        $reg_time = date('Y-m-d: G:H:i:s');
              
        $qsl = "INSERT INTO cleint_websites ( web_id, client_id, 
                company_id, website, date ) VALUES( ?, ?, ?, ?, ? )";
        $statement = $this->db->prepare( $qsl );
        
        $statement->bindParam(1,  $this->web_id);
        $statement->bindParam(2,  $this->client_id );      
        $statement->bindParam(3,  $this->company_id );
        $statement->bindParam(4,  $this->website );            
        $statement->bindParam(5,  $reg_time);
        
        $result = $statement->execute() ? true : false;
        return $result;
    }

    // Get copmanies and clients info 
        public function get_websites( $company_id ) {
   		 
            $statement = $this->db->query("SELECT *  FROM `cleint_websites`                                 
                                WHERE company_id = $company_id ORDER BY web_id DESC" ); 
									     
      	    $statement->setFetchMode(PDO::FETCH_ASSOC);		 
            $clients = array(); 
                
                if ($statement->rowCount() > 0) {	 
            
                    while( $row = $statement->fetch() ) {                 
                        $clients[] = $row;              
                    }
                    return $clients;  
                 
                    
                }else {
                    return FALSE;
                    }
        }
        
        
         public function get_single_web( $web_id ) {               
         
                if( !empty( $web_id )){	
		$STM = $this->db->prepare("select website from cleint_websites where web_id=?");
		$STM->bindParam(1,$web_id );		
               
                $STM->execute();
		$STM->setFetchMode(PDO::FETCH_ASSOC);
		$row = $STM->fetch();	
                return $row;
                
                }
         }

   
        public function __toString(){
	  return $this->customerEmail;
	  }
   
    
}// class

 
 
 /*
// Test class 
   $obj = new ClientsInfo();
   $id = $obj->update_company( 1, "dfdsfsdfgsgsd");
  
   var_dump($id);
  * 
  */
   
  
  
 