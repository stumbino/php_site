<?php include('views/elements/header.php');?>

<?php 
		foreach($categories as $key=>$value){
            echo "<h3>".$value."</h3>";
?>      

            <form action="<?php echo BASE_URL ?>categories/edit" method="post">
                <input type="hidden" name="categorytitle" value="<?php echo $value ?>">
                <input type="hidden" name="categoryID" value="<?php echo $key ?>">
                <input type="submit" class='btn btn-primary' value="edit">
	        </form>
            <form action="<?php echo BASE_URL ?>categories/delete" method="post">
                <input type="hidden" name="categoryID" value="<?php echo $key ?>">
                <input type="submit" class='btn btn-primary' value="delete">
            </form>
            
    <?php
        }
     ?>
      <form action="<?php echo BASE_URL ?>categories/add" method="post">
        <label for="category">New Category</label>
        <input type="text" name="category" class="input-sm" id="category" required="category">
        <input type="submit" class='btn btn-primary' value="Submit">
	 </form>
<?php include('views/elements/footer.php');?>

