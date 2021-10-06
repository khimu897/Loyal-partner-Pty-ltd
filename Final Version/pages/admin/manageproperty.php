<?php 
	$title = "Manage Properties";

	if(isset($_SESSION['login']) && $_SESSION['login'] == 1 && ($_SESSION['role']  == 'staff' || $_SESSION['role'] == 'admin')){
		$conn = new DatabaseTable('properties');
		$connB = new DatabaseTable('bookings');
		$data=$conn->orderOn('prop_id');
		if(isset($_GET['did'])){
			$book=$connB->find("prop_id",$_GET['did']);
			$fetchbook=$book->fetch();
			if($fetchbook['prop_id']==$_GET['did']){
				echo "<script>
				alert('Property is booked. Cannot be deleted');
				window.location.href='index.php?page=manageproperty';
				</script>";
			}
			else{
			$del_status = $conn->delete("prop_id",$_GET['did']);
			if($del_status){
			header('Location:index.php?page=manageproperty');
			}
			}
		}
		$content = loadTemplate('../templates/admin/managepropertyTemplate.php', ['data'=>$data]);//load template 
	}else {
		header('location:../public_html/index.php?page=login');
	}
?>