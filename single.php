<?php  
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
  <section class="main-page cat-taichinh">
    <div class="container">
      <div class="row">
      <main class="content col-md-9 col-sm-8 col-xs-12 ">
        <div class="main-content ">
          <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="entry entry-postdt">
              <?php the_content(); ?>
            </div>
          <?php endwhile; endif; ?>
        </div>
        <div class="clear"></div>
         <div class="related ">
             <div class="title-page widget-title  paddingb-10 marginb-10">
            <h2 class="title-main">Bài viết liên quan</h2>
          </div>
            <?php get_template_part( 'related' ); ?>
          </div>
      </main>
      <?php get_sidebar(); ?>
      </div>
    </div>
  </section>
</div>
<?php get_footer();?>
