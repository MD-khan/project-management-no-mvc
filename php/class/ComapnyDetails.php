<?php 

 require_once 'Dbconnection.php';  
class ComapnyDetails {
    
      private $db;
      
      //Construction
    public function __construct() {
        $this->db = new Dbconnection();
        $this->db = $this->db->dbCon();
    }
    
    
    // by admin ID 
   public function get_company_details( $admin_id ) {
       $statement = $this->db->query('SELECT * FROM `companies`
                                      WHERE companies.`admin_user_id` = '.$admin_id.' ');
       
       $statement->setFetchMode(PDO::FETCH_ASSOC);       
             $results = array();     
            while( $row = $statement->fetch() ) {  
                $results[] = $row;                 
            }
              return $results;      
         
   
   }
    
    
    // get company details by company id
   public function get_single_company_details( $company_id ) {
       
       $statement = $this->db->query('SELECT * FROM companies WHERE company_id = '.$company_id.' ');
       $statement->setFetchMode(PDO::FETCH_ASSOC);   
       $row = $statement->fetch();
       
       return $row;
   }
   
   //Total Companies by Admin Id
    public function total_companies( $admin_id ) {
       
        $statement = $this->db->query('SELECT COUNT(companies.company_id) AS TOTAL_COMPANIES
                                     FROM companies
                                     LEFT JOIN admin_user ON admin_user.admin_user_id = companies.admin_user_id
                                     WHERE companies.admin_user_id = '.$admin_id.' ');
       
       $statement->setFetchMode(PDO::FETCH_ASSOC);
        
       if ($statement->rowCount() > 0) {
            $row = $statement->fetch();
            return $row;
         } else {
                return FALSE;
             }
        
   }
   
   
   
   //update company
   
   public function update_company( $data ) {
       
     
        $sql = "UPDATE `companies`   
              SET 
                  `company_name`    = :company,
                  `street`          = :street,
                  `company_city`    = :city,
                  `company_state`   = :state,
                  `company_zipcode` = :zipcode,
                  `company_country` = :country,
                  `company_phone`   = :phone,
                  `company_website` = :website
                  
              WHERE `company_id`    = :id";
       
        $statement = $this->db->prepare($sql);
        
        $statement->bindValue(":company", $data['company'] );
        $statement->bindValue(":street",  $data['street'] );
        $statement->bindValue(":city",    $data['city'] );
        $statement->bindValue(":state",   $data['state'] );
        $statement->bindValue(":zipcode", $data['zipcode'] );
        $statement->bindValue(":country", $data['country'] );
        $statement->bindValue(":phone",   $data['phone'] );
        $statement->bindValue(":website", $data['website'] );
        $statement->bindValue(":id",      $data['company_id'] );
         
         
        $update = $statement->execute();
        
        return $update ? TRUE : FALSE ;
   }
   
   
   
   
   
    
}// class

 
 /*
// Test class 
  $obj = new ComapnyDetails();
  
  $data = array(
    'city'           => 'dhaka',
    'state'          => $_POST['state'],
    'zipcode'        => $_POST['zipcode'],
    'country'        => $_POST['country'],
    'website'        => $_POST['website'],
    'phone'          => $_POST['phone'],
    'company_id'     => $_POST['company_id']
);
 
  $result = $obj->update_company( $data );
  
  var_dump($result);
  * 
  */
   

  