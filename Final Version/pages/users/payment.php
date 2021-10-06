<?php
    $title="Process Payment";
    if(isset($_SESSION['login']) && $_SESSION['login'] == 1 && $_SESSION['role']  == 'user' ) {
        $connToInsert =new DatabaseTable("creditinfo");
        $connToUpdate = new DatabaseTable("bookings");
        if(isset($_POST['submit'])){
            unset($_POST['submit']);
            $connToInsert-> insert($_POST);
            if($connToInsert){
                header('location:index.php?page=history&book_id='.$_POST['book_id'].'&cred-detail='.$_POST['cardnumber']);

            }
        }
        $content = loadTemplate('../templates/users/paymentTemplate.php', []);
    }else {
        session_unset();
        header('location:index.php?page=login');
    }
?>