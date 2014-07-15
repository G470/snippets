/* ----------------------- */
/* customized login-screen */
/* ----------------------- */

// logo
function gatonet_custom_login_logo() { ?>
    <style type="text/css">
        body.login div#login h1 a {
            background-image: url(<?php echo get_bloginfo( 'template_directory' ) ?>/img/logo-login.png);
            padding-bottom: 30px;
        }
    </style>
<?php }

add_action( 'login_enqueue_scripts', 'gatonet_custom_login_logo' );

// link
function gatonet_custom_login_logo_url() {
    return get_bloginfo( 'url' );
}

add_filter( 'login_headerurl', 'gatonet_custom_login_logo_url' );

// title
function gatonet_custom_login_logo_url_title() {
    return get_bloginfo( 'blogname' );
}

add_filter( 'login_headertitle', 'gatonet_custom_login_logo_url_title' );
