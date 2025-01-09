<?php $post_ID = get_the_ID();
$text_color = __( $args['text_color'] );
if(empty($text_color)){
    $text_color = '#FFFFFF';
}?>

<div class="home-side-card home-side-card">
    <h4 class="home-side-card-title" style="color: <?php echo $text_color; ?>;">
        <a href="<?php echo get_the_permalink($post_ID); ?>"><?php echo the_title_attribute('echo=0'); ?></a>
    </h4>
</div>