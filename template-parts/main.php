<?php
/*
Template Name: Main
*/
get_header();
?>
<div class="popup-wrapper">

    <div class="popup-window" id="video-popup">
        <div class="iframe">
            <?php $videoId = getYoutubeVideoId(get_field('home_iframe')); ?>
            <iframe id="video_iframe" src="https://www.youtube.com/embed/<?php echo $videoId; ?>?si=ivzokYKbvv29yFCr" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
        <div class="close"></div>
    </div>

</div>

<section id="section-main">
    <div class="video-wrapper">
        <video class="lazy" loading="lazy" muted autoplay loop playsinline poster="<?php the_field('home_video_placeholder'); ?>" src="<?php the_field('home_video'); ?>"></video>
    </div>
    <div class="container">
        <div class="left">
            <div class="editor">
                <?php the_field('home_editor'); ?>
            </div>
            <?php if (get_field('home_button')) { ?>
                <button class="btn btn-one btn-form-trigger">Join us</button>
            <?php } ?>
        </div>
        <div class="right">
            <button class="play play-icon">
                <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M35.3333 22L14 35.3333V8.66666L35.3333 22Z" fill="#1E2C3A"/>
                </svg>									
            </button>
        </div>
    </div>
</section>
<section id="section-services">
    <div class="container">
        <h2 class="heading-2"><?php the_field('services_title'); ?></h2>
        <div class="services-wrapper">
            <img src="<?php bloginfo('template_url'); ?>/assets/img/icons/block_1.svg" alt="" class="svg-float svg-1">
            <img src="<?php bloginfo('template_url'); ?>/assets/img/icons/block_2.svg" alt="" class="svg-float svg-2">

            <?php if( have_rows('services_repeater') ): ?>
            <?php while( have_rows('services_repeater') ): the_row(); 
            $icon = get_sub_field('icon');
            $title = get_sub_field('title');
            $text = get_sub_field('text');
            ?>
            <div class="item">
                <div class="icon">
                    <img src="<?php echo $icon; ?>" alt="">
                </div>
                <p class="title"><?php echo $title; ?></p>
                <p class="desc"><?php echo $text; ?></p>
            </div>
            <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>
<section id="section-who-we-are">
    <div class="container">
        <div class="left">
            <div class="editor">
                <?php the_field('who_we_are_editor') ?>
            </div>
        </div>
        <div class="right">
            <div class="image-wrapper img-sep">
                <img src="<?php bloginfo('template_url'); ?>/assets/img/icons/block_3.svg" alt="" class="svg-float svg-3">
                <img src="<?php bloginfo('template_url'); ?>/assets/img/icons/block_4.svg" alt="" class="svg-float svg-4">
                <?= wp_get_attachment_image(get_field('who_we_are_image'), 'medium', null, ['class' => 'image']) ?>
            </div>
        </div>
    </div>
</section>
<section id="section-gallery">
    <div class="container">
        <h2 class="heading-2"><?php the_field('gallery_title'); ?></h2>
        <div class="gallery-wrapper">

            <?php if( have_rows('gallery_repeater') ): $i=0; ?>
            <?php while( have_rows('gallery_repeater') ): the_row(); 
            $images = get_sub_field('images');
            if ($i == 0) {
                $is_active = 'active';
            } else {
                $is_active = '';
            }
            $i++;
            ?>
            
            <div class="gallery-slider <?php echo $is_active; ?>" id="gallery-slider-<?php echo $i; ?>">
                <?php foreach($images as $image) { ?>
                    <div class="item">
                        <div class="img-sep">
                            <?= wp_get_attachment_image($image, 'medium', null) ?>
                        </div>
                    </div>
                <?php }?>
            </div>
            
            <?php endwhile; ?>
            <?php endif; ?>

            <div class="gallery-slider-nav">
                <?php if( have_rows('gallery_repeater') ): $i=0; ?>
                <?php while( have_rows('gallery_repeater') ): the_row(); 
                $title = get_sub_field('title');
                $thumbnail = get_sub_field('thumbnail');
                if ($i == 0) {
                    $is_active = 'active';
                } else {
                    $is_active = '';
                }
                $i++;
                ?>

                <div class="item img-sep <?php echo $is_active; ?>" js-slider-id="<?php echo $i; ?>">
                    <?= wp_get_attachment_image($thumbnail, 'medium', null) ?>
                    <p class="title"><?php echo $title; ?></p>
                </div>
                
                <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<section id="section-partners">
    <div class="container">
        <h2 class="heading-2"><?php the_field('partners_title'); ?></h2>
        <div class="partners-wrapper">
            <?php if( have_rows('partners_repeater') ): ?>
            <?php while( have_rows('partners_repeater') ): the_row(); 
            $logo = get_sub_field('logo');
            $title = get_sub_field('title');
            ?>
            <div class="item">
                <div class="thumb thumb-box">
                    <img src="<?php echo $logo; ?>" alt="" class="logo">
                </div>
                <p class="title"><?php echo $title; ?></p>
            </div>
            <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>
<section id="section-ads">
    <div class="container">
        <div class="ads-wrapper">
            <img src="<?php bloginfo('template_url'); ?>/assets/img/icons/block_3.svg" alt="" class="svg-float svg-3">
            <img src="<?php bloginfo('template_url'); ?>/assets/img/icons/block_4.svg" alt="" class="svg-float svg-4">
            
            <?php if( have_rows('ads_repeater') ): ?>
            <?php while( have_rows('ads_repeater') ): the_row(); 
            $image = get_sub_field('image'); ?>
            <div class="item img-sep">
                <div class="thumb thumb-box">
                    <?= wp_get_attachment_image($image, 'medium', null) ?>
                </div>
            </div>
            <?php endwhile; ?>
            <?php endif; ?>

        </div>
    </div>
</section>
<section id="section-raffles">
    <div class="container">
        <h2 class="heading-2"><?php the_field('raffles_title'); ?></h2>
        <div class="raffles-wrapper">
            <img src="<?php bloginfo('template_url'); ?>/assets/img/icons/block_1.svg" alt="" class="svg-float svg-1">
            <img src="<?php bloginfo('template_url'); ?>/assets/img/icons/block_5.svg" alt="" class="svg-float svg-5">
            <img src="<?php bloginfo('template_url'); ?>/assets/img/icons/block_2.svg" alt="" class="svg-float svg-2">

            <?php if( have_rows('raffles_repeater') ): ?>
            <?php while( have_rows('raffles_repeater') ): the_row(); 
            $image = get_sub_field('image'); 
            $title = get_sub_field('title'); 
            $date = get_sub_field('date'); 
            $desc = get_sub_field('desc'); 
            $link = get_sub_field('link'); 
            ?>
            <div class="item">
                <div class="thumb">
                    <?= wp_get_attachment_image($image, 'medium', null) ?>
                </div>
                <p class="title"><?php echo $title; ?></p>
                <p class="date"><?php echo $date; ?></p>
                <p class="desc"><?php echo $desc; ?></p>
                <button class="btn btn-form-trigger">Event tickets</button>
            </div>
            <?php endwhile; ?>
            <?php endif; ?>
            
        </div>
    </div>
</section>
<section id="section-lawyers">
    <div class="container">
        <h2 class="heading-2"><?php the_field('lawyers_title'); ?></h2>
        <div class="lawyers-wrapper">
            <div class="lawyers-slider">

                <?php if( have_rows('lawyers_repeater') ): ?>
                <?php while( have_rows('lawyers_repeater') ): the_row(); 
                $image = get_sub_field('image');
                $name = get_sub_field('name');
                $position = get_sub_field('position');
                $link = get_sub_field('link'); ?>
                <div class="item">
                    <div class="thumb">
                        <img src="<?php echo $image; ?>" alt="">
                    </div>
                    <div class="info">
                        <p class="name"><?php echo $name; ?></p>
                        <p class="position"><?php echo $position; ?></p>
                        <ul class="questions">
                            <?php if( have_rows('list') ): ?>
                            <?php while( have_rows('list') ): the_row(); 
                            $li = get_sub_field('li'); 
                            ?>
                            <li><?php echo $li; ?></li>
                            <?php endwhile; ?>
                            <?php endif; ?>
                        </ul>
                        <button class="btn btn-form-trigger">Contact</button>
                    </div>
                </div>
                <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<section id="section-calendar">
    <div class="container">
        <h2 class="heading-2">Community calendar</h2>
        <div class="container">
            <div class="calendar-wrapper">
                <?php echo do_shortcode('[pretty_google_calendar gcal="mykola.h.rivoagency@gmail.com"]') ?>
            </div>
        </div>
    </div>
</section>
<section id="section-influencers">
    <div class="container">
        <h2 class="heading-2"><?php the_field('influensers_title'); ?></h2>
        <div class="influencers-wrapper">
            <img src="<?php bloginfo('template_url'); ?>/assets/img/icons/block_5.svg" alt="" class="svg-float svg-5">
            <img src="<?php bloginfo('template_url'); ?>/assets/img/icons/block_2.svg" alt="" class="svg-float svg-2">

            <?php if( have_rows('influencers_repeater') ): ?>
            <?php while( have_rows('influencers_repeater') ): the_row(); 
            $image = get_sub_field('image'); 
            $name = get_sub_field('name'); 
            $desc = get_sub_field('desc');
            $instagram = get_sub_field('instagram'); 
            $youtube = get_sub_field('youtube');
            ?>
            <div class="item">
                <div class="thumb thumb-box">
                    <img src="<?php echo $image; ?>" alt="">
                </div>
                <p class="name"><?php echo $name; ?></p>
                <div class="desc">
                    <?php echo $desc; ?>
                </div>
                <div class="socials">
                    <?php if(!empty($instagram)) : ?>
                        <a href="<?php echo $instagram; ?>" class="instagram">
                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="32" height="32" rx="16" fill="url(#paint0_radial_501_1624)"/>
                            <g style="mix-blend-mode:overlay">
                            <rect width="32" height="32" rx="16" fill="url(#paint1_radial_501_1624)"/>
                            </g>
                            <path d="M12.6676 16C12.6676 14.1591 14.1595 12.6664 16.0004 12.6664C17.8412 12.6664 19.334 14.1591 19.334 16C19.334 17.8409 17.8412 19.3336 16.0004 19.3336C14.1595 19.3336 12.6676 17.8409 12.6676 16ZM10.8655 16C10.8655 18.836 13.1644 21.1349 16.0004 21.1349C18.8364 21.1349 21.1352 18.836 21.1352 16C21.1352 13.164 18.8364 10.8651 16.0004 10.8651C13.1644 10.8651 10.8655 13.164 10.8655 16ZM20.1385 10.6615C20.1384 10.8989 20.2087 11.1309 20.3405 11.3283C20.4723 11.5257 20.6596 11.6796 20.8789 11.7705C21.0981 11.8614 21.3394 11.8852 21.5722 11.839C21.805 11.7928 22.0188 11.6786 22.1867 11.5109C22.3546 11.3431 22.469 11.1293 22.5154 10.8966C22.5618 10.6638 22.5381 10.4225 22.4474 10.2032C22.3566 9.98392 22.2029 9.79644 22.0056 9.6645C21.8083 9.53257 21.5763 9.4621 21.339 9.462H21.3385C21.0204 9.46215 20.7153 9.58856 20.4903 9.81347C20.2653 10.0384 20.1388 10.3434 20.1385 10.6615ZM11.9604 24.1398C10.9854 24.0954 10.4555 23.933 10.1033 23.7958C9.63645 23.614 9.30333 23.3975 8.95309 23.0478C8.60285 22.698 8.38605 22.3652 8.20509 21.8983C8.06781 21.5463 7.90541 21.0162 7.86109 20.0413C7.81261 18.9872 7.80293 18.6706 7.80293 16.0001C7.80293 13.3296 7.81341 13.0138 7.86109 11.9589C7.90549 10.9839 8.06909 10.4549 8.20509 10.1018C8.38685 9.63496 8.60333 9.30184 8.95309 8.9516C9.30285 8.60136 9.63565 8.38456 10.1033 8.2036C10.4553 8.06632 10.9854 7.90392 11.9604 7.8596C13.0144 7.81112 13.3311 7.80144 16.0004 7.80144C18.6696 7.80144 18.9866 7.81192 20.0416 7.8596C21.0165 7.904 21.5456 8.0676 21.8986 8.2036C22.3655 8.38456 22.6986 8.60184 23.0488 8.9516C23.3991 9.30136 23.6151 9.63496 23.7968 10.1018C23.9341 10.4538 24.0965 10.9839 24.1408 11.9589C24.1893 13.0138 24.199 13.3296 24.199 16.0001C24.199 18.6706 24.1893 18.9863 24.1408 20.0413C24.0964 21.0162 23.9332 21.5462 23.7968 21.8983C23.6151 22.3652 23.3986 22.6983 23.0488 23.0478C22.6991 23.3972 22.3655 23.614 21.8986 23.7958C21.5466 23.933 21.0165 24.0954 20.0416 24.1398C18.9875 24.1882 18.6708 24.1979 16.0004 24.1979C13.3299 24.1979 13.0141 24.1882 11.9604 24.1398ZM11.8776 6.06056C10.813 6.10904 10.0856 6.27784 9.45029 6.52504C8.79237 6.78032 8.23541 7.1228 7.67885 7.67848C7.12229 8.23416 6.78069 8.792 6.52541 9.44992C6.27821 10.0856 6.10941 10.8126 6.06093 11.8772C6.01165 12.9434 6.00037 13.2843 6.00037 16C6.00037 18.7157 6.01165 19.0566 6.06093 20.1228C6.10941 21.1874 6.27821 21.9144 6.52541 22.5501C6.78069 23.2076 7.12237 23.7661 7.67885 24.3215C8.23533 24.877 8.79237 25.219 9.45029 25.475C10.0868 25.7222 10.813 25.891 11.8776 25.9394C12.9444 25.9879 13.2847 26 16.0004 26C18.716 26 19.0569 25.9887 20.1232 25.9394C21.1878 25.891 21.9148 25.7222 22.5504 25.475C23.208 25.219 23.7653 24.8772 24.3219 24.3215C24.8784 23.7658 25.2193 23.2076 25.4753 22.5501C25.7225 21.9144 25.8921 21.1874 25.9398 20.1228C25.9883 19.0558 25.9996 18.7157 25.9996 16C25.9996 13.2843 25.9883 12.9434 25.9398 11.8772C25.8913 10.8126 25.7225 10.0852 25.4753 9.44992C25.2193 8.7924 24.8776 8.23504 24.3219 7.67848C23.7662 7.12192 23.208 6.78032 22.5512 6.52504C21.9148 6.27784 21.1877 6.10824 20.124 6.06056C19.0577 6.01208 18.7168 6 16.0012 6C13.2855 6 12.9444 6.01128 11.8776 6.06056Z" fill="white"/>
                            <defs>
                            <radialGradient id="paint0_radial_501_1624" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(2 36) rotate(-38.6598) scale(38.4187)">
                            <stop stop-color="#FFDD55"/>
                            <stop offset="0.223958" stop-color="#FFDD55"/>
                            <stop offset="0.723958" stop-color="#FF543E"/>
                            <stop offset="1" stop-color="#C837AB"/>
                            </radialGradient>
                            <radialGradient id="paint1_radial_501_1624" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(16) rotate(146.31) scale(28.8444)">
                            <stop stop-color="#3771C8"/>
                            <stop offset="1" stop-color="#6600FF" stop-opacity="0"/>
                            </radialGradient>
                            </defs>
                            </svg>
                        </a>
                    <? endif ?>

                    <?php if(!empty($youtube)) : ?>
                        <a href="<?php echo $youtube; ?>" class="youtube">
                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="32" height="32" rx="16" fill="#FF0000"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M23.8253 9.42687C24.682 9.65751 25.3574 10.333 25.5881 11.1896C26.0164 12.7547 25.9999 16.0166 25.9999 16.0166C25.9999 16.0166 25.9999 19.2621 25.5881 20.8272C25.3574 21.6838 24.682 22.3593 23.8253 22.5899C22.2602 23.0018 16 23.0018 16 23.0018C16 23.0018 9.75616 23.0018 8.17462 22.5734C7.31795 22.3428 6.6425 21.6673 6.41186 20.8107C6 19.2621 6 16.0002 6 16.0002C6 16.0002 6 12.7547 6.41186 11.1896C6.6425 10.333 7.33443 9.64104 8.17462 9.4104C9.73969 8.99854 16 8.99854 16 8.99854C16 8.99854 22.2602 8.99854 23.8253 9.42687ZM19.2125 16.0002L14.0065 18.9985V13.0018L19.2125 16.0002Z" fill="white"/>
                            </svg>
                        </a>
                    <? endif ?>
                </div>
            </div>
            <?php endwhile; ?>
            <?php endif; ?>

        </div>
    </div>
</section>
<section id="section-entrepreneurs">
    <div class="container">
        <h2 class="heading-2"><?php the_field('entrepreneurs_title'); ?></h2>
        <div class="entrepreneurs-wrapper">
            <img src="<?php bloginfo('template_url'); ?>/assets/img/icons/block_3.svg" alt="" class="svg-float svg-3">
            <img src="<?php bloginfo('template_url'); ?>/assets/img/icons/block_4.svg" alt="" class="svg-float svg-4">

            <?php if( have_rows('entrepreneurs_repeater') ): ?>
            <?php while( have_rows('entrepreneurs_repeater') ): the_row();
            $image = get_sub_field('image');
            $title = get_sub_field('title');
            ?>
            <div class="item">
                <div class="thumb-wrapper img-sep">					
                    <div class="thumb thumb-box">
                        <?= wp_get_attachment_image($image, 'medium', null) ?>
                    </div>
                </div>
                <p class="title"><?php echo $title; ?></p>
            </div>
            <?php endwhile; ?>
            <?php endif; ?>

        </div>
    </div>
</section>
<section id="section-plans">
    <div class="container">
        <h2 class="heading-2"><?php the_field('plans_title'); ?></h2>
        <div class="plans-wrapper">
            <img src="<?php bloginfo('template_url'); ?>/assets/img/icons/block_3.svg" alt="" class="svg-float svg-3">
            <img src="<?php bloginfo('template_url'); ?>/assets/img/icons/block_4.svg" alt="" class="svg-float svg-4">
            
            <?php if( have_rows('plans_repeater') ): ?>
            <?php while( have_rows('plans_repeater') ): the_row();
            $title = get_sub_field('title');
            $price = get_sub_field('price');
            $description = get_sub_field('description');
            ?>
            <div class="item">
                <p class="title"><?php echo $title; ?></p>
                <?php 
                if($price <= 0) {
                    $price = "Free";
                } else {
                    $price = "$" . $price;
                }
                ?>
                <p class="price"><?php echo $price; ?></p>
                <p class="desc"><?php echo $description; ?></p>
                <ul class="list">
                    <?php if( have_rows('list') ): ?>
                    <?php while( have_rows('list') ): the_row();
                    $li = get_sub_field('li');
                    $checkbox = get_sub_field('checkbox'); ?>
                    <li class="<?php echo $checkbox['value']; ?>"><?php echo $li; ?></li>
                    <?php endwhile; ?>
                    <?php endif; ?>
                </ul>
                <button class="btn btn-outline btn-plan btn-form-trigger" data-plan="<?php echo $title; ?>">Choose plan</button>
            </div>
            <?php endwhile; ?>
            <?php endif; ?>

        </div>
        <p class="text-bottom"><?php the_field('plans_bottom_text'); ?></p>
    </div>
</section>
<?php get_footer(); ?>