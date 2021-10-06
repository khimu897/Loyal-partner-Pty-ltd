<section class="admin-stats">
    <div class="admin-main">
        <div class="contactreq">
            <a href="index.php?page=customersupport" class="contactreqlink">
                <span>Contact Requests:</span>
                <span><?php foreach ($countCustReq as $totcustreq){ 
                    echo  $totcustreq['total']." new customer needs help";
                } ?></span>
            </a>
        </div>
        <div class="restcontns" <?php if ($_SESSION['role'] == 'staff') { ?> style="	background: url('../images/logo/logo.png'); opacity: 0.05;" <?php }else { echo 'style = opacity: 1;';}?>>
            <?php if ($_SESSION['role'] == 'admin') { ?>
                <div class="admin-status">
                    <div class="totbookings">
                        <h3>Total Bookings:</h3>
                        <span><?php foreach ($totalCB as $totbookings){ echo  $totbookings['total']; } ?></span>
                    </div>
                    
                    <div class="totcusth">
                        <h3>Total Customers helped:</h3>
                        <span><?php foreach ($totcusth as $totcusthelped){ echo  $totcusthelped['total']; } ?></span>
                    </div>

                    <div class="totprops">
                        <h3>Total Properties:</h3>
                        <span><?php $propcntr=0; foreach ($totalTP as $totprop){ $propcntr++; }echo  $propcntr;  ?></span>
                    </div>

                    <div class="totclnts">
                        <h3>Total Clients:</h3>
                        <span><?php foreach ($totalTU as $totclients){ echo  $totclients['total']; } ?></span>
                    </div>

                </div>
            <?php } ?>
        </div>
    </div>
    
</section>