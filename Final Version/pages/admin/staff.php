<?php 
	$title = "Staff Members";
	if(isset($_SESSION['login']) && $_SESSION['login'] == 1 && ($_SESSION['role']  == 'staff' || $_SESSION['role'] == 'admin')){
		$conn = new DatabaseTable('users');
		$data=$conn->find('role','staff');
		$content = loadTemplate('../templates/admin/staffTemplate.php', ['data'=>$data]);//load template 
	}else {
		session_unset();
		header('location:../public_html/index.php?page=login');
	}
?>