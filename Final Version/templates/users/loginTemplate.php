<section class="registration">
    <form action="index.php?page=login" method="post" class="form">
                        
        <div class="login-container">
        <?php
        if($message!=""){
            echo '<label>'. $message.'</label><br><br>';
        }
        ?>
            <label for="username"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username" required>
        
            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>
        
            <input type="submit" name="login" value="Login" class="loginbtn">
        </div>
        
        <span class="new-user">Not a user yet? <a href="index.php?page=register">Create an account</a></span>
        
        </form> 
</section>