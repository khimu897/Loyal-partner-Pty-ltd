<?php 
	$title = "Manage Property";

	if(isset($_SESSION['login']) && $_SESSION['login'] == 1 && ($_SESSION['role']  == 'staff' || $_SESSION['role'] == 'admin')){
		$data = [];
		

		if(isset($_POST['val_insert'])){
			$conn = new DatabaseTable('properties');
			unset($_POST['prop_id']);
			unset($_POST['val_insert']);
			$conn->insert($_POST);

			/*  IMAGE UPLOAD    */
			$getVal= new DatabaseTable('properties');
			$valu=$getVal->getlastVal('prop_id');
			$nextVal=0;
			foreach($valu as $value){
				$nextVal = $value[0];
			}
			if( is_dir('../images/'.$nextVal) === false )
		{
		mkdir('../images/'.$nextVal);
		}	
			$target_dir = "../images/".$nextVal."/";
			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			if($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
			} else {
			echo "File is not an image.";
			$uploadOk = 0;}

			if($imageFileType != "jpg" && $imageFileType != "jpeg") {
		echo "Sorry, only JPG, JPEG files are allowed.";
		$uploadOk = 0;
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
			$temp = explode(".", $_FILES["fileToUpload"]["tmp_name"]);
		$newfilename = '1.jpg';
		if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . $newfilename)){
			header('Location:index.php?page=manageproperty');
		}
		else{
			echo "Failed to do the operation. Please Try Again.";
		}

		}
			/* end of script */	
		}
		
		if(isset($_POST['val_update'])){
			$conn = new DatabaseTable('properties');
			unset($_POST['val_update']);
			$conn->update($_POST,'prop_id');
			header('Location:index.php?page=manageproperty');
		}

		if(isset($_GET['pid'])){
			$conn = new DatabaseTable('properties');
			$dataa=$conn->find('prop_id',$_GET['pid']);
			$data=$dataa->fetch();
		}

		$content = loadTemplate('../templates/admin/addupdatepropertyTemplate.php', ['data'=>$data]);//load template 
	}else {
		session_unset();
		header('location:../public_html/index.php?page=login');
	}
?>