<?php /* Component arguments */
$title = get_arg($args, 'title');
$read_more = get_arg($args,'read_more');
$rows = get_arg($args,'rows');
$logo_size = get_arg($args, 'logo_size'); ?>

<?php if ($rows) : ?>
    <section class="scroller-swiper-section content-section">
        <div class="container">
            <?php if ($title || $read_more): ?>
                <div class="section-header">
                    <?php if ($title): ?>
                        <h2 id="<?php echo generate_anchor($title);?>"><?php echo $title; ?></h2>
                    <?php endif; ?>
                    <?php if ($read_more): ?>
                        <a href="<?php echo $read_more['url']; ?>" class="btn btn-default btn-read-more animate fade-in"><span><?php echo $read_more['title']; ?></span></a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <?php foreach ($rows as $row) : $items = $row['scroller_row_items']; ?>
                <div class="swiper scroller-swiper overflow-hidden">
                    <div class="swiper-wrapper <?php echo $logo_size ?>">
                        <?php foreach ($items as $item) : ?>
                            <div class="swiper-slide">
                                <div class="slider-content scroller-item"> 
                                    <?php $link = $item['item_link']; $img = $item['item_img']; ?>
                                    <?php if ($link) : ?>
                                        <a class="scroller-item-wrapper" href="<?php echo $logo['url']; ?>">
                                    <?php else : ?>
                                        <span class="scroller-item-wrapper">
                                    <?php endif; ?>
                                    <?php if ($img) : ?>
                                        <img src="<?php echo $img['url']; ?>" title="<?php echo $img['title']; ?>" alt="<?php echo $img['alt']; ?>">
                                    <?php elseif ($link) : ?>
                                        <?php echo $link['title']; ?>
                                    <?php endif; ?>    
                                    <?php if ($link) : ?>
                                        </a>
                                    <?php else : ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
<?php endif; ?>