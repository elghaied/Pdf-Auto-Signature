<?php 

class Pdf {
    private $_id;
    private $_file_name;
    private $_file_type;
    private $_file_size;
    private $_upload_date;
    private $_upload_time;
    private $_user_name;
   


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
// GET

public function getId() {
    return $this->_id;
}
public function getName() {
    return $this->_name;
}
public function getFile_Name() {
    return $this->_file_name;
}
public function getFile_Type() {
    return $this->_file_type;
}

public function getFile_Size() {
    return $this->_file_size;
}

public function getUpload_Date(){
    return $this->_upload_date;
}
public function getUpload_Time(){
    return $this->_upload_time;
}
public function getUser_Name(){
    return $this->_user_name;
}

// SET
public function setid($id){
    $this->_id = $id;
}
public function setfile_name($file_name){
    $this->_file_name = $file_name;
}
public function setfile_type($file_type){
    $this->_file_type = $file_type;
}
public function setfile_size($file_size){
    $this->_file_size = $file_size;
}

public function setupload_date($upload_date){
    $this->_upload_date = $upload_date;
}
public function setupload_time($upload_time){
    $this->_upload_time = $upload_time;
}
public function setuser_name($user_name){
    $this->_user_name = $user_name;
}
public function setname($name){
    $this->_name = $name;
}



}


?>