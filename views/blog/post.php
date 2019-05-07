
<?php include('views/elements/header.php');?>
<?php
if( is_array($post) ) {
    extract($post);
}
else
{
    header('Refresh: 0');
}
    ?>
    <div class="container">
        <div class="page-header">

            <h1><?php echo $title;?></h1>
        </div>
        <p><?php echo $content;?></p>
        <sub><?php echo 'Posted on ' . $date . ' by <a href="'.BASE_URL.'members/users/'. $uid.'">'. $first_name . ' ' . $last_name . '</a> in <a href="'.BASE_URL.'blog/category/'. $categoryid.'">' . $name .'</a>'; ?>
        </sub>
        <hr>

        
        <?php
            for($i = 0; $i < sizeof($comments);$i++){ ?>
          
                    <p><?php echo '<br>'.$comments[$i]['commentText'];?></p> 
                    <sub> <?php echo 'Posted on '. $comments[$i]['date'].' by '.$comments[$i]['first_name'].' '.$comments[$i]['last_name']?></sub>
                    <br>
                    <?php if($u->isAdmin()) {?>
                        <form action="<?php echo BASE_URL?>blog\post\<?php echo $pID?>" method="POST">
                            <input type="hidden" name="post_id" value="<?php echo $comments[$i]['postID'] ?>">
                            <input type="hidden" name ="comment_id" value="<?php echo $comments[$i]['commentID'] ?>">
                            <input type="hidden" name="userid" value="<?php echo $_SESSION['uID'];?>">
                            
                        
                            <input type="submit" name="btnDelete" value="delete">
                        </form>
                    <?php 
                    } ?>
            <?php } 
            ?>
        
        <?php include('views/blog/comment_form.php');?>
        </div>


<?php include('views/elements/footer.php');?>
