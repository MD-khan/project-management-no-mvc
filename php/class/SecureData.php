<?php

class SecureData {
    
    public $phone;
    public $puredata;    
    
    
	public function data_filters( $data ) {
            
            $this->puredata = $data;
            $this->puredata = trim($this->puredata);
            $this->puredata = stripslashes($this->puredata);
            $this->puredata= htmlspecialchars($this->puredata);
                
                return $this->puredata;
	}	
        
	public function validatePhone($phone) {
   		 $numbersOnly = preg_replace("[^0-9]", "", $phone);
   		 $numberOfDigits = strlen($numbersOnly);
    		if ($numberOfDigits >= 10) {
        		return true;
				} else {
       		    return false;
    		}
		}
		
	public function SanatizeEmail($email){
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { 
			 return false;
			}else {
				return true;
				}
		}
	 public function SanatizePassword($password) {
		 $pass = preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,100}$/", $password);
		 if($pass) {
			 return true;
			 }
			else {
				return false;
				}
		 }	 

                 
  
}



/***

//testing
 
$ob = new SecureData();
// test injefction
  echo $ob->data_filters(" <script> alert('dfs'); </script> ");
  echo ( "<script> alert('dfs'); </script>");

 

// test emaill 
$email = $ob->SanatizeEmail("monir@gmail.com");
if ($email) {
	echo "OK!";
	} else 
	echo "NO!";
 * 
 */
 
	
