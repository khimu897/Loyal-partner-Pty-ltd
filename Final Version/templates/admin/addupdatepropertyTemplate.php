<section class="form_container">

  <h2><?php if($data){echo "Update the Property";}else{echo "Add a new property";}?></h2>
  <form action="index.php?page=addupdateproperty" method="POST" enctype="multipart/form-data">
    <label for="prop_name">Property Name:</label>
    <input type="text" id="prop_name" name="prop_name" value="<?php if($data){echo $data['prop_name'];}?>" required placeholder="Above HILTON Luxury Residence with Beach Views">
  <input type="hidden" name="prop_id" value="<?php if($data){echo $data['prop_id'];} else{echo " ";}?>" required>
    <label for="prop_type">Type of Property:</label>
    <div class="select">
    <select name="prop_type" id="prop_type" required>
      
      <option <?php if($data){echo 'value="'.$data['prop_type'].'"';} else{echo "disabled selected value";}?>> -- select an option -- </option>
      <option value="Apartment">Apartment</option>
      <option value="Hotel">Hotel</option>
      <option value="Town House">Town House</option>
      <option value="Unit">Unit</option>
    </select>
    </div>

    <label for="prop_StreetName">Street Location:</label>
    <input type="text" id="prop_StreetName" name="prop_StreetName" value="<?php if($data){echo $data['prop_StreetName'];}?>" required placeholder="1A First Street">
    
    <label for="prop_suburb">Suburb:</label>
    <input type="text" id="prop_suburb" name="prop_suburb" value="<?php if($data){echo $data['prop_suburb'];}?>" required placeholder="Suburb">
    
    <label for="prop_state">State:</label>
    <input type="text" id="prop_state" name="prop_state" value="<?php if($data){echo $data['prop_state'];}?>" required placeholder="NSW">
    
    <label for="prop_postCode">Postcode:</label>
    <input type="number" min="1000" max="9999" id="prop_postCode" name="prop_postCode" value="<?php if($data){echo $data['prop_postCode'];}?>" required placeholder="2000">
    
    <label for="prop_det">Property Details:</label>
    <input type="text" id="prop_det" name="prop_det" value="<?php if($data){echo $data['prop_det'];}?>" required placeholder="1A First Street">
    
    <label for="prop_occupancy">No. of guests:</label>
    <input type="number" min="1" max="20" id="prop_occupancy" name="prop_occupancy" value="<?php if($data){echo $data['prop_occupancy'];}?>" required placeholder="4">
    
    <label for="price">Price per day: $</label>
    <input type="number" max="9999" id="price" name="price" value="<?php if($data){echo $data['price'];}?>" required placeholder="120">

    <?php
    if(!$data){
    echo '<label>Choose Picture:</label>';
    echo '<br><input type="file" name="fileToUpload" id="fileToUpload" required>';
    }
    else{ ?>
     
     <br><a href="index.php?page=manageImages&pid=<?php if($data){echo $data['prop_id'];}?>">Manage Images</a><br>
    
    
    <?php } ?>
    <br>
    <br>
    <input type="submit" value="Update" name=<?php if($data){echo "\"val_update\"";}else{echo "\"val_insert\"";}?>>
  </form>
</section>