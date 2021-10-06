<article class="stafflist">
    <div class="add">
        <p> LIST OF STAFF </p>
        <form method="post" action="index.php?page=registerStaff">
		    <input type="submit"  value="Add Staff">
        </form>
    </div>
    
    <table id="listStaff">
        <tr><th>First Name</th><th>Last Name</th><th>E-mail Address</th> </tr>

        <?php
        foreach ($data as $value) {
            echo '<tr><td>'.$value['firstname'].'</td><td>'.$value['lastname'].'</td><td>'.$value['email'].'</td></tr>';
        }
        ?>
    </table>

</article>