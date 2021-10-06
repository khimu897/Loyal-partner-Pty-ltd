<?php
	session_start();
	include '../db/connection.php';
	
	require '../classes/databasetable.php';
	require '../functions/load_template.php';

	if(isset($_GET['page'])){
		require '../pages/admin/'.$_GET['page']. '.php';
	}
	else{
		require '../pages/admin/dashboard.php';
	}
	
	$tempVars = [
		'title' => $title,
		'content' => $content
	];
	
	echo loadTemplate('../templates/admin/homepageTemplate.php', $tempVars);
?>
