<?php
session_start();
include "header.php";
if(isset($_SESSION['pseudo'])){
  echo "<div class='log'> <p>Welcome"." ".$_SESSION['pseudo'].".</p>
  <a href='#' class='deco'>Logout</a> </div>";
}
else {
  header('Location: index.php');
}
?>
<section class="tasks">
<h1>To Do List</h1>

<div class="container2">
  <h2>To Do</h2>
<input class="tableaux" type="text" name="name" >
 <button class="addTable" type="button"value="<?php
 echo $_SESSION['id'];?>" >Add Task</button>


</div>

<div class="container4">
<h2>Done</h2>
</div>

<div class="container3">
<h2>Delete</h2>
</div>

<button class="zozo" type="button" name="button">zozo</button>
</section>
<?php
include "footer.php"
?>
