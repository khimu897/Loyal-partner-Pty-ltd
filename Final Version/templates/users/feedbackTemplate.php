<article class="property-listing">

    <?php  
       foreach ($fetchVal as $value) {
    ?>

    <section class="property">
        <div class="thumbnail_images"> 
            <div class="slides fade">
                <img src="../images/<?php echo $propertyID?>/1.jpg" id="img_slider<?php echo $propertyID; ?>" alt="Image Link Broken" style="width:100%; height: 100%;">
            </div>

            <?php
                if( is_dir('../images/'.$propertyID) === false ) {
                    mkdir('../images/'.$propertyID);
                }
                $dir = "../images/".$propertyID;
                $img = glob($dir . "/*");
                $inf = array_diff(scandir($dir), array('.', '..')); //gets the file name in an array list
                
                $c= count($inf);
                ${'propertyimages'.$propertyID} = "[";
                for ($counter=2; $counter < $c+2; $counter++) { 
                    $a = ",";
                    if ($counter == $c+1) {$a="]";};
                    ${'propertyimages'.$propertyID} .= "'../images/".$propertyID."/".$inf[$counter]."'".$a;
                }
            ?>

            <a class="prev" onclick="slideshow_substract('img_slider<?php echo $propertyID; ?>',slide_images<?php echo $propertyID; ?>)">&#10094;</a> 
            <a class="next" onclick="slideshow_add('img_slider<?php echo $propertyID; ?>',slide_images<?php echo $propertyID; ?>)">&#10095;</a>
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
    </section>

    <script>
        const slide_images<?php echo$propertyID; ?> = <?php echo ${'propertyimages'.$propertyID}; ?>;
    </script>

    <?php } ?>

<div>
    <form method="POST" action="index.php?page=feedback">
    <input type="hidden" name="user_id" value="<?php echo $userID;?>">
    <input type="hidden" name="prop_id" value="<?php echo $propertyID;?>">
    <input type="hidden" name="book_id" value="<?php echo $bidd;?>">
    
<div class="star-rating">
            <div class="star-input">
            <label><h4> Give Ratings !</h4></label>
                <input type="radio" name="rating" id="rating-5" value="5">
                <label for="rating-5" class="fas fa-star"></label>
                <input type="radio" name="rating" id="rating-4" value="4">
                <label for="rating-4" class="fas fa-star"></label>
                <input type="radio" name="rating" id="rating-3" value="3">
                <label for="rating-3" class="fas fa-star"></label>
                <input type="radio" name="rating" id="rating-2" value="2">
                <label for="rating-2" class="fas fa-star"></label>
                <input type="radio" name="rating" id="rating-1" value="1" checked>
                <label for="rating-1" class="fas fa-star"></label>
</div>
</div>
<div class="textforfeedback">
    <label>Description: </label><br>
<textarea name="description" rows="4" cols="50" value=""> </textarea><br><br>
<t><input type="submit" class="login" name="feedback" value="&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;POST&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;">
       </div>
</form>
</div>

</article>

<script>
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