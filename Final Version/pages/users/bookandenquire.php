<?php
    if(isset($_SESSION['login']) && $_SESSION['login'] == 1 && $_SESSION['role']  == 'user' ) {
        $product_id=0;
        if(isset($_GET['pid'])){
            $product_id=$_GET['pid'];
        }
        $conn = new DatabaseTable('properties');
        $data=$conn->find('prop_id',$product_id);


        $title = "Booking And Enquiring";
        $content = loadTemplate('../templates/users/bookandenquireTemplate.php', ['data'=>$data]);//load template

    }
    else {
        session_unset();
        header('location:index.php?page=login');
    }
?>