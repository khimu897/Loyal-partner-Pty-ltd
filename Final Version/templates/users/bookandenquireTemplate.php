<article class="book_enqiure">
    <?php  
        $id='0';
        foreach ($data as $value) {
    ?>

    <div class="propdetails">
        <h2>Great selection!!</h2>
        <p>Here is some details on your selected <?php $id=$value['prop_id']; echo $value['prop_type']; ?>!!</p>
        </br>
        <span><?php echo $value['prop_name']; ?></span>  
        <span>Located at: <?php echo $value['prop_StreetName'].' '.$value['prop_suburb'].' '.$value['prop_state'].' '.$value['prop_postCode'];?></span>
        <span>Details:</br><?php echo $value['prop_det']; ?></span>
        <span>Recommended No. of Guests: <?php echo $value['prop_occupancy']; ?></span></span>
        <span>Price: $<?php echo $value['price']; ?></span></span>
        <?php } ?>
    </div>

    <form method="post" action="index.php?page=bookandenquire"  class="book">
        <input type="hidden" name="id" value=<?php echo $id;?>>
        <input type="submit" value="Book">
    </form>

    <div class="chat">
        <span>Confused about the property?</span>
        <span>Need to information? </br></span>
        <span>Send us a message and we will get back to you..</span>
        <button class="chat"><a href ="index.php?page=chatnow"> CHAT NOW </a></button>
    </div>
</article>