<section class="registration">
    <form action="index.php?page=register" method="POST">
        <div class="register-container">
            <h1>Sign Up</h1>
            <p>Please fill in this form to create an account.</p>
            <hr>
            
            <label for="name">First Name</label>
            <input type="text" name="firstname" placeholder="Enter First Name" required>

            <label for="name">Last Name</label>
            <input type="text" name="lastname" placeholder="Enter Last Name" required>

            <label for="user anme temp">Username</label>
            <input type="text" placeholder="username" name="username" required>
            
            <label for="email">Email</label>
            <input type="email" placeholder="Enter Email" name="email" required>
        
            <label for="psw">Password</label>
            <input type="password" placeholder="Enter Password" name="password" required>

            <input type="hidden" name="role" value="user">
            <div class="registerbtns">
                <a class="cancelbtn" href="index.php">Cancel</a>
                <input type="submit" class="signupbtn" name="usersubmit" value="Sign Up">
            </div>
        </div>
        </form> 
</section>