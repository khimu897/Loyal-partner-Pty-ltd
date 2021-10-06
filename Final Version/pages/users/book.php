<?php
$title = "Booking";
if(isset($_SESSION['login']) && $_SESSION['login'] == 1 && $_SESSION['role']  == 'user' ) {
    $conn= new DatabaseTable('bookings');
    $available="";
    if(isset($_POST['book'])){
        unset($_POST['book']);
        $available="yes";
        $chk=$conn->find('prop_id',$_POST['prop_id']);
        if(true){
            foreach($chk as $key){
                if($available=="no"){
                    break; 
                }
                else{
                if($key['prop_id']==$_POST['prop_id']){
                    $start_time = strtotime($_POST['start_time']);
                    $end_time = strtotime($_POST['end_time']);
                    $packfrom = strtotime($key['start_time']);
                    $packto = strtotime($key['end_time']);

                    if(

                        
                    (($start_time >= $packfrom && $packto >= $end_time) && ($packfrom < $end_time && $start_time < $packto)) || 
                    
                    (($packfrom <= $start_time && $packto <= $end_time) && ($packfrom < $end_time && $packto > $start_time))||
                    
                    (($packfrom >= $start_time && $end_time <= $packto) && ($packfrom < $end_time && $packto > $start_time )) ||

                    (($packfrom >=$start_time && $packto <= $end_time) && ($packfrom < $end_time && $packto > $start_time)) ||
                    
                    ($end_time <= $start_time)
            
                    )
              
                    {
                        $available="no";
                    }
                    else{
                        $available="yes";
                    }
                }
                else{
                    $inst=$conn->insert($_POST);
                    header('location:index.php?page=history');
                }
            }
                }   
        }
        else{
            $vari="chaina";
        }
        
        if($available=="no"){
            header('location:index.php?page=enquire&pid='.$_POST['prop_id'].'&ermsg=1');
        }
        else{
            $inst=$conn->insert($_POST);
            header('location:index.php?page=history');
        }

    }
    $content=loadTemplate('../templates/users/bookTemplate.php', ['available'=>$available]);
}else {
    session_unset();
    header('location:index.php?page=login');
}
?>