<?php

class Tickets {
    
     private $db;
     private $admin_id, $client_id, $company_id, $team_member_id, $web_id, $ticket_id_frm_reply;
     private $title, $priority, $link, $contents;
     
     private $ticket_id = null;
     private $ticket_reply_id = null;


     //Construction
    public function __construct() {
        $this->db = new Dbconnection();
        $this->db = $this->db->dbCon();
    }
    
    public function get_client_ticket_info( $data ) {
      
        $this->admin_id         = $data['admin_id'];
        $this->client_id        = $data['client_id'];
        $this->company_id       = $data['company_id'];
        $this->team_member_id   = $data['member_id'];
        $this->web_id           = $data['web_id'];
        $this->title            = $data['title'];
        $this->priority         = $data['priority'];
        $this->link            = $data['link'];
        $this->contents         = $data['content'];     
    }
    
    
     public function get_ticket_reply_info( $ticket_reply_id, $admin_id, $client_id, $company_id, $team_id, $project_id, $title, $contents ) {
        $this->ticket_id_frm_reply = $ticket_reply_id;
        $this->admin_id = $admin_id;
        $this->client_id = $client_id;
        $this->company_id = $company_id;
        $this->team_member_id = $team_id;
        $this->web_id = $project_id;
        $this->title = $title;
        $this->contents = $contents;        
    }
    
    
    
    
    
    // Insert into database
    public function set_client_tiket_info(){  
        
        date_default_timezone_set('America/New_York');
        $reg_time = date('Y-m-d: G:H:i:s');
        
        $statement = $this->db->prepare( "INSERT INTO tickets ( ticket_id, admin_id, client_id, company_id, 
                                        team_member_id, web_id, title,priority,link, contents, date ) 
                                        VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?,? ,? ) " );
        
        $statement->bindParam(1,  $this->ticket_id);
        $statement->bindParam(2,  $this->admin_id);
        $statement->bindParam(3,  $this->client_id);
        $statement->bindParam(4,  $this->company_id);
        $statement->bindParam(5,  $this->team_member_id);      
        $statement->bindParam(6,  $this->web_id);
        $statement->bindParam(7,  $this->title);
        $statement->bindParam(8,  $this->priority);
        $statement->bindParam(9,  $this->link);
        $statement->bindParam(10,  $this->contents);
        $statement->bindParam(11,  $reg_time);
        
        $result = $statement->execute() ? true : false;
        return $result;
    }
    
     // Insert into database
    public function set_tiket_reply_info(){        
        date_default_timezone_set('America/New_York');
        $reg_time = date('Y-m-d: G:H:i:s');
        
        $statement = $this->db->prepare( "INSERT INTO tiket_reply ( ticket_reply_id, ticket_id, admin_id, team_id, 
                                        client_id, title, contents, date ) 
                                        VALUES(?, ?, ?, ?, ?, ?, ?, ?) " );
        
        $statement->bindParam(1,  $this->ticket_reply_id);
        $statement->bindParam(2,  $this->ticket_id_frm_reply);
        $statement->bindParam(3,  $this->admin_id);
        $statement->bindParam(4,  $this->team_member_id);
        $statement->bindParam(5,  $this->client_id);      
        $statement->bindParam(6,  $this->title);
        $statement->bindParam(7,  $this->contents);     
        $statement->bindParam(8,  $reg_time);
        
        $result = $statement->execute() ? true : false;
        return $result;
    }
    
    
    
    //  
    public function view_tikets_client ( $company_id  ) {
         
        $statement = $this->db->query("SELECT * FROM `tickets` 
                                       LEFT JOIN cleint_websites ON cleint_websites.`web_id` = tickets.`web_id`
                                       WHERE tickets.`company_id` = $company_id ORDER BY tickets.date DESC" );
         
        $statement->setFetchMode(PDO::FETCH_ASSOC);  
        
        $results = array();     
        
        while( $row = $statement->fetch() ) {  
           
            $results[] = $row;                 
        }
         return $results;      
    }
    
    
      //  
    public function view_tikets_admin() {
       
        $statement = $this->db->query("SELECT * FROM `tickets` 
                                       LEFT JOIN cleint_websites ON cleint_websites.`web_id` = tickets.`web_id`
                                       ");
        
      
       $statement->setFetchMode(PDO::FETCH_ASSOC);       
             $results = array();     
            while( $row = $statement->fetch() ) {  
                $results[] = $row;                 
            }
              return $results;      
    }
    
    
    
      public function get_single_ticket ( $ticket_id ) {
         
          $statement = $this->db->query("SELECT * FROM `tickets`                                      
                                        WHERE tickets.`ticket_id` = $ticket_id ");
            $statement->setFetchMode(PDO::FETCH_ASSOC);       
               
            $row = $statement->fetch();                        
            
              return $row;      
         
     }
     
     
      public function view_replies( $ticket_id ) {
       
        $statement = $this->db->query("SELECT * FROM `tiket_reply`
            WHERE `ticket_id` = $ticket_id ORDER BY ticket_reply_id ");
         
       $statement->setFetchMode(PDO::FETCH_ASSOC);       
             $results = array();     
            while( $row = $statement->fetch() ) {  
                $results[] = $row;                 
            }
              return $results;      
    }
    
    
    //fetch aprroved 
    public function fetch_aprroved_ticket( $ticket_id ) {
         
        $sql = "SELECT status FROM `tickets` WHERE `ticket_id` = $ticket_id ";          
        $statement = $this->db->query( $sql );        
        $statement->setFetchMode(PDO::FETCH_ASSOC);   
        $row = $statement->fetch();
        return $row;
    }
    
    
      //Tickets approving 
    public function update_ticket_approve( $ticket_id, $is_approve ) {
        
        $sql = "UPDATE tickets"
                . " SET status= $is_approve "
                . "WHERE ticket_id= $ticket_id "
                . " LIMIT 1";
        
        $STM = $this->db->prepare($sql);
               
        $update = $STM->execute() ? true : false;
        
        return $update;
            
    }
     
    
           
    //Total Ticketc by Admin Id
    public function total_tickets() {
       
        $statement = $this->db->query('SELECT COUNT(ticket_id) AS TOTAL_TICKETS
                                     FROM tickets');                              
       
       $statement->setFetchMode(PDO::FETCH_ASSOC);
        
        if ($statement->rowCount() > 0) {
            $row = $statement->fetch();
            return $row;
        }else {
            return FALSE;
            }
        
    } 
    
    
      public function total_client( $company_id ) {
       
        $statement = $this->db->query("SELECT COUNT(ticket_id) AS TOTAL_TICKETS
                                        FROM tickets
                                        WHERE company_id = $company_id ");                              
       
       $statement->setFetchMode(PDO::FETCH_ASSOC);
        
        if ($statement->rowCount() > 0) {
            $row = $statement->fetch();
            return $row;
        }else {
            return FALSE;
            }
        
    }  
    
    
}
