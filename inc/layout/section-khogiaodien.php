<!-- Kho Giao Diện -->
<section class="giaodien-page">
    <div class="container">
        <div class="Header-des">
            <?php if (get_sub_field('title_page_child')) : ?>
                <p><?php echo get_sub_field('title_page_child'); ?></p>
            <?php endif; ?>
            <?php if (get_sub_field('title_page_gioaodien')) : ?>
                <h1><?php echo get_sub_field('title_page_gioaodien'); ?></h1>
            <?php endif; ?>
            <div class="Des-page">
                <?php if (get_sub_field('mota_site')) : ?>
                    <p><?php echo get_sub_field('mota_site'); ?></p>
                <?php endif; ?>
            </div>
        </div>
        <div class="tabs-page">
            <div class="slider-danhmuc">
                <div class="khogiaodien-slider owl-carousel owl-theme">
                    <?php $stt = 1;
                    while (have_rows('ds_giaodien')) : the_row();
                        $image = get_sub_field('anh_daidien');
                        $tieu_de_layout = get_sub_field('tieu_de_layout');
                    ?>
                        <div class="item setup-khogiaodien fixfloat " data-wow-duration="2s">
                            <div class="tab-inline">
                                <a class="images-bg" href="#giaodien-<?php echo $stt ?>">
                                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                                    <h2><?php echo $tieu_de_layout ?></h2>
                                </a>
                            </div>
                        </div>

                    <?php $stt++;
                    endwhile; ?>
                </div>
                <div class="fileter-giaodien">
                    <div class="filter-query">
                        <div class="search-form-box">
                            <h2 class="title-filter">Tìm Kiếm</h2>
                            <div class="box_dk">
                                <form>
                                    <input type="text" name="keyword" id="keyword" onkeyup="fetch()" placeholder="Nhập Từ Khóa Tìm Kiếm">
                                </form>
                            </div>
                        </div>
                        <div class="row" style="padding:0px">
                            <div class="col-xl-3">
                                <div class="filter-sort">
                                    <h2 class="title-filter">Sắp Xếp</h2>
                                    <div class="sort-in">
                                        <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Sắp Xếp Theo">
                                        <datalist id="datalistOptions">
                                            <option value="Giá Thấp > Cao">
                                            <option value="Giá Cao > Thấp">
                                        </datalist>
                                    </div>
                                </div>
                                <div class="price-filter">
                                    <h2 class="title-filter">Hiển Thị Theo Giá</h2>
                                    <div class="wrapper">
                                        <div class="range-slider">
                                            <input type="text" class="js-range-slider" value="" />
                                        </div>

                                        <div class="extra-controls form-inline ">
                                            <div class="form-group">
                                                <input type="text" class="js-input-from form-control" value="0" style="margin-bottom :10px;" />
                                                <input type="text" class="js-input-to form-control" value="0" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3">
                                <div class="danhmuc-giaodien">
                                    <h2 class="title-filter">Danh Mục</h2>
                                    <div class="chicked-box">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Bất Động Sản
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Bất Động Sản
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Bất Động Sản
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Bất Động Sản
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Bất Động Sản
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Bất Động Sản
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Bất Động Sản
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Bất Động Sản
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="tag-giaodien">
                                    <h2 class="title-filter">Tìm Kiếm Theo Thẻ</h2>
                                    <div class="filter_tag">
                                        <input class="form-control" list="tag_option" id="exampleDataList" placeholder="Nhập Thẻ">
                                        <datalist id="tag_option">
                                            <option value="batdongsan">
                                            <option value="ytb">
                                        </datalist>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3">
                                <div class="theomausac">
                                    <h2 class="title-filter">Theo Màu Sắc Phong Thủy</h2>
                                    <div class="mausac_phongthuy">
                                        <div class="list_mausac">
                                            <div class="class-out">
                                                <button data-style="red" id="red"></button>
                                            </div>
                                            <div class="class-out">
                                                <button data-style="red" id="darkgreen"></button>
                                            </div>
                                            <div class="class-out">
                                                <button data-style="red" id="yellow"></button>
                                            </div>
                                            <div class="class-out">
                                                <button data-style="red" id="blue"></button>
                                            </div>
                                            <div class="class-out">
                                                <button data-style="red" id="green"></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3">
                                <div class="theo_nentang">
                                    <h2 class="title-filter">CMS / FRAMEWORK</h2>
                                    <div class="nentang">
                                        <div class="class-out">
                                            <img src="https://hoangweb.net/wp-content/themes/marketing/images/icons/wordpress.png">
                                        </div>
                                    </div>
                                </div>
                                <div class="bottom-btn">
                                    <a href="#">Apply Filter</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="stage-filter">
                <?php
                $parent = get_term_by('id', 38, 'danh-muc');

                $args = [
                    'post_type'      => 'du-an',
                    'post_status'    => 'publish',
                    'order'          => 'ASC',
                    'orderby'        => 'date',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'danh-muc',
                            'field' => 'name',
                            'terms' => $data // Where term_id of Term 1 is "1".
                        )
                    )
                ];
                ?>
            </div>
            <div id="datafetch" class="fixfloat set-ajak">
            </div>
            <div class="Bottom-giaodien">
                <div class="tabs-strong">
                    <?php $stt = 1;
                    while (have_rows('ds_giaodien')) : the_row();
                        $choose_giaodien = get_sub_field('choose_giaodien');
                        $link_to_category = get_sub_field('link_to_category');
                        $tieu_de_layout = get_sub_field('tieu_de_layout');
                    ?>

                        <div id="giaodien-<?php echo $stt ?>" class="hide-giaodien fixfloat ">
                            <?php $stt2 = 1;
                            if ($choose_giaodien) : ?>

                                <?php foreach ($choose_giaodien as $post) : setup_postdata($post);
                                    $price_sanpham = get_field('price_sanpham');  ?>

                                    <div class="item-grid-box" id="item-<?php echo $stt2 ?>">
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
                                                <?php endif ?>
                                            </div>
                                        </div>
                                    </div>

                                <?php $stt2++;
                                endforeach;
                                wp_reset_postdata(); ?>

                            <?php endif; ?>
                            <div class="xemthem-giaodien">
                                <a href="<?php echo $link_to_category ?>">Xem Thêm Giao Diện <?php echo $tieu_de_layout ?></a>
                            </div>
                        </div>

                    <?php $stt++;
                    endwhile; ?>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>