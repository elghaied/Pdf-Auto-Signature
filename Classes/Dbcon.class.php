<?php 

class Dbcon {
    private $host;
    private $user;
    private $port;
    private $password;
    private $dbname;
    private $charset;
    public $bdd;
    
    
    public function __construct(){

        $this->host = "localhost";
        $this->user = "root";
        $this->password = "";
        $this->port = "3306";
        $this->dbname = "cefim";
        $this->charset = "utf8mb4"; // turn into utf8 later TODO
        

        TRY {

            $dsn = "mysql:host=".$this->host . ";port=" . $this->port . ";dbname=" .$this->dbname . ";charset=" . $this->charset;
            $this->bdd = new PDO($dsn , $this->user , $this->password);
            // $this->bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            	
            return   $this->bdd;
        }

        catch(Exception $e)
        {
             die('Erreur : '.$e->getMessage());
        }

        

        
    }
}
?>