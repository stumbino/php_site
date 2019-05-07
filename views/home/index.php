<?php
include('views/elements/header.php');?>
<div class="container">
	<div class="page-header">
    <h1> <img src="views/img/CNN.png"> News</h1>
   
  </div>
  <?php if($message){?>
    <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    	<?php echo $message?>
    </div>
  <?php }?>
    <?php for($i = 0; $i<8;$i++){
        echo "<b>Title:</b>".$rss_array[$i]['title']."<br>";
        echo "<b>Text:</b>".$rss_array[$i]['text']."<br>";
        echo "<b>Published Date:</b>".$rss_array[$i]['date']."<br><hr>";
    }?>

</div>
<?php include('views/elements/footer.php');?>
