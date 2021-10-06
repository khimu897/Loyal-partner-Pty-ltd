<?php 
	$title = "Notifications";
	if(isset($_SESSION['login']) && $_SESSION['login'] == 1 && ($_SESSION['role']  == 'staff' || $_SESSION['role'] == 'admin')){
		$conn = new DatabaseTable('notification');
		$data=$conn->orderOn('notif_id');

		if(isset($_GET['did'])){
			$del_status = $conn->delete("notif_id",$_GET['did']);
			if($del_status){
			header('Location:index.php?page=notif');
			}
		}

		$content = loadTemplate('../templates/admin/notifTemplate.php', ['data'=>$data]);//load template 
	}else {
		session_unset();
		header('location:../public_html/index.php?page=login');
	}
?>