
<?php include('views/elements/header.php');?>


    <div class="container">
        <div class="page-header">

               <h1> <?php echo $title ?></h1>
        </div>
        <?php foreach($results as $c){?>
     
            <h1><?php echo $c['title'];?></h1><br>
            <p><?php echo $c['content']?>
            <?php echo $c['date'] ?>
            </p>
      
        <?php } ?>
    </div>


<?php include('views/elements/footer.php');?>
