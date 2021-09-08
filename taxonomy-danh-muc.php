<?php get_header();
$term = get_queried_object(); ?>


<section class="danhmuc-giaodien">
    <div class="Bg-transition">
        <div class="container">
            <div class="homebanner_heading">
                <h1>Thiết kế website bán hàng,<br>web doanh nghiệp </h1>
                <p class="subhead">Hơn 400 Haravan Themes đẹp, miễn phí, giá rẻ,<span> tối ưu trên di động,<br> máy tính với nhiều màu sắc, bố cục khác nhau</span></p>
            </div>
            <div class="homebanner_search ">
                <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xl-12">
                    <?php get_search_form(); ?>
                </div>
            </div>
        </div>

        <div class="circles-background"></div>
    </div>
    <div class="container">
        <div class="row">
            <?php
            if (have_posts()) :
            ?>
                <div class="col-xl-6 margin-giaodien">
                    <div class="content_box">
                        <div class="content-bg">
                            <h2><?php single_cat_title();  ?></h2>
                            <p> <?php echo category_description(); ?> </p>
                        </div>
                    </div>
                </div>
                <?php while (have_posts()) : the_post();
                    $price_sanpham = get_field('price_sanpham'); ?>
                    <div class=" col-xl-3 margin-giaodien">
                        <div class="out-box">
                            <div class="images-giaodien" style="background:url(<?php echo get_the_post_thumbnail_url() ?>)">
                                <div class="quick-view">
                                    <div class="margin-box">
                                        <div class="box-content-view ">
                                            <a href="<?php the_permalink(); ?>" id="block">Xem Chi Tiết</a>
                                            <a target="blank" id="color-2" href="<?php echo get_the_post_thumbnail_url() ?>">Xem Nhanh</a>
                                        </div>
                                        <a href="<?php the_permalink(); ?>" id="block-wrap"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="bottom-des">
                                <h2><?php the_title(); ?></h2>
                                <?php if (!empty($price_sanpham)) : ?>
                                    <p><?php echo $price_sanpham ?>VNĐ</p>
                                <?php endif ?>
                                <?php if (empty($price_sanpham)) : ?>
                                    <p>LIÊN HỆ</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>

            <?php
            endif;
            wp_reset_query();
            ?>
        </div>
        <div class="phantrang">
            <?php wp_corenavi_table(); ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>