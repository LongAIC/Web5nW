<?php 
/*
 * Template Name: Liên hệ
 */ 
get_header();  
?>
<?php 
$title_header = get_field('title_header');
$des_header = get_field('des_header');
$background_header = get_field('background_header');
?>
<?php if($background_header): ?>
	<style>
		.page-head.portfolio-head {
			background: url('<?php echo $background_header['url']; ?>') no-repeat;
			background-size: cover;
			-moz-background-size: cover;
			-webkit-background-size: cover;
			overflow: hidden;
		}
	</style>
<?php endif; ?>
<div class="page-head portfolio-head banner">
	<div class="overlay-hd">
	<div class="row">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h1 class="headding headding1 text-center upper title-posfolio "><?php if( $title_header ) : echo $title_header; else : the_title(); endif; ?></h1>
					<p><?php echo $des_header; ?></p>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<div id="content-main">
	<section class="main-page ">
		<div class="container">
				<main class="content-full">
					<div class="cat-content">
						
						<section class="lienhe-bds box-chia row">
							<div class="info-bds col-md-6 col-sm-6 col-xs-12">
								<div class="title-page trang">
									<h2 class="title-main title-trang"><?php the_field('title_thongtin') ?></h2>
								</div>
								<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
									<div class="entry entry-bds">
										<?php the_content(); ?>
									</div>
								<?php endwhile; endif; ?>
							</div>
							<div class="form-lienhe-bds col-md-6 col-sm-6 col-xs-12">
								<div class="title-page trang">
									<h2 class="title-main title-trang"><?php the_field('title_thongtin') ?></h2>
								</div>
								<div class="contact-form">
									<?php $form_lienhe = get_field('form_lienhe'); echo do_shortcode($form_lienhe); ?>
								</div>
							</div>
						</section>
						
				</div>
			</main>
		</div>
	</section>
</div>
<?php get_footer();?>

</script>
