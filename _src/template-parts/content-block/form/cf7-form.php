<?php /* Component arguments */
$formID = get_arg($args,'formID');
$title = get_arg($args,'title');
$position = get_arg($args,'position');
$image_bg = get_arg($args,'image_bg');
$bg_backdrop = get_arg($args,'bg_backdrop');
$bg_backdrop_blur = get_arg($args,'bg_backdrop_blur');
$squeeze_page = get_arg($args,'squeeze_page');
$url_redirect = get_arg($args,'url_redirect');
$autoplay =  get_arg($args,'autoplay');

// Background media element
$type = get_arg($args,'type');
$media = get_arg($args,'media'); ?>

<?php if ($formID) : ?>
    <section id="contact-form" class="content-section <?php echo $squeeze_page == 1 ? "squeeze-page" : ""; ?>">
        <div class="container">
            <?php if ($media) : ?>
                <?php if (is_array($media) && $media['type'] == 'image') : ?>
                    <aside class="form-media">
                        <img src="<?php echo $media['url']; ?>" alt="<?php echo $media['alt']; ?>">
                    </aside>
                    <?php else : ?>
                        <aside class="form-media video-displayer">
                            <?php get_template_part('template-parts/content-block/video/video-elm', null,
                            array(
                                'type' => $type,
                                'video' => $media,
                                'autoplay' => $autoplay ? true : false,
                                'no_controls' => true,
                                'muted' => false,
                                'loop' => false
                                )
                            ); ?>
                        </aside>
                    <?php endif; ?>
            <?php endif; ?>
            <article class="form-column">
                <?php if ($title) : ?>
                    <h2 class="<?php echo $position; ?>" id="<?php echo generate_anchor($title); ?>"><?php echo $title; ?></h2>
                <?php endif; ?>
                <div data-redirect="<?php echo isset($url_redirect) ? $url_redirect : '0'; ?>" 
                data-squeeze="<?php echo $squeeze_page == 1 ? '1' : '0'; ?>" 
                class="form-container animate slide-left-big">
                    <?php echo do_shortcode('[contact-form-7 id="' . $formID . '"]'); ?>
                </div>
            </article>
        </div>
        <?php if ($image_bg) : ?>
            <?php if ($bg_backdrop_blur) : ?><div class="backdrop-blur"></div><?php endif; ?>
            <div class="section-background<?php if ($bg_backdrop) : ?> backdrop-gradient-both<?php endif; ?>">
                <img src="<?php echo $image_bg['url']; ?>" alt="<?php echo $image_bg['alt']; ?>" class="img-background">
            </div>
        <?php endif; ?>
    </section>
<?php endif; ?>

<?php if ($squeeze_page) : ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var interval = setInterval(function () {
                var mainContent = document.querySelector('main#main-content');
                
                if (mainContent) {
                    clearInterval(interval);

                    var elementsToHide = document.querySelectorAll('nav, header, footer');
                    elementsToHide.forEach(function (element) {
                        element.style.display = 'none';
                    });

                    var sections = mainContent.querySelectorAll('section');

                    sections.forEach(function (section) {
                        if(section.id != 'contact-form') {
                            section.style.display = 'none';
                        }
                    });
                }
            }, 100);
        }); 
    </script>
<?php endif; ?>