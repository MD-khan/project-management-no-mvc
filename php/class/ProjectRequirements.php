<?php

/**
 *  Add Projets 
 * Description: Company and key contacts will be selected while addinig projets.
 *              If Company is not listed, promot admin to add company, 
 */
 require_once 'Dbconnection.php';  

class ProjectRequirements {
    
    public $re_project_logo;
    public $req_project_color_scheme;
    public $req_project_ref_websites;
    public $req_project_current_site;
    public $reg_project_photo;
    public $req_project_sitemaps;
    public $req_project_domain;
    public $req_project_hosting;
    public $req_project_contents;
    public $req_project_homepage_elements;
    public $req_project_footer_elements;
   
    public $projetc_reg_id = NULL;
    
    public $admin_user_id; // detect by session
    public $project_id; // detect by projrcy category
    public $company_id; // detect by company selections
    
    
     private $db;
    
    //Construction
    public function __construct() {
        $this->db = new Dbconnection();
        $this->db = $this->db->dbCon();
    }

    // get and filter client data 
    public function getProjectRequirments( $p_admin_id, $p_id, $p_company_id, $reg_logo,$req_color,$req_ref_site, 
                                            $req_curent_site, $req_phot, $req_sitemap, $req_domain, $req_hosting, 
                                            $req_contents, $req_home_elmnt, $req_footer_elmnts ){
        
        $this->admin_user_id = $p_admin_id;
        $this->project_id = $p_id;
        $this->company_id = $p_company_id;
        $this->re_project_logo = $reg_logo;
        $this->req_project_color_scheme= $req_color;
        $this->req_project_ref_websites = $req_ref_site;
        $this->req_project_current_site = $req_curent_site;
        $this->reg_project_photo = $req_phot;
        $this->req_project_sitemaps = $req_sitemap;
        $this->req_project_domain = $req_domain;
        $this->req_project_hosting = $req_hosting;
        $this->req_project_contents = $req_contents;
        $this->req_project_homepage_elements = $req_home_elmnt;
        $this->req_project_footer_elements = $req_footer_elmnts;
              
                
    } //setClientInfo 
 
    
    // Insert into database
    public function setProjectRequirments(){
        // $reg_time = date('Y-m-d: G:H:i:s');
        
        $statement = $this->db->prepare( "INSERT INTO project_requierments ( project_req_id, admin_user_id, project_id, company_id,
                                        req_logo, req_color_scheme, req_ref_websites, req_current_site, reg_photos, reg_sitemap, 
                                        req_domain, reg_hosting, req_contents, req_homepage_elmnts, req_footer_elmnts ) 
                                        VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) " );
        
        $statement->bindParam(1,  $this->projetc_reg_id);
        $statement->bindParam(2,  $this->admin_user_id);
        $statement->bindParam(3,  $this->project_id);
        $statement->bindParam(4,  $this->company_id);
        $statement->bindParam(5,  $this->re_project_logo);
        $statement->bindParam(6,  $this->req_project_color_scheme);
        $statement->bindParam(7,  $this->req_project_ref_websites);
        $statement->bindParam(8,  $this->req_project_current_site);
        $statement->bindParam(9,  $this->reg_project_photo);
        $statement->bindParam(10,  $this->req_project_sitemaps);
        $statement->bindParam(11,  $this->req_project_domain);
        $statement->bindParam(12,  $this->req_project_hosting);
        $statement->bindParam(13,  $this->req_project_contents);
        $statement->bindParam(14,  $this->req_project_homepage_elements);
        $statement->bindParam(15,  $this->req_project_footer_elements);
        
        
        $result = $statement->execute() ? true : false;
        return $result;
    }
    
    
    
    // Retrive Project Requierments    
    public function retrive_project_requierments( $project_id ) {
       $statement = $this->db->query('SELECT * FROM project_requierments 
                                      LEFT JOIN projects ON projects.project_id = project_requierments.project_id
                                      WHERE projects.project_id = '.$project_id.' ');
       $statement->setFetchMode(PDO::FETCH_ASSOC);
      
       $row = $statement->fetch();
        
       return $row;
    } // retrive_project_requierments
    
}//class 
 
 
/**
 
// Test Data

 $obj = new ProjectRequirements();
// $obj->retrive_project_requierments();
 $re = $obj->retrive_project_requierments( 24 );

 echo $re['req_current_site'];
 
 if($re) {
     echo "data insertet";    
 } else {
     echo "No";
 }
 * 
 */
 