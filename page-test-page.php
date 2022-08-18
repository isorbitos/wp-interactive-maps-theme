<?php
get_header();

$allAddresses = new WP_Query(array(
    'posts_per_page' => -1,
    'post_type' => 'address'
))
?>
<div class="acf-map">
        <?php
        while ($allAddresses->have_posts()) {
            $allAddresses->the_post();
            $mapLocation = get_field('map_location');
            ?>
            <div class="marker" data-lat='<?php echo $mapLocation['lat'] ?>' data-lng='<?php echo $mapLocation['lng'] ?>'>
                <h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
                <?php echo $mapLocation['address']; ?>
            </div>
        <?php
        }
        wp_reset_postdata();
        ?>
    </div>

<?php
get_footer();
?>