<?php 



require 'includes/header.php';

?>

<main>
    
<section>
    <h3>Profile :</h3>
<form  class="signupForm" action="" method="POST">
    <div class="formRow">
    <label for="username">username</label>
    <input type="text" name="username" id="" value="<?php echo $_SESSION['username'] ?>">
    </div>
   
    <div class="formRow">
    <label for="email">email</label>
    <input type="text" name="email" id="" value="<?php echo $_SESSION['email'] ?>">
    </div>
    <div class="formRow">
    <label for="first_name">first name</label>
    <input type="text" name="first_name" id="" value="<?php echo $_SESSION['first_name'] ?>">
    </div>
    <div class="formRow">
    <label for="last_name">last name</label>
    <input type="text" name="last_name" id="" value="<?php echo $_SESSION['last_name'] ?>">
    </div>
    <input type="hidden" name="id" value="<?php echo $_SESSION['id'] ?>">
    <input type="submit" name="updateprofile" value="update profile">
</form>

<h3>Adresses :</h3>
<form class="signupForm" action="" method="POST">
    <div class="formRow">
    <label for="street_number">street number</label>
    <input type="text" name="street_number" id="">
    </div>
    <div class="formRow">
    <label for="street_name">street name</label>
    <input type="text" name="street_name" id="">
    </div>
    <div class="formRow">
    <label for="region">region</label>
    <input type="text" name="region" id="">
    </div>
    <div class="formRow">
    <label for="zip_code">Zip code</label>
    <input type="text" name="zip_code" id="">
    </div>
    <div class="formRow">
    <label for="adress_title">Address title</label>
    <input type="text" name="adress_title" id="">
    </div>
    <input type="submit" name="addAdress" value="Add Adress">
</form>
</section>


</main>

<?php include "includes/footer.php" ?>
<!-- footer  -->

