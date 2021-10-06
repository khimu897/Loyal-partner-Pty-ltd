<?php 
	if(isset($_SESSION['login']) && $_SESSION['login'] == 1 && ($_SESSION['role']  == 'staff' || $_SESSION['role'] == 'admin')){
        if(isset($_POST['findproperty'])){
            $title = "Search Properties";
            $connP = new DatabaseTable('properties');
            $results=$connP->searchP($_POST['query']);
            $content = loadTemplate('../templates/admin/managepropertyTemplate.php', ['data'=>$results]);
        }
        elseif (isset($_POST['findclients'])){
            $title = "Search Clients";
            $connC = new DatabaseTable('users');
            $data=$connC->searchC($_POST['query']);
            $content = loadTemplate('../templates/admin/findclientsTemplate.php', ['data'=>$data]);
        }
	}else {
		session_unset();
		header('location:../public_html/index.php?page=login');
	}
?>