<article>
<form action="index.php?page=manageImages" method="POST" enctype="multipart/form-data">
<input type="hidden" name="pid" value="<?php echo $pid?>">
<input type="file" name="fileToUpload" id="fileToUpload">
<input type="submit" name=addPic value="Upload">
</form>
    <div class="manageimg">
        <div class="viewimg">Photos</div>
        <div class="viewact">Action</div>

        <?php
            $directory = "../images/".$pid;
            $images = glob($directory . "/*");
            foreach($images as $chitra){ 
        ?>
        <div class="photo-holdr">
            <img src="<?php echo $chitra?>">                
        </div>
            
        <div class="photo-actions">
            <a href="index.php?page=manageImages&dpid=<?php echo substr($chitra,-5,-4);?>&pid=<?php echo $pid?>">Delete</a>
        </div>
        <?php } ?>
</article>