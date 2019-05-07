
<?php
if($_SESSION['uID']!=NULL){
?>
<div class="container">
    <div class="page-header">

        <h1>Comment Form</h1>
    </div>
    <form action="<?php echo BASE_URL?>\blog" method="POST">
        <input type="text" name="postid" style="display: none;" value="<?php echo $pID ?>">
        <input type="text" name="userid" value="<?php echo $_SESSION['uID'];?>" style="display: none;">
   
        <textarea name="txtMessage"></textarea><br>
        <button type="submit" name="btnSubmit">Submit</button>
    </form>
</div>
<?php
}
?>