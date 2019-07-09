<?php
/**
 * Primary Menu
 *
 * @package Smart Blog
 * @since 1.0
 */
?>

<nav class="Header-nav Header-nav--primary" data-nc-element="primary-nav" data-content-field="navigation">

	<?php if (has_nav_menu('primary_menu')) { ?>
		<?php wp_nav_menu(array(
			'theme_location' => 'primary_menu',
			'menu_class' => '',
			//'menu_id' => 'mmenu',
			'container' => 'false',
			'items_wrap' => '<div id="%1$s" class="%2$s Header-nav-inner">%3$s</div>',
			'walker' => new Custom_Walker_Nav_Menu_Top
		)); ?>
	<?php } ?>
</nav>

