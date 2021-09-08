<!-- Nội Dung -->
<?php $mau_nen_bg = get_sub_field('mau_nen_bg') ?>
<section class="noidung-page" style="background:<?php echo $mau_nen_bg ?>">
    <div class="noidung-tuychinh">
        <div class="container">
            <div class="row <?php echo get_sub_field('main_layout') ?>">
                <div class="col-xl-6 layout-1">
                    <div class="title-noidung-temp">
                        <?php if (get_sub_field('tieu_de_thongtin')) : ?>
                            <h2><?php echo get_sub_field('tieu_de_thongtin'); ?></h2>
                        <?php endif; ?>
                    </div>
                    <div class="rpt-noidung fixfloat">
                        <?php if (have_rows('list_thong_tin')) : ?>

                            <?php while (have_rows('list_thong_tin')) : the_row();
                                $tieu_de_list = get_sub_field('tieu_de_list');
                                $noidung_rpt = get_sub_field('noidung_rpt');
                            ?>

                                <div class="List-noidung">
                                    <div class="wrap-inside">
                                        <h2><?php echo $tieu_de_list ?></h2>
                                        <div class="list-rpt-inside">
                                            <ul>
                                                <?php if (have_rows('noidung_rpt')) : ?>

                                                    <?php while (have_rows('noidung_rpt')) : the_row();
                                                        $thong_tin_nd = get_sub_field('thong_tin_nd');
                                                    ?>

                                                        <li>
                                                            <p><?php echo $thong_tin_nd ?></p>
                                                        </li>

                                                    <?php endwhile; ?>

                                                <?php endif; ?>
                                            </ul>
                                        </div>

                                    </div>
                                </div>

                            <?php endwhile; ?>

                        <?php endif; ?>

                    </div>
                    <?php if (get_sub_field('xem_them_link')) : $xem_them_box = get_sub_field('xem_them_box'); ?>

                        <div class="link-noidung ">
                            <a class="btn-hover-vertical" href="<?php echo $xem_them_link ?>"><?php echo $xem_them_box; ?></a>
                        </div>
                    <?php endif; ?>


                </div>
                <?php if (get_sub_field('main_layout_dang') == 'slide') :  $backgroud_noidung = get_sub_field('backgroud_noidung'); ?>
                    <div class="col-xl-6 layout-2">
                        <div class="bg-slide" style="background:url(<?php echo $backgroud_noidung['url']; ?>)">
                            <div class="custom-slider owl-carousel owl-theme">
                                
                                    <?php $stt = 1;
                                    while (have_rows('list_hinh_anh_rpt')) : the_row();
                                        $image = get_sub_field('hinhanh_list');
                                    ?>
                                        <div class="item  " data-wow-duration="2s">
                                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                                        </div>

                                    <?php $stt++;
                                    endwhile; ?>
                              
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if (get_sub_field('main_layout_dang') == 'anh') : ?>
                        <div class="col-xl-6 layout-2 ">
                            <div class="screen-image <?php echo get_sub_field('main_img_child') ?>">
                                <?php if (have_rows('list_hinh_anh_rpt')) : ?>

                                    <?php $stt = 1;
                                    while (have_rows('list_hinh_anh_rpt')) : the_row();
                                        $image = get_sub_field('hinhanh_list');
                                    ?>

                                        <figure class="screen-img screen-img-<?php echo $stt ?>">
                                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                                        </figure>

                                    <?php $stt++;
                                    endwhile; ?>

                                <?php endif; ?>

                            </div>
                        </div>
                    <?php endif; ?>
                    </div>
            </div>
        </div>
</section>