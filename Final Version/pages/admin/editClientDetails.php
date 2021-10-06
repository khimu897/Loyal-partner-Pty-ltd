<?php 
	$title = "Edit Client Details";
	if(isset($_SESSION['login']) && $_SESSION['login'] == 1 && ($_SESSION['role']  == 'staff' || $_SESSION['role'] == 'admin')){
		$status='';
		if(isset($_GET['cid'])){
			$conn = new DatabaseTable('users');
			$dataa=$conn->find('user_id',$_GET['cid']);
			$data=$dataa->fetch();
		}

		if(isset($_POST['Update'])){
			$status="Profile has been Updated!";
			$conn = new DatabaseTable('users');
			unset($_POST['Update']);
			$conn->update($_POST,'user_id');

			$dataa=$conn->find('user_id',$_POST['user_id']);
			$data=$dataa->fetch();
		}
		$content = loadTemplate('../templates/admin/editClientDetailsTemplate.php', ['data'=>$data,'status'=>$status]);//load template 
	}else {
		session_unset();
		header('location:../public_html/index.php?page=login');
	}
?>