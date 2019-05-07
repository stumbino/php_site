<?php include('views/elements/header.php');?>

<div class="container">
	<div class="page-header">
   <h1>My Profile</h1>
  
   <?php if($message){?>
    <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    	<?php echo $message?>
    </div>
  <?php }?>
  <form id="registration_form" action="<?php echo BASE_URL;?>members/update" method="post">

<fieldset>
<legend>Edit Profile Today!</legend>
<label for="first_name">First Name:</label>
<input type="text" id="first_name" name="first_name" value="<?php echo $first_name;?>" maxlength="20" required />
<br />
            
<label for="last_name">Last Name:</label>
<input type="text" class="txt" id="last_name" name="last_name" value="<?php echo $last_name;?>" maxlength="20" required/>
<br />
 
<label for="email">E-mail Address:</label>
<input type="email" class="txt" id="email" name="email" value="<?php echo $email;?>" maxlength="100" required />
<br />

<label for="password">Password:</label>
<input type="password" class="txt" id="password" name="password" value="<?php echo $password;?>" maxlength="100"/>

<br />
<label for="secondpassword">Re-Type Password:</label>
<input type="password" class="txt" id="passwordtwo" name="passwordtwo" value="<?php echo $passwordtwo;?>" maxlength="100"/>
<br>
<input type="hidden" name="uID" value="<?php echo $_GET['uID'] ?>"/>
 
<button id="submit" type="submit" class="btn btn-primary" >Sign Up</button>
</fieldset>
</form>

<p><a href="<?php echo BASE_URL?>members/?>">Back to members page</a></p>

</div>
<?php include('views/elements/footer.php');?>

