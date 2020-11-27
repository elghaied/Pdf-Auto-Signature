<?php
Class PdfFile {
   private  $name;
   private  $fileExtension;
   private  $type;
   private  $size;
   private  $user_id;
   private  $upload_date;
   private  $upload_time;
   private  $error;
   private  $tmp_name;
   private  $nameExt;

   public function __construct(array $donnees,$user_id) {// Constructeur demandant 1 tableau

    $this->hydrate($donnees);
    $this->setUser_id($user_id);
    $this->setupload_date();
    $this->setupload_time();

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

    public function getName() {return $this->name;}
    public function getType() {return $this->type;}
    public function getSize() {return $this->size;}
    public function getUser_id(){return $this->user_id;}
    public function getUploadDate(){return $this->upload_date;}
    public function getUploadTime(){return $this->upload_time;}
    public function getError(){return $this->error;}
    public function getTmp(){return $this->tmp_name;}
    public function getfileExtension(){return $this->fileExtension;}
    public function getNameExt(){return $this->nameExt;}

    public function setname($name){
        
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($name);
        $fileExtension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $nameNoExt = pathinfo($target_file,PATHINFO_FILENAME);
        $this->fileExtension = $fileExtension;
        $this->name = $nameNoExt;
        $this->nameExt = $name;
    }
    public function settype($type){

        $this->type = $type;
    }
    public function setsize($size){
        $this->size = $size;
    }
    public function setuser_id($user_id){
        $this->user_id = $user_id;
    }
    public function setupload_date(){
        $this->upload_date = date("Y-m-d");
    }
    public function setupload_time(){
        $this->upload_time = date("H:i:s");
    }
    public function seterror($error){
        $this->error = $error;
    }
    public function settmp_name($tmp_name){
        $this->tmp_name = $tmp_name;
    }
    


}

?>