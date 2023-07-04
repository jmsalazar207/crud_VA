<?php
	require_once("db/init.php");
	require_once("Helper.php");

	$id = sanitize($_GET['id']);
	$dbConn->delete('user','userid',$id);
	header('location:index.php');

?>