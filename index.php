<?php
session_start();
if(isset($_SESSION['pseudo']) & isset($_SESSION['mdp'])){

  header('Location: trello.php');
  exit();

}
include 'header.php';
?>
<div class="container">
  <section class="formulaire">
    <div class="up">
      <h2>Sign up</h2>
      <form class="register" method="post">
        <label for="pseudo">Pseudo:</label><input type="text" id="pseudo" name="pseudo">
        <label for="pass">Password:</label><input type="password" id="pass" name="pass">
        <label for="confirm">Confirm pass:</label><input type="password" name="confirm" id="confirm">
        <button class="subregister"type="button" name="submit">Submit</button>
      </form>
      <button class="cancel"type="button" name="cancel">Cancel</button>
    </div>

    <div class="in">
      <h2>Sign in</h2>
      <form class="login" method="post">
        <label for="pseudo">Pseudo:</label><input type="text" id="pseudolog" name="pseudolog">
        <label for="pass">Password:</label><input type="password" id="passlog" name="passlog">
        <button class="sublog"type="button" name="submit">Submit</button>
      </form>
      <button class="cancel"type="button" name="cancel">Cancel</button>
    </div>

  </section>

</div>




<?php include 'footer.php';?>
