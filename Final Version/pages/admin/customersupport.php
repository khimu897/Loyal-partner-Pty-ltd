<?php
	$title = "Customer Support";
	if(isset($_SESSION['login']) && $_SESSION['login'] == 1 && ($_SESSION['role']  == 'staff' || $_SESSION['role'] == 'admin')){
		$connToInsert = new DatabaseTable('contactform');

		if ($_SESSION['role']  == 'admin') {
			$allData=$connToInsert->findcustsv('staff_id = "NotAssigned" OR staff_id = "staff" OR staff_id',$_SESSION['username'], 'CASE WHEN staff_id="NotAssigned" THEN NULL ELSE staff_id END ASC');
		} else {
			$allData=$connToInsert->findcustsv('staff_id = "NotAssigned" OR staff_id',$_SESSION['username'], 'CASE WHEN staff_id="NotAssigned" THEN NULL ELSE staff_id END ASC');
		}

		if(isset($_GET['assign'])){
			$values= [
				'cntfrmid' => $_GET['assign'],
				'staff_id' => $_SESSION['username']
			];
			$connToInsert->update($values,'cntfrmid');
			header('location:index.php?page=customersupport');
		}
		$content = loadTemplate('../templates/admin/custsupTemplate.php', ['allData'=>$allData]);//load template
	}else {
		session_unset();
		header('location:../public_html/index.php?page=login');
	}
?>