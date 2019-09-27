<title>Beheerder</title>
<?php
if (isset($_SESSION['user_role']) == 3) {
  ?>
  <?php require_once "view/beheerder/header.php"; ?>
  <section>
    <a style="color: #2c3e50;" href="#">
      <div class="login">
        <h2>Content overzicht</h2>
        Hier vind u een overzicht van alle content in de website. Deze content kunt u bewerken.
      </div>
    </a>
  </section>

<?php
}
if (!$_SESSION) {
  header('Location: index.php?op=loginForm');
}
?>