<article class="chattemplate">
    <div class="loyalinnfo">
        <div class="loyalinficn">
            <img src="../images/logo/logo.png" alt="logo">
        </div>
        <div class="loyalname">
            Loyal Partners Support Service
        </div>
    </div>
    <div class="messages">
        <?php
        $agent="";
        foreach ($message as $mes) { 
            if($mes['message_by']==$_SESSION['username']){ ?>
            <div class="outgoing">
                <div class="sentmsg">
                        <?php
                        echo "<p> ". $mes['message'].'</p>';
                        if (date("Y-m-d") == $mes['jdate']) {$day= "Today";} else {$day= $mes['montday']; };
                        echo "<span>".$mes['time12']." | ".$day."</span>"; ?>
                </div> 
            </div>
            <?php } else{?>
            <div class="incoming">
                <div class="incomingmsgicon"><img src="../images/logo/avatar1.png" alt="logo"></div>
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
        <form method="post" action="index.php?page=chatnow">
            <input type="text" name="message" required>
            <input type="hidden" name="message_to" value=<?php if($agent!=""){echo $agent;} else echo " ";?>>
            <input type="hidden" name="message_by" value=<?php echo $_SESSION['username'];?>>
            <input type="submit" name="send" value="Send">
        </form>
    </div>
</article>