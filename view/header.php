<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="style.css" type="text/css">
  <link rel="stylesheet" href="view/style.css" type="text/css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

  <title>Gameplay Party</title>
</head>

<header>
  <nav>
    <div class="not-mobile">
      <!-- <a href="index.php?op=loginForm"><button class="btn">Login</button></a> -->
      <a href="index.php?op=overons"><button class="btn">Over ons</button></a>
      <a href="index.php?op=overzicht"><button class="btn">Bioscopen</button></a>
      <a href="index.php?op=home"><button class="btn">Home</button></a>
    </div>
    <div class="dropdown, mobile">
      <i class="fa fa-bars dropbtn" onclick="burgerMenu()"></i>
      <div id="myDropdown" class="dropdown-content">
        <a href="index.php?op=home">Home</a>
        <a href="index.php?op=overzicht">Bioscopen</a>
        <a href="index.php?op=overons">Over ons</a>
        <!-- <a href="index.php?op=loginForm">Login</a> -->
      </div>
    </div>
  </nav>
  <a href="index.php?op=home">
    <img class="logo" src="view/images/gpp.svg" alt="Gameplay Party">
    <h2 class="title">Gameplay Party</h2><br>
  </a>
</header>
</head>

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

</html>