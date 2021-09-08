<?php
get_header();
?>
<?php
$title_header = get_field('title_header');
$des_header = get_field('des_header');
$background_header = get_field('background_header');
?>
<?php if ($background_header) : ?>
	<style>
		.page-head .overlay-hd {
			background: url('<?php echo $background_header['url']; ?>') no-repeat;
			background-size: cover;
			-moz-background-size: cover;
			-webkit-background-size: cover;
			overflow: hidden;

		}

		.overlay-hd:before {
			opacity: 0;
		}
	</style>
<?php endif; ?>
<div class="page-head portfolio-head banner">
	<div class="overlay-hd">

		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h1 class="headding headding1 text-left upper title-posfolio "><?php if ($title_header) : echo $title_header;
																					else : the_title();
																					endif; ?></h1>
				</div>
			</div>
		</div>

	</div>
</div>
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
				<?php elseif (get_row_layout() == 'content_quytrinh') : ?>
				<?php include 'inc/layout/section-quytrinh.php'; ?>
			<?php endif; ?>
		<?php endwhile; ?>
	<?php endif; ?>
</div>
<div id="content-main">
	<section class="main-page cat-taichinh">
		<div class="container">
			<div class="row">
				<main class="content col-md-9 col-sm-8 col-xs-12 col-xl-12 ">
					<div class="main-content fixfloat">

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
								<div class="entry entry-postdt">
									<?php the_content(); ?>
								</div>
						<?php endwhile;
						endif; ?>
					</div>
				</main>
			</div>
		</div>
	</section>
</div>
<?php get_footer(); ?>