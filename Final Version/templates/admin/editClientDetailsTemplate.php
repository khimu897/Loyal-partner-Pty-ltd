<section class="form_container">

  <h2><?php if($data){echo "Update Client Details";}?></h2>
  <p><?php echo $status; ?></p>
  <form action="index.php?page=editClientDetails" method="post">
    <input type="hidden" name="user_id" id="user_id" value=<?php if($data){echo $data['user_id'];}?>>
    <label for="firstname">First Name</label>
    <input type="text" id="firstname" name="firstname" value="<?php if($data){echo $data['firstname'];}?>" required placeholder="Client's updated first name..">

    <label for="lname">Last Name</label>
    <input type="text" id="lastname" name="lastname" value="<?php if($data){echo $data['lastname'];}?>" required placeholder="Client's updated last name..">

    <label for="email">Email</label>
    <input type="email" id="email" name="email" value="<?php if($data){echo $data['email'];}?>" required placeholder="Updated Email Address">

    <input type="submit" value="Submit" name="Update">
  </form>
</section>