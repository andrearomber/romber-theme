<?php /* Component arguments */
$gallery = get_arg($args,'gallery'); 
$aspect = get_arg($args,'aspect');
$cols = get_arg($args,'cols'); ?>

<?php if ($gallery) : ?>
    <section class="content-section">
        <div class="container">
            <div class="gallery <?php echo $cols; ?>">
                <?php foreach($gallery as $image) : ?>
                    <div class="gallery-item <?php echo $aspect; ?>">
                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>