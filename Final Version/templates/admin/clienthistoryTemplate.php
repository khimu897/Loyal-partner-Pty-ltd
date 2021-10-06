<article>
    <section class="cdetails">
    <?php foreach ($userdetails as $uds){ ?>
        <div class="cname">Client Name:</div>
        <div class="cnameval"><?php echo $uds['firstname'].' '.$uds['lastname'];?></div>
        <div class="cmail">Email:</div>
        <div class="cmailval"><a href = "mailto: <?php echo $uds['email']; ?>"><?php echo $uds['email']; ?></a></div>
    <?php } ?>
    </section>

    <table>
        <tr><th>Property Name</th><th>Address</th><th>Type</th><th>Description</th><th>Occupancy</th><th>Duration</th><th>Price</th><th>Status</th></tr>
        <?php
        foreach($findAllBook as $value){
            $price = ((strtotime($value['end_time'])-strtotime($value['start_time']))/86400)*((int)($value['price']));
            echo '<tr><td>'.$value['prop_name'].'</td><td>'.$value['prop_StreetName'].
            ', '.$value['prop_suburb'].', '.$value['prop_state'].' Zip: '.$value['prop_postCode'].
            '</td><td>'.$value['prop_type'].'</td><td>'.$value['prop_det'].'</td><td>'.$value['prop_occupancy'].
            '</td><td>'.$value['start_time'].' To: '.$value['end_time'].'</td><td>$'.$price.
            '</td><td>';
            if($value['status']=="Not-Confirmed"){
                echo "Booking In Progress";
                echo "<button onclick=\"StaffbookCancel(".$value['book_id'].");\">Cancel Booking</button>";
            }
            else{
                echo "Already Confirmed";
            }
            echo '</td></tr>';
        }
        ?>
    </table>
</article>