<?php  
get_header();  
?>
<?php 
$title_header = get_field('title_header',$term);
$des_header = get_field('des_header',$term);
$queried_object = get_queried_object(); 
$taxonomy = $queried_object->taxonomy;
$term_id = $queried_object->term_id; 
$background_header = get_field('background_header', $queried_object);
$background_header = get_field('background_header', $taxonomy . '_' . $term_id);
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
						<h1 class="headding headding1 text-center upper title-posfolio "><?php if( $title_header ) : echo $title_header; else : single_cat_title(); endif; ?></h1>
						<p><?php echo $des_header; ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="content-main" class="bg-mau">
	<section class="main-page cat-taichinh">
		<div class="container">
			<main class="content col-md-9 col-sm-8 col-xs-12">
				<div class="box-content">
					<div class="list-taichinh row ">
						<?php 
						if (have_posts()) : 
							?>
							<div class="list-news news-cat">
								<div class="news-box">
									<ul class=' fixfloat'> 
										<?php while (have_posts()) : the_post(); ?>
											<div class="item-taichinh col-md-4 col-sm-4 col-xs-6">
												<div class="box-item equalheight">
													<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('project',array('class'=>'taichinh-img','container'=>'')); ?></a>
													<h2><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
													<p class="excerpt-taichinh excerpt-destop"><?php echo excerpt(28); ?></p>
													<p class="excerpt-taichinh excerpt-mobile"><?php echo excerpt(20); ?></p>
												</div>
											</div>
										<?php endwhile;?>
									</ul>
								</div>
							</div>
							<?php
						endif;  
						wp_reset_query(); 
						?>
					</div>
				</div>
			</main>
			<?php get_sidebar(); ?>
		</div>
	</section>
</div>
<?php get_footer();?>