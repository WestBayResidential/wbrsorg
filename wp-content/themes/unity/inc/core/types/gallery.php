<?php
 /**
  * $Desc
  *
  * @version    $Id$
  * @package    wpbase
  * @author     Opal  Team <opalwordpressl@gmail.com >
  * @copyright  Copyright (C) 2014 wpopal.com. All Rights Reserved.
  * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
  *
  * @website  http://www.wpopal.com
  * @support  http://www.wpopal.com/support/forum.html
  */
if(!function_exists('wpo_create_type_gallery')){
    function wpo_create_type_gallery(){
      $labels = array(
          'name'               => __( 'Gallerys', TEXTDOMAIN ),
          'singular_name'      => __( 'Gallery', TEXTDOMAIN ),
          'add_new'            => __( 'Add New Gallery', TEXTDOMAIN ),
          'add_new_item'       => __( 'Add New Gallery', TEXTDOMAIN ),
          'edit_item'          => __( 'Edit Gallery', TEXTDOMAIN ),
          'new_item'           => __( 'New Gallery', TEXTDOMAIN ),
          'view_item'          => __( 'View Gallery', TEXTDOMAIN ),
          'search_items'       => __( 'Search Gallerys', TEXTDOMAIN ),
          'not_found'          => __( 'No Gallerys found', TEXTDOMAIN ),
          'not_found_in_trash' => __( 'No Gallerys found in Trash', TEXTDOMAIN ),
          'parent_item_colon'  => __( 'Parent Gallery:', TEXTDOMAIN ),
          'menu_name'          => __( 'Opal Gallerys', TEXTDOMAIN ),
      );

      $args = array(
          'labels'              => $labels,
          'hierarchical'        => true,
          'description'         => 'List Gallery',
          'supports'            => array( 'title', 'editor', 'author', 'thumbnail','excerpt','custom-fields' ), //page-attributes, post-formats
          'taxonomies'          => array( 'gallery_category','skills','post_tag' ),
          'public'              => true,
          'show_ui'             => true,
          'show_in_menu'        => true,
          'menu_position'       => 5,
          'menu_icon'           => WPO_FRAMEWORK_ADMIN_IMAGE_URI.'icon/admin_ico_gallery.png',
          'show_in_nav_menus'   => false,
          'publicly_queryable'  => true,
          'exclude_from_search' => false,
          'has_archive'         => true,
          'query_var'           => true,
          'can_export'          => true,
          'rewrite'             => true,
          'capability_type'     => 'post'
      );
      register_post_type( 'gallery', $args );

      //Add Port folio Skill
      // Add new taxonomy, make it hierarchical like categories
      //first do the translations part for GUI
      $labels = array(
        'name'              => __( 'Categories', TEXTDOMAIN ),
        'singular_name'     => __( 'Category', TEXTDOMAIN ),
        'search_items'      => __( 'Search Category',TEXTDOMAIN ),
        'all_items'         => __( 'All Categories',TEXTDOMAIN ),
        'parent_item'       => __( 'Parent Category',TEXTDOMAIN ),
        'parent_item_colon' => __( 'Parent Category:',TEXTDOMAIN ),
        'edit_item'         => __( 'Edit Category',TEXTDOMAIN ),
        'update_item'       => __( 'Update Category',TEXTDOMAIN ),
        'add_new_item'      => __( 'Add New Category',TEXTDOMAIN ),
        'new_item_name'     => __( 'New Category Name',TEXTDOMAIN ),
        'menu_name'         => __( 'Categories',TEXTDOMAIN ),
      );
      // Now register the taxonomy
      register_taxonomy('gallery_category',array('gallery'),
          array(
              'hierarchical'      => true,
              'labels'            => $labels,
              'show_ui'           => true,
              'show_admin_column' => true,
              'query_var'         => true,
              'show_in_nav_menus' => false,
              'rewrite'           => array( 'slug' => 'skills'
          ),
      ));
  }
  add_action( 'init','wpo_create_type_gallery' );
}