<?php
class SignUp extends Login {

    private $email;
    private $passwordCheck;


    public function __construct($username,$password,$passwordCheck,$email) {// Constructeur demandant 1 tableau
      parent::__construct($username,$password);
      $this->setemail($email);
      $this->setpasswordCheck($passwordCheck);
         }

  
	// LES ACCESSEURS

    private function setpasswordCheck($passwordCheck) {
        $this->passwordCheck = $passwordCheck;

    }


    private function setemail($email) {
        $this->email = $email;

    }

   

    public function signup(){
          
        $query = ('SELECT * FROM user where 1 and username= :username OR email= :email');
    
        $checkUserSys = $this->_db->prepare($query);  
        $checkUserSys->execute(  
             array(  
                  'username'     =>     $this->username,  
                  'email'       =>      $this->email,
                 
             ));  
        $count = $checkUserSys->rowCount();  
        $checkUserSys->closeCursor();
        if($count > 0)  
        {  
            $_SESSION['alert'] = true;
            $_SESSION['message'] = "the username already exist";
            $_SESSION['msgColor'] = 'red';  
    
        }  
        else  
        {  
     
                    ///
       try{

        $upload = $this->_db->prepare ( 'INSERT INTO user (username,password,email) VALUES (:username,:password,:email)');
        $upload->execute([
            
            'username'         =>     $this->username,
            'password'         =>     $this->password,
            'email'            =>     $this->email, 
    

        ]);
       }
       catch(Exception $e)
       {
           // En cas d'erreur, on affiche un message et on arrête tout
               // die('Erreur : '.$e->getMessage());
               $error = "un problème est survenu:" . $e->getMessage();
               $_SESSION['alert'] = true;
               $_SESSION['message'] = $error;
               $_SESSION['msgColor'] = 'red';  
   
       }


    
        $_SESSION['alert'] = true;
        $_SESSION['message'] = "account has been created you can login now";
        $_SESSION['msgColor'] = 'green'; 
    
       
        // header("location: index.php"); 
        }  
    }  
   
 

}