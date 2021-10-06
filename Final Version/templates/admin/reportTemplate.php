<article>
    <table>
        <h2>Sales List Table</h2>
        <tr><th>Property Name</th><th>Address</th><th>Type</th><th>Occupancy</th><th>Price</th><th>User Name</th><th>e-mail Address</th><th>Duration Booked</th><th>Status</th></tr>
        <?php
        foreach ($booking_report as $value) { ?>

        <tr> 
            <td><span class="prop_name"><a href="index.php?page=checkavailability&pid=<?php echo $value['prop_id']?>"><?php echo $value['property_name']?></a></span></td>
            <td><span class="prop_add"><?php echo $value['prop_StreetName'].' '.$value['prop_suburb'].' '.$value['prop_state'].' '.$value['prop_postCode']?></span></td>
            <td><span class="prop_type"><?php echo $value['property_type']?></span></td>
            <td><span class="prop_occ"><?php echo $value['property_occup']?></span></td>
            <td><span class="price"><?php echo $value['price']?></span></td>
            <td><span class="name"><a href="index.php?page=clienthistory&uid=<?php echo $value['user_id']?>"><?php echo $value['firstname'].' '.$value['lastname']?></a></span></td>
            <td><span class="email"><?php echo $value['user_email']?></span></td>
            <td><span class="booking">
                <span class="from"><?php echo $value['book_start']?></span>
                <span class="from"><?php echo $value['book_end']?></span>
            </span></td>
            <td><span class="status"><?php echo $value['book_status']?></span></td>
        </tr>
        <?php } ?>
    </table>
</article>