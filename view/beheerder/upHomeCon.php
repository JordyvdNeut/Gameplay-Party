<title>Bewerken</title>

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
      if ($homeContent) {
        $html .= "<form action='?op=updateHomeCon&id=" . $homeContent['homeCon_id'] . "' method='POST'>";
        $html .= "<h2>Bewerk: <i>$homeContent[titel]</i></h2>";
        $html .= "<label>Titel</label>";
        $html .= "<input class='form-control' type='text' name='title' value='$homeContent[titel]' />";
        $html .= "<br />";
        $html .= "<label>Inhoud</label>";
        $html .= "<textarea id='input' name='inhoud'>$homeContent[inhoud]</textarea>";
        $html .= "<br />";
        $html .= "<button type='submit' class='btn'> Bewerken</button>";
      }
      echo $html;
      ?>
      </form>
    </div>
  </div>
</section>