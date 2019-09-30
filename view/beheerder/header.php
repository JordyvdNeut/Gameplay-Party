<header>
  <a href="index.php?op=home">
    <img class="logo" src="view/images/gpp.svg" alt="Gameplay Party"></a>
  <h2 class="title">Beheerder</h2><br />
  <nav>
    <div class="not-mobile">
      <a href="index.php?op=loguit"><button class="btn">loguit</button></a>
      <!-- <button href="index.php?op=overons"><button class="btn">Over ons</button></a>
      <a href="index.php?op=overzicht"><button class="btn">Bioscopen</button></a> -->
      <a href="index.php?op=beHome"><button class="btn">Home</button></a>
    </div>
    <div class="dropdown, mobile">
      <i class="fa fa-bars dropbtn" onclick="burgerMenu()"></i>
      <div id="myDropdown" class="dropdown-content">
        <a href="index.php?op=beHome">Home</a>
        <!-- <a href="index.php?op=overzicht">Bioscopen</a>
        <a href="index.php?op=overons">Over ons</a> -->
        <a href="index.php?op=loguit">Loguit</a>
      </div>
    </div>
  </nav>
</header>

<script>
  /* When the user clicks on the button, toggle between hiding and showing the dropdown content */
  function burgerMenu() {
    document.getElementById("myDropdown").classList.toggle("show");
  }

  // Close the dropdown if the user clicks outside of it
  window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
      var dropdowns = document.getElementsByClassName("dropdown-content");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  }
</script>