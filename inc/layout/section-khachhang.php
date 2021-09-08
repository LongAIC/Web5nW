<!-- Khách Hàng -->
<section class="khachhang-page">
    <div class="container">

        <div class="row">
            <div class="title-khachhang col-xl-12">
                <?php if (get_sub_field('tieu_de_layout')) : ?>
                    <h2><?php echo get_sub_field('tieu_de_layout'); ?></h2>
                <?php endif; ?>
            </div>
            <div class="noidung-slider col-xl-12">
                <div class="inside-layout carousel-wrapper">
                    <div class="custom-slider-box owl-carousel owl-theme">
                        <?php $stt = 1;
                        while (have_rows('danh_sach_khach_hang')) : the_row();
                            $img_banner = get_sub_field('img_banner');
                            $anh_thuonghieu = get_sub_field('anh_thuonghieu');
                            $danh_gia_khach = get_sub_field('danh_gia_khach');
                            $ten_khach_hang = get_sub_field('ten_khach_hang');
                            $chucvu_cty = get_sub_field('chucvu_cty');
                            $chose_color = get_sub_field('chose_color');
                        ?>
                            <div class="item setup-item fixfloat " data-wow-duration="2s">
                                <div class="left-content">
                                    <picture>
                                        <img src="<?php echo $img_banner['url']; ?>" alt="<?php echo $img_banner['alt']; ?>" />
                                    </picture>
                                </div>
                                <div class="right_banner">
                                    <div class="box-in-slider">
                                        <div class="img-thuonghieu">
                                            <img src="<?php echo $anh_thuonghieu['url']; ?>" alt="<?php echo $anh_thuonghieu['alt']; ?>" />
                                        </div>
                                        <div class="danhgia" style="border-bottom: 1px solid <?php echo $chose_color ?>;">
                                            <p><?php echo $danh_gia_khach ?></p>
                                        </div>

                                        <div class="thongtin-kh">
                                            <h3><?php echo $ten_khach_hang ?></h3>
                                            <p><?php echo $chucvu_cty ?></p>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        <?php $stt++;
                        endwhile; ?>
                    </div>
                </div>
            </div>
            <div class="col-xl-12">
                <div class="thuonghieu-kh">
                    <?php if (have_rows('danh_sach_thuong_hieu')) : ?>
                        <?php while (have_rows('danh_sach_thuong_hieu')) : the_row();
                            $them_anh_thuonghieu = get_sub_field('them_anh_thuonghieu');
                        ?>
                            <div class="logo-list col-xl-2">
                                <div class="customer-logo">
                                    <img src="<?php echo $them_anh_thuonghieu['url']; ?>" alt="<?php echo $them_anh_thuonghieu['alt']; ?>" />
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>