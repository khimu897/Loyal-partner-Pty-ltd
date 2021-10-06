<?php

$uid=$_SESSION['user_id'];

if(isset($_SESSION['login']) && $_SESSION['login'] == 1 && $_SESSION['role']  == 'user' ) {
    $product_id=0;
    $ermsg="0";
    $availability="Available";
    if(isset($_GET['pid'])){
        $product_id=$_GET['pid'];
        if($_GET['ermsg']){
            $ermsg=$_GET['ermsg'];
        }
        
    }
    $conn = new DatabaseTable('properties');
	$data=$conn->find('prop_id',$product_id);
    $title = "Booking And Enquiring";
    $conn2 = new DatabaseTable('bookings');
    $chk=$conn2->find('prop_id',$product_id);
    $connForFeedBack = new DatabaseTable('feedbacks');
    $allfeedback=$connForFeedBack->findrating('prop_id',$product_id);
    foreach($chk as $key){
        if($key['prop_id']==$product_id){
            $availability="NotAvailable";
        }
    }
    $getusr= new DatabaseTable ('users');
    $getallusr=$getusr->findAll();
    $usrData=[];
    foreach($getallusr as $usrs){
        $fullname = $usrs['firstname']." ".$usrs['lastname'];
        $usrData[$usrs['user_id']]=$fullname;
    }
    $ratings=$connForFeedBack->rating($product_id);
    $rating=$connForFeedBack->rating($product_id);

    $content = loadTemplate('../templates/users/enquireTemplate.php', ['usrData'=>$usrData,'allfeedback'=>$allfeedback,'data'=>$data, 'availability'=>$availability,'uid'=>$uid, 'pid'=>$product_id, 'ratings'=>$ratings,'rating'=>$rating,'ermsg'=>$ermsg]);//load template
}else {
    session_unset();
    header('location:index.php?page=login');
}

?>