<div class="contents-header">
  <div class="contents-header__inner">
    <?php
    if(is_news()):
    ?>
    <h1>ニュース</h1>
    <?php
      if(is_home()):
        echo 'is_home';
      elseif(is_single()):
      $postcat = get_the_category();
      $post_cat_name = $postcat[0]->name;
      $post_cat_id = $postcat[0]->term_id;
      ?>
    <p class="contents-header__data">
      <span class="contents-header__data-date"><time datetime="<?php echo get_the_date( 'Y-m-d' ); ?>"><?php echo get_the_date( 'Y.m.d' ); ?></time></span>
      <span class="contents-header__data-sticker"><a href="<?php echo get_category_link( $post_cat_id ); ?>"><?php echo $post_cat_name; ?></a></span>
    </p>
    <h2><?php the_title(); ?></h2>
      <?php
      elseif(is_archive() || is_author() || is_category() || is_tag() ):
      $postcat = get_the_category();
      $post_cat_name = $postcat[0]->name;
      $post_cat_id = $postcat[0]->term_id;
      ?>
      <?php
        if(is_category() || is_tag()):
      ?>
    <h2 class="archive-title">「<?php echo single_term_title( '', false ); ?>」<span>の一覧</span></h2>
      <?php
        elseif(is_author()):
      ?>
    <h2 class="archive-title">「<?php echo get_queried_object()->data->display_name; ?>」<span>が書いた記事</span></h2>
      <?php
        elseif(is_archive()):
          if(is_date()):
            if(is_year()):
              $date_name = get_query_var('year');
            elseif(is_month()):
              $date_name = get_query_var('year').'.'.get_query_var('monthnum');
            elseif(is_day()):
              $date_name = get_query_var('year').'.'.get_query_var('monthnum').'.'.get_query_var('day');
            endif;
          endif;
      ?>
    <h2 class="archive-title is-title-en"><?php echo $date_name; ?> <span>Archives</span></h2>
      <?php
        endif;
      else:
        echo 'else';
      endif;
    elseif(is_404()):
    ?>
    <h1>ページが見つかりません</h1>
    <h2 class="is-title-en">Page Not Found <span>(404)</span></h2>
    <?php
    else:
    ?>
    <h1><?php the_title(); ?></h1>
    <?php
    endif;
    ?>
  </div>
</div>