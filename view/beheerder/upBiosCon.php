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
      if ($biosContent) {
        $html .= "<form action='?op=updateBiosCon' method='POST'>";
        $html .= "<h2>Bewerk bioscoop gegevens</h2>";
        $html .= "<label>Telefoon nummer</label>";
        $html .= "<input class='form-control' type='tel' name='bios_tel' value='$biosContent[bios_tel]' />";
        $html .= "<br />";
        $html .= "<label>Bioscoop informatie</label>";
        $html .= "<textarea id='input' name='bios_info'>$biosContent[bios_info]</textarea>";
        $html .= "<br />";
        $html .= "<label>Foto buitenkant bioscoop</label>";
        $html .= "<input class='form-control' type='url' name='bios_foto' value='$biosContent[bios_foto]' />";
        $html .= "<br />";
        $html .= "<label>Foto van de zalen</label>";
        $html .= "<input class='form-control' type='url' name='bios_ins' value='$biosContent[bios_ins]' />";
        $html .= "<br />";
        $html .= "<button type='submit' class='btn'> Bewerken</button>";
      }
      echo $html;
      ?>
      </form>
    </div>
  </div>
</section>