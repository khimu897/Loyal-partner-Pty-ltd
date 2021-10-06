<article>
<?php
    if(isset($_GET['ermsg'])){
        $ermsg = $_GET['ermsg'];
    }
        $id='0';
        foreach($data as $value){
            $id=$value['prop_id'];
    ?>
    

    <div class="propdetails">
        <h2><?php echo $value['prop_name'];?></h2><br>
        
        <p> <?php foreach ($ratings as $rate){echo '<i class="fas fa-star" style="color: #ffd700;"></i> '.$rate['averages'].' <a href="#feedbk" class="linktofdk">'.$rate['counts'].' Reviews</a> · ';} ?> <i class="fas fa-map-marker-alt" style="color: #4c6ef5;"></i> <?php echo $value['prop_suburb'].' '.$value['prop_state'].' '.$value['prop_postCode'].' · ';?> <i class="fas fa-home" style="color: #FF385C;"></i> <?php echo $value['prop_occupancy'].' Guests · '.$value['prop_type'];?> </p>

        <div class="property_pictures">
            <?php
                $counter=1;
                $dire = "../images/".$pid;
                $images = glob($dire . "/*");
                foreach($images as $tasbir){ 
            ?>
                <div class="prop_picture_cont">
                    <div class="numbertext"><?php echo $counter; $counter++; echo ' / '.count($images).'';?></div>
                    <a target="_self" href="<?php echo $tasbir?>" data-lightbox="mygallery" data-title="<?php echo $value['prop_name'];?>">
                    <img src="<?php echo $tasbir?>">
                    </a>
                </div>
            <?php } ?>    

            <a class="prev" onclick="propViewerSlides(-1)">❮</a>
            <a class="next" onclick="propViewerSlides(1)">❯</a>

            <div class="caption-container">
                <p id="caption"></p>
            </div>

            <div class="property_pictures_row">
                <?php $counter=1; foreach ($images as $img) { ?> 
                    <div class="property_pictures_column">
                        <img class="demo cursor" src="../images/<?php echo $img;?>" style="width:100%" onclick="currentPropViewSlide(<?php echo $counter; $counter++?>)" alt="<?php echo $value['prop_name'];?>">
                    </div>
                <?php } ?>
        
            </div>
        </div>

        <div class="prop-det-book">
            <div class="prop-det">
                <span><i class="fas fa-map-marker-alt" style="color: #4c6ef5"></i> <?php echo $value['prop_type'];?> <?php echo $value['prop_StreetName'].' '.$value['prop_suburb'].' '.$value['prop_state'].' '.$value['prop_postCode'];?></span>
                <span><i class="fas fa-home" style="color: #FF385C;"></i> <?php echo $value['prop_occupancy'].' Guests Recommended';?> </span>
                <span><i class="fas fa-search-location" style="color: #FF385C;"></i>Details: <?php echo $value['prop_det']; ?></span>
            </div>
            <div class="prop-chat">
                <span>Need more help?</span>
                <a href ="index.php?page=chatnow" class="prop-chat-btn"><i class="fas fa-comment-alt"></i> CHAT NOW </a>
            </div>
            <div class="prop-book">
                <div class="prop-book-findet">
                    <div class="prop-price">$<?php echo  $value['price'];?> / Night</div>
                    <div class="prop-rating"><?php foreach ($rating as $rat){echo '<i class="fas fa-star" style="color: #ffd700;"></i> '.$rat['averages'].' · <a href="#feedbk" class="linktofdk">'.$rat['counts'].' Reviews</a> ';} ?></div>
                </div>
                <form method="post" action="index.php?page=book">
                    <div class="prop-date"> 
                        <label>Check-in :  </label> <input type="date" name="start_time" min="<?= date('Y-m-d'); ?>" required>
                    </div>
                    <div class="prop-date"> 
                        <label>Checkout :  </label> <input type="date" name="end_time" min="<?= date('Y-m-d'); ?>" required>
                    </div>

                    <input type="hidden" name="prop_id" value=<?php echo $id;?>>
                    <input type="hidden" name="status" value="Not-Confirmed">
                    <input type="hidden" name="user_id" value=<?php echo $uid;?>>
                    <input type="submit" class="login" name="book" value="Book">
                 
                </form>
                
            </div> 
        </div>
    </div>
    <?php } ?> 

    <div class="review_invalid-cont">
        <?php
            if($ermsg==1){
                echo '<script> alert("Sorry!\nBooking for selected Dates is unavailable.");</script>';
                echo '<div class="invalidbookopt">';
                echo 'Sorry! the booking for selected dates are currently unavailable for the property. Please contact the support team for availabile date and times.';
                echo '</div>';?>
                <?php
            }
            else {}
        ?>

        <div class="review-cont">
            <h2 id="feedbk">Reviews: </h2>
            <?php foreach($allfeedback as $value){ ?>
            <div class="enq-reviews">
                <div class="enq-review-head">
                    <span><?php $num = (int)$value['rating']; for($i=1;$i<=(int)$value['rating'];$i++){echo '<i class="fa fa-star"  style="color: #ffd700;"></i>';} ?></span>
                    <span><?php echo " ".$usrData[$value['user_id']].' · ';?></span>
                    <span><?php echo $value['months'].' '.$value['years']?></span>
                </div>
            
                <div class="enq-review-sum">
                    <span>
                        <?php echo $value['description']; ?>
                    </span>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</article>