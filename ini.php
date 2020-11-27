<?php 
session_start();
// session_destroy() ;

// $_SESSION['filter'] = '';
// $_SESSION['alert'] = false;




    

    date_default_timezone_set('Europe/Paris');
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
        
    }else{
        if((basename($_SERVER['PHP_SELF']) !== "login.php") AND (basename($_SERVER['PHP_SELF']) !== "index.php")){
            // echo "hello there you are in " . basename($_SERVER['PHP_SELF']);
            $_SESSION['loggedin'] = false;
            $_SESSION['order']= [];
            $_SESSION['username']= "";
            $_SESSION['first_name'] = "";
            $_SESSION['last_name'] = "";
            $_SESSION['email'] ="";
            $_SESSION['value']="";

            // header("Location: login.php");  
        }
    }

    // include classes
function my_autoloader($class) {
    include 'classes/' . $class . '.class.php';
}

spl_autoload_register('my_autoloader');

// ==========LOGIN===========================
// ==========================================

if(isset($_POST['login']))
{
    $username = $_POST['username'];
    $password =  $_POST['password'];
    if(empty($username) || empty($password)) {  
        $_SESSION['alert'] = true;
        $_SESSION['message'] = 'All fields are required';
        $_SESSION['msgColor'] = 'red';
    }  
    else  
    {

    $login = new Login($username,$password);
    $login->login();

    }
}


// ==========SIGNUP===========================
// ==========================================

if(isset($_POST['signup']))
{
    echo "new account";
    $username = $_POST['username'];
    $password =  $_POST['password'];
    $passwordCheck = $_POST['passwordCheck'];
    $email = $_POST['email'];
    if(empty($username) || empty($password) || empty($email)) {  
        $_SESSION['alert'] = true;
        $_SESSION['message'] = 'All fields are required';
        $_SESSION['msgColor'] = 'red';
    }
    if($password !== $passwordCheck){
        $_SESSION['alert'] = true;
        $_SESSION['message'] = "Password doesn't match";
        $_SESSION['msgColor'] = 'red';
    }
    else  
    {

    $newAccount = new SignUp($username,$password,$passwordCheck,$email);
    $newAccount->signup();

    }
}
// ------------- Update PROFILE ! ---------------------
// ==========================================

if(isset($_POST['updateprofile'])){

    $updateprofile = new USER($_POST);
    $updateprofile->updateProfile();


}


// =============== UPLOAD PDF ===============
// ==============================================

if(isset($_POST['uploadpdf'])) {
 

    $pdfFile = new PdfFile($_FILES['pdf'],$_SESSION['username']);
    echo "hello" . $pdfFile->getname();
    $uploadtoken = true;
    
    $target_dir = "assets/uploads/";
    $target_file = $target_dir . basename($pdfFile->getName() .".". $pdfFile->getfileExtension());
    $pdfFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  
    


    // File Validation 
    $errorlist = [];
    // check if file exist
    if (file_exists($target_file)) {
        $errorMessage = "Désolé, le fichier existe déjà.";
        array_push($errorlist,$errorMessage);
        $uploadtoken = false;
      }

      if( $pdfFile->getfileExtension() !== "pdf"){
        $errorMessage = "le fichier n'est pas csv le fichier que vous téléchargez est "  . $pdfFile->getfileExtension() ; 
        array_push($errorlist,$errorMessage);
        $uploadtoken = false;
      }

      if($uploadtoken !== false ){
        

// preapre method
$myconnect = new Dbcon();
TRY{
    // On se connecte à MySQL
    $upload = $myconnect->bdd->prepare ( 'INSERT INTO pdf (file_name,file_type,file_size,user_name,upload_date,upload_time) VALUES (:file_name,:file_type,:file_size,:user_name,:upload_date,:upload_time)');
    $upload->execute([
       
        'file_name'         =>     $pdfFile->getName(),
        'file_type'         =>     $pdfFile->getfileExtension(),
        'file_size'         =>     $pdfFile->getSize(),
        'user_name'         =>     $pdfFile->getUser_id(),
        'upload_date'       =>     $pdfFile->getUploadDate(),
        'upload_time'       =>     $pdfFile->getUploadTime()

    ]);

 

    $_SESSION['alert'] = true;
    $_SESSION['message'] = "le fichier a été téléchargé avec succès";
    $_SESSION['msgColor'] = 'green';

    // MOVE FILE TO UPLOADS FOLDER
    move_uploaded_file($pdfFile->getTmp(), $target_dir.$pdfFile->getNameExt());

}

catch(Exception $e)
{
    // En cas d'erreur, on affiche un message et on arrête tout
        // die('Erreur : '.$e->getMessage());
        $error = "un problème est survenu:" . $e->getMessage();
        
        $_SESSION['alert'] = true;
        $_SESSION['message'] =   $error ;
        $_SESSION['msgColor'] = 'red';
     

}

$upload->closeCursor();

}else {
    $errorMessage = "le téléchargement a échoué pour les raisons suivantes " . implode(",", $errorlist);
    $_SESSION['alert'] = true;
    $_SESSION['message'] =   $errorMessage ;
    $_SESSION['msgColor'] = 'red';
 

} 


}



// ------------- ALERT ! ---------------------
// ==========================================

function setAlert($message,$color){

    echo  '<script> showAlert("' . $message . '" , "' . $color .'"); </script>';
}


?> 