<?php

    $title="Provide Feedback";
    if(isset($_SESSION['login']) && $_SESSION['login'] == 1 && $_SESSION['role']  == 'user' ) {
        $conn= new DatabaseTable('feedbacks');
        $userID=$_SESSION["user_id"];
        $propertyID='';
        $bidd='';
        $fetchVal=array();

        if(isset($_GET['pid'])){
            $propertyID=$_GET['pid'];
            $bidd=$_GET['bidd'];
            $getVal = new DatabaseTable ('properties');
            $fetchVal=$getVal->find('prop_id',$propertyID); 
        }
        

        if(isset($_POST['feedback'])){
            $connB = new DatabaseTable('bookings');
            $values= [
                "book_id"=>$_POST['book_id'],
                "feedback" => "Given"
            ];
            $connB->update($values,'book_id');
            unset($_POST['book_id']);
            unset($_POST['feedback']);
            $conn-> insert($_POST);
            
            header('location:index.php?page=history');   }



        $content = loadTemplate('../templates/users/feedbackTemplate.php', ['propertyID'=>$propertyID,'userID'=>$userID,'fetchVal'=>$fetchVal,'bidd'=>$bidd]);//load template
    }else {
        session_unset();
        header('location:index.php?page=login');
    }
?>