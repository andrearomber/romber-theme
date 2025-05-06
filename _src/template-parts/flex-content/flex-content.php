<?php if (have_rows('flex_content')) :
    $tp = 'template-parts/content-block/'; // Content blocks folder

    while (have_rows('flex_content')) : the_row();

        if( get_row_layout() == 'swiper' ) : 
            $banners = get_sub_field('swiper_repeater');
            $title = get_sub_field('title');
            $cta = get_sub_field('cta');
            $size = get_sub_field('size');

            get_template_part($tp . 'swiper-banner/swiper-banner', null,
                array(
                    'banners'  => $banners,
                    'title'  => $title,
                    'cta'  => $cta,
                    'size' => $size
                )
            );

        elseif( get_row_layout() == 'shortcuts' ) : 
            $shortcuts = get_sub_field('shortcuts_repeater');

            get_template_part($tp . 'shortcuts/shortcuts', null,
                array(
                    'shortcuts'  => $shortcuts
                )
            );

        elseif( get_row_layout() == 'wysiwyg' ) : 
            $text_content = get_sub_field('content');
            $bg_class = get_sub_field('bg_class');

            get_template_part($tp . 'wysiwyg/wysiwyg', null,
                array(
                    'content'   => $text_content,
                    'bg_class'  => $bg_class
                )
            );

        elseif( get_row_layout() == 'text_media' ) : 
            $title = get_sub_field('title');
            $text = get_sub_field('text');
            $btns = get_sub_field('btn_repeater');
            $alignment = get_sub_field('alignment');
            $type =  get_sub_field('type');
            $media_pos =  get_sub_field('position');
            $bg_class =  get_sub_field('bg_class');
            $media = null;
            if ($type == 'upload-file') { $media = get_sub_field('file'); }
            elseif ($type == 'external-embed') { $media = get_sub_field('embed'); }

            get_template_part($tp . 'text-media/text-media', null,
                array(
                    'title'     => $title,
                    'text'      => $text,
                    'btns'      => $btns,
                    'alignment' => $alignment,
                    'type'      => $type,
                    'media_pos' => $media_pos,
                    'media'     => $media,
                    'bg_class'  => $bg_class,
                )
            );

        elseif( get_row_layout() == 'gallery' ) :
            $gallery = get_sub_field('gallery_images');
            $cols = get_sub_field('cols');
            $aspect = get_sub_field('aspect');

            get_template_part($tp . 'gallery/gallery', null,
                array(
                    'gallery'  => $gallery,
                    'cols'  => $cols,
                    'aspect'  => $aspect
                )
            );

        elseif( get_row_layout() == 'image' ) :
            $has_link = get_sub_field('has_link'); $link = null;
            if ($has_link) $link = get_sub_field('link');
            $img =  get_sub_field('image');

            get_template_part($tp . 'image/image', null,
                array(
                    'img'  => $img,
                    'link' => $link
                )
            );
        
        elseif( get_row_layout() == 'video' ) :
            $video_type = get_sub_field('type');
            $bg_class =  get_sub_field('bg_class');
            if ($video_type == 'upload-file') $video = get_sub_field('file');
            elseif ($video_type == 'external-embed') $video = get_sub_field('embed');

            get_template_part($tp . 'video/video', null,
                array(
                    'type'  => $video_type,
                    'video' => $video,
                    'bg_class' => $bg_class,
                )
            );

        elseif( get_row_layout() == 'news_list' ) :
            $title = get_sub_field('title');
            $post_type = "post";
            $see_more = get_sub_field('see_more');
            $post_term = get_sub_field('post_term');

            get_template_part($tp . 'recent-posts/recent-posts', null,
                array(
                    'title'     => $title,
                    'post_type' => $post_type,
                    'post_taxonomy' => 'category',
                    'post_term' => $post_term,
                    'see_more'  => $see_more
                )
            );

        elseif( get_row_layout() == 'form' ) :
            $title = get_sub_field('title');
            $position = get_sub_field('position');
            $formID = get_sub_field('cf7_form');
            $image_bg = get_sub_field('image_bg');
            $bg_backdrop =  get_sub_field('bg_backdrop');
            $bg_backdrop_blur =  get_sub_field('bg_backdrop_blur');
            $squeeze_page =  get_sub_field('squeeze_page');
            $url_redirect =  get_sub_field('url_redirect');
            $autoplay =  get_sub_field('autoplay');
            $type =  get_sub_field('type');
            $media = null;
            if ($type == 'upload-file') { $media = get_sub_field('file'); }
            elseif ($type == 'external-embed') { $media = get_sub_field('embed'); }

            get_template_part($tp . 'form/cf7-form', null,
                array(
                    'title'     => $title,
                    'position'     => $position,
                    'formID'    => $formID,
                    'image_bg'     => $image_bg,
                    'bg_backdrop'  => $bg_backdrop,
                    'bg_backdrop_blur'  => $bg_backdrop_blur,
                    'squeeze_page'  => $squeeze_page,
                    'url_redirect'  => $url_redirect,
                    'autoplay'  => $autoplay,
                    'type'      => $type,
                    'media'     => $media
                )
            );

        elseif( get_row_layout() == 'product_card' ) : 
            $title = get_sub_field('title');
            $subtitle = get_sub_field('subtitle');
            $text = get_sub_field('text');
            $features = get_sub_field('feature_repeater');
            $bg_img =  get_sub_field('bg');
            $hero_img =  get_sub_field('hero');
            $btns = get_sub_field('btn_repeater');

            $order =  get_sub_field('position');

            get_template_part($tp . 'product-card/product-card', null,
                array(
                    'title'     => $title,
                    'subtitle'  => $subtitle,
                    'text'      => $text,
                    'features'  => $features,
                    'bg_img'    => $bg_img,
                    'hero_img'  => $hero_img,
                    'btns'      => $btns,
                    'order'     => $order,
                )
            );

        elseif( get_row_layout() == 'card_row' ) : 
            $cards_repeater = get_sub_field('cards_repeater');
            $title = get_sub_field('title');
            $subtitle = get_sub_field('subtitle');
            $position = get_sub_field('position');
            $size = get_sub_field('size');

            get_template_part($tp . 'card-row/card-row', null,
                array(
                    'cards'  => $cards_repeater,
                    'title'  => $title,
                    'subtitle'  => $subtitle,
                    'position'  => $position,
                    'size' => $size
                )
            );

        elseif( get_row_layout() == 'card_swiper' ) : 
            $cards_repeater = get_sub_field('cards_repeater');
            $title = get_sub_field('title');
            $subtitle = get_sub_field('subtitle');
            $read_more = get_sub_field('read_more');
            $card_style = get_sub_field('style');

            get_template_part($tp . 'card-swiper/card-swiper', null,
                array(
                    'cards'  => $cards_repeater,
                    'card_style' => $card_style,
                    'title'  => $title,
                    'subtitle'  => $subtitle,
                    'read_more' => $read_more
                )
            );
            
        elseif( get_row_layout() == 'scroller' ) : 
            $rows = get_sub_field('scroller_rows');
            $title = get_sub_field('title');
            $read_more = get_sub_field('read_more');
            $logo_size = get_sub_field('logo_size');

            get_template_part($tp . 'logo-scroller/logo-scroller', null,
                array(
                    'rows'  => $rows,
                    'title'  => $title,
                    'read_more' => $read_more,
                    'logo_size' => $logo_size,
                )
            );

        elseif( get_row_layout() == 'cta' ) : 
            $title = get_sub_field('title');
            $bg_backdrop =  get_sub_field('bg_backdrop');
            $bg_backdrop_blur =  get_sub_field('bg_backdrop_blur');
            $btns = get_sub_field('btn_repeater');
            $type =  get_sub_field('type');
            $media = null;
            if ($type == 'upload-file') { $media = get_sub_field('file'); }
            elseif ($type == 'external-embed') { $media = get_sub_field('embed'); }

            get_template_part($tp . 'cta-section/cta-section', null,
                array(
                    'title'     => $title,
                    'bg_backdrop'  => $bg_backdrop,
                    'bg_backdrop_blur'  => $bg_backdrop_blur,
                    'btns'      => $btns,
                    'type'      => $type,
                    'media'     => $media
                )
            );

        elseif( get_row_layout() == 'map' ) : 
            $title = get_sub_field('title');
            $type =  get_sub_field('type');
            $media = null;
            if ($type == 'upload-file') { $media = get_sub_field('file'); }
            elseif ($type == 'external-embed') { $media = get_sub_field('embed'); }

            get_template_part($tp . 'map/map', null,
                array(
                    'title'     => $title,
                    'type'      => $type,
                    'media'     => $media
                )
            );
    
        endif;
    endwhile;
endif; ?>