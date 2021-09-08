<?php $orig_post = $post;
global $post;
$categories = get_the_category($post->ID);
if ($categories) {
    $category_ids = array();
    foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
    $args=array(
        'category__in' => $category_ids,
        'post__not_in' => array($post->ID),
        'posts_per_page'=> 6, 
        'caller_get_posts'=>1
        );
    query_posts( $args ); 
    if( have_posts() ) {
        ?>
        <div class="list-taichinh row ">
         <?php
         while(have_posts() ) {
            the_post();?>
            <div class="item-taichinh">
                    <div class="box-item equalheight fixfloat">
                        <div class="img-post col-xs-12 col-sm-5 col-md-3">
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('project',array('class'=>'taichinh-img','container'=>'')); ?></a>
                        </div>
                        <div class="info-post col-xs-12 col-sm-7 col-md-9">
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
                            <p class="excerpt-taichinh excerpt-destop"><?php echo excerpt(38); ?></p>
                            <p class="excerpt-taichinh excerpt-mobile"><?php echo excerpt(20); ?></p>
                            <a class="detail-item" href="<?php the_permalink(); ?>" title="<?php the_title();?>">Xem thêm</a>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
        <?php
    }
}
$post = $orig_post;
wp_reset_query(); ?>