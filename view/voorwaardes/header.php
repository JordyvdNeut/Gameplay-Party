<link rel="stylesheet" href="../../style.css">
  <link rel="stylesheet" href="../../grid.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<header>
  <nav>
    <div class="not-mobile">
      <a href="?op=loginForm"><button class="btn login">Login</button></a>
      <a href="?op=overons"><button class="btn overons">Over ons</button></a>
      <a href="?op=overzicht"><button class="btn bios">Bioscopen</button></a>
      <a  href="?op=home"><button class="btn home">Home</button></a>
    </div>
    <div class="dropdown, mobile">
      <i class="fa fa-bars dropbtn" onclick="burgerMenu()"></i>
      <div id="myDropdown" class="dropdown-content">
        <a href="?op=home">Home</a>
        <a href="?op=overzicht">Bioscopen</a>
        <a href="?op=overons">Over ons</a>
        <a href="?op=loginForm">Login</a>
      </div>
    </div>
  </nav>
  <a href="?op=home">
    <img class="logo" src="view/images/gpp.svg" alt="Gameplay Party">

    <h2 class="title">Gameplay Party</h2>
    <blockquote class="quote">Power to the players</blockquote>

  </a>
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