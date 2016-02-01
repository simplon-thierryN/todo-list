<?php
header("Content-Type: application/json");
$pdo = new PDO('mysql:host=localhost;dbname=Trello', 'root', 'touboul69');

$monaction = isset($_GET["action"]) ? $_GET["action"] : false;

if($monaction == "register"){
  $pseudo = $_POST["pseudo"];
  $pass = $_POST["pass"];
  $confirm = $_POST["confirm"];
  if(!empty($pseudo)&& !empty($pass) && !empty($confirm) && $pass == $confirm){
    $req=$pdo->prepare("INSERT INTO users(pseudo,password) VALUES (:pseudo,:password)");
    $donnees=$req->execute(array(
      "pseudo"=>$pseudo,
      "password"=>$pass
    ));
    echo json_encode($donnees);
  }
  else {
    echo "error";
  }
}
elseif ($monaction == "login") {
  session_start();
  $pseudolog=$_POST['pseudolog'];
  $passlog=$_POST['passlog'];
  $id;

  if(isset($pseudolog) && isset($passlog)){
    $req=$pdo->prepare("SELECT * FROM users WHERE pseudo=:pseudolog AND password=:passlog");
    $req->execute(array(
      "pseudolog"=>$pseudolog,
      "passlog"=>$passlog
    ));
    $donnees=$req->fetch(PDO::FETCH_ASSOC);
    if ($donnees) {
      $_SESSION['pseudo']=$pseudolog;
      $_SESSION['mdp']=$passlog;
      $_SESSION['id']=$donnees["id_user"];
      echo json_encode($donnees);
    }
    else {
      echo "error";
    }
  }
}
elseif ($monaction=="deco") {
  session_start();
  session_destroy();
  echo "delete";
}




?>
