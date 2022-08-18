<?php 
get_header();
?>
<div class="">
    <?php 
    while(have_posts()){
        the_post();?>
        <h1><?php the_title(); ?></h1>
    <?php }
    ?>
</div>
<?php
get_footer();
?>