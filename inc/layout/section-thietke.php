<!-- Thiết Kế -->
<section class="thietke-page">
    <div class="container">
        <div class="row">
            <div class="Top-gioithieu">
                <?php if (get_sub_field('tt_thietke')) : ?>
                    <h2><?php echo get_sub_field('tt_thietke'); ?></h2>
                <?php endif; ?>
                <?php if (get_sub_field('mo_ta_thietke')) : ?>
                    <p><?php echo get_sub_field('mo_ta_thietke'); ?></p>
                <?php endif; ?>
            </div>
            <div class="list-nganh_thietke">
                <?php if (have_rows('list_nganh_hang')) : ?>

                    <?php while (have_rows('list_nganh_hang')) : the_row();
                        $hinh_anh_nganh = get_sub_field('hinh_anh_nganh');
                        $tieu_de_nganhhang = get_sub_field('tieu_de_nganhhang');
                        $link_nganhhang = get_sub_field('link_nganhhang');
                    ?>

                        <div class="list-tk">
                            <div class="list-ink">
                                <a href="<?php echo $link_nganhhang ?>">
                                    <div class="img_tk">
                                        <img src="<?php echo $hinh_anh_nganh['url']; ?>" alt="<?php echo $hinh_anh_nganh['alt']; ?>" />
                                    </div>
                                    <h2><?php echo $tieu_de_nganhhang?></h2>
                                </a>
                            </div>
                        </div>

                    <?php endwhile; ?>

                <?php endif; ?>

            </div>
        </div>
    </div>
</section>