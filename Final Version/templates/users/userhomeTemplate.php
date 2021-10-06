<article class="property-listing">
    <div class="searchcont">
        <div class="countsearch">
            <?php if (isset($countRes)){ ?>
            <span>Total Search results: <?php echo $countRes;}?></span>
        </div>
    
        <div class="searchbarProp">
            <form action="index.php?page=searchProp" method="post">
                <input type="text" name="query" required>
                <input type="submit" name="findproperty" value="Search">
            </form>
        </div>
    </div>
    <?php  
        foreach ($data as $value) {
            $pidjs = $value['prop_id'];
    ?>

    <section class="property">
        <div class="thumbnail_images"> 
            <div class="slides fade">
                <img src="../images/<?php echo $pidjs?>/1.jpg" id="img_slider<?php echo $pidjs; ?>" alt="Image Link Broken" style="width:100%; height: 100%;">
            </div>

            <?php
                if( is_dir('../images/'.$pidjs) === false ) {
                    mkdir('../images/'.$pidjs);
                }
                $dir = "../images/".$pidjs;
                $img = glob($dir . "/*");
                $inf = array_diff(scandir($dir), array('.', '..'));
                
                $c= count($inf);
                ${'propertyimages'.$pidjs} = "[";
                for ($counter=2; $counter < $c+2; $counter++) { 
                    $a = ",";
                    if ($counter == $c+1) {$a="]";};
                    ${'propertyimages'.$pidjs} .= "'../images/".$pidjs."/".$inf[$counter]."'".$a;
                }
            ?>

            <a class="prev" onclick="slideshow_substract('img_slider<?php echo $pidjs; ?>',slide_images<?php echo $pidjs; ?>)">&#10094;</a> 
            <a class="next" onclick="slideshow_add('img_slider<?php echo $pidjs; ?>',slide_images<?php echo $pidjs; ?>)">&#10095;</a>
        </div>

        <div class="details">
            <span class="details-type">Completely Serviced <?php echo $value["prop_type"];?> located in <?php echo $value["prop_suburb"];?></span>
            <span class="details-name"><?php echo $value["prop_name"];?></span>
            <span class="details-line"></span>
            <span><?php echo $value["prop_det"];?></span>
            <div class="details-bottom">
                <span>Suitable for <?php echo $value["prop_occupancy"];?> Guests</span>
                <span><b>$<?php echo $value["price"];?></b> / Night</span>
            </div>
        </div>
        
        <div class="booking-options">
        <form method="POST" action="index.php?page=userhome">
            <input type="hidden" name="pid" value="<?php echo $value['prop_id'];?>">
            <input type="hidden" name="ermsg" value="0">
            <input type="submit" value="Book" class="enquir" name="book_prop" class="bookbtn">
            </form>
        </div>
    </section>

    <script>
        const slide_images<?php echo$pidjs; ?> = <?php echo ${'propertyimages'.$pidjs}; ?>;
    </script>

    <?php } ?>

</article>

<script>
    // slideshow for main page in the small box of properties

    i = 0;

    const slideshow_add = (a, b) => {
    document.getElementById(a).src = b[i]
    if (i < (b.length - 1)) {
            i++
        } else {
            i = 0
        }
    }
    const slideshow_substract = (a, b) => {
        document.getElementById(a).src = b[i]
        if (i == 0) {
            i = b.length - 1
        }
        else if (i < (b.length)) {
            i--
        }
        else {
            i = 0
        }
    }
</script>