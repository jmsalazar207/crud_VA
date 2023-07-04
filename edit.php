<?php
	session_start();

	require_once("db/init.php");
	require_once("Helper.php");
	

	if (!isset($_POST["token"]) || !isset($_SESSION["token"]) || !isset($_SESSION["token-expire"])) {
		echo "not set";
	}else{
		if ($_POST["token"] === $_SESSION["token"]) {
			if (time() < $_SESSION["token-expire"]) {
				$id=$_POST['userid'];

				$user['firstname'] = sanitize($_POST['firstname']);
				$user['lastname'] = sanitize($_POST['lastname']);
				$user['address'] = sanitize($_POST['address']);

				$dbConn->update('user', 'userid', $id, $user);
				header('location:index.php');
			}
		}
	}

