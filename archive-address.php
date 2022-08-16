<?php 
get_header();
?>
<div class="">
    <?php 
    while(have_posts()){
        the_post();?>
        <h1><a href="<?php the_permalink() ?>"> <?php the_title(); ?></a></h1>
    <?php }
    
    ?>

</div>


<?php
get_footer();
?>