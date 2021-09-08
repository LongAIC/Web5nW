<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head itemscope itemtype="http://schema.org/WebSite">
  <meta charset="<?php bloginfo('charset'); ?>" />
  <title><?php wp_title('|', true, 'right'); ?></title>
  <link rel="profile" href="http://gmpg.org/xfn/11" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;500&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;500&family=Poppins:ital,wght@0,300;0,400;0,500;1,400&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/swiper.min.css" />
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
  <header class="header" itemscope itemtype="http://schema.org/WPHeader">
    <div class="header-main">

      <div class="menu-header">
        <div class="border-bottom">
          <div class="container_header">
            <div class="row">
              <div class="logo col-xs-5 col-sm-4 col-md-2 col-xl-2">
                <?php
                $logo = get_field('logo', 'option');
                $logo = ($logo) ? $logo : TEMP_URL . '/images/logo.png';
                ?>
                <a href="<?= esc_url(home_url('/')) ?>" title="<?php bloginfo('description') ?>"><img src="<?= $logo ?>" alt="<?php bloginfo('name') ?>" /></a>
              </div>
              <div class="header-right col-xs-3 col-sm-4 col-md-8 col-xl-5">
                <div class="menu-main">

                  <?php if (has_nav_menu('header')) : ?>
                    <div class="menu_header" itemscope="" itemtype="http://schema.org/SiteNavigationElement">
                      <div id="search" class="search-mobile">
                        <?php get_search_form(); ?>
                      </div>
                      <?php wp_nav_menu(array('theme_location'  => 'header', 'container' => '')); ?>
                    </div>
                    <button type="button" class="button_menu">
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>
                  <?php endif; ?>
                </div>
                <div class="over_wrap"></div>
              </div>
              <div class="header-search col-xs-4 col-sm-4 col-md-2 col-xl-5">
                <div class="menu-main right-menu">
                  <?php if (has_nav_menu('header')) : ?>
                    <div class="menu_header" itemscope="" itemtype="http://schema.org/SiteNavigationElement">
                      <?php wp_nav_menu(array('theme_location'  => 'header_right', 'container' => '')); ?>
                    </div>
                  <?php endif; ?>
                </div>
                <div class="lienhe_top">
                  <?php $hotline = get_field('hotline', 'option'); ?>
                  <a href="tel:<?php echo $hotline ?>">Liên Hệ</a>
                </div>
              </div>

            </div>
          </div>
        </div>
        <div class="border-bottom padding-equal">
          <div class="container_header">
            <div class="row">
              <div class="title-web col-xl-1 ">
                <h2>HaravanWeb</h2>
              </div>
              <div class="col-xl-8 ">
               
                  <div class="menu-main bottom-menu">
                    <?php if (has_nav_menu('header')) : ?>
                      <div class="menu_header" itemscope="" itemtype="http://schema.org/SiteNavigationElement">
                        <div id="search" class="search-mobile">
                        </div>
                        <?php wp_nav_menu(array('theme_location'  => 'header_bottom', 'container' => '')); ?>
                      </div>
                    <?php endif; ?>
                  </div>
               
              </div>
      
              <div class="col-xl-3">
                <div class=" primary-bgcolor">
                  <a href="#" class="search-button">
                    <span class="tcon-search__item" aria-hidden="true"></span>
                  </a>
                </div>
              </div>
              <div class="col-xl-12">
                <div id="search" class="search-mobile">
                  <?php get_search_form(); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="search-box secondary-bgcolor" style="display: none;">
        <div class="container">
          <div class="parent-search">
            <div id="search">
              <?php get_search_form(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>