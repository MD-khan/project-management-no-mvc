<?php
require_once 'Dbconnection.php';  
class Passwords {
    
       private $db;      
      
       private $password;
       private $user_db_id;
       private $user_email;

       public $is_email_match = FALSE;
       

//Construction
    public function __construct() {
        $this->db = new Dbconnection();
        $this->db = $this->db->dbCon();
    }
    
     
    
    // Sending password to user via email 
    public function is_match($email){
          
        // Check admin email 
       $statement = $this->db->query('SELECT * FROM admin_user WHERE admin_email = "'.$email.'"');       
       $statement->setFetchMode(PDO::FETCH_ASSOC);       
       $row = $statement->fetch();        
       $actual_admin_email = $row['admin_email'];       
        
           if( !empty($actual_admin_email)){
               $this->user_email = $email;
               $this->password = $row['admin_password'];
             if (strcmp( $this->user_email, $actual_admin_email) == 0) {
                $this->is_email_match = TRUE;
            } else {
                $this->is_email_match = FALSE;
            }
        } 
            
       //check Team member email
       $statement = $this->db->query('SELECT `member_password`,`member_email` FROM team_members WHERE member_email = "'.$email.'"');       
       $statement->setFetchMode(PDO::FETCH_ASSOC);       
       $row = $statement->fetch();   
      
       $actual_team_email = $row['member_email'];      
       
       if( !empty($actual_team_email)){
                $this->user_email = $email;
               $this->password = $row['member_password'];
                if (strcmp( $this->user_email, $actual_team_email) == 0) {
                    $this->is_email_match = TRUE;
                } else {
                    $this->is_email_match = FALSE;
                }
          } 
          
          
          //check Client email
           $statement = $this->db->query('SELECT `client_key_email`,`client_password` FROM clients WHERE client_key_email = "'.$email.'"');       
           $statement->setFetchMode(PDO::FETCH_ASSOC);       
           $row = $statement->fetch();   
      
         $actual_client_email = $row['client_key_email'];      
       
       if( !empty($actual_client_email)){
                $this->user_email = $email;
               $this->password = $row['client_password'];
                if (strcmp( $this->user_email, $actual_client_email) == 0) {
                    $this->is_email_match = TRUE;
                } else {
                    $this->is_email_match = FALSE;
                }
          } 
         
          return $this->is_email_match;
        
    }
   
    public function send_email(){
      
       
       if( $this->is_email_match ) {
           //send email 
           
            //generate random code
            $code = $this->generateRandomString(10);
            
            $mass = $this->generateRandomString(100);
            
                $to = $this->user_email;
                $subject = "No Reply";

                $message = "
                <html>
                <head>
                <title>No Reply</title>
                </head>
                <body>
                <h2> You have to enter the following security code </h2>
                <table>
                <tr>
                <th> Security Code </th>
                 
                </tr>
                <tr>
                <td> $code </td>
                 
                </tr>
                
                <tr>                
                <td> <a href='http://goingclearprojects.com/gcpm/new-password-entry/mass/$mass/code/$code/emai/$this->user_email'> Click here to reset your password </a> </td>                 
                </tr>
                
                </table>
                </body>
                </html>
                ";

                // Always set content-type when sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                // More headers
                $headers .= 'From: <webmaster@goingclear.com>' . "\r\n";
                 

                mail($to,$subject,$message,$headers);

                return TRUE;
           
       }
    }
 
    
     
    private function generateRandomString( $length  ) {
        
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        
        $charactersLength = strlen($characters);
        
        $randomString = '';
        
        for ($i = 0; $i < $length; $i++) {
            
            $randomString .= $characters[rand(0, $charactersLength - 1)];
            
        }
    return $randomString;
    }

}


/*
// test class
$obj = new Passwords();
$obj->is_match("md.khan@goingclear.com");

$result = $obj->send_email();

  //var_dump($result);
  
  //var_dump($obj->password);
 * 
 */
  
   