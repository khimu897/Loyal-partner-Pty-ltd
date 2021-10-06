<?php
    $title="Contact Us";
$conn= new DatabaseTable('contactform');

if(isset($_POST['submit'])){
    var_dump($_POST);
    unset($_POST['submit']);
    $conn-> insert($_POST);
	header('location:index.php');
}

	$content = loadTemplate('../templates/users/contactTemplate.php', []);
?>