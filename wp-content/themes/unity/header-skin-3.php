<?php
/**
 * $Desc
 *
 * @version    $Id$
 * @package    wpbase
 * @author     WPOpal  Team <wpopal@gmail.com, support@wpopal.com>
 * @copyright  Copyright (C) 2014 wpopal.com. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @website  http://www.wpopal.com
 * @support  http://www.wpopal.com/support/forum.html
 */
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width">
<?php
    global $wp_version;
    if ( version_compare( $wp_version, "4.1" ) < 0 ) { ?>
     <title><?php wp_title( '|', true, 'right' ); ?></title>
<?php } ?>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <!-- OFF-CANVAS MENU SIDEBAR -->
    <div id="wpo-off-canvas" class="wpo-off-canvas">
        <div class="wpo-off-canvas-body">
            <div class="wpo-off-canvas-header">
                <?php get_search_form(); ?>
                <button type="button" class="close btn btn-close" data-dismiss="modal">
                    <i class="fa fa-times"></i>
                </button>
                <div class="mobile-menu-header">
                    <?php _e('Menu',TEXTDOMAIN); ?>
                </div>
            </div>
            <nav class="navbar navbar-offcanvas navbar-static" role="navigation">
                <?php
                $args = array(
                    'theme_location'  => 'mainmenu',
                    'container_class' => 'navbar-collapse',
                    'menu_class'      => 'wpo-menu-top nav navbar-nav',
                    'fallback_cb'     => '',
                    'menu_id'         => 'main-menu-offcanvas',
                    'walker'          => new Wpo_Megamenu_Offcanvas()
                );
                wp_nav_menu($args);
                ?>
            </nav>
        </div>
    </div>
    <!-- //OFF-CANVAS MENU SIDEBAR -->

    <?php
        $meta_template = get_post_meta(get_the_ID(),'wpo_template',true);
    ?>

    <!-- START Wrapper -->
    <section class="wpo-wrapper <?php echo isset($meta_template['el_class']) ? $meta_template['el_class'] : '' ; ?>">
        <!-- Top bar -->
        <section id="wpo-topbar" class="wpo-topbar">
            <div class="topbar-inner">
                <div class="container">
                    <div class="topbar-mobile hidden-lg hidden-md">
                        <div class="pull-right">
                            <div class="active-mobile pull-left hidden-md">
                                <div class="navbar-header-topbar">
                                    <?php wpo_renderButtonToggle(); ?>
                                </div>
                            </div>

                            <div class="active-mobile pull-left search-popup">
                                <span class="fa fa-search"></span>
                                <div class="active-content">
                                    <?php get_search_form(); ?>
                                </div>
                            </div>
                            <div class="active-mobile pull-left setting-popup">
                                <span class="fa fa-user"></span>
                                <div class="active-content">
                                    <h3 class="white title"><?php _e('Settings',TEXTDOMAIN); ?></h3>
                                    <?php if(has_nav_menu( 'topmenu' )){ ?>
                                        <div class="pull-left">
                                            <?php
                                                $args = array(
                                                    'theme_location'  => 'topmenu',
                                                    'container_class' => '',
                                                    'menu_class'      => 'menu-topbar'
                                                );
                                                wp_nav_menu($args);
                                            ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="active-mobile pull-left cart-popup hidden">
                                <span class="fa fa-shopping-cart"></span>
                                <div class="active-content">
                                    <h3 class="white title">
                                        <?php _e('Shopping Bag',TEXTDOMAIN); ?>
                                    </h3>
                                    <div class="widget_shopping_cart_content"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
        </section>
        <!-- // Topbar -->
        <!-- HEADER -->
        <header id="wpo-header" class="wpo-header wpo-header-v3">
       
            <div class="container-inner header-wrap">
                <div class="container header-wrapper-inner">
                    <div class="row">
                        <!-- LOGO -->
                        <div class="logo-in-theme col-lg-3 col-md-2 col-sm-12 col-xs-12">
                            <?php if( wpo_theme_options('logo') ) { ?>
                            <div class="logo">
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                    <img src="<?php echo wpo_theme_options('logo'); ?>" alt="<?php bloginfo( 'name' ); ?>">
                                </a>
                            </div>
                            <?php } else { ?>
                                <div class="logo logo-theme">
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                         <img src="<?php echo get_template_directory_uri() . '/images/logo-home-3.png'; ?>" alt="<?php bloginfo( 'name' ); ?>" />
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="col-lg-9 col-md-10 col-sm-12 col-xs-12">
                            <div class="wpo-mainmenu-wrap">
                                <div class="mainmenu-content-wapper">
                                    <div class="mainmenu-content">
                                        <nav id="wpo-mainnav" data-duration="<?php echo wpo_theme_options('megamenu-duration',400); ?>" class="wpo-megamenu <?php echo wpo_theme_options('magemenu-animation','slide'); ?> animate navbar navbar-mega" role="navigation">
                                            <div class="navbar-header">
                                                <?php wpo_renderButtonToggle(); ?>
                                            </div><!-- //END #navbar-header -->
                                            <?php
                                                $args = array(  'theme_location' => 'mainmenu',
                                                                'container_class' => 'collapse navbar-collapse navbar-ex1-collapse',
                                                                'menu_class' => 'nav navbar-nav megamenu',
                                                                'fallback_cb' => '',
                                                                'menu_id' => 'main-menu',
                                                                'walker' => new Wpo_Megamenu());
                                                wp_nav_menu($args);
                                            ?>
                                        </nav>
                                    </div> 
                                </div>    
                            </div>   
                        </div>
                    </div>    
                </div>  
                <!-- // Setting -->
            </div>
        </header>
        <!-- //HEADER -->