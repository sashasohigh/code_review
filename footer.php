	<footer id="section-footer">
		<div class="container">
			<div class="content">
				<a href="<?php echo get_home_url() ?>" class="logo">
					<img src="<?php bloginfo('template_url'); ?>/assets/img/logo-black.svg" alt="">
				</a>
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
				<button class="btn btn-form-trigger">Get help</button>
			</div>
			<div class="copyright">
				<p>©Copyright <?php echo date('Y'); ?> | All right reserved <?php echo date('Y'); ?> | Development by <a href="https://rivo.agency/" target="_blank" style="color: #FAAE1A;text-decoration: underline;">Rivo Agency</a></p>
				<p><a href="/privacy-policy/">Privacy Policy & Term of Use</a></p>
			</div>
		</div>
	</footer>
	<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
	<?php wp_footer(); ?>
</body>
</html>