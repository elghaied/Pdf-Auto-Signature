<?php

Class Login extends Dbcon{
    protected $_db;
    protected $username;
    protected $password;
    public function __construct($username,$password)  {
        $this->setDb(parent::__construct());
        $this->setUserName($username);
        $this->setPassword($password);
 
    }

    private function setUserName($username) {
        $this->username = $username;

    }

    private function setPassword($password){
        $password = hash('sha256', $password);
        $this->password = $password;

    }

    public function login(){
          
    $query = ('SELECT * FROM user where 1 and username= :username AND password= :password ');

    $loginsys = $this->_db->prepare($query);  
    $loginsys->execute(  
         array(  
              'username'     =>     $this->username,  
              'password'     =>     $this->password  
         )  
    );  
    $count = $loginsys->rowCount();  
    if($count > 0)  
    {  
           ///
    $logindata = $loginsys->fetch();
    // var_dump($logindata);
    $_SESSION['username'] = $logindata['username'];
    $_SESSION['first_name'] = $logindata['first_name'];
    $_SESSION['last_name'] = $logindata['last_name'];
    $_SESSION['email'] = $logindata['email'];
    $_SESSION['id'] = $logindata['id'];
    $_SESSION['loggedin'] = true;
    $_SESSION['alert'] = true;
    $_SESSION['message'] = "vous êtes connecté";
    $_SESSION['msgColor'] = 'green'; 

    $loginsys->closeCursor();
    header("location: index.php"); 
    }  
    else  
    {  
        $_SESSION['alert'] = true;
        $_SESSION['message'] = "le nom d'utilisateur ou le mot de passe n'est pas correct";
        $_SESSION['msgColor'] = 'red';  
    }  
}  




    // to save the database connection from the parent class
    private function setDb($db)  {
		$this->_db = $db;
    }



}

?>