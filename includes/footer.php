<?php ?>

<footer>
    Powered By : Namless
    </footer>
    <script src="./assets/js/alert.js"></script> 
<?php  
if(isset($_SESSION['alert']) && $_SESSION['alert']){
setAlert($_SESSION['message'] , $_SESSION['msgColor']);
}
unset($_SESSION['message']);
unset($_SESSION['msgColor']);
$_SESSION['alert'] = false;


?>
    </body>
</html>