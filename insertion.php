<?php 
require('connexion.php');
session_start();
  if($_POST){
  var_dump($_POST);
    extract($_POST);
    if(isset($ajouter)){
        if($user&&$password){
	  $db->query("INSERT INTO login VALUES('','$user','$password','1')");
	  $_SESSION['Auth']['add']['user'] = $user;
	  header('location:index.php');
      }
    }else{
      if($user){
	  $req = $db->query("SELECT * FROM login WHERE user='$user'");
	  $userExiste = $req->rowCount();
	  
	  if($userExiste){
	    $dataUser = $req->fetch(PDO::FETCH_ASSOC);
	    if($password === $dataUser['password']){
	      $db->query("DELETE FROM login WHERE user='$user'");
	      $_SESSION['Auth']['delete']['user'] = $user;
	      header('location:index.php');
	    }else{
	      die('le password ne coincide pas');
	    }
	  }
      }
   }
    
  }
?>

<!DOCTYPE,html>
<html>
  <head>
    <link rel="Stylesheet" href="style.css">
    <meta charset="utf-8" />
    <title>Insertions</title>
  </head>
  <body>
	  <h1>Enregistrer vous</h1>
      <form method="POST">
	  <label for="user">Nom d'utilisateur</label>
	  <input type="text" name="user"/>
	  <label for="password">Votre mot de passe</label>
	  <input type="password" name="password"/><br/>
	  <input type="submit" name="ajouter" class="ajouter" value="enregistrer">
	  <input type="submit" name="delete" class="supprimer" value="Supprimer">
      </form>
  </body>
 </html>