<?php /* Component arguments */
$type = get_arg($args,'type');
$video = get_arg($args,'video'); 
$autoplay = get_arg($args,'autoplay'); 
$bg_class = get_arg($args,'bg_class');?>

<?php if ($video) : ?>
    <section class="content-section media-video-section <?php echo $bg_class; ?>">
        <div class="container">
            <?php get_template_part('template-parts/content-block/video/video-elm', null,
                array(
                    'type'  => $type,
                    'video' => $video,
                    'autoplay' => $autoplay
                )
            );?>
        </div>
    </section>
<?php endif; ?>