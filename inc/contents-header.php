<div class="contents-header">
  <div class="contents-header__inner title-set">
    <?php
    if(is_news() || is_page('news')):
    ?>
    <p class="title-set__parent-title">LATEST NEWS</p>
    <h1 class="title-set__title">最新のお知らせ</h1>
    <?php
    
    elseif(is_page()):
      $page_id = get_the_ID();
      if ( is_page() && $post->post_parent ):
        // 子ページのときの処理
        $parent_id = $post->post_parent;
        $title_en = get_the_title($parent_id);
        $title_ja = get_the_title($page_id);
      else:
        // 子ページではないときの処理
        $title_en = get_the_title($page_id);
        $title_ja = get_field('title_ja', $page_id);
      endif;
    ?>
    <p class="title-set__parent-title"><?php echo $title_en; ?></p>
    <h1 class="title-set__title"><?php echo $title_ja; ?></h1>
    <?php
    else:
    endif;
    ?>
  </div>
</div>