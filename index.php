<?php
session_start();
require_once('script/functions.php');
$db = db_connect();

if(is_loggedin() !=""){
	lastTime($db, $_SESSION['id']);
	redirect("tchat.php");
}

@$pseudo=$_POST['pseudo']; 
@$pass =$_POST['mdp'];  
if (isset($_POST['envoyer'])){
		
	if (isset($_POST['envoyer'])){
		
	login($db,$pseudo,$pass);
	}
	
	}
	

	
?>




<html>
<head><link rel="stylesheet" type="text/css" href="style.css">
<script src="chat.js"></script>
</head>
<title> Tchat HiitConsulting</title>
<body>

<div class="identification">
<strong> AUTHENTIFICATION</strong>
<!-- formulaire de connexion-->
<div class="erreur"><?php
echo @$erreur;
?>
</div>
<div class="logdes">
<form id="identification" name="identification" method="post" action="index.php">
  <input name="pseudo" type="text" id="pseudo" maxlength="15" class="text" placeholder="Pseudo" />
  <input name="mdp" type="password" id="mdp" maxlength="15" class="text" placeholder="Mot de passe" />
  <input type="submit" name="envoyer" id="envoyer" value="Se connecter" class="text" />
</form>

</body>
</html>