<?php get_header();?>
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
<div class="container">
	<div class="row">
		<div class="col-xs-12 text-center" style="padding: 30px 0; color: red;">
			<h1>Oh No! That Page Doesn't Exist!</h1>
		</div>
	</div>
</div>
<?php get_footer();?>