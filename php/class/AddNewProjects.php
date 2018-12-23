<?php
require_once 'Dbconnection.php';  
/**
 *  Add Projets 
 * Description: Company and key contacts will be selected while addinig projets.
 *              If Company is not listed, promot admin to add company, 
 */


class AddNewProjects {
    
    public $projetc_name;
    public $project_type;
    public $projetc_status;
    public $project_cost;
    public $project_start_date;
    public $project_end_date;
    
    public $projetc_id = NULL;
    
    public $member_id;
    public $admin_user_id; // detect by session
    public $company_id; // detect by company selections
    public $client_id; // detect by client selections 
    public $project_cat_id; // detect by projrcy category
    
     private $db;
    
    //Construction
    public function __construct() {
        $this->db = new Dbconnection();
        $this->db = $this->db->dbCon();
    }

    // get and filter client data 
    public function getProjectInfo( $p_cat_id, $p_admin_id, $p_client_id, $p_member_id, $p_company_id, $p_name,$p_status,$p_cost,
                                      $p_start_date, $p_end_date ){
              
        $this->admin_user_id = $p_admin_id;
        $this->company_id = $p_company_id;
        $this->client_id = $p_client_id;
        $this->member_id = $p_member_id;
        $this->project_cat_id = $p_cat_id;
        $this->projetc_name = $p_name;
        $this->projetc_status = $p_status;
        $this->project_cost = $p_cost;
      //  $this->project_start_date = date('Y-m-d H:i:s', strtotime($p_start_date));   // Convert to Timestamp format
       // $this->project_end_date =  date('Y-m-d H:i:s', strtotime($p_end_date));  // Convert to Timestamp format
        
        $this->project_start_date = $p_start_date;   // Convert to Timestamp format
         $this->project_end_date =  $p_end_date;  // Convert to Timestamp format
        
        // Formating Date
        
        
                
    } //setClientInfo 
 
    
    // Insert into database
    public function setProjectInfo(){
        
        date_default_timezone_set('America/New_York');
        $reg_time = date('Y-m-d: G:H:i:s');       
        
        $statement = $this->db->prepare( "INSERT INTO projects ( project_id, project_cat_id, admin_user_id, client_id, member_id, company_id, project_name,
                project_status, project_cost, project_start_date, project_end_date, date ) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) " );
        
        $statement->bindParam(1,  $this->projetc_id);
        $statement->bindParam(2,  $this->project_cat_id);
        $statement->bindParam(3,  $this->admin_user_id);
        $statement->bindParam(4,  $this->client_id);
        $statement->bindParam(5,  $this->member_id);
        $statement->bindParam(6,  $this->company_id);
        $statement->bindParam(7,  $this->projetc_name);
        $statement->bindParam(8,  $this->projetc_status);
        $statement->bindParam(9,  $this->project_cost);
        $statement->bindParam(10,  $this->project_start_date);
        $statement->bindParam(11,  $this->project_end_date);
        $statement->bindParam(12,  $reg_time);
        
        $result = $statement->execute() ? true : false;
        return $result;
    }
    
}//class 
 
    
// Test Data
 
/***

 $obj = new AddNewProjects();
 $obj->getProjectInfo( '4', '1', '3','9', '15', 'Flight Booking', 'Completed', '80000', '1/1/2013', '4/1/2012');
 $re = $obj->setProjectInfo();

 if($re) {
   echo "data insertet";    
 } else {
    echo "No";
 }
 * 
 */
  
