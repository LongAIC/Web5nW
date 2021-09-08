<?php
define("TEMP_URL", get_bloginfo('template_url'));
define("DEVVN_VERSION", '1.0');
define("DEVVN_DEV_MODE", true);
require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';
require get_template_directory() . '/inc/aq_resizer.php';
require get_template_directory() . '/inc/style_script_int.php';
function my_acf_google_map_api($api)
{
	$api['key'] = 'AIzaSyBHwdAH9uILhB-GdnCeo8U4NDloxB3gIEE';
	return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');
/*
 * Setup theme
 */
function devvn_setup()
{
	load_theme_textdomain('devvn', get_template_directory() . '/languages');
	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');
	//Add thumbnail to post
	add_theme_support('post-thumbnails');
	//Shortcode in widget
	add_filter('widget_text', 'do_shortcode');
	add_editor_style();
	//menu
	/********
	 * Call: wp_nav_menu(array('theme_location'  => 'header','container'=> ''));
	 * *********/
	register_nav_menus(array(
		'header' => __('Header menu', 'devvn'),
		'header_right' => __('Header Right menu', 'devvn'),
		'header_bottom' => __('Header Bottom menu', 'devvn'),
		'footer'  => __('Footer menu', 'devvn'),
	));
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support('html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	));
	//Remove version
	remove_action('wp_head', 'wp_generator');
	//Remove Default WordPress Image Sizes
	function svl_remove_default_image_sizes($sizes)
	{
		//unset( $sizes['thumbnail']);
		unset($sizes['medium']);
		unset($sizes['large']);
		unset($sizes['medium_large']);
		return $sizes;
	}

	add_filter('intermediate_image_sizes_advanced', 'svl_remove_default_image_sizes');
	if (function_exists('add_image_size')) {
		add_image_size('project', 420, 275, true);
		add_image_size('duan', 365, 205, true);
	}
}
add_action('after_setup_theme', 'devvn_setup');
//Sidebar
/*
 <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('main-sidebar')) : ?><?php endif; ?>
 */
add_action('widgets_init', 'theme_slug_widgets_init');
function theme_slug_widgets_init()
{
	register_sidebar(array(
		'name' => __('Main Sidebar', 'devvn'),
		'id' => 'main-sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="title-widget"><h3 class="title-sidebar">',
		'after_title'   => '</h3></div>'
	));
	register_sidebar(array(
		'name' => __('Footer 1', 'devvn'),
		'id' => 'footer-1',
		'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4><span>',
		'after_title'   => '</span></h4>',
	));
	register_sidebar(array(
		'name' => __('Footer 2', 'devvn'),
		'id' => 'footer-2',
		'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4><span>',
		'after_title'   => '</span></h4>',
	));
	register_sidebar(array(
		'name' => __('Footer 3', 'devvn'),
		'id' => 'footer-3',
		'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4><span>',
		'after_title'   => '</span></h4>',
	));
}
//Title
function svl_wp_title($title, $sep)
{
	global $paged, $page;
	if (is_feed())
		return $title;
	$title .= get_bloginfo('name', 'display');
	$site_description = get_bloginfo('description', 'display');
	if ($site_description && (is_home() || is_front_page()))
		$title = "$title $sep $site_description";
	if (($paged >= 2 || $page >= 2) && !is_404())
		$title = "$title $sep " . sprintf(__('Trang %s', 'devvn'), max($paged, $page));
	return $title;
}
add_filter('wp_title', 'svl_wp_title', 10, 2);

// Add specific CSS class by filter
add_filter('body_class', 'devvn_mobile_class');
function devvn_mobile_class($classes)
{
	if (wp_is_mobile()) {
		$classes[] = 'devvn_mobile';
	} else {
		$classes[] = "devvn_desktop";
	}
	return $classes;
}

//Theme Options
if (function_exists('acf_add_options_page')) {

	$option_page = acf_add_options_page(array(
		'page_title' 	=> 'Cài đặt chung cho trang',
		'menu_title' 	=> 'cài đặt chung',
		'menu_slug' 	=> 'theme-general-settings',
		'capability' 	=> 'edit_posts',
		'redirect' 	=> false
	));
}

//Code phan trang
function wp_corenavi_table($main_query = null)
{
	global $wp_query;
	if (!$main_query) $main_query = $wp_query;
	$big = 999999999;
	$total = $main_query->max_num_pages;
	if ($total > 1) echo '<div class="paginate_links">';
	echo paginate_links(array(
		'base' 		=> str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
		'format' 	=> '?paged=%#%',
		'current' 	=> max(1, get_query_var('paged')),
		'total' 	=> $total,
		'mid_size'	=> '10',
		'prev_text'    => __('Trang trước', 'devvn'),
		'next_text'    => __('Trang tiếp', 'devvn'),
	));
	if ($total > 1) echo '</div>';
}
function div_wrapper($content)
{
	$pattern = '~<iframe.*src=".*(youtube.com|youtu.be).*</iframe>|<embed.*</embed>~'; //only iframe youtube
	preg_match_all($pattern, $content, $matches);
	foreach ($matches[0] as $match) {
		$wrappedframe = '<div class="videoWrapper">' . $match . '</div>';
		$content = str_replace($match, $wrappedframe, $content);
	}
	return $content;
}
add_filter('the_content', 'div_wrapper');

function get_thumbnail($img_size = 'thumbnail', $w = '', $h = '')
{
	global $post;
	$url_thumb_full = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
	$thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $img_size);
	$url_thumb = $thumb['0'];
	$w_thumb = $thumb['1'];
	$h_thumb = $thumb['2'];
	if (($w_thumb != $w || $h_thumb != $h) && $url_thumb_full && $w != "" && $h != "") $url_thumb = aq_resize($url_thumb_full, $w, $h, true, true, true);
	if (!$url_thumb) $url_thumb = TEMP_URL . '/images/no-image-featured-image.png';
	return $url_thumb;
}

function get_excerpt($limit = 130)
{
	$excerpt = get_the_excerpt();
	if (!$excerpt) $excerpt = get_the_content();
	$excerpt = preg_replace(" (\[.*?\])", '', $excerpt);
	$excerpt = strip_shortcodes($excerpt);
	$excerpt = strip_tags($excerpt);
	$excerpt = substr($excerpt, 0, $limit);
	$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
	$excerpt = trim(preg_replace('/\s+/', ' ', $excerpt));
	if ($excerpt) {
		$permalink = get_the_permalink();
		$excerpt = $excerpt . '... <a href="' . $permalink . '" title="" rel="nofollow">' . __('Xem thêm', 'devvn') . '</a>';
	}
	return $excerpt;
}
function custom_excerpt_length($length)
{
	return 100;
}
add_filter('excerpt_length', 'custom_excerpt_length', 999);

function devvn_excerpt_more($more)
{
	return '...';
}
add_filter('excerpt_more', 'devvn_excerpt_more');

if (!function_exists('devvn_ilc_mce_buttons')) {
	function devvn_ilc_mce_buttons($buttons)
	{
		array_push(
			$buttons,
			"alignjustify",
			"subscript",
			"superscript"
		);
		return $buttons;
	}
	add_filter("mce_buttons", "devvn_ilc_mce_buttons");
}
if (!function_exists('devvn_ilc_mce_buttons_2')) {
	function devvn_ilc_mce_buttons_2($buttons)
	{
		array_push(
			$buttons,
			"backcolor",
			"anchor",
			"fontselect",
			"fontsizeselect",
			"cleanup"
		);
		return $buttons;
	}
	add_filter("mce_buttons_2", "devvn_ilc_mce_buttons_2");
}

/*length excerpt*/
function excerpt($limit)
{
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	if (count($excerpt) >= $limit) {
		array_pop($excerpt);
		$excerpt = implode(" ", $excerpt) . '...';
	} else {
		$excerpt = implode(" ", $excerpt) . '...';
	}
	$excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);
	return $excerpt;
}


add_action('wp_ajax_giaodien_filter', 'giaodien_filter');
add_action('wp_ajax_nopriv_giaodien_filter', 'giaodien_filter');
function giaodien_filter()
{

	$data = $_POST['data'];
	echo $data;
	$parent = get_term_by('name', $data, 'danh-muc');
	echo '<ul>';

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
	$the_query = new WP_Query($args);
	while ($the_query->have_posts()) : $the_query->the_post();
		echo '<li>';
		echo '<a href="' . get_the_permalink() . '">' . get_the_title() . '</a>';
		echo '</li>';
	endwhile;
	wp_reset_postdata();

	die();
}

// add the ajax fetch js
add_action('wp_footer', 'ajax_fetch');
function ajax_fetch()
{
?>
	<script type="text/javascript">
		var timeout = null; // khai báo biến timeout
		$("#keyword").keyup(function() { // bắt sự kiện khi gõ từ khóa tìm kiếm
			clearTimeout(timeout); // clear time out
			timeout = setTimeout(function() {
				fetch(); // gọi hàm ajax
			}, 500);
		});

		function fetch() {
			var data = $('#keyword').val(); 
			jQuery.ajax({
				url: '<?php echo admin_url('admin-ajax.php'); ?>',
				type: 'post',
				data: {
					action: 'data_fetch',
					keyword: data
				},
				success: function(data) {
					jQuery('#datafetch').html(data);
					$('.Bottom-giaodien').hide();
				},
				error: function(jqXHR, textStatus, errorThrown) {
					console.log('Không Tìm Thấy Kết Quả');

					alert('Không Tìm Thấy Kết Quả');
				},
				complete: function() {

					console.log('AJAX call completed');
				},
			});

		}
	</script>

	<?php
}


// the ajax function
add_action('wp_ajax_data_fetch', 'data_fetch');
add_action('wp_ajax_nopriv_data_fetch', 'data_fetch');
function data_fetch()
{
	if (isset($_POST['keyword'])) :;
		$the_query = new WP_Query(array('posts_per_page' => 13, 's' => esc_attr($_POST['keyword']), 'post_type' => 'du-an'));
		$check = $the_query->have_posts();
		$data = $_POST['keyword'];
		if ($the_query->have_posts()) :
			$stt = 1;
			while ($the_query->have_posts()) : $the_query->the_post(); ?>

				<div class="item-grid-box" id="item-<?php echo $stt ?>">
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
							<p>150,000VNĐ</p>
						</div>
					</div>
				</div>

<?php $stt++;
			endwhile;
			wp_reset_postdata();
		elseif ($check == 0) :
			echo '<div class="none-result">Không Tìm Thấy Kết Quả Cho ' . $data . '</div>';
		endif;
	endif;
	die();
}
