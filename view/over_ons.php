<title>Over ons</title>

<?php require_once('header.php'); ?>

<section>

  <?= $contact ?>
<div class='center'><div class='row'>
<div class='col-8'>
<div class='table content'>
  <form class='form-contact' action='index.php?op=createEmail' method='POST'>
    <h1 class='heading'>Zoek contact met ons op</h1>
    <label>Naam:</label><br>
      <input type='name' name='name' id='inputName' class='form-control'  required>
    <label>E-Mail :</label><br>
      <input type='email' name='email' id='inputEmail' class='form-control' required>
    <label>Onderwerp:</label><br>
      <input type='name' name='subject' id='inputSubject'  class='form-control' required>
    <label>Bericht:</label><br>
    <textarea class='form-control' id='inputMessage' rows='3'name='infomessage' required></textarea>
    <button class='btn' type='submit'>Verstuur</button>
  </form>
</div>
</div>
</div>
</div>
</body>



</section>

<?php require_once('view/footer.php'); ?>