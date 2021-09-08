<aside id="sidebar" class="sidebar col-md-3 col-sm-4 col-xs-12 " role="complementary" itemscope itemtype="http://schema.org/WPSideBar">
	<?php if ( is_active_sidebar( 'main-sidebar' ) ) : ?>
		<div class="box-sidebar">
			<?php dynamic_sidebar( 'main-sidebar' ); ?>
		</div>
	<?php endif; ?>
</aside>