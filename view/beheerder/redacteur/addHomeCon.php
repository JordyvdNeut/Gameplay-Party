<?php require_once('view/beheerder/header.php')?>
<link rel="stylesheet" href="jquery.cleditor.css" />
<script src="jquery.min.js"></script>
<script src="jquery.cleditor.min.js"></script>
<script src="jquery.cleditor.icon.min.js"></script>
<script>
  $(document).ready(function() {
    $("#input").cleditor({
      controls: "bold italic underline | bullets numbering"
    });
  });
</script>
<div class="container">
  <div class="row">
<div class="col-md-12">
<div class="infocontent bewerken">

<form class='form-contact' action='?op=addHomeCont' method='POST'>
<h1>Teksten invoeren</h1>
        <label>Titel</label>
        <input class='form-control' type='text' name='titel' required>
        
        <label>Inhoud</label>
        <textarea id='input' name='tekst' required></textarea>
      <br>
      <button type='submit' class='btn'>Opslaan</button>
</div>
</div>