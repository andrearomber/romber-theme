<?php /* Component arguments */
$title          = get_arg($args,'title');
$post_type      = get_arg($args,'post_type','post');
$post_taxonomy  = get_arg($args,'post_taxonomy');
$post_term      = get_arg($args,'post_term');

$post_number    = get_arg($args,'post_number',3);
$see_more       = get_arg($args,'see_more'); 

// Mini posts for older entries (ids)
$mini_post_begin = 3;
$mini_post_end = 3;

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

if (!$post_taxonomy || !$post_term) {
    $post_query = new WP_Query(
        array(
            'post_type'         => $post_type,
            'posts_per_page'    => $post_number,
            'post_status'       => 'publish',
            'paged'             => $paged,
        )
    );
} else {
    $post_query = new WP_Query(
        array(
            'post_type'         => $post_type,
            'posts_per_page'    => $post_number,
            'post_status'       => 'publish',
            'paged'             => $paged,
            'tax_query' => array(
                array(
                'taxonomy' => $post_taxonomy,
                'field' => 'id',
                'terms' => $post_term,
                ),
            ),
        )
    );
}
//var_dump($post_query);
?>

<?php if ($post_query -> have_posts()) : ?>
<section id="recent-<?php echo $post_type; ?>" class="recent-posts-section content-section">
    <div class="container">
        <?php if ($title) : ?>
            <div class="section-header">
                <h2 id="<?php echo generate_anchor($title);?>" class="animate slide-right"><?php echo $title; ?></h2>
                <?php if ($see_more) : ?>
                    <?php if ($post_term) : ?>
                        <a class="btn btn-default btn-read-more animate fade-in" href="<?php echo get_term_link($post_term, $post_taxonomy); ?>"><span><?php echo $see_more; ?></span></a>
                    <?php else : ?>
                        <a class="btn btn-default btn-read-more animate fade-in" href="<?php echo get_post_type_archive_link($post_type); ?>"><span><?php echo $see_more; ?></span></a>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <div class="recent-list">
            <?php $post_index = -1; // first 2 news will be rendered differently ?>
            <?php while($post_query -> have_posts()): ?>
                <?php $post_query -> the_post(); $post_index++;?>
                <?php if ($post_index < $mini_post_begin) : ?>
                        <article class="post-card animate slide-up delay-i-<?php echo $post_index;?>">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <a class="post-image" href="<?php the_permalink(); ?>" title="<?php esc_html__(the_title_attribute()); ?>">
                                    <?php the_post_thumbnail(); ?>
                                </a>
                            <?php endif; ?>
                            <div class="post-text">
                                <p class="date"><?php esc_html_e(get_the_date()); ?></p>
                                <h3><a href="<?php the_permalink(); ?>" title="<?php esc_html__(the_title_attribute()); ?>">
                                    <?php esc_html__(the_title()); ?>
                                </a></h3>
                            </div>
                        </article>
                <?php else : ?>
                        <?php if ($post_index == $mini_post_begin) : // Open mini-posts div ?>
                            <div class="older-posts">
                        <?php endif; ?>
                        <article class="post-mini">
                            <div class="post-text">
                                <p class="date"><?php esc_html_e(get_the_date()); ?></p>
                                <h3><a href="<?php the_permalink(); ?>" title="<?php esc_html__(the_title_attribute()); ?>">
                                    <?php esc_html__(the_title()); ?>
                                </a></h3>
                            </div>
                        </article>
                        <?php if ($post_index == $mini_post_end) : // Close mini-posts div ?>
                            </div>
                        <?php endif; ?>
                <?php endif; ?>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
    </div>
</section>
<?php endif; ?>