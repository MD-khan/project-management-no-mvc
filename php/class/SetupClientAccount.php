<?php

require_once 'Dbconnection.php';
  
class SetupClientAccount {
    
    public $client_title;
    public $client_fname;
    public $client_lname;
    public $client_phone;
     public $client_mobile;
    public $client_email;
    public $client_password;
    
    public $client_id = NULL;
    public $admin_user_id;
    public $company_id;
    
       private $db;
    
    //Construction
    public function __construct() {
        $this->db = new Dbconnection();
        $this->db = $this->db->dbCon();
    }

    // get and filter client data 
    public function getClientInfo( $admin_id, $company_id, $c_title, $c_fname, $c_lname, $c_phone, $c_mobile, $c_email, $c_pass){
        
        $this->admin_user_id= $admin_id;
        $this->company_id = $company_id;
        $this->client_title = $c_title;
        $this->client_fname = $c_fname;
        $this->client_fname = $c_fname;
        $this->client_lname = $c_lname;
        $this->client_phone = $c_phone;
        $this->client_mobile = $c_mobile;
        $this->client_email = $c_email;
        $this->client_password = $c_pass;
    } //setClientInfo 
 
    
    // Insert into database
    public function setClinetInfo(){
        $reg_time = date('Y-m-d: G:H:i:s');
        $statement = $this->db->prepare( "INSERT INTO clients ( client_id,admin_user_id, company_id, title, client_key_fname, client_key_lname,
                client_key_phone, key_mobile, client_key_email, client_password, date ) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) " );
        
        $statement->bindParam(1,  $this->client_id);
        $statement->bindParam(2,  $this->admin_user_id);
        $statement->bindParam(3,  $this->company_id);
        $statement->bindParam(4,  $this->client_title);
        $statement->bindParam(5,  $this->client_fname);
        $statement->bindParam(6,  $this->client_lname);
        $statement->bindParam(7,  $this->client_phone);
        $statement->bindParam(8,  $this->client_mobile);
        $statement->bindParam(9,  $this->client_email);
        $statement->bindParam(10,  $this->client_password);
        $statement->bindParam(11,  $reg_time);
        
        $result = $statement->execute() ? true : false;
        return $result;
    }
/**
// Retrive Client 
    public function clients(){
       
        $sth = $this->db->query('SELECT * FROM clients');
        
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $row = $sth->fetch();
         
        while( $row = $sth->fetch() ) {
            echo $row['client_key_lname'];
            echo "hi";
        }
        
         foreach($this->db->query('SELECT * FROM clients') as $row) {
             echo $row['lient_key_fname'].' '.$row['client_key_lname']; //etc...
             }
         }
     
    
        }
        */
 
}


/**
// Test Data

$obj = new SetupClientAccount();
$obj->getClientInfo('md', 'khan', '12212454', 'fdsfdsf@fdsf', '12345678','22','2222');
$re = $obj->setClinetInfo();

if($re) {
    echo "data insertet";    
} else {
    echo "No";
}
 * 
 */
