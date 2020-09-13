<?php

/*connexion à la base avec pdo pour écriture des données */
session_start();
require_once('../script/functions.php');
$db = db_connect();
lastTime($db, $_SESSION['id']);
    

  
        $nickname = $_POST['nickname'];
        $zonetxt = $_POST['zonetxt'];
		$dateUsed=date('Y-m-d H:i:s');
    
   
    if (!empty($nickname)&&!empty($zonetxt)){

    
	
    $insertmsg=$db->prepare("INSERT INTO tchat (idUser, texte, dateTchat) VALUES(:pseudo, :message_text, :timestamp)");
    $insertmsg->bindValue(':pseudo', $nickname, PDO::PARAM_STR);
    $insertmsg->bindValue(':message_text', $zonetxt, PDO::PARAM_STR);
    $insertmsg->bindValue(':timestamp', $dateUsed, PDO::PARAM_STR);
    
    $insertmsg->execute();

    $insertmsg->closeCursor();
    $db = null;
  
    header('Location: ../tchat.php');
 
    exit;
    }
    
    else{
      header('Location: ../tchat.php');
    exit;
    }
?>