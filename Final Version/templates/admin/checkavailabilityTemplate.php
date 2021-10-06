<article>
    <section class="propdetchk">
    <?php foreach ($findtheprop as $property){ ?>
        <div class="prname">Name:</div>
        <div class="pnamerval"><?php echo $property['prop_name']; ?></div>
        <div class="prtype">Type:</div>
        <div class="prtypeval"><?php echo $property['prop_type']; ?></div>
        <div class="praddr">Address:</div>
        <div class="praddrval"><?php echo $property['prop_StreetName'].', '.$property['prop_suburb'].', '.$property['prop_state']; ?></div>
        <div class="prdet">Details:</div>
        <div class="prdetval">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur quae sint nostrum corrupti, quod minus doloremque ex perspiciatis placeat atque?<?php echo $property['prop_det']; ?></div>
        <div class="proccup">Occupancy:</div>
        <div class="proccupval">Suitable for <?php echo $property['prop_occupancy']; ?> person(s)</div>
        <div class="prprice">Price:</div>
        <div class="prpriceval">AU $<?php echo $property['price']; ?></div>
        
    <?php } ?>
    </section>

    <div class="prbookdet"><h4>Booking Details:</h4></div>
    <table>
        <tr><th>From date</th> <th> To Date </th><th>Status</th></tr>
        <?php
            foreach($findthebook as $book){
                echo '<tr><td>'.$book['start_time'].'</td><td>'.$book['end_time'].'</td><td>'.$book['status'].'</td></tr>';
            }
        ?>

    </table>

</article>