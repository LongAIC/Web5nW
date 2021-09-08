<!-- Quy Trình -->
<section class="quytrinh-class">
    <div class="container">
        <div class="row">
            <div class="col-xl-3">
                <div class="wrap-left-inside">
                    <?php if (have_rows('list_quy_trinh')) : ?>
                        <ul class="tabs-navs tab-change-qt">

                            <?php $stt = 1;
                            while (have_rows('list_quy_trinh')) : the_row();
                                $tieu_de_rut_gọn = get_sub_field('tieu_de_rut_gọn');
                            ?>

                                <li><a href="#quytrinh-<?php echo $stt ?>"><?php echo $stt ?>.  <?php echo $tieu_de_rut_gọn ?></a></li>


                            <?php $stt++;
                            endwhile; ?>

                        </ul>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-xl-9">
                <div class="content-flex-qt">
                    <?php if (have_rows('list_quy_trinh')) : ?>
                        <?php $stt = 1;
                        while (have_rows('list_quy_trinh')) : the_row();
                            $tieu_de_quytrinh = get_sub_field('tieu_de_quytrinh');
                            $layout_qt = get_sub_field('layout_qt');
                        ?>
                            <section class="content-ink" id="quytrinh-<?php echo $stt ?>">
                                <h2 ><?php echo $stt ?>.  <?php echo $tieu_de_quytrinh ?>.</h2>
                                <div class="main-layout">
                                    <?php if (have_rows('layout_qt')) : ?>
                                        <?php while (have_rows('layout_qt')) : the_row(); ?>
                                            <?php if (get_row_layout() == 'layout_2cot') : ?>
                                                <?php include(locate_template('inc/layout/layout-child/section-layout2.php')) ?>
                                            <?php elseif (get_row_layout() == 'layout_1cot') : ?>
                                                <?php include(locate_template('inc/layout/layout-child/section-layout1.php')) ?>
                                            <?php endif; ?>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </div>
                            </section>
                        <?php $stt++;
                        endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>

    </div>
  

</section>