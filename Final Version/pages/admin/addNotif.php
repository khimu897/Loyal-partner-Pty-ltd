<?php
	$title = "Add Notification";

	if(isset($_SESSION['login']) && $_SESSION['login'] == 1 &&  $_SESSION['role'] == 'admin'){
		$connToInsert = new DatabaseTable('notification');
		
		if(isset($_POST['addnotif'])){
			unset($_POST['addnotif']);
			$connToInsert-> insert($_POST);
			header('location:index.php?page=notif'); 
		}

		$content = loadTemplate('../templates/admin/addNotifTemplate.php', []);//load template
	}else {
		session_unset();
		header('location:../public_html/index.php?page=login');
	}
?>