<?php
$title= "Booking History";
if(isset($_SESSION['login']) && $_SESSION['login'] == 1 && ($_SESSION['role']  == 'staff' || $_SESSION['role'] == 'admin')){
    $conn = new DatabaseTable('booking');
    $booking_report=$conn->report();

    $content = loadTemplate('../templates/admin/reportTemplate.php', ['booking_report'=>$booking_report]);//load template 
}else {
    session_unset();
    header('location:../public_html/index.php?page=login');
}
?>