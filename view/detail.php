<title>Bioscoop</title>
<div id="bios">
<?php require_once('header.php'); ?>
</div>
<section>

  <section>
    <a href="?op=overzicht" style="float: left; margin-left: 15px;">
      <button class="btn">
        <li class="fa fa-arrow-left"></li> Overzicht
      </button>
    </a>
    <br /><br />
    <?= $biosPage ?>
  </section>

</section>

<?php require_once('view/footer.php'); ?>