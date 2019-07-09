<div class="col-md-3 col-sm-4 col-xs-12">
	<div class="item_hf">
		<div class="h3_hf">
			<?php echo  wp_get_nav_menu_name('topics_menu_footer')?>
		</div>
		<?php if ( has_nav_menu( 'topics_menu_footer' ) ) { ?>
			<?php wp_nav_menu( array(
				'theme_location' => 'topics_menu_footer',
				'menu_class' => 'hf_ul',
				'container' => 'false',
			)); ?>
		<?php } ?>
	</div>
</div>


