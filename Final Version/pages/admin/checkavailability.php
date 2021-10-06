<?php
    $title="Check Availability";
    if(isset($_SESSION['login']) && $_SESSION['login'] == 1 && ($_SESSION['role']  == 'staff' || $_SESSION['role'] == 'admin')){
        $connB=new DatabaseTable('bookings');
        $connP=new DatabaseTable('properties');
        if(isset($_GET['pid'])){
        $findthebook=$connB->find("prop_id",$_GET['pid']);
        $findtheprop=$connP->find("prop_id",$_GET['pid']);
        }
        $content = loadTemplate('../templates/admin/checkavailabilityTemplate.php', ['findtheprop'=>$findtheprop,'findthebook'=>$findthebook]);
    }else {
		session_unset();
		header('location:../public_html/index.php?page=login');
	}
?>