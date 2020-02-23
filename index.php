<?php 
include 'config/config.php';
include 'libraries/Database.php';
include 'includes/header.php';
?>
<?php  
// Create DB Object
    $db = new Database(); 
?>
        <div class="blog-post">
          <h2 class="blog-post-title">Blog post 1</h2>
          <p class="blog-post-meta">January 1, 2014 by <a href="#">Mark</a></p>
          <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nihil error veniam ab minus assumenda delectus sint quo facilis laudantium quisquam!</p>
          <a href="post.php?id=1" class="readmore">Read More</a>
        </div><!-- /.blog-post -->

        <div class="blog-post">
          <h2 class="blog-post-title">Blog post 2</h2>
          <p class="blog-post-meta">December 23, 2013 by <a href="#">Jacob</a></p>
          <p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
          <a href="post.php?id=1" class="readmore">Read More</a>
        </div><!-- /.blog-post -->

<?php include "includes/footer.php"; ?>

