<?php /* Component arguments */
$title = get_arg($args, 'title');
$subtitle = get_arg($args, 'subtitle');
$position = get_arg($args, 'position');
$card_size = get_arg($args, 'size');
$cards = get_arg($args, 'cards'); ?>

<?php if ($cards) : ?>
    <section class="card-row-section content-section">
        <div class="container <?php echo $position ?>">
            <?php if ($title) : ?>
                <h2 id="<?php echo generate_anchor($title);?>"><?php echo $title; ?></h2>
            <?php endif; ?>
            <?php if ($subtitle) : ?>
                <?php echo $subtitle; ?>
            <?php endif; ?>
        </div>
        <div class="card-row">
            <div class="container">
                <?php foreach ($cards as $card) : ?>
                    <?php $img = $card['img'];
                    $link = $card['link'];
                    $title = $card['title'];
                    $text = $card['text']; 
                    $position = $card['position'];?>
                    <article class="card <?php echo $card_size ?>">
                        <?php if ($link) : ?><a class="card-img-link" href="<?php echo $link['url']; ?>"><?php endif; ?>
                            <img class="card-img" src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
                            <?php if ($link) : ?></a><?php endif; ?>
                        <div class="card-text <?php echo $position?>">
                            <?php if ($title) : ?>
                                <h3><?php echo $title; ?></h3>
                            <?php endif; ?>
                            <?php if ($text) : ?>
                                <?php echo $text; ?>
                            <?php endif; ?>
                        </div>
                        <div class="card-link">
                            <?php if ($link) : ?>
                                <a class="btn btn-default" href="<?php echo $link['url']; ?>">
                                    <?php echo $link['title']; ?>
                                    <!-- Iconito -->
                                </a>
                            <?php endif; ?>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>