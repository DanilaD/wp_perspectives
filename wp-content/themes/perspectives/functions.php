<?php
/**
 * Created by PhpStorm.
 * User: Danila
 * Date: 2/24/2018
 * Time: 3:36 PM
 */

    add_theme_support( 'post-thumbnails' );

    add_theme_support( 'title-tag' );

    if ( ! function_exists( 'perspectives_setup' ) ) :

        function perspectives_setup(){
            register_nav_menus(array(
                'primary' => __('Primary Menu', 'perspectives'),
                'social' => __('Social Links Menu', 'perspectives'),
            ));
        }

    endif;

    add_action( 'after_setup_theme', 'perspectives_setup' );

    function new_excerpt_length($length) {
        return 30;
    }
    add_filter('excerpt_length', 'new_excerpt_length');

    function theme_perspectives_scripts() {
        wp_enqueue_style( 'perspectives_js', get_stylesheet_uri() );

        wp_enqueue_style( 'perspectives_css', get_stylesheet_uri() );
        wp_enqueue_style( 'css_bootstrap.min', get_stylesheet_directory_uri() . "/assets/bootstrap/css/bootstrap.min.css", array( 'perspectives_css' )  );
        wp_enqueue_style( 'css_font-awesome.min', get_stylesheet_directory_uri() . "/assets/fonts/font-awesome.min.css", array( 'perspectives_css' )  );
        wp_enqueue_style( 'css_user.css', get_stylesheet_directory_uri() . "/assets/css/user.css", array( 'perspectives_css' )  );
        wp_enqueue_style( 'css_untitled.css', get_stylesheet_directory_uri() . "/assets/css/untitled.css", array( 'perspectives_css' )  );

        wp_enqueue_script( 'script-jquery.min', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), '', true );
        wp_enqueue_script( 'script-bootstrap.min', get_template_directory_uri() . '/assets/bootstrap/js/bootstrap.min.js', array(), '', true );
    }
    add_action( 'wp_enqueue_scripts', 'theme_perspectives_scripts' );

function perspectives_social_links_icons() {
    // Supported social links icons.
    $social_links_icons = array(
        'behance.net'     => 'behance',
        'codepen.io'      => 'codepen',
        'deviantart.com'  => 'deviantart',
        'digg.com'        => 'digg',
        'docker.com'      => 'dockerhub',
        'dribbble.com'    => 'dribbble',
        'dropbox.com'     => 'dropbox',
        'facebook.com'    => 'facebook',
        'flickr.com'      => 'flickr',
        'foursquare.com'  => 'foursquare',
        'plus.google.com' => 'google-plus',
        'github.com'      => 'github',
        'instagram.com'   => 'instagram',
        'linkedin.com'    => 'linkedin',
        'mailto:'         => 'envelope-o',
        'medium.com'      => 'medium',
        'pinterest.com'   => 'pinterest-p',
        'pscp.tv'         => 'periscope',
        'getpocket.com'   => 'get-pocket',
        'reddit.com'      => 'reddit-alien',
        'skype.com'       => 'skype',
        'skype:'          => 'skype',
        'slideshare.net'  => 'slideshare',
        'snapchat.com'    => 'snapchat-ghost',
        'soundcloud.com'  => 'soundcloud',
        'spotify.com'     => 'spotify',
        'stumbleupon.com' => 'stumbleupon',
        'tumblr.com'      => 'tumblr',
        'twitch.tv'       => 'twitch',
        'twitter.com'     => 'twitter',
        'vimeo.com'       => 'vimeo',
        'vine.co'         => 'vine',
        'vk.com'          => 'vk',
        'wordpress.org'   => 'wordpress',
        'wordpress.com'   => 'wordpress',
        'yelp.com'        => 'yelp',
        'youtube.com'     => 'youtube',
    );

    return apply_filters( 'perspectives_social_links_icons', $social_links_icons );
}

    function perspectives_nav_menu_social_icons( $item_output, $item, $depth, $args ) {
        // Get supported social icons.
        $social_icons = perspectives_social_links_icons();

        // Change SVG icon inside social links menu if there is supported URL.
        if ( 'social' === $args->theme_location ) {
            foreach ( $social_icons as $attr => $value ) {
                if ( false !== strpos( $item_output, $attr ) ) {
                    $item_output = str_replace( $args->link_after, '</span>' . perspectives_get_svg( array( 'icon' => esc_attr( $value ) ) ), $item_output );
                }
            }
        }

        return $item_output;
    }
    add_filter( 'walker_nav_menu_start_el', 'perspectives_nav_menu_social_icons', 10, 4 );

?>
