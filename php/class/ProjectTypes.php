<?php

//require 'Dbconnection.php';

class ProjectTypes {
    
      private $db;
      
     
      private $project_type;
      private $project_types_descriptions;
      
      private $admin_id;   
      
      private $project_cat_id = NULL;
      
      
      //Construction
    public function __construct() {
        $this->db = new Dbconnection();
        $this->db = $this->db->dbCon();
    }
    
    
     
    // Get Project Types Details by Admin ID
    public function get_project_types( $admin_id, $project_type, $project_type_description ) {
        
        $this->admin_id = $admin_id;
        $this->project_type = $project_type;
        $this->project_types_descriptions = $project_type_description;
    }
   
    
      // insert Project Types 
    public function insert_project_types() {
        
        $reg_time = date('Y-m-d: G:H:i:s');
        $statement = $this->db->prepare( "INSERT INTO project_types ( project_cat_id,admin_id, project_category, descriptions, date ) "
                                         . "VALUES(?, ?, ?, ?, ?) " );
        
        $statement->bindParam(1,  $this->project_cat_id);
        $statement->bindParam(2,  $this->admin_id);
        $statement->bindParam(3,  $this->project_type);
        $statement->bindParam(4,  $this->project_types_descriptions);
        $statement->bindParam(5,  $reg_time);
        
        $result = $statement->execute() ? true : false;
        return $result;
    }

    
     
    // Fetch Project Types Details by Admin ID
   public function fetch_project_types( $admin_id ) {
       $statement = $this->db->query('SELECT * FROM project_types '
                                    . 'WHERE admin_id ='.$admin_id.' ');
       
       $statement->setFetchMode(PDO::FETCH_ASSOC);       
             
           $results = array();     
            while( $row = $statement->fetch() ) {                 
                $results[] = $row;              
                 
            }
              return $results;  
   }
   
   
   // Fetch Project Types Name only  by Admin ID and cat_id
   public function fetch_project_types_name( $cat_id ) {
       $statement = $this->db->query('SELECT project_category
                                FROM  `project_types` 
                               WHERE  `project_cat_id` = '.$cat_id.' LIMIT 1');
       
       $statement->setFetchMode(PDO::FETCH_ASSOC);       
        $row = $statement->fetch();  
              return $row;  
   }
   
   
   
   // Fetch Project Types Name only  by Admin ID and cat_id
   public function fetch_project_types_all_name( $admin_id ) {
       $statement = $this->db->query('SELECT project_category, project_cat_id
                                FROM  `project_types` 
                               WHERE  `admin_id` = '.$admin_id.' ');
       
       $statement->setFetchMode(PDO::FETCH_ASSOC);       
             $results = array();     
            while( $row = $statement->fetch() ) {  
                $results[] = $row;                 
            }
              return $results;      
  
     } //fetch_project_types_all_name 
   
   
     
     // Count numebr of time a project get used
      public function project_types_used_in_project( $cat_id ) {
       $statement = $this->db->query('SELECT COUNT(`project_cat_id`) TIMES_IN_PROJECTS FROM `projects`  
                                     WHERE `project_cat_id` = '.$cat_id.'');
       
       $statement->setFetchMode(PDO::FETCH_ASSOC);       
               
            $row = $statement->fetch();                        
            
              return $row;      
  
     } //project_types_used_in_project
     
     
     // fetch project types quetion categories
     public function fetch_question_categories( $admin_id ) {
         
          $statement = $this->db->query('SELECT qsn_category, qsn_cat_id
                                FROM  `question_category` 
                               WHERE  `admin_id` = '.$admin_id.' ');
       
       $statement->setFetchMode(PDO::FETCH_ASSOC);       
             $results = array();     
            while( $row = $statement->fetch() ) {  
                $results[] = $row;                 
            }
              return $results;      
     }
     
     /*
      * Phase
      */
     
     
     // Fetch project phases 
    public function fetch_phases() {
        
        $sql = "SELECT * FROM `phases` ORDER BY `phases`.`phase_id` ASC ";
        $statement = $this->db->query( $sql );       
        $statement->setFetchMode(PDO::FETCH_ASSOC);       
        
        $results = array();     
            while( $row = $statement->fetch() ) {  
                $results[] = $row;                 
            }
              return $results;      
     }
     
     
    /*
    * Get Single Phase Name Only by phase ID
    */
     
   public function get_single_phase( $id ) {
        
       $sql = "SELECT * FROM  `phases` WHERE `phase_id` = $id LIMIT 0 , 1";
       
       $statement = $this->db->query( $sql );       
       
       $statement->setFetchMode(PDO::FETCH_ASSOC);
       
       $row = $statement->fetch();
       
       return $row;
       
   }

    
    

   /*
      * Show question categories based on phase id
      */
     public function show_question_categories( $qsn_phase_id ) {
        
        error_reporting(E_ALL); 
        ini_set("display_errors", 1);
        
         try {
             $sql = "SELECT * FROM  `question_category` 
                    WHERE  `phase_id` = $qsn_phase_id ORDER BY  `question_category`.`qsn_cat_id` ASC";
             
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
             
         } catch (Exception $ex) {
             
              echo($e->getMessage());
         }
     }
     
    /*
    * Show single category name by ID
    */
     
    public function show_single_category( $qsn_cat_id ) {
        
        error_reporting(E_ALL); 
        ini_set("display_errors", 1);
        
         try {
             $sql = "SELECT * FROM  `question_category` 
                    WHERE  `qsn_cat_id` = $qsn_cat_id";
             
             $statement = $this->db->query($sql);
             $statement->setFetchMode(PDO::FETCH_ASSOC);
             $error = $statement->errorInfo();
             
             if ( $error[0] !== '00000') { // if success 
                     echo '<pre>';
                         print_r( $error );
                     echo '</pre>';
                    
                }else {
                    $row = $statement->fetch();
                    return $row;      
                }
             
         } catch (Exception $ex) {
             
              echo($e->getMessage());
         }
     } 
     
     
   
   
}// class

 
 
// Test class 
 /*
 $obj = new ProjectTypes(); 
 $results = $obj->is_phase_complete ( 131, 1 );
 echo '<pre>';
// var_dump($results);
  echo '</pre>';
  
  foreach ( $results as $re ) {
      
      foreach ( $re as $r ){
          echo $r;
      }
    }
  * 
  */
 
  
 
 

   
 