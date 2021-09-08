<?php get_header();
$price_sanpham = get_field('price_sanpham'); ?>

<div class="page-head portfolio-head banner">
    <div class="overlay-hd gt">

        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="single-giaodien">
                        <div class="break_cum">
                            <?php
                            if (function_exists('yoast_breadcrumb')) {
                                yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
                            }
                            ?>
                        </div>
                        <div class="search-boxxx">
                            <?php get_search_form(); ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <div class="show_img" style="background:url(<?php echo get_the_post_thumbnail_url() ?>)">

                </div>
            </div>
            <div class="col-xl-6">
                <div class="content-single">
                    <div class="hr-t">
                        <h2><?php the_title(); ?></h2>
                        <p> <i class="fa fa-user-o" aria-hidden="true"></i>Mã Giao Diện: MS5</p>

                        <?php if (!empty($price_sanpham)) : ?>
                            <span id="prices"><?php echo $price_sanpham ?>VNĐ</span>
                        <?php endif ?>
                        <?php if (empty($price_sanpham)) : ?>
                            <span id="prices">LIÊN HỆ</span>
                        <?php endif ?>
                    </div>
                    <div class="summary-box">
                        <div class="show-khuyenmai">
                            <h3>Dịch Vụ Của Chúng Tôi </h3>
                            <div class='List_dv'>
                                <div class="check-total-service">
                                    <?php if (have_rows('rpt_dichvu', 'option')) : ?>

                                        <?php while (have_rows('rpt_dichvu', 'option')) : the_row();
                                            $tendichvu = get_sub_field('tendichvu');
                                            $giadichvu = get_sub_field('giadichvu');
                                            $gia_km = get_sub_field('gia_km');
                                            $tick = get_sub_field('tick');
                                        ?>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="<?php echo $gia_km ?>" id="flexCheckChecked" <?php echo $tick ?>>
                                                <label class="form-check-label ">
                                                    <span><?php echo $tendichvu ?></span>
                                                    <span>
                                                        <?php if (!empty($gia_km)) : ?>
                                                            <del id="gachngang"><?php echo $giadichvu ?></del>
                                                            <p><?php echo $gia_km ?>₫</p>
                                                        <?php endif; ?>
                                                        <?php if (empty($gia_km)) : ?>
                                                            <p><?php echo $giadichvu ?>₫</p>
                                                        <?php endif; ?>

                                                    </span>
                                                </label>
                                            </div>
                                        <?php endwhile; ?>

                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="total-prices">
                        <div class="tamtinh-prices">
                            <div class="text-prices" id="tuychon">
                                <h3>Tùy Chọn Thêm</h3>
                                <p class="prices" id="prices_tuychon">VNĐ</p>
                            </div>
                            <div class="text-prices">
                                <h3>Giá Giao Diện</h3>
                                <?php if (!empty($price_sanpham)) : ?>
                                    <p class="prices"><?php echo $price_sanpham ?>VNĐ</p>
                                    <div class="total_prices" style="display:none" data-value="<?php echo $price_sanpham ?>"></div>
                                <?php endif ?>
                                <?php if (empty($price_sanpham)) : ?>
                                    <p class="prices">Liên Hệ</p>
                                <?php endif ?>
                            </div>
                            <div class="text-prices">
                                <h3>Tổng Cộng</h3>
                                <?php if (!empty($price_sanpham)) : ?>
                                    <p class="prices" id="tonggia"><?php echo $price_sanpham ?>VNĐ</p>

                                <?php endif ?>
                                <?php if (empty($price_sanpham)) : ?>
                                    <p class="prices">Liên Hệ</p>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                    <div class="btn-muangay">
                        <a href="show_form" id="show">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> Mua Ngay
                        </a>
                        <a href="tel:0865486094" id="tuvan"><i class="fa fa-phone" aria-hidden="true"></i>Cần Tư Vấn</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>