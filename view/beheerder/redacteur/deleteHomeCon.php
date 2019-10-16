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
  <div class="row noflex">
    <div class="col-10 content bewerken">
      <?php
      $html = "";
      if ($homeContent) {
        $html .="<h3 class='deleteh3'><strong>weet je zeker dat je deze content wilt verwijderen?</strong></h3>" ;
        $html .="<div class='delete'>";
        $html .= "<form action='?op=deleteHomeCon&id=" . $homeContent['homeCon_id'] . "' method='POST'>";
        $html .="<input type='button'class='btn' value='niet verwijderen' onclick='history.back()''>";
        $html .= "<button type='submit' class='btn'> verwijderen</button>";
        $html .="</div>";
      }
      echo $html;
      ?>
      </form>
    </div>
  </div>
</section>