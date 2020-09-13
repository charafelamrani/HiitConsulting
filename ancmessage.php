<?php
session_start();
require_once('script/functions.php');
$db = db_connect();
lastTime($db, $_SESSION['id']);
$idrecipient=$_GET['idr'];
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">

<script src="js/jquery-3.4.1.min.js" type="text/javascript"></script>
<link href="style/reset.css" rel="stylesheet">
<link href="style/style.css" rel="stylesheet">

</head>


<body>
<header>
<h1>Tchat HIIT Consulting</h1>
</header>
 <main id="mainview">
            <div id="worldUser">
			
            <div id="wordviewer">
        <?php 
		$data = ancmessagerie($db, $_SESSION['id'], $idrecipient);
            
      //var_dump($nb_data);
		foreach ($data as $nb_data){ ?>
    
		<?php echo $nb_data['firstName']." ".$nb_data['lastName']." ".$nb_data['message']."<strong> ". $nb_data['date']."</strong><br/>";
		}?>
   

  </p>
            </div>
			
</main>
			<div id="msgConsole">
        <div id="emoji">
		</div>
            <div id="console">
                <form action="inc/writeDataPr.php" method="post" id="frmwrite" name="frmwrite">
                <div id="frmwriteNck">
				<input type="hidden" id="nicknamer" maxlength="15" name="nicknamer" class="frminput" value="<?php echo $idrecipient?>" >
                <input type="hidden" id="nickname" maxlength="15" name="nickname" class="frminput" value="<?php echo $_SESSION['id']?>" >
                </div>
                <input type="textarea" rows="5" cols="50" minlength="1" maxlength="300" id="zonetxt" name="zonetxt" class="frminput" value=""></textarea>
                <input type="submit" name="sendit" id="sendit" value="send" onclick="verif(frmwrite);">
                <input type="reset" name="resetit" id="resetit" value="reset form">
                </form>

                </div>
        </div>

</div>
</body>
</html>





