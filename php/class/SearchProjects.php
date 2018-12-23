<?php
 
 // include_once 'Dbconnection.php';


class SearchProjects {
    
      private $db;
      
      //Construction
    public function __construct() {
        $this->db = new Dbconnection();
        $this->db = $this->db->dbCon();
    }
    
              
        // Search Project By project name
    public function project_search( $key , $admin_id) {
        
         $statement = $this->db->query("SELECT * FROM `projects`
                                        LEFT JOIN project_types ON projects.`project_cat_id` = project_types.`project_cat_id` 
                                        LEFT JOIN companies ON companies.`company_id`= projects. `company_id`
                                        WHERE (
                                                  projects.`project_name` LIKE '%$key%'
                                                   OR projects.`project_id` LIKE '%$key%' 
                                                   OR projects.`project_status` LIKE '%$key%'
                                                   OR projects.`project_start_date` LIKE '%$key%'
                                                   OR projects.`project_end_date` LIKE '%$key%'
                                                   OR companies.`company_name` LIKE '%$key%'
                                                   OR project_types .`project_category` LIKE '%$key%'
                                               )
                                        AND projects.`admin_user_id` = $admin_id
                                        GROUP BY projects.`project_id`");
        
        $statement->setFetchMode(PDO::FETCH_ASSOC);
                  
            $results = array();
            while( $row = $statement->fetch() ) {
                $results [] = $row;
                }
                return $results;
           } // project_search
        
   
} // class

 
/***
 
// test 
$ob = new SearchProjects();
$re = $ob->project_search("Start-up", 1);

foreach ( $re as $r ) {
    echo $r['project_category'] . "<br>";
} 
 * 
 */