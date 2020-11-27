<?php 



require 'includes/header.php';

?>

<main>
<section>
<form class="signupForm" action="" method="POST">
    <label for="username">username</label>
   
    <input type="text" name="username" id="">
    <label for="password">password</label>
    <input type="password" name="password" id="">
    <label for="passwordCheck">Confirm password</label>
    <input type="password" name="passwordCheck" id="">
    <label for="email">email</label>
    <input type="email" name="email" id="">
    <input type="submit" name="signup" value="signup">
</form>
</section>
<a href="login.php" class="signup">login</a>
</main>

<?php include "includes/footer.php" ?>
<!-- footer  -->

