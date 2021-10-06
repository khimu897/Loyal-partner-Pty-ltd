
<article>
    <table>
        <tr><th>Property Name</th><th>Address</th><th>Type</th><th>Description</th><th>Occupancy</th><th>Duration</th><th>Price</th><th>Status</th><th>Feedback</th></tr>
        <?php
        foreach($findAllBook as $value){
            $price = ((strtotime($value['end_time'])-strtotime($value['start_time']))/86400)*((int)($value['price']));
            echo '<tr><td>'.$value['prop_name'].'</td><td>'.$value['prop_StreetName'].
            ', '.$value['prop_suburb'].', '.$value['prop_state'].' Zip: '.$value['prop_postCode'].
            '</td><td>'.$value['prop_type'].'</td><td>'.$value['prop_det'].'</td><td>'.$value['prop_occupancy'].
            '</td><td>'.$value['start_time'].' To: '.$value['end_time'].'</td><td>$'.$price.
            '</td><td>';
            if($value['status']=="Not-Confirmed"){
                echo "<button class='cancbook' onclick=\"bookCancel(".$value['book_id'].");\">Cancel Booking</button>";
                echo "<a class='cnfbook' href='index.php?page=payment&bid=".$value['book_id']."'>Confirm Booking</a>";
                echo '</td><td> N/A </td></tr>';
    
            }
            else{
                echo "Already Confirmed";
                $vari=$findfedbak->fetch();
                if($value['feedback']=="Given"){
                    echo '</td><td>FeedBack Provided !</td></tr>';
                }
                else if((strtotime($value['end_time'])) < strtotime('-2 days')){
                    echo '</td><td>Time Exceeded !</td></tr>';
                }
                else {
                    echo '</td><td> <a href="index.php?page=feedback&pid='.$value['prop_id'].'&bidd='.$value['book_id'].'">Provide Feedback</a> </td></tr>';
                   
                }

            }

            
        }
        ?>
    </table>  
</article>