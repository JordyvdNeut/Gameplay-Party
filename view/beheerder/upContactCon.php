<title>Update </title>

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

<section>
  <div class="row">
    <div class="col-10 content">
      <?php
      $html = "";
      if ($contactContent) {
        $html .= "<form action='?op=updateContactCon' method='POST'>";
        $html .= "<h2>Bewerk contact pagina</h2>";
        $html .= "<label>E-mail</label>";
        $html .= "<input class='form-control' type='text' name='email' value='$contactContent[email]' />";
        $html .= "<br />";
        $html .= "<label>Over ons text</label>";
        $html .= "<textarea id='input' name='overons'>$contactContent[overons]</textarea>";
        $html .= "<br />";
        $html .= "<button type='submit' class='btn'> Bewerken</button>";
      }
      echo $html;
      ?>
      </form>
    </div>
  </div>
</section>