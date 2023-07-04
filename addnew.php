<?php
	session_start();
	require_once("db/init.php");
	require_once("Helper.php");

	if (!isset($_POST["token"]) || !isset($_SESSION["token"]) || !isset($_SESSION["token-expire"])) {
		echo "token not set";
	}else{
		if ($_POST["token"] === $_SESSION["token"]) {
			if(time() < $_SESSION["token-expire"]){
				$user = [];
				$user['firstname'] = sanitize($_POST['firstname'], ENT_QUOTES);
				$user['lastname'] = sanitize($_POST['lastname'], ENT_QUOTES);
				$user['address'] = sanitize($_POST['address'], ENT_QUOTES);

				$dbConn->insert('user', $user);

				header('location:index.php');
			}else{
				echo "token  expired response";
			}
		}else{
			echo "invalid token response";
		}
	}


?>