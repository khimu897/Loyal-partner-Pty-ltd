<?php
session_start();
	include '../db/connection.php';
	
	require '../classes/databasetable.php';
	require '../functions/load_template.php';

	if(isset($_GET['page'])){
		require '../pages/users/'.$_GET['page']. '.php';
	}
	else{
		require '../pages/users/userhome.php';
	}
	
	$tempVars = [
		'title' => $title,
		'content' => $content
	];

	echo loadTemplate('../templates/users/homepage.php', $tempVars);

?>
