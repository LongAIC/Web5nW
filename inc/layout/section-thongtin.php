<!-- Thông Tin -->
<section class="thongtin-layout">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 layout-1 ">
                <div class="flex-center">
                    <div class="title-noidung-temp">
                        <?php if (get_sub_field('tieu_de_trai')) : ?>
                            <h2><?php echo get_sub_field('tieu_de_trai'); ?></h2>
                        <?php endif; ?>
                    </div>
                    <div class="noidung-thongtin fixfloat">
                        <?php if (get_sub_field('mo_ta_chinh')) : ?>
                            <p><?php echo get_sub_field('mo_ta_chinh'); ?></p>
                        <?php endif; ?>

                    </div>
                    <?php if (get_sub_field('link_tp')) : ?>

                        <div class="link-noidung default-box ">
                            <a class="btn-hover-vertical" href="<?php echo $link_tp ?>">Tìm Hiểu Thêm</a>
                        </div>
                    <?php endif; ?>

                </div>
            </div>

            <div class="col-xl-7">
                <div class="wrap-imgs">
                    <?php if (get_sub_field('hinh_anh_box')) : $image = get_sub_field('hinh_anh_box'); ?>

                        <!-- Full size image -->
                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />


                    <?php endif; ?>

                </div>
            </div>
        </div>

    </div>
    </div>
    </div>
</section>