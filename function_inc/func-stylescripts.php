<?php

//スクリプト・スタイルの読み込み
function add_child_scripts() {

  $childrooter = get_stylesheet_directory_uri();
  $googlefont = 'https://fonts.googleapis.com';
  $cdnjs_libs = '//cdnjs.cloudflare.com/ajax/libs';

  $assets_assets = $childrooter.'/assets';

  $assets_css = $assets_assets.'/css';
  $assets_js = $assets_assets.'/js';
  $assets_vendor = $assets_assets.'/vendor';
  $assets_basic_assets = $assets_vendor.'/basic-assets';
  
  $verdate = date("Y.m.d.H");
  
  
  wp_enqueue_script('YTPlayer', $assets_vendor.'/jquery.mb.YTPlayer.min.js', array(), $verdate, true);
  wp_enqueue_script('modaal', $assets_vendor.'/modaal/js/modaal.min.js', array(), $verdate, true);
  
  wp_enqueue_script('moment', $cdnjs_libs.'/moment.js/2.22.2/moment.min.js', array(), $verdate, true);
  wp_enqueue_script('jquery-rss', $cdnjs_libs.'/jquery-rss/3.3.0/jquery.rss.js', array(), $verdate, true);
  
  wp_enqueue_script('global', $assets_js.'/global.js', array(), $verdate, true);
  
  //css
  wp_enqueue_style ( 'google-fonts', $googlefont.'/css?family=Montserrat:400,700&display=swap');
  wp_enqueue_style ( 'fontawesome-brands', $assets_vendor.'/fontawesome-brands/css/brands.min.css');
  
  wp_enqueue_style ( 'global', $assets_css.'/global.css', array(), $verdate);
  
  
}
add_action('wp_enqueue_scripts', 'add_child_scripts');

