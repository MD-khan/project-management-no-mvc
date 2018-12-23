<?php 

date_default_timezone_set('America/New_York');        
 require_once 'Dbconnection.php';  

 
 
 class SiteProfile {
     
    public $id = null;
    
    private $admin_id, $member_id, $company_id;
    private $profile_details;
    private $db;
    
   
      
    //Construction
    public function __construct() {
        
        $this->db = new Dbconnection();
        
        $this->db = $this->db->dbCon();
    }
    
    
    public function setFileProperty( $data ) {
        
       $this->admin_id   = $data['admin_id'];
       $this->member_id =$data['member_id'];
       $this->company_id =$data['company_id'];
       $this->profile_details = $data['profile-details'];
       
       return $data;
    }
    
    
    public function save() {       
      
            $reg_time = date('Y-m-d: G:H:i:s');            
            error_reporting(E_ALL); 
            ini_set("display_errors", 1);
     
            try
            {   
                $sql = "INSERT INTO `site-profile` ( site_id, admin_id, team_id,company_id, details, date) 
                       VALUES( ?, ?,?,?,?,? )";

                $statement = $this->db->prepare( $sql );
                $statement->bindParam(1,  $this->id );   
                $statement->bindParam(2,  $this->admin_id );  
                $statement->bindParam(3,  $this->member_id ); 
                $statement->bindParam(4,  $this->company_id ); 
                $statement->bindParam(5,  $this->profile_details );
                $statement->bindParam(6,  $reg_time);

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
    
    
    //show site profiles    
    public function show_site_profiles( $admin_id ) {
        
         error_reporting(E_ALL); 
         ini_set("display_errors", 1);
         
        try 
        {
            $sql = "SELECT `site-profile` .`details`, `site-profile` .`company_id`, `companies`.`company_name` FROM `site-profile`, `companies`
                    WHERE  `site-profile`.`company_id` = `companies`. `company_id`
                    AND `site-profile`.`admin_id` = $admin_id ORDER BY `site-profile`.`company_id` DESC";
 
            
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
    
    
     //show a site profile     
    public function show_site_profile( $company_id ) {
        
         error_reporting(E_ALL); 
         ini_set("display_errors", 1);
         
        try 
        {
            $sql = "SELECT `site-profile` .`details`, `site-profile` .`company_id`, `companies`.`company_name` FROM `site-profile`, `companies`
                    WHERE  `site-profile`.`company_id` = `companies`. `company_id`
                    AND `site-profile`.`company_id` = $company_id ORDER BY `site-profile`.`company_id` DESC";
 
            
            $statement = $this->db->query($sql);
           
            $statement->setFetchMode(PDO::FETCH_ASSOC);                   
            $error = $statement->errorInfo();
            
            if ( $error[0] !== '00000') { // if success 
                     echo '<pre>';
                         print_r( $error );
                     echo '</pre>';
                    
                }else {                     
                      
                 if ($statement->rowCount() > 0) {
                    $row = $statement->fetch();
                     return $row;
         } else {
                return FALSE;
             } 
                    
                }
        }
        catch(Exception $e)
        {
            echo($e->getMessage());
        }
         
   
    }
    
    
     public function update_site_profile( $data ) {       
     
        $sql = "UPDATE `site-profile`   
              SET  `details` = :details                              
              WHERE `company_id` = :id";
       
        $statement = $this->db->prepare($sql);
        
        $statement->bindValue(":details", $data['profile-details'] );        
        $statement->bindValue(":id",      $data['company_id'] );
         
         
        $update = $statement->execute();
        
        return $update ? TRUE : FALSE ;
    
     }
     
    
    
}// class
 
 

 