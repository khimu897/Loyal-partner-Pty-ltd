<?php
$title="Search Hisotry";
if(isset($_SESSION['login']) && $_SESSION['login'] == 1 && $_SESSION['role']  == 'user' ) {
    $conn= new DatabaseTable('properties');
    $findAllBook=$conn->booking($_SESSION['user_id']);
    $connB = new DatabaseTable('bookings');
    if(isset($_GET['book_id'])){
        $values= [
            "book_id" => $_GET['book_id'],
            "cred_detail" => $_GET['cred-detail'],
            "status" => "Confirmed",
            "feedback" => "NotGiven"
        ];
        $connB->update($values,'book_id');
        header('location:index.php?page=history');
    }

    if(isset($_GET['action'])){
        $connB->delete("book_id",$_GET['bid']);
        header('location:index.php?page=history');
    }
    $fedbk= new DatabaseTable('feedbacks');
    $findfedbak=$fedbk->find('user_id',$_SESSION['user_id']);

    $content = loadTemplate('../templates/users/bookTemplate.php',['findAllBook'=>$findAllBook,'findfedbak'=>$findfedbak]);
}else {
    session_unset();
    header('location:index.php?page=login');
}
?>