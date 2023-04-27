<?php 
function wpb_categories_menu() {
    register_nav_menu('categories-menu',__( 'Categories Menu' ));
  }
  add_action( 'init', 'wpb_categories_menu' );

