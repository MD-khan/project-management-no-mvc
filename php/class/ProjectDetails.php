<?php 

  //include_once 'Dbconnection.php';

class ProjectDetails {
      
    private $db;
    
    //Construction
    public function __construct() {
        $this->db = new Dbconnection();
        $this->db = $this->db->dbCon();
    }
    
    
    // Gets total project by an admin id
    public function total_projects( $admin_id ) {
        
        $statement = $this->db->query('SELECT COUNT(`project_id`) AS TOTAL_PROJETCS
                                        FROM `projects` 
                                        WHERE admin_user_id = '.$admin_id.' ');
      
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        if ($statement->rowCount() > 0) {
            $row = $statement->fetch();
            return $row;
         } else {
                return FALSE;
             }
        
        }
        
     // Total Open Projects by admin id        
    public function total_open_projetcs( $admin_id ) {  
        
         $statement = $this->db->query("SELECT COUNT(`project_id`) AS TOTAL_OPEN_PROJECT "
                                        . "FROM projects "
                                        . "WHERE ( projects.project_status= 'Begin' "
                                        . "OR projects.project_status = 'open')"
                                        . "AND projects.admin_user_id = $admin_id");
        
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        if ($statement->rowCount() > 0) {
            $row = $statement->fetch();
            return $row;
         } else {
                return FALSE;
             }
        
     }// total_open_projets    
        
     
     // Total Revenues by completed projects
     public function total_revenues( $admin_id ) {  
        
         $statement = $this->db->query("SELECT SUM(`project_cost`) AS TOTAL_REVENUES FROM `projects` 
                       WHERE `project_status` = 'complete'
                        AND projects.`admin_user_id` = $admin_id");
        
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        
        if ($statement->rowCount() > 0) {
            $row = $statement->fetch();
            return $row;
         } else {
                return FALSE;
             } 
     }//total_revenues
     
     
     // Total Revenues by completed projects
     public function get_single_project_info( $project_id ) {  
        
         $statement = $this->db->query("SELECT * FROM `projects` WHERE `project_id` = $project_id");
        
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        
        if ($statement->rowCount() > 0) {
            $row = $statement->fetch();
            return $row;
         } else {
                return FALSE;
             } 
     }  
     
          
     // Check if project exost
     public function has_project( $project_name) {  
        
        $statement = $this->db->query("SELECT project_name  FROM `projects`"
                . "WHERE LOWER(project_name) LIKE '$project_name' " );         
        
        $statement->setFetchMode(PDO::FETCH_ASSOC);        
        
        $row = $statement->fetch(); 
        
        if ( $row ) {
            return TRUE;
        } else { return FALSE; }
           
          
     }  
     
     
     
     
    
 // Generate reports with project name, company name, key contact person, project cost, projet status for an admin 

     public function admin_project_details( $admi_id ) {      
        
         $statement = $this->db->query('SELECT * FROM projects LEFT JOIN clients ON projects.client_id = clients.client_id '
                       . 'LEFT JOIN project_types ON projects.project_cat_id=project_types.project_cat_id'
                      . ' LEFT JOIN companies ON companies.company_id=projects.company_id '
                      . 'WHERE projects.admin_user_id = '.$admi_id.' ORDER BY projects.project_id DESC');
        
        $statement->setFetchMode(PDO::FETCH_ASSOC);        
                     
           $results = array();     
            while( $row = $statement->fetch() ) {                 
                $results[] = $row;              
                 
            }
              return $results;  
    } //report_project_details   
   
    
    public function admin_open_projects_list( $admin_id ) {              
         $statement = $this->db->query(' SELECT * FROM projects  
                                        LEFT JOIN project_types ON project_types.`project_cat_id` = projects.`project_cat_id`
                                        LEFT JOIN companies ON companies.`company_id` = projects.`company_id`
                                       WHERE projects.admin_user_id = '.$admin_id.'
                                      AND projects.`project_status` != "complete"
                                      GROUP BY projects.`project_id` DESC
                                  ');
        
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        
       $statement->setFetchMode(PDO::FETCH_ASSOC);        
                     
           $results = array();     
            while( $row = $statement->fetch() ) {                 
                $results[] = $row;              
                 
            }
              return $results;  
    } //open-projec
    
    
    
    
     public function admin_closed_projects_list( $admin_id ) {              
         $statement = $this->db->query(' SELECT * FROM projects  
                                        LEFT JOIN project_types ON project_types.`project_cat_id` = projects.`project_cat_id`
                                        LEFT JOIN companies ON companies.`company_id` = projects.`company_id`
                                       WHERE projects.admin_user_id = '.$admin_id.'
                                      AND projects.`project_status` = "complete"
                                      GROUP BY projects.`project_id` DESC
                                  ');
        
        $statement->setFetchMode(PDO::FETCH_ASSOC);       
             
                     
           $results = array();     
            while( $row = $statement->fetch() ) {                 
                $results[] = $row;              
                 
            }
              return $results;  
    } //admin_closed_projects_list
    
    
    
    
    
     public function admin_runing_projects_list( $admin_id ) {              
         $statement = $this->db->query(' SELECT * FROM projects  
                                        LEFT JOIN project_types ON project_types.`project_cat_id` = projects.`project_cat_id`
                                        LEFT JOIN companies ON companies.`company_id` = projects.`company_id`
                                       WHERE projects.admin_user_id = '.$admin_id.'
                                      AND projects.`project_status` = "open"
                                      GROUP BY projects.`project_id` DESC
                                  ');
        
  
        
       $statement->setFetchMode(PDO::FETCH_ASSOC);        
                     
           $results = array();     
            while( $row = $statement->fetch() ) {                 
                $results[] = $row;              
                 
            }
              return $results;  
    } //admin_runing_projects_list
    
    
     public function admin_begining_projects_list( $admin_id ) {              
         $statement = $this->db->query(' SELECT * FROM projects  
                                        LEFT JOIN project_types ON project_types.`project_cat_id` = projects.`project_cat_id`
                                        LEFT JOIN companies ON companies.`company_id` = projects.`company_id`
                                       WHERE projects.admin_user_id = '.$admin_id.'
                                      AND projects.`project_status` = "Begin"
                                      GROUP BY projects.`project_id` DESC
                                  ');
        
       
        
       $statement->setFetchMode(PDO::FETCH_ASSOC);        
                     
           $results = array();     
            while( $row = $statement->fetch() ) {                 
                $results[] = $row;              
                 
            }
              return $results;  
    } //admin_begining_projects_list
    
    
    
     public function admin_all_projects_list( $admin_id ) {              
         $statement = $this->db->query(' SELECT * FROM projects  
                                        LEFT JOIN project_types ON project_types.`project_cat_id` = projects.`project_cat_id`
                                        LEFT JOIN companies ON companies.`company_id` = projects.`company_id`
                                       WHERE projects.admin_user_id = '.$admin_id.'                                          
                                      GROUP BY projects.`project_id` DESC
                                  ');
         
       $statement->setFetchMode(PDO::FETCH_ASSOC);        
                     
           $results = array();     
            while( $row = $statement->fetch() ) {                 
                $results[] = $row;              
                 
            }
              return $results;  
    } //admin_begining_projects_list
    
     
     
     /* ============== Clients ============================================= */
     
     
    public function client_total_projects( $company_id ){        
         
        $sql = "SELECT COUNT(project_id) AS TOTAL_PROJECT FROM projects  WHERE `company_id` = $company_id";
         
        $statement = $this->db->query( $sql );        
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $row = $statement->fetch();
        return $row['TOTAL_PROJECT']; 
    }
          
     
    public function client_open_projects( $company_id ){
         
        $sql = 'SELECT COUNT(project_id) AS TOTAL_PROJECT FROM projects 
                WHERE `company_id` = '.$company_id.'
                AND  `project_status`= "open" ';
        
        $statement = $this->db->query( $sql );        
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $row = $statement->fetch();
        return $row['TOTAL_PROJECT'];          
     }
     
     
     
    // Client Open Projects List 
      public function client_open_projects_list( $company_id ) {              
         $statement = $this->db->query('SELECT * FROM projects 
                                        LEFT JOIN clients ON projects.client_id = clients.client_id 
                                        LEFT JOIN project_types ON projects.project_cat_id=project_types.project_cat_id 
                                        LEFT JOIN companies ON companies.company_id=projects.company_id 
                                        AND (projects.project_status= "Begin" OR projects.project_status = "open" )
                                        WHERE companies.company_id= '.$company_id.'
                                        ORDER BY projects.project_id DESC' );
        
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $result = array();
      
        while( $row = $statement->fetch() ) {
           $result[] = $row;
        }
        return $result;
    } //open-projec
    
    
    
      public function client_all_projects_list( $company_id ) {              
         $statement = $this->db->query('SELECT * FROM projects 
                                        LEFT JOIN clients ON projects.client_id = clients.client_id 
                                        LEFT JOIN project_types ON projects.project_cat_id=project_types.project_cat_id 
                                        LEFT JOIN companies ON companies.company_id=projects.company_id                                        
                                        WHERE companies.company_id= '.$company_id.'
                                        ORDER BY projects.project_id DESC' );
        
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $result = array();
      
        while( $row = $statement->fetch() ) {
           $result[] = $row;
        }
        return $result;
    } //open-projec
     
    
    
    // Project name and start date  by project id 
        public function get_project_name ( $project_id ) {
            
             $statement = $this->db->query( 'SELECT * FROM projects WHERE  projects.project_id = '.$project_id.'  ');
        
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $row = $statement->fetch();
        return $row; 
            
        }
       
    // Phase Status
    public function show_phase_status() {
        
        
    }
    
    
}// class

 /***

// Test class: pass 
  $obj = new ProjectDetails();
  $re = $obj->get_project_name ( 24 );
 
  var_dump($re);
  * 
  */
  
 
  
  
 
    
  
  