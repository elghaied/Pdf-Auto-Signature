<?php 
Class User {
    protected $id;
    protected $username;
    protected $email;
    protected $first_name;
    protected $last_name;

    public function __construct(array $donnees) {// Constructeur demandant 1 tableau
        $this->hydrate($donnees);

         }

    public function hydrate(array $donnees) // Constructeur demandant 1 tableau

    { 
        foreach($donnees as $key => $value) {

            $method = 'set'.ucfirst($key);

            if (method_exists($this, $method)) {

                $this->$method($value);

            }

                                            
        }

    

    }
	// The Getters
    public function getid(){
        return $this->id;
    }
    public function getusername() {
		return $this->username;
    }
    public function getemail() {
		return $this->email;
    }
    public function getfirst_name() {
		return $this->first_name;
    }
    public function getlast_name() {
		return $this->last_name;
    }
 

    # The setters
    public function setid($id){
        $this->id = $id;
    }
    public function setusername($username){
        $this->username = $username;
    }
    public function setemail($email){
        $this->email = $email;
    }
    public function setfirst_name($first_name){
        $this->first_name = $first_name;
    }
    public function setlast_name($last_name){
        $this->last_name = $last_name;
    }


    public function updateProfile(){

        $connectToDB = new Dbcon();

        
        try{
            
            $updatequery = $connectToDB->bdd->prepare ( "UPDATE  user SET username=:username,first_name=:first_name,last_name=:last_name,email=:email WHERE id=:id");

            $updatequery->execute([
                
                'username'               => $this->username,
                'first_name'             => $this->first_name,
                'last_name'              => $this->last_name ,
                'email'                  => $this->email ,
                'id'                     => $this->id
             
    
            ]);

            
            $_SESSION['alert'] = true;
            $_SESSION['message'] = "your profile has been updated";
            $_SESSION['msgColor'] = 'green'; 
            $_SESSION['username'] = $this->username;
            $_SESSION['first_name'] = $this->first_name;
            $_SESSION['last_name'] = $this->last_name ;
            $_SESSION['email'] = $this->email ;
            $_SESSION['id'] =$this->id;
             
        }
        
        catch(Exception $e)
        {
            $error = "Si vous ne pouvez pas modifier un enregistrement, veuillez contacter l'administration : Message d'erreur :" . $e->getMessage();
            
            $_SESSION['alert'] = true;
            $_SESSION['message'] = $error;
            $_SESSION['msgColor'] = 'red'; 


    
         die('Erreur : '.$e->getMessage());
        }
    
        $updatequery->closeCursor();
    
    }
}