<?php get_header();?>

<div class="main-page">
<?php if (have_rows('noidung_page')) : ?>
		<?php while (have_rows('noidung_page')) : the_row(); ?>
			<?php if (get_row_layout() == 'content_banner') : ?>
				<?php include 'inc/layout/section-banner.php'; ?>
        <?php elseif (get_row_layout() == 'content_thietke') : ?>
				<?php include 'inc/layout/section-thietke.php'; ?>
        <?php elseif (get_row_layout() == 'content_noidung') : ?>
				<?php include 'inc/layout/section-noidung.php'; ?>
        <?php elseif (get_row_layout() == 'content_tab') : ?>
				<?php include 'inc/layout/section-tab.php'; ?>
        <?php elseif (get_row_layout() == 'content_thongtin') : ?>
				<?php include 'inc/layout/section-thongtin.php'; ?>
        <?php elseif (get_row_layout() == 'content_khachhang') : ?>
				<?php include 'inc/layout/section-khachhang.php'; ?>
			<?php endif; ?>
		<?php endwhile; ?>
	<?php endif; ?>
</div>
<?php get_footer();?>
