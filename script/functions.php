<?php
function db_connect() {

	try {
		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	
		$host = 	'localhost';
		$dbname = 	'tchathiitconsulting';
		$user = 	'root';
		$password = 	'';

		
		$db = new PDO('mysql:host='.$host.';dbname='.$dbname.'', $user, $password, $pdo_options);
		return $db;
	} catch (Exception $e) {
		die('Erreur de connexion : ' . $e->getMessage());
	}
}



function user_verified() {
	return isset($_SESSION['id']);
}



	
	

function login($db, $pseudo, $pass){
	
	if($pseudo !=""){
				

$query = $db->prepare("SELECT * FROM users WHERE userName= :user");
$query->execute(array(
	':user' => $pseudo
));

$count=$query->rowCount();
		

if($count == 0) {			
	
	$new_password=genererPassword($pass);
		$password_hash=password_hash($new_password,PASSWORD_DEFAULT);
		$insert = $db->prepare("INSERT INTO users (userName,password,firstName,lastName) VALUES(:username,:password,:firstname,:lastname)");
			$insert->bindparam(":username",$pseudo);
			$insert->bindparam(":password",$password_hash);
			$insert->bindparam(":firstname",$pseudo);
			$insert->bindparam(":lastname",$pseudo);
			$insert->execute();

				
	
	$_SESSION['id'] = $db->lastInsertId();

	$_SESSION['time'] = time();
	$_SESSION['login'] = $pseudo;
	redirecta($new_password);
} else {
	$data = $query->fetch();	
	if(password_verify($pass,$data['password'])) {			
		$_SESSION['id'] = $data['idUser'];

		
		$_SESSION['login'] = $data['userName'];
		redirect("tchat.php");
	}
	else{
		echo'<script type="text/javascript">
   alert("Un compte existe deja avec ce pseudo");
   window.location = "index.php";
</script>';
		
	}
}
			

$query->closeCursor();
	
	
}
	
	
}
	
	


function is_loggedin(){
		if(isset($_SESSION['user_session'])){
			return true;
		}
		else{ return false;}
		
		
	}
	
	
function redirect($url){
		
		header("Location: $url");
		
	}
	
	
function redirecta($mp){
		
		
		echo'<script type="text/javascript">
   alert("Un compte a été créé avec le password suivant: \''.$mp.'");
   window.location = "tchat.php";
</script>';
	}
	
function genererPassword()
{
 $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
 $longueurMax = strlen($caracteres);
 $chaineAleatoire = '';
 for ($i = 0; $i < 8; $i++)
 {
 $chaineAleatoire .= $caracteres[rand(0, $longueurMax - 1)];
 }
 return $chaineAleatoire;
}


function messagerie($db, $ids){
	$req=$db->prepare('SELECT distinct firstName, lastName ,idUser FROM message, users  
WHERE (message.idSender=users.idUser OR message.idRecipient=users.idUser) AND users.idUser!=:ids');
	
	$req->bindparam(":ids",$ids);
	$req->execute();
	$data = $req->fetchAll();
	return $data;
	
	
}
function ancmessagerie($db, $ids,$idr){
	$req=$db->prepare('SELECT * FROM message, users WHERE (message.idSender=users.idUser OR message.idRecipient=users.idUser)
AND ((idRecipient =:ids AND idSender= :idr) OR  (idRecipient =:idr AND idSender= :ids)) GROUP BY idMessage ORDER BY date  DESC');

	
	$req->bindparam(":ids",$ids);
	$req->bindparam(":idr",$idr);
	$req->execute();
	$data = $req->fetchAll();
	return $data;
	
	
}


function lastTime($db, $id){
	date_default_timezone_set("Africa/Casablanca");
	$time = date('Y-m-d H:i:s');
	$req = $db->prepare('UPDATE users SET lastTime= :time WHERE idUser= :id');
	$req->bindparam(":time",$time);
	$req->bindparam(":id",$id);
	$req->execute();
	
}

function connection($db, $id){
	
	$req = $db->prepare('SELECT firstName, lastName FROM users WHERE lastTime >= DATE_SUB(NOW(),INTERVAL 2 MINUTE) AND idUser != :id');
	$req->bindparam(":id",$id);
	$req->execute();
	$data=$req->fetchAll();
	return $data;
	
}

function deconnexion(){
	session_start();
	session_destroy();
	header('location: ./index.php');
	exit;

}

 function get_message() {
      $db = db_connect();
        $reponse = $db->query('SELECT firstName, lastName, texte ,dateTchat FROM tchat , users WHERE tchat.idUser=users.idUser  ORDER BY idTchat DESC LIMIT 0, 50');
		$reponse->execute();
		$data=$reponse->fetchAll();
		return $data;

    }
?>