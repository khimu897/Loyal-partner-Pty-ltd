<article>
    <section class="registration">
        <form action="index.php?page=registerstaff" method="POST">
            <div class="register-container">
                <h1>Sign Up</h1>
                <p>Please fill in this form to create an account.</p>
                <br>

                <label for="name"><b>First Name</b></label>
                <input type="text" name="firstname" placeholder="Enter First Name" required>

                <label for="name"><b>Last Name</b></label>
                <input type="text" name="lastname" placeholder="Enter Last Name" required>

                <label for="user anme temp"><b>Staff Username</b></label>
                <input type="text" placeholder="username" name="username" required>
                
                <label for="email"><b>Email</b></label>
                <input type="email" placeholder="Enter Email" name="email" required>
            
                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" required>
            
                <input type="hidden" name="role" value="staff">

                <div class="clearfix">
                    <input type="button" class="cancelbtn" name="cancelbtn" value="Cancel">
                    <input type="submit" class="signupbtn" name="registerstaff" value="Register a new Staff">
                </div>
            </div>
            </form> 
    </section>
</article>