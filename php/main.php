<?php
require "register.php";

$monaction = isset($_GET["action"]) ? $_GET["action"] : false;
function get($id, $pdo) {
        $req = $pdo->prepare("SELECT * FROM tableaux WHERE id=:user_id");
        $req->execute(array(
            "user_id" => $id
        ));

        $donnee = $req->fetch();
        echo json_encode($donnee);
}

if(!$monaction){
  $user_id=$_POST["user_id"];
  $req=$pdo->prepare("SELECT * FROM tableaux WHERE user_id=:user_id");
  $req->execute(array(
    "user_id"=>$user_id
  ));
  $donnee=$req->fetchAll(PDO::FETCH_ASSOC); //retourne un tableau indexé par le nom de la colonne comme retourné dans le jeu de résultats
  echo json_encode($donnee);
}

elseif($monaction=="addTable") {
  $nomTableau=$_POST["nomTableau"];
  $user_id=$_POST["user_id"];
  if (!empty($nomTableau)) {
    $req=$pdo->prepare("INSERT INTO tableaux(table_name,user_id) VALUES (:nomTableau,:user_id)");
    $donnee=$req->execute(array(
      "nomTableau"=>$nomTableau,
      "user_id"=>$user_id
    ));
    if ($donnee) {
        get($pdo->lastInsertId(), $pdo);//Retourne l'identifiant de la dernière ligne insérée ou la valeur d'une séquence
    }
    else {
         echo json_encode($donnee);
    }
  }
  else {
    echo "error";
  }
}// fin addTable

elseif ($monaction=="deleteTable") {
  $tableId=$_POST["tableId"];
  $req=$pdo->prepare("DELETE FROM tableaux WHERE id=:tableId");
  $donnee=$req->execute(array(
    "tableId"=>$tableId
  ));
  echo json_encode($donnee);
}//fin delete

elseif ($monaction=="addTask") {
  $nameTask=$_POST['nameTask'];
  $tableId=$_POST['tableId'];
  $req=$pdo->prepare("INSERT INTO tasks (description,table_id) VALUES (:nameTask,:tableId)");
  $donnees=$req->execute(array(
    "nameTask"=>$nameTask,
    "tableId"=>$tableId
  ));
  echo json_encode($donnees);
}
elseif ($monaction=="drop") {
  echo "drop";
}

elseif ($monaction=="zozo") {
  $req=$pdo->prepare("SELECT * FROM tableaux LEFT JOIN donetask ON tableaux.id = donetask.id_tache");
$req->execute();
 $donnees=$req->fetch(PDO::FETCH_ASSOC);
  echo json_encode($donnees);
  //echo $donnees["table_name"];

}
?>
