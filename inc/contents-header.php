<?php
if(is_page('about')):
  $parent_id = $post->ancestors[count($post->ancestors) - 1]; 
  $title_en = get_the_title($parent_id);
  $title_ja = get_the_title($page_id);
?>
<div class="contents-header">
  <div class="contents-header__inner title-set">
    <p class="title-set__parent-title"><?php echo $title_en; ?></p>
    <h1 class="title-set__title"><?php echo $title_ja; ?></h1>
  </div>
  <div class="contents-header__brand">
    <p><img src="<?php echo temp_add('img/global') ?>/brand-igislandfes-2019-full-white.svg" alt="IG ISLAND FES 2019 in Ishigaki"></p>
  </div>
</div>

<?php
  elseif(is_page('entry-professional') || is_page('entry-general') ||is_page('entry-general', 'entry-usual')):
?>
<div class="contents-header">
  <div class="contents-header__inner title-set">
    <p class="title-set__parent-title">YDA presents IG ISLAND FES. 2019 by 島ぽよPhoto Contest</p>
    <h1 class="title-set__title"><?php the_title(); ?></h1>
  </div>
</div>
<?php
elseif(is_news() || is_page('news')):
?>
<div class="contents-header">
  <div class="contents-header__inner title-set">
    <p class="title-set__parent-title">LATEST NEWS</p>
    <h1 class="title-set__title">最新のお知らせ</h1>
  </div>
</div>
<?php
elseif(is_page()):
?>
<div class="contents-header">
  <div class="contents-header__inner title-set">
    <?php
      $page_id = get_the_ID();
      if ( is_page() && $post->post_parent ):
        // 子ページのときの処理
        $parent_id = $post->ancestors[count($post->ancestors) - 1];
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
  </div>
</div>
<?php
else:
?>

<?php
endif;
?>