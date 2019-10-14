<title>Factuur</title>
<?php
require_once('view/header.php');
?>

<section>
  <div class="row">
    <div class="col-4 content">
      <h2>Factuur:</h2>
      <?php
        var_dump($factuur);
        var_dump($bestelDetails->fetch(PDO::FETCH_ASSOC));
        while ($row = $zaalGegevens->fetch(PDO::FETCH_ASSOC)) {
          var_dump($row);
        }
        while ($row = $tarieven->fetch(PDO::FETCH_ASSOC)) {
          var_dump($row);
        }
      ?>
    </div>

</section>

<?php
require_once('view/footer.php');
?>