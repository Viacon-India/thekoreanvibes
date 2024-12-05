<?php $author_id = $args['author_id'];
// $first_name = get_the_author_meta('first_name', $author_id);
// if(!empty($first_name)){
//     $display_name = $first_name;
// }else{
$display_name = get_the_author_meta('display_name', $author_id);
//}
$image_id = get_the_author_meta('author_custom_image_id', $author_id);
$image = (!empty($image_id)) ? wp_get_attachment_image_url($image_id, 'writer-thumbnail') : get_avatar_url($author_id);
$quotation = get_the_author_meta('quotation', $author_id);
$designation = get_the_author_meta('designation', $author_id); ?>

<a href="<?php echo get_author_posts_url($author_id); ?>">
    <div class="content-writer-card-wrapper">
        <?php if (!empty($quotation)) echo '<div class="content-writer-card-upper"> <p class="content-writer-card-upper-p">"' . $quotation . '"</p></div>'; ?>
        <div class="content-writer-card">
            <figure class="content-writer-card-figure">
                <img class="img-responsive" src="<?php echo $image; ?>" alt="content writer card side image">
            </figure>
            <div class="content-writer-card-content">
                <h2 class="content-writer-card-content-title"><?php echo $display_name; ?></h2>
                <?php if (!empty($designation)) echo '<p class="content-writer-card-content-position">(' . $designation . ')</p>'; ?>
            </div>
        </div>
    </div>
</a>