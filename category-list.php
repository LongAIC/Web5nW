<?php  
/*
 * Template Name: dạng list
 */ 
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
<div id="content-main">
	<section class="main-page cat-taichinh">
		<div class="container">
			<div class="row">
				<main class="content col-md-9 col-sm-8 col-xs-12">
					<div class="box-content">
						<div class="list-taichinh">
							<?php   
							if (have_posts()) :   
								while (have_posts()) : the_post();  ?>
									<div class="item-taichinh">
										<div class="box-item equalheight row">
											<div class="img-post col-xs-12 col-sm-5 col-md-4">
												<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('project',array('class'=>'taichinh-img','container'=>'')); ?></a>
											</div>
											<div class="info-post col-xs-12 col-sm-7 col-md-8">
												<h2><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
												<p class="excerpt-taichinh excerpt-destop"><?php echo excerpt(55); ?></p>
												<p class="excerpt-taichinh excerpt-mobile"><?php echo excerpt(20); ?></p>
												<a class="detail-item" href="<?php the_permalink(); ?>" title="<?php the_title();?>">Xem thêm</a>
											</div>
										</div>
									</div>
									<?php endwhile;  endif;  
									wp_reset_query();
									?>
								</ul>
								<div class="pagenavi-blog">
									<?php wp_corenavi_table(); ?>
								</div>
							</div>
							<div class="clear"></div>
						</div>
					</main>
					<?php get_sidebar(); ?>
				</div>
			</div>
		</section>
	</div>
	<?php get_footer();?>
