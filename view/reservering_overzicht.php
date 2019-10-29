<title>Overzicht Reservering</title>
<?php
require_once('view/header.php');
?>

<section>
  <div class="row">
    <div class="col-12 content">
      <h2>Uw keuze:</h2>
      <div class="col-3">
          <h4><b><?= $creating["naam"]?></b></h4>
          <p><?= $creating["adres"]?></p>
          <p><?= $creating["postcode"]?> <?= $creating["woonplaats"]?></p>
          <p>Tel: <?= $creating["telefoon"]?></p>        
          <p>Bedrag: €<?= $bedrag->fetchColumn() ?></p>
      </div>

      <div class="col-4">
        <h2>Aanbetaling</h2>
        <p> </p>
      </div>
  
      <a href="?op=reserveren"><button  class="btn">Bevestigen</button></a>
    </div>
</section>

<?php
require_once('view/footer.php');
?>