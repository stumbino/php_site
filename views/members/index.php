
<?php
include('views/elements/header.php');?>


<div class="container">
<div class="page-header">

<h1><?php echo $title;?></h1>
  </div>

	<?php foreach($users as $u){?>
    <h3><a href="<?php echo BASE_URL?>members/users/<?php echo $u['uID'];?>" title="<?php echo $u['first_name'];?> <?php echo $u['last_name'];?>"><?php echo $u['email'];?></a></h3>
    <p><?php echo $u['first_name'];?> <?php echo $u['last_name'];?></p>
    <p><a href="mailto:<?php echo $u['email'];?>"><?php echo $u['email'];?></a></p>
    <?php
    if($_SESSION['uID']!=NULL  && $u['uID'] == $_SESSION['uID']){
  ?>
    <form action="<?php echo BASE_URL?>members\profile\<?php echo $u['uID']?>" method="POST">
        <input type="hidden" name="userid" value="<?php echo $_SESSION['uID'];?>">
        <input type="submit" name="btnEdit" value="Edit your profile" class="btn btn-primary">     
    </form>
  <?php }?>
      
      


  <?php } ?>

</div>

<?php include('views/elements/footer.php');?>