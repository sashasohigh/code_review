<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet/less" href="<?php bloginfo('template_url'); ?>/assets/css/less.less">
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
	<?php wp_head(); ?>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
</head>
<body>
	<header id="section-header">
		<div class="header-top">
			<div class="container">
				<a href="<?php echo get_home_url() ?>" class="logo">
					<img src="<?php bloginfo('template_url'); ?>/assets/img/logo.svg" alt="">
				</a>
				<nav>
					<ul>
						<li><a href="#section-main">Home</a></li>
						<li><a href="#section-services">Services</a></li>
						<li><a href="#section-who-we-are">Who we are</a></li>
						<li><a href="#section-gallery">Gallery</a></li>
						<li><a href="#section-partners">Partners</a></li>
						<li><a href="#section-raffles">Raffles</a></li>
						<!-- <li><a href="#section-lawyers">Lawyers</a></li> -->
						<li><a href="#section-calendar">Calendar</a></li>
						<li><a href="#section-influencers">Influencers</a></li>
						<li><a href="#section-entrepreneurs">Entrepreneurs</a></li>
					</ul>
				</nav>
				<button class="btn btn-one btn-form-trigger">Join us</button>
				<button class="btn-trigger">
					<div class="lines"></div>
					<span>Menu</span>
				</button>
			</div>
		</div>
		<div class="header-menu">
			<div class="container">
				<nav>
					<div class="nav-col">
						<?php wp_nav_menu( [
						'theme_location'  => 'nav-menu-1',
						'menu'            => '',
						'container'       => 'ul',
						'container_class' => 'nav',
						'container_id'    => '',
						'menu_class'      => '',
						'menu_id'         => '',
						'echo'            => true,
						'fallback_cb'     => 'wp_page_menu',
						'before'          => '',
						'after'           => '',
						'link_before'     => '',
						'link_after'      => '',
						'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						'depth'           => 0,
						'walker'          => '',
						] ); ?>
						<button class="btn btn-desktop btn-form-trigger">Join us</button>
					</div>
					<div class="nav-col">
						<?php wp_nav_menu( [
						'theme_location'  => 'nav-menu-2',
						'menu'            => '',
						'container'       => 'ul',
						'container_class' => 'nav',
						'container_id'    => '',
						'menu_class'      => '',
						'menu_id'         => '',
						'echo'            => true,
						'fallback_cb'     => 'wp_page_menu',
						'before'          => '',
						'after'           => '',
						'link_before'     => '',
						'link_after'      => '',
						'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						'depth'           => 0,
						'walker'          => '',
						] ); ?>
					</div>
					<div class="nav-col">
					<?php wp_nav_menu( [
						'theme_location'  => 'nav-menu-3',
						'menu'            => '',
						'container'       => 'ul',
						'container_class' => 'nav',
						'container_id'    => '',
						'menu_class'      => '',
						'menu_id'         => '',
						'echo'            => true,
						'fallback_cb'     => 'wp_page_menu',
						'before'          => '',
						'after'           => '',
						'link_before'     => '',
						'link_after'      => '',
						'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						'depth'           => 0,
						'walker'          => '',
						] ); ?>
					</div>
					<div class="nav-col">
					<?php wp_nav_menu( [
						'theme_location'  => 'nav-menu-4',
						'menu'            => '',
						'container'       => 'ul',
						'container_class' => 'nav',
						'container_id'    => '',
						'menu_class'      => '',
						'menu_id'         => '',
						'echo'            => true,
						'fallback_cb'     => 'wp_page_menu',
						'before'          => '',
						'after'           => '',
						'link_before'     => '',
						'link_after'      => '',
						'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						'depth'           => 0,
						'walker'          => '',
						] ); ?>
					</div>
				</nav>
				<button class="btn btn-mobile btn-form-trigger">Get help</button>
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
		</div>
		<div class="header-form">
			<div class="form-wrapper">
				<h3>Join us</h3>
				<div class="form-container">
					<?php echo do_shortcode('[wpforms id="191"]'); ?>
				</div>
			</div>
		</div>
	</header>