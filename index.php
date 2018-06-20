<?php 
session_start();
require('connexion.php');
$req = $db->query("SELECT * FROM login ORDER BY id DESC");
?>
<!DOCTYPE,html>
<html>
  <head>
    <title>Mini site</title>
    <meta charset="utf-8">
    <link rel="Stylesheet" href="style.css"/>
  </head>
  <body>
      <ul>
	<li><a href="insertion.php">Enregistrer</a></li>
	<Li><a>Voir les Enrgistrements</a></li>
      </ul>
	<?php

	if(isset($_SESSION['Auth']['add']['user'])){
	  echo"<p class='success'>l'utilisateur ".'<strong>'.$_SESSION['Auth']['add']['user'].'</strong>'.' à bien été ajouter</p>';
	  unset($_SESSION['Auth']['add']['user']);
	} else if(isset($_SESSION['Auth']['delete']['user'])){
	  echo"<p class='danger'>l'utilisateur ".'<strong>'.$_SESSION['Auth']['delete']['user'].'</strong>'.' à bien été supprimer</p>';
	  unset($_SESSION['Auth']['delete']['user']);
	}
	?>
	<table>
	<tr>
	  <td>user</td>
	  <td>password</td>
	</tr>
	  <?php
	    $i=0;
	    while($allLogin = $req->fetch(PDO::FETCH_ASSOC)):
	      $i++;
	      if($i%2):
	  ?>
	    <tr class="td-orange">
	      <td><?=$allLogin['user']?></td>
	      <td><?=$allLogin['password']?></td>
	    </tr>
	     <?php else:?>
	      <tr class="td-blue">
	      <td><?=$allLogin['user']?></td>
	      <td><?=$allLogin['password']?></td>
	    </tr>
	 <?php endif;?>
	<?php endwhile; ?>
	</table>
  </body>
</html>