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
    <a href="" class="nav-links">Home</a>
    <a href="" class="nav-links">Profile</a>
    <a href="" class="nav-links">Contacts</a>
    <a href="" class="nav-links">Documents</a>
    <a href="" class="nav-links">Planning</a>
    <a href="" class="nav-links">About Us</a>
    </nav>
</header>
    <main>
   
    <section>
    <form action="" method="post">
    <label for="pdf">Upload your pdf file: </label>

        <input type="file"
            id="pdf" name="pdf"
            accept="image/png, image/jpeg, application/pdf">
        <button type="submit">Upload</button>
    </form>
    
    </section>
    </main>
    <footer>
    Powered By : Namless
    </footer>
</body>
</html>