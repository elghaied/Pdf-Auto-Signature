<?php 
session_start() ;
session_destroy() ;

session_start() ;
$_SESSION["user"] = "";
$_SESSION['loggedin'] = false;

// log file

//Redirection
header("Location: index.php");
?>