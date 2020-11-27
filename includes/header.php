<?php 
require 'ini.php'
// include "pdf/test.pdf";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/styles/style.css">
    <title>Document</title>
</head>
<body>
<header>
    <div class="logo">
    <a href="index.php"> <span id="logo">CEFIM</span>  </a>
    </div>
    <nav>
    <a href="index.php" class="nav-links">Home</a>
   <?php 
   if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] !== true){
    echo '<a href="login.php" class="nav-links">login</a>';
   }else {}; ?>
    <a href="profile.php" class="nav-links">Profile</a>
    <a href="" class="nav-links">Contacts</a>
    <a href="docs.php" class="nav-links">Documents</a>
    <a href="" class="nav-links">Planning</a>
    <a href="" class="nav-links">About Us</a>
    <?php
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
  
        echo "<a class='logged'>Bienvenue " . $_SESSION['username'] . "</a>" ;
        echo '<a href="logout.php" class="nav-links">logout</a>';
     
    }

    ?>
    </nav>
    
    </header>
    <?php 
// var_dump($testValue);
if (isset($_SESSION['alert'])){
   
    ?>

<div id="alert"> 

</div>
<?php } ;
?>
