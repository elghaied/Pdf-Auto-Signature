<?php include "includes/header.php" ;


?>
    <main>
   
    <section>
    <?php 
    $connectToData = new Dbcon();
    try{

        $loadPdf = $connectToData->bdd->prepare("SELECT * FROM pdf where user_name=:user_name");
        $loadPdf->bindParam(":user_name",$_SESSION['username'],PDO::PARAM_STR,64);
        $loadPdf->execute();
        
        while ($myPdf = $loadPdf->fetch())
        {
            $pdfDocs = new Pdf($myPdf);
            // var_dump($pdfDocs);

?>

            <article>  
            <h3> <?=  $pdfDocs->getfile_name(); ?> </h3>
            <ul>
                <li class="pdfspec">file type: <?= $pdfDocs->getFile_Type(); ?></li>
                <li class="pdfspec"><?= $pdfDocs->getFile_Size(); ?></li>
                <li class="pdfspec"><?php echo 'uploaded on ' .  $pdfDocs->getUpload_Date() . '  at ' . $pdfDocs->getUpload_Time(); ?></li>
                <li class="pdfspec">Uploaded by: <?= $pdfDocs->getUser_Name(); ?></li>
            </ul>
            <a href="assets/uploads/<?php echo $pdfDocs->getFile_Name() . "." . $pdfDocs->getFile_Type() ?>" target="_blank" rel="noopener noreferrer">view file</a>
             </article>
           





<?php 
        }
        
        

       
    }
    
    catch(Exception $e)
    {
        // En cas d'erreur, on affiche un message et on arrête tout
            // die('Erreur : '.$e->getMessage());
        $_SESSION['alert'] = true;
        $_SESSION['message'] =   $e ;
        $_SESSION['msgColor'] = 'red';
         
    }


    
    $loadPdf->closeCursor();




      
    ?>
    </section>
    </main>
   <?php include "includes/footer.php" ?>
</body>
</html>