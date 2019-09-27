<title>Beheerder</title>

<section>

<?php
$_SESSION['user_role'];
if (isset($_SESSION['user_role']) == 3) {
  ?>
<?php require_once("view/beheerder/header.php");?>

<h2>Add bios</h2>
<section style="background-color: blue; height: 500px;"></section>

<?php
} else {
  // Redirect them to the login page
  header("Location: index.php?op=loginForm");
}
?>

</section>