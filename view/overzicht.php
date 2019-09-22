<html lang="en">

<?php require_once('header.php'); 
require_once 'controller/c_bioscopen.php';
            
$this->biosController = new biosController();
$productsTable = $this->biosController->createTable($result);
echo $productsTable;?>

<body>
  <h2 class="header">Overzicht</h2>
    <section>

   
    <div class="center">
    <div class="row">
    <div class="col-6">
    <div class="content">
                <h1 class="con_title"><?php ?></h1>
                <p class="con_in"><img class="biosPhoto" src=''><?php ?></p>
                <button class="accents"><a href='view/.php'>Lees meer</a></button>
            </div>
</div>

            <div class=" col-6">
                <div class="content">
                <h1 class="con_title"><?php ?></h1>
                <p class="con_in"><img class="biosPhoto" src=''><?php ?></p>
                <button class="accents"><a href='view/.php'>Lees meer</a></button>
            </div>
</div>

            <div class=" col-6">
                <div class="content">
                <h1 class="con_title"><?php ?></h1>
                <p class="con_in"><img class="biosPhoto" src=''><?php ?></p>
                <button class="accents"><a href='view/.php'>Lees meer</a></button>
            </div>
</div>
            </div>
            </div>
    </section>
    <?php require_once('view/footer.php'); ?>
</body>
</html>