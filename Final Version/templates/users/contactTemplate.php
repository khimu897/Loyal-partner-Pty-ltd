<section>
    <div class="map">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3312.242623420052!2d151.2006673152322!3d-33.88340472724844!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b12b8cae750057b%3A0xdcaeace92b3f87fe!2sIIBIT!5e0!3m2!1sen!2sau!4v1629960128750!5m2!1sen!2sau" width="100%" height="300px" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
    
    <div class="contact-pg-cnts">
        <form action="index.php?page=contact" class="contact-pg" method="POST">     
            <div class="contact-form">
                <span>Please send us a message!</span>
                <label for="name"> Name</label>
                <input type="hidden" name="staff_id" value="NotAssigned">
                <input type="text" id="name" placeholder="Full Name" name="cust_name" required>
                
                <label for="email"> Email</label>
                <input type="email" id="email" placeholder="someone@mail.com" name="cust_email" required>

                <div class="cntnum">
                    <label for="number"> Contact Number</label>
                    <input type="number" id="number" name="cust_num" min="1000000" max="9999999999" placeholder="0123456789">
                </div>
                 
                <label for="que"> Question</label>
                <textarea id="que" name="cust_ques" placeholder="Hi! How can I help you?"></textarea>

                <input type="submit" name="submit" value="Send Us a Message">
            </div>
        </form>

        <div class="contact-det">
            <span>Loyal Partners Pty. Ltd</span>
            <span>IIBIT, 841 George St</span>
            <span>Sydney NSW 2000</span>
        </div>
    </div>
</section>