<?php 
// require_once 'Dbconnection.php';  
class SetupCompany {
    
    public $company_name; 
    public $company_street;
    public $company_city;
    public $company_state;
    public $company_zipcode;
    public $company_country;
    public $company_phone;
    public $company_website;    
    
    public $company_id = NULL;
     public $admin_user_id;
    
     private $db;
    
    //Construction
    public function __construct() {
        $this->db = new Dbconnection();
        $this->db = $this->db->dbCon();
    }

    // get and filter team member  data 
    public function getCompanyInfo( $company_name, $admin_id, $street, $company_city, $company_state, $company_zipcode, 
                                    $company_country, $company_phone, $company_website){
        
        $this->company_name = $company_name;
        $this->admin_user_id = $admin_id;
        $this->company_street = $street;
        $this->company_city = $company_city;
        $this->company_state = $company_state;
        $this->company_zipcode = $company_zipcode;
        $this->company_country = $company_country;
        $this->company_phone = $company_phone;
        $this->company_website = $company_website;
       
    } //setClientInfo 
 
    
    // Insert into database
    public function setCompanyInfo(){
        
        $reg_time = date('Y-m-d: G:H:i:s');
        
        $statement = $this->db->prepare( "INSERT INTO companies ( company_id, admin_user_id, company_name, 
                                        street, company_city, company_state, company_zipcode, company_country, company_phone, company_website, date ) 
                                        VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?,? ) " );
        
        $statement->bindParam(1,  $this->company_id);
        $statement->bindParam(2,  $this->admin_user_id);
        $statement->bindParam(3,  $this->company_name);
        $statement->bindParam(4,  $this->company_street);
        $statement->bindParam(5,  $this->company_city);
        $statement->bindParam(6,  $this->company_state);
        $statement->bindParam(7,  $this->company_zipcode);
        $statement->bindParam(8,  $this->company_country);
        $statement->bindParam(9,  $this->company_phone);
        $statement->bindParam(10,  $this->company_website);
        $statement->bindParam(11,  $reg_time);
        
        $result = $statement->execute() ? true : false;
        return $result;
    }
 
 
} //class 




 /**
// Test Data

$obj = new SetupCompany();
$obj->getCompanyInfo('md', 'khan', 'web', 'gfsdg', '617', '@', '5/5/5/', '1234567' );
$re = $obj->setCompanyInfo();

if($re) {
    echo "data insertet";    
} else {
    echo "No";
}
 
  * 
  * 
  */
