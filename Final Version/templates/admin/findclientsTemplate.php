<article class="findclients">

    <div class="add">
        <p> LIST OF CLIENTS </p>
        <div class="searchbar">
            <form action="index.php?page=search" method="post">
                <input type="text" name="query" required>
                <input type="submit" name="findclients" value="Search">
            </form>
        </div>
    </div>
    <table id="listClients">

    <tr><th>First Name</th><th>Last Name</th><th>E-mail Address</th><th>Edit Details</th><th>History</th> </tr>

    <?php
    foreach ($data as $value) {
        echo '<tr><td>'.$value['firstname'].'</td><td>'.$value['lastname'].'</td><td>'.$value['email'].'</td><td><a href="index.php?page=editClientDetails&cid='.$value['user_id'].'">Edit</a></td><td>
        <a href="index.php?page=clienthistory&uid='.$value['user_id'].'">Check</a>
        </td></tr>';
    }
    ?>

    </table>
</article>