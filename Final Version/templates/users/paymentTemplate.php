<article>
    <form action="index.php?page=payment" method="POST"> 
    <div class="payment-container">
        <div class="payment-header">
            <h2>Payment</h2>
                    <label for="fname">Accepted Cards</label>
                    <div class="icon-container">
                    <i class="fa fa-cc-visa" style="color:navy;"></i>
                    <i class="fa fa-cc-amex" style="color:blue;"></i>
                    <i class="fa fa-cc-mastercard" style="color:red;"></i>
                    <i class="fa fa-cc-discover" style="color:orange;"></i>
                    </div>
        </div>

        <div class="payment-name">
            <input type="hidden" name="book_id" value="<?php echo $_GET['bid'];?>">
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="Name" placeholder="Full Name">
        </div>

        <div class="card-num">
            <label for="ccnum">Credit card number</label>
            <input type="number" id="ccnum" name="cardnumber" min="1000000000000000" max="9999999999999999" placeholder="1111222233334444">
        </div>  

        <div class="exp-month">
            <label for="expmonth">Exp Month</label>
            <input type="number" id="expmonth" name="exp_month" min="1" max="12" placeholder="September">
        </div>

        <div class="exp-year">
            <label for="expyear">Exp Year</label>
            <input type="number" id="expyear" name="exp_year" min="2021" max="2026" placeholder="2018">
        </div>
        
        <div class="cvv">
            <label for="cvv">CVV</label>
            <input type="number" id="cvv" name="cvv" min="100" max="9999" placeholder="352">
        </div>

        <div class="chkout">
            <input type="submit" name="submit" value="Continue to checkout">
        </div>
    </div>
    </form>
</article>