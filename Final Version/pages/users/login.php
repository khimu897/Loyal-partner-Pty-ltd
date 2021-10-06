<?php
	$title = "Local Partners Pty Ltd";
	$message="";
	$conn = new DatabaseTable('users');
	$data=$conn->findAll();
	
	if(isset($_POST['logout'])){
		session_unset();
		header('location:index.php?page=userhome');
	}

	if(isset($_POST['login'])){
		$bol=0;
		foreach($data as $value){
			if($value['username']==$_POST['username'] && $value['password']==$_POST['password'] && $value['role']=='user'){
				$bol=1;
				echo "User login Success";
				$_SESSION["login"]=1;
				$_SESSION["username"]=$_POST['username'];
				$_SESSION["user_id"]=$value['user_id'];
				$_SESSION["role"]=$value['role'];	
				header('location:index.php?page=userhome');
			}
			elseif($value['username']==$_POST['username'] && $value['password']==$_POST['password'] && $value['role']=='staff'){
				$bol=1;
				echo "Staff login Success";
				$_SESSION["login"]=1;
				$_SESSION["username"]=$_POST['username'];
				$_SESSION["role"]=$value['role'];
				header('location:../admin/index.php');
			}
			elseif($value['username']==$_POST['username'] && $value['password']==$_POST['password'] && $value['role']=='admin'){
				$bol=1;
				echo "Admin login Success";
				$_SESSION["login"]=1;
				$_SESSION["username"]=$_POST['username'];
				$_SESSION["role"]=$value['role'];
				header('location:../admin/index.php');
			}
			else{
			}
			
		}
		
		if($bol!=1){
			$message="Incorrect Credentials Please Check Your Login Details Or Contact The Administration.";
		}
	}


	$content = loadTemplate('../templates/users/loginTemplate.php', ['message'=>$message]);
?>