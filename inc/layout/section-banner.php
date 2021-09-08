<!-- Banner -->

<section class="banner-page">
<div class="banner-header">
    <div class="container">
        <div class="row">
            <div class="col-xl-5">
                <div class="title_site">
                    <?php if (get_sub_field('title_header')) : ?>
                        <h2><?php echo get_sub_field('title_header'); ?></h2>
                    <?php endif; ?>
                </div>
                <div class="des_site">
                    <?php if (get_sub_field('mo_ta_page')) : ?>
                        <p><?php echo get_sub_field('mo_ta_page'); ?></p>
                    <?php endif; ?>
                </div>
                <div class="form_site">
                    <?php if (get_sub_field('form_dang_ky')) : ?>
                        <p><?php echo get_sub_field('form_dang_ky'); ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-xl-7">
                <div class="wrap-img">
                    <?php if (get_sub_field('hinh_anh_banner')) : $image = get_sub_field('hinh_anh_banner'); ?>

                        <!-- Full size image -->
                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />


                    <?php endif; ?>

                    <div class="mota_anh">
                        <?php if (get_sub_field('mo_ta_anh')) : ?>
                            <?php echo get_sub_field('mo_ta_anh'); ?>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>