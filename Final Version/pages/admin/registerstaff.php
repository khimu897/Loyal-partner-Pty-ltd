<?php
	$title = "Local Partners Pty Ltd";
	if(isset($_SESSION['login']) && $_SESSION['login'] == 1 && ($_SESSION['role']  == 'staff' || $_SESSION['role'] == 'admin')){
		$connToInsert = new DatabaseTable('users');
		
		if(isset($_POST['registerstaff'])){
			unset($_POST['registerstaff']);
			$connToInsert-> insert($_POST);
			header('location:index.php?page=staff'); 
		}

		if(isset($_GET['sid'])){
			$conn = new DatabaseTable('users');
			$dataa=$conn->find('user_id',$_GET['sid']);
			$data=$dataa->fetch();
		}

		$content = loadTemplate('../templates/admin/registerStaffTemplate.php', []);//load template
	}else {
		session_unset();
		header('location:../public_html/index.php?page=login');
	}
?>