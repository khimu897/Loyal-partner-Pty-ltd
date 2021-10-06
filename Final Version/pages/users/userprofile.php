<?php
    $title="Profile";
    if(isset($_SESSION['login']) && $_SESSION['login'] == 1 && $_SESSION['role']  == 'user' ) {
        $uid=$_SESSION['user_id'];
        if(isset($uid)){
            $conn = new DatabaseTable('users');
            $dataa=$conn->find('user_id',$uid);
            $data=$dataa->fetch();
            $status='';
        }

        if(isset($_POST['Update'])){
            $status="Profile has been Updated!";
            $conn = new DatabaseTable('users');
            unset($_POST['Update']);
            $conn->update($_POST,'user_id');

            $dataa=$conn->find('user_id',$uid);
            $data=$dataa->fetch();
        }
        $content = loadTemplate('../templates/users/userprofileTemplate.php', ['data'=>$data,'uid'=>$uid,'status'=>$status]);
    }else {
        session_unset();
        header('location:index.php?page=login');
    }
?>