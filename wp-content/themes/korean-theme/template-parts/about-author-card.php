<?php $author_id = $args['author_id'];
$contribution = $args['contribution'];
if($contribution==get_user_meta( $author_id,'contribution',true)) :
    // $first_name = get_the_author_meta('first_name', $author_id);
    // if(!empty($first_name)){
    //     $display_name = $first_name;
    // }else{
        $display_name = get_the_author_meta('display_name', $author_id);
    //}
    $image_id = get_the_author_meta('author_custom_image_id', $author_id);
    $image = (!empty($image_id))?wp_get_attachment_image_url( $image_id, 'contributor-thumbnail' ):get_avatar_url($author_id);
    $designation = get_the_author_meta('designation', $author_id); ?>

    <div class="about-author-card">
        <figure class="about-author-card-figure">
            <img class="img-responsive" src="<?php echo $image; ?>" alt="about auth card">
        </figure>
        <div class="about-author-card-content">
            <h2 class="about-author-card-title"><?php echo $display_name; ?></h2>
            <?php if(!empty($designation))echo '<h3 class="about-author-card-role" >'.$designation.'</h3>';?>
        </div>
    </div>
<?php endif; ?>