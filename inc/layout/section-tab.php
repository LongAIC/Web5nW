<!-- Tab Layout -->
<section class="tab-box">
    <div class="container">
        <div class="row">
            <div class="title-tab-layout col-xl-12">
                <?php if (get_sub_field('tieu_de_tab')) : ?>
                    <h2><?php echo get_sub_field('tieu_de_tab'); ?></h2>
                <?php endif; ?>
            </div>
            <div class="col-xl-3 clear-pad">
                <div class="wrap-outsite">
                    <?php if (have_rows('danh_sach_rpt')) : ?>
                        <ul class="tabs-nav">

                            <?php $stt = 1;
                            while (have_rows('danh_sach_rpt')) : the_row();
                                $tieu_de_tab = get_sub_field('tieu_de_tab');
                            ?>

                                <li><a href="#tab-<?php echo $stt ?>"><?php echo $tieu_de_tab ?></a></li>


                            <?php $stt++;
                            endwhile; ?>

                        </ul>
                    <?php endif; ?>

                </div>
            </div>
            <div class="col-xl-9 clear-pad">
                <div class="bg-custom-tab">
                    <div class="tab_header">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <div class="tabs-stage">
                        <?php if (have_rows('danh_sach_rpt')) : ?>


                            <?php $stt = 1;
                            while (have_rows('danh_sach_rpt')) : the_row();
                                $image = get_sub_field('noidung_tab');
                            ?>

                                <div id="tab-<?php echo $stt ?>" class=" animated fadeIn" ata-wow-duration="1s" data-wow-delay="1s">
                                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                                </div>


                            <?php $stt++;
                            endwhile; ?>


                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>