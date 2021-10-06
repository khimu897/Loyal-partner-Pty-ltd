<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php echo $title; ?></title>
    <script src="../css/js.js"></script>
    <link rel="stylesheet" href="../css/adminstyles.css">
</head>
<body>
    <header>
        <div class="logo">
           <a href="index.php"> <img src="../images/logo/logo.png" alt="Local Partners Pty Ltd"></a>
        </div>

        <nav>
            <div class="links">
                <a href="index.php?page=manageproperty">Properties</a>
                <a href="index.php?page=findclients">Clients</a>
                <a href="index.php?page=chat">Chat</a>
                <?php
                    if((isset($_SESSION['login']) && $_SESSION['login'] == 1) && $_SESSION['username']=="admin"){
                    echo "<a href=index.php?page=notif>Manage Notifications</a>";
                    echo "<a href=index.php?page=staff>Staff Details</a>";
                    }
                ?>
                <a href="index.php?page=report">Report</a>
            </div>
            <div class="login">
                <?php
                if(isset($_SESSION['login']) && $_SESSION['login'] == 1){
                    echo '<b><a href="#">User: '. $_SESSION['username'] .'</a></b>' ;
                ?>

                <div class="dropdown" id="dropdown">
                    <button class="dropbtn" onclick="myFunction()"><i class="fa fa-bell"></i></button>
                    <div class="dropdown-content" id="dropdown-content">
                        <?php 
                            $connN=new DatabaseTable('notification');
                            $allnotif=$connN->findAll();
                            foreach ($allnotif as $value) { 
                                if($value['role']=="staff" || $value['role']=="Everyone"){
                        ?>
                        <div class="itms">
                            <img src="../images/logo/avatar1.png" alt="logo">
                            <div class="text">
                                <h4><?php echo $value['notif_title'];?></h4>
                                <p><?php echo $value['notif_msg'];?></p>
                            </div><br>
                        </div>
                        <?php }} ?>
                    </div>
                </div>
                <form action="../public_html/index.php?page=login" method="POST">
                    <input type="submit" name="logout" value="Logout">
                </form>
                <?php
                    }
                    else{
                        echo '<a href="index.php?page=login">Login</a>';
                    }
                ?>
            </div>
        </nav>
    </header>

    <main>
        <?php echo $content; ?>
    </main>

    <footer>
        <section class="footer_cont">
            <span class="footer_main">Loyal Partners Pty. Ltd</span>
            <span>&#169 2021 Loyal Partners Pty. Ltd | All Rights Reserved.</span>
        </section>
    </footer>
</body>
    <script src="../scripts/main.js"></script>
    <script src="https://kit.fontawesome.com/6d2ea823d0.js"></script>
</html>