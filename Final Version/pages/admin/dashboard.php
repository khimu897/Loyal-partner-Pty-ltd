<?php 
	$title = "Loyal Partners";
	if(isset($_SESSION['login']) && $_SESSION['login'] == 1 && ($_SESSION['role']  == 'staff' || $_SESSION['role'] == 'admin')){
		$connCF = new DatabaseTable('contactform');
		$countCustReq=$connCF->count('staff_id','NotAssigned');

		$totcusth=$connCF->count('NOT staff_id','NotAssigned');

		$connTB = new DatabaseTable('bookings');
		$totalCB=$connTB->count('status','Confirmed');

		$connTP = new DatabaseTable('properties');
		$totalTP=$connTP->findAll();

		$connTU = new DatabaseTable('users');
		$totalTU=$connTU->count('role','user');

		$content = loadTemplate('../templates/admin/dashboardTemplate.php', ['countCustReq'=>$countCustReq, 'totcusth'=>$totcusth, 'totalCB'=>$totalCB, 'totalTP'=>$totalTP, 'totalTU'=>$totalTU]);//load template 
	}else {
		session_unset();
		header('location:../public_html/index.php?page=login');
	}
?>