<article class="chattemplate">

    <div class="handled">
        <h3> Your Clients </h3>
        <?php $clientcount=1;
        foreach ($handledname as $value) { ?>

        <a class="msgid" href="<?php echo 'index.php?page=chat&chat='. $value; ?>">
        <div class="clientlnk">
            <div class="clienticon">
                <img src="../images/logo/user.jpg" alt="logo">
            </div>
            <div class="clientname">
                <?php print($value); ?>
            </div>

            <div class="clientlastmsgdate">
                <?php print($handlednamed[$clientcount]);
                $clientcount++;?>
            </div>
        </div>
        </a>
        <?php } ?>
    </div>

    <div class="chatscreen">
        <div class="clientinnfo">
            <div class="clientinficn">
                <?php if($message) { ?>
                <img src="../images/logo/user.jpg" alt="logo"> <?php } else { ?>
                <img src="../images/logo/logo.png" style="border-radius: 5px;"> <?php } ?>
            </div>
            <div class="clientname">
                <?php if(!$message){echo "Loyal Partners Pty. Ltd";}
                else {echo $_GET['chat'];}
                ?>
            </div>
        </div>
        <div class="messages">
            <?php
            $client="";
            foreach ($message as $mes) {
                if($mes['message_by']==$_SESSION['username']){ ?>
                <div class="outgoing">
                    <div class="sentmsg"><?php echo "<p>". $mes['message'].'</p>'; 
                    if (date("Y-m-d") == $mes['jdate']) {$day= "Today";} else {$day= $mes['montday']; };
                    echo "<span>".$mes['time12']." | ".$day."</span>";
                    ?></div>
                    
                </div>
                <?php } else{?>
                <div class="incoming">
                    <div class="incomingmsgicon"><img src="../images/logo/user.jpg" alt="logo"></div>
                    <div class="receivedmsg"><?php echo "<p> ".$mes['message'].'</p>';
                    $client=$mes['message_by']; 
                    if (date("Y-m-d") == $mes['jdate']) {$day= "Today";} else {$day= $mes['montday']; };
                    echo "<span>".$mes['time12']." | ".$day."</span><br>";
                    ?></div>
                </div>
            <?php } } ?>
        </div>

        <br>
        <br>
        <br>

        <div class="messagebox">
            <form method="post" action="index.php?page=chat">
                <input type="text" name="message" placeholder="Type a message" required>
                <input type="hidden" name="message_to" value=<?php if($client!=""){echo $client;} else echo " ";?>>
                <input type="hidden" name="message_by" value=<?php echo $_SESSION['username'];?>>
                <input type="submit" name="send" value="Send">
            </form>
        </div>
    </div>

    <div class ="requests">
        <h3>New Client Requests</h3>
        <?php
            foreach ($unhandledname as $value) {
                echo '<li><a class="msg" href="index.php?page=chat&handle='. $value.'">'.$value.'</a></li><br><br>';
        }
        ?>
    </div>
       
</article> 