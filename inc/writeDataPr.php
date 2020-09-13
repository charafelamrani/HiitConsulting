<?php

/*connexion à la base avec pdo pour écriture des données */
session_start();
require_once('../script/functions.php');
$db = db_connect();
lastTime($db, $_SESSION['id']);
    

  
        $nickname = $_POST['nickname'];
		$nicknamer = $_POST['nicknamer'];
        $zonetxt = $_POST['zonetxt'];
		$dateUsed=date('Y-m-d H:i:s');
    
   
    if (!empty($nickname)&&!empty($zonetxt)){

    
	
    $insertmsg=$db->prepare("INSERT INTO message (message, idRecipient, idSender, date) VALUES(:message_text, :nicknamer, :nickname, :timestamp)");
	$insertmsg->bindValue(':message_text', $zonetxt, PDO::PARAM_STR);
	$insertmsg->bindValue(':nicknamer', $nicknamer, PDO::PARAM_STR);
    $insertmsg->bindValue(':nickname', $nickname, PDO::PARAM_STR);
    $insertmsg->bindValue(':timestamp', $dateUsed, PDO::PARAM_STR);
    
    $insertmsg->execute();

    $insertmsg->closeCursor();
    $db = null;
   
    header("Location: ../ancmessage.php?idr=".$nicknamer);
 
    exit;
    }
  
    else{
      header("Location: ../ancmessage.php?idr=".$nicknamer);
    exit;
    }
?>