<?php
	$title = "Local Partners Pty Ltd";
	$conn = new DatabaseTable('properties');
	$data=$conn->orderOn('prop_id');
	
	if(isset($_POST['book_prop'])){
		if(isset($_SESSION["login"]) && $_SESSION["login"]== True){
			$path = 'location:index.php?page=enquire&pid='.$_POST['pid'].'&ermsg=0';
			header($path);
		}
		else {
			header('location:index.php?page=login');
		}
	}

	$content = loadTemplate('../templates/users/userhomeTemplate.php', ['data'=>$data]);