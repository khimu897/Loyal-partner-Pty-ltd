<article>
<section class="registration">
    <form action="index.php?page=addNotif" method="POST">
        <div class="register-container">
            <h1>Add Notification</h1>
            <p>Please fill out the details of notification</p>
            <br>

            <label for="notif_title"><b>Notification Title</b></label>
            <input type="text" name="notif_title" placeholder="Huge Discount Offers" required>

            <label for="notif_title"><b>Notification Message</b></label>
            <input type="text" name="notif_msg" placeholder="Details on Notification" required>

            <label for="role">Send Notification to:</label>
            <select name="role" id="prop_type" required>
                <option disabled selected value> -- select an option -- </option>
                <option value="Everyone">Everyone</option>
                <option value="staff">Staff's</option>
                <option value="user">Client's</option>
            </select>

            <div class="clearfix">
                <input type="button" class="cancelbtn" name="cancelbtn" value="Cancel">
                <input type="submit" class="signupbtn" name="addnotif" value="Send a new Notification">
            </div>
        </div>
        </form> 
</section>
</article>