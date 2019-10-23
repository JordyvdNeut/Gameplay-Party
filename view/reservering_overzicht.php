<title>Overzicht Reservering</title>
<?php
require_once('view/header.php');
?>

<section>
  <div class="row">
    <div class="col-12 content">
      <h2>Uw keuze:</h2>
      <div class="col-3">
          <h4><b><?= $choice["naam"]?></b></h4>
          <p><?= $choice["adres"]?></p>
          <p><?= $choice["postcode"]?> <?= $choice["woonplaats"]?></p>
          <p>Tel: <?= $choice["telefoon"]?></p>        
      </div>

      <div class="col-4">
        <h2>Aanbetaling</h2>
        <p>    </p>
      </div>
  
      <a href="?op=reserveren"><button  class="btn">Bevestigen</button></a>
    </div>
</section>

<?php
require_once('view/footer.php');
?>