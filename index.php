<?php include "includes/header.php" ;


?>
    <main>
   
    <section>
    <form action="" method="post" enctype="multipart/form-data">
    <label for="pdf">Upload your pdf file: </label>

        <input type="file"
            id="pdf" name="pdf"
            accept="application/pdf">
        <button type="submit" name="uploadpdf">Upload</button>
    </form>
    
    </section>
    </main>
   <?php include "includes/footer.php" ?>
</body>
</html>