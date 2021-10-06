<article class="manageproperty">

    <div class="add">
        <p> LIST OF PROPERTIES </p>
        <div class="searchbar">
            <form action="index.php?page=search" method="post">
                <input type="text" name="query" required>
                <input type="submit" name="findproperty" value="Search">
            </form>
        </div>
        <form method="post" action="index.php?page=addupdateproperty">
            <input type="submit" name="addpagerequest" value="Add Property">
        </form>
    </div>  

    <table id="listProperties">

    <tr><th>Property Name</th><th>Property Type</th><th>Property Location</th><th>Property Details</th><th>No. of guests allowed</th><th>Price per day</th><th>Edit Details</th> <th>Availability</th></tr>

    <?php
    foreach ($data as $value) {
        echo '<tr><td>'.$value['prop_name'].'</td><td>'.$value['prop_type'].'</td><td>'.$value['prop_StreetName'].' '.$value['prop_suburb'].' '.$value['prop_state'].' '.$value['prop_postCode'].'</td><td>'.$value['prop_det'].'</td><td>'.$value['prop_occupancy'].'</td><td>$'.$value['price'].'</td><td><a href="index.php?page=addupdateproperty&pid='.$value['prop_id'].'">Edit</a><a href="index.php?page=manageproperty&did='.$value['prop_id'].'" class="delete">Delete</a></td><td>
        <button><a href="index.php?page=checkavailability&pid='.$value['prop_id'].'">Check Availability</button>
        </td></tr>';
    }
    ?>

    </table>
</article>