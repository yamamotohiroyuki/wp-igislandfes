<?php

$parent_func = get_parent_theme_file_path() . '/function_inc';
$child_func = get_stylesheet_directory() . '/function_inc';
// 子テーマ用のスクリプト
include( $child_func . '/func-child_basic.php');

// パンくず用
include( $child_func . '/func-breadcrumb_list.php');

// スタイル・スクリプト
include( $child_func . '/func-stylescripts.php');

// 投稿のリネーム
function rename_text(){ return "ニュース"; } //ここに変えたい名前を入れる def「投稿」
include( $parent_func . '/func-post_rename.php');

//画像サイズ追加
include( $child_func . '/func-add_imagesize.php');

// ブログ
function is_news() {
  global  $post;
  $posttype = get_post_type($post);
  return ( ( is_home() || is_archive() || is_author() || is_category() || is_tag() || is_author() || is_single() ) && ( $posttype == 'post') || is_page('news') ) ? true : false;
}


//テンプレートアドレス
function assets_add($assets_type) {
  $assets_src = get_stylesheet_directory_uri().'/assets';
  if($assets_type == ''):
    $assets_type_add = $assets_src;
  else:
    $assets_type_add = $assets_src.'/'.$assets_type;
  endif;
  return $assets_type_add;
}


/*【管理画面】ACF Options Page の設定 */
if( function_exists('acf_add_options_page') ) {
  acf_add_options_page(array(
    'page_title' => '共通設定', // ページタイトル
    'menu_title' => '共通設定', // メニュータイトル
    'menu_slug' => 'theme-general-setting', // メニュースラッグ
    'capability' => 'edit_posts',
    'redirect' => false
  ));
  
  acf_add_options_sub_page(array( // 子ページ
    'page_title' 	=> 'Drone Shot Settings', // ページタイトル
    'menu_title'	=> 'Drone Shot', // メニュータイトル
    'parent_slug'	=> 'theme-general-setting', // 親メニューのスラッグ
  ));
  
  acf_add_options_sub_page(array( // 子ページ
    'page_title' 	=> 'Drone Rental Settings', // ページタイトル
    'menu_title'	=> 'Drone Rental', // メニュータイトル
    'parent_slug'	=> 'theme-general-setting', // 親メニューのスラッグ
  ));
  acf_add_options_sub_page(array( // 子ページ
    'page_title' 	=> 'field group set', // ページタイトル
    'menu_title'	=> 'Field Group', // メニュータイトル
    'parent_slug'	=> 'theme-general-setting', // 親メニューのスラッグ
  ));
  
}

/*【管理画面】ACF Options Page の設定 *//*
if( function_exists('acf_add_options_page') ) {
  acf_add_options_page(array( // 親ページ
    'page_title' 	=> 'Theme General Settings', // ページタイトル
    'menu_title'	=> 'Theme Settings', // メニュータイトル
    'menu_slug' 	=> 'theme-general-settings', // メニュースラッグ
    'capability'	=> 'edit_posts',
    'redirect'		=> false
  ));
  acf_add_options_sub_page(array( // 子ページ
    'page_title' 	=> 'Theme Header Settings', // ページタイトル
    'menu_title'	=> 'Header', // メニュータイトル
    'parent_slug'	=> 'theme-general-settings', // 親メニューのスラッグ
  ));
  acf_add_options_sub_page(array( // 子ページ
    'page_title' 	=> 'Theme Footer Settings', // ページタイトル
    'menu_title'	=> 'Footer', // メニュータイトル
    'parent_slug'	=> 'theme-general-settings', // 親メニューのスラッグ
  ));
}*/


// Global menu 吐き出し（固定ページ）
function global_menu_page_link($page_id, $pagetitle) {

  //カスタムフィールドの判定
  $replacement = get_field('replacement',$page_id);
  
  $page = get_page($page_id);

  if($pagetitle != ""):
    $page_title = $pagetitle;
  else:
    $page_title = get_the_title($page);
  endif;

  if($replacement != ""):
    $page_link = get_page_link($replacement);
  else:
    $page_link = get_page_link($page_id);
  endif;

  $post_slug_class = "is-".$page->post_name;

  $gm_link = '<a href="'.$page_link.'" class="js-same-category ' . $post_slug_class . ' parent-pageid-' . $page_id .'"><span>'.$page_title.'</span></a>';

  return $gm_link;
}

//固定ページリンク吐き出し
function simple_page_link($page_id, $pagetitle) {
  $now_url = get_current_link();
  //カスタムフィールドの判定
  $page = get_page($page_id);

  if($pagetitle != ""):
    $page_title = $pagetitle;
  else:
    $page_title = get_the_title($page);
  endif;

  $page_link = get_page_link($page_id);
  
  if( strpos($now_url,$page_link) !== false ):
    $classname = 'is-current';
  else:
    $classname = '';
  endif;

  $simple_link = '<a href="'.$page_link.'" class="' . $classname . '">'.$page_title.'</a>';
  return $simple_link;
}


//カテゴリリンク吐き出し
function simpleCategoryLink($category_id) {

  $mes =  get_category( $category_id );

  $cattitle = ' '.$mes->name;
  $catid = ' page-id-'.$mes->ID;

  $simple_category_link = '<a href="'.get_category_link($category_id) . '" class="current-group' . $cat_slug_class . $catid . '" title="' . $cattitle . '"><span>'.$cattitle.'</span></a>';

  return $simple_category_link;
}
//タグリンク吐き出し
function simpleTagLink($tag_id) {

  $mes =  get_tag( $tag_id );

  $tagtitle = $mes->name;

  $simple_tag_link = '<a href="'.get_tag_link($tag_id) . '" title="' . $tagtitle . '">'.$tagtitle.'</a>';
  return $simple_tag_link;
}
//タグテキスト吐き出し
function simpleTagText($tag_id) {

  $mes =  get_tag( $tag_id );

  $tagtitle = $mes->name;

  $simple_tag_tex = $tagtitle;
  return $simple_tag_tex;
}



// ウィジェット
include( $child_func . '/func-widgets.php');
// ショートコード
include( $child_func . '/func-shortcode.php');


