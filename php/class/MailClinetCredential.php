<?php

class MailClinetCredential {
    
    private $sender ="webmaster@goingclear.com";
    
    public function mail_clients_credential( $to, $fname, $user_name, $pass) { 
        
        $subject = "Your Log in Credentials";
        
        $message = '<body>
             
            <table width="100%" border="0" cellpadding="5" cellspacing="2">
            <tr>
   		 <td colspan="3" bgcolor="#008cc6">
                    <h2 style="color:#FFF"> Registration Confirmation! </h2> 
                </td>
            </tr>
                           
    <tr bgcolor="#FFF">
        <td>
   	<h4> Hello '.$fname.'  </h4>
        <p>
          We have created  an account for you. Wtih this account, you will be able monitor your project status in any time.
            Also you can be able to send project requirments to us  such as your company logo, color schemes etc. <br>
	 with Goingclear Interactive. We are excited to have you!
        </p>
    
        <p> 
            Your user  name: '.$user_name.' <br>
                Password: '.$pass.' <br>
                   
       </p>
            
   	</td>
     </tr>
 
	<tr>
   		 <td colspan="3" bgcolor="#008cc6">
   			 <h5 style="color:#FFF"> Contact: (617 649-7200) </h5> 
   	      </td>
  	</tr>
    
    <tr>
   		 <td colspan="3" bgcolor="#008cc6">
   			 <h5 style="color:#FFF">  &copy;GoingClear Interactive</h5> 
   	      </td>
  	</tr>
    
</table>
</body>';
        
        
        $message = wordwrap($message, 70, "\r\n");
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        
        $headers .= 'To: MD Khan <md.khan@goingclear.com>' . "\r\n";
        $headers .= 'From: GoingClear Interactive <webmaster@goingclear.com>' . "\r\n";
        
        mail($to, $subject, $message, $headers); //This method sends the mail.      
        
    }
    
}