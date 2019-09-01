<?php

//パンくずリスト部品
function breadcrumb_list($url, $title) {
  $itemscope = 'itemscope itemtype="http://data-vocabulary.org/Breadcrumb"';
  $prop_url = 'itemprop="url"';
  $prop_title = 'itemprop="title"';

  $breadcrumb_li = '<li ' . $itemscope . '><a href="'. $url .'" ' . $prop_url . '><span ' . $prop_title . '>' . $title.'</span></a></li>';
  return $breadcrumb_li;
}
//パンくずリスト部品_ページ
function breadcrumb_list_page($page_id) {
  $breadcrumb_li = breadcrumb_list( get_permalink($page_id), get_the_title($page_id) );
  return $breadcrumb_li;
}
//パンくずリスト部品_カテゴリ
function breadcrumb_list_category($category_id) {
  $breadcrumb_li = breadcrumb_list( get_category_link($category_id), get_cat_name($category_id) );
  return $breadcrumb_li;
}
//パンくずリスト部品_カテゴリ
function breadcrumb_list_term( $term_id, $term_taxonomy ) {
  $term = get_term( $term_id, $term_taxonomy );
  $term_name = $term->name;
  $breadcrumb_li = breadcrumb_list( get_term_link($term_id), $term_name );
  return $breadcrumb_li;
}
//パンくずリスト部品_おしり
function breadcrumb_list_hip($title) {
  $breadcrumb_li = '<li>' . $title . '</li>';
  return $breadcrumb_li;
}
// パンくずリスト
function breadcrumb(){
  if(is_archive()):
    //カテゴリ・タグ・カスタムタクソノミー オブジェクトを取得
    $term = get_current_term();
  endif;

  global $post;
  $str ='';
  $home_name = 'ホーム';
  
  if(is_front_page()):
  else:
    $str.= '<ol>';
    $str.= breadcrumb_list( get_bloginfo( 'url' ), $home_name );
    if(is_blog() || is_tag() || is_category() || is_page(23) ):
      if(is_home()):
        $str.= breadcrumb_list_hip(get_the_title(23));
      else:
        ///$str.= breadcrumb_list_page(5);
      endif;

      if(is_tag()):

        $str.= breadcrumb_list_hip( $term->name);

      elseif(is_category()):

        $cat = get_queried_object();
        if($cat -> parent != 0) :
          $ancestors = array_reverse(get_ancestors( $cat -> cat_ID, 'category' ));
          foreach($ancestors as $ancestor):
            $str.= breadcrumb_list_category($ancestor);
          endforeach;
        endif;

        $str.= breadcrumb_list_hip( $cat-> cat_name);

      elseif(is_single()):

        $tax = "category";
  /*
        $categories = get_the_terms( $post->ID, $tax );
        $cat_id   = $categories[0]->term_id;
        $str.= breadcrumb_list_category( $cat_id );*/
        $str.= breadcrumb_list_hip( get_the_title() );

      endif;

    endif;

    if(is_page()):
      if($post -> post_parent != 0 ) :

        $ancestors = array_reverse( get_post_ancestors( $post->ID ) );
        foreach($ancestors as $ancestor){
          $replacement = get_post_meta( $ancestor, 'fake_top', true );
          if($replacement != ""):
            $link_id = $replacement;
          else:
            $link_id = $ancestor;
          endif;
          $str.= breadcrumb_list( get_permalink( $link_id ), get_the_title( $ancestor ) );
        }
      endif;
      $str.= breadcrumb_list_hip( get_the_title() );
    endif;


    $str.='</ol>';
  endif;

  return $str;
}


?>