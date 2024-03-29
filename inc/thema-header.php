<header class="global-header">
  <div class="global-header__header">
    <h1 class="global-brand">
      <a href="/">
        <svg class="brand-mark" viewBox="0 0 320 60">
          <use class="svg-ig-island-brand" xlink:href="#svg-ig-island-brand"></use>
        </svg>
      </a>
    </h1>
    <button class="global-header__trigger js-globalmenu-trigger">
      <span class="hamburger-icon">
        <span class="hamburger-icon__bar hamburger-icon__bar--1"></span><!-- / .hamburger-icon__bar hamburger-icon__bar--1 -->
        <span class="hamburger-icon__bar hamburger-icon__bar--2"></span><!-- / .hamburger-icon__bar hamburger-icon__bar--2 -->
        <span class="hamburger-icon__bar hamburger-icon__bar--3"></span><!-- / .hamburger-icon__bar hamburger-icon__bar--3 -->
      </span><!-- / .hamburger-icon -->
    </button><!-- / .global-header__trigger js-globalmenu-trigger -->
  </div><!-- / .global-header__header -->
  
  <nav class="global-navigation">
    <div class="global-navigation__main">
    <?php
    $args = array(
      'post_type' => array('page'),
      'order' => 'ASC',
      'orderby' => 'menu_order',
      'meta_query' => array(
        array(
          'key' => 'menu_parade',
          'value' => true
        )
      )
    );
    $the_query = new WP_Query( $args );
    if ( $the_query->have_posts() ) :
      while ( $the_query->have_posts() ) : $the_query->the_post();
      $page_id = get_the_ID();
      $global_menu_name = get_field('global_menu_name', $page_id);
    ?>
      <dl>
        <dt><?php
          echo global_menu_page_link($page_id, $global_menu_name);
          // 指定したIDの子ページ一覧を表示
          $children = wp_list_pages(array( // 固定ページのリストの取得
            'title_li' => '', // 見出しを非表示
            'child_of' => $page_id, // 固定ページのIDを指定
            'echo' => '0' // PHP で使うために HTML テキストとして返す
          ));
        ?></dt>
        <?php
          if($children): // 子ページがあれば一覧を表示
            echo '<dd><ul>';
            echo $children;
            echo '</ul></dd>';
          endif;
        ?>
        </dl>
    <?php
      endwhile;
    endif;
    wp_reset_postdata();
    ?>
    </div>
    <div class="global-navigation__sns">
      <p><a href="https://docs.google.com/forms/d/e/<?php the_field('link_googleform','option'); ?>" class="global-header__sns--contact" target="_blank"></a></p><!-- / .global-footer__sns -->
      <p><a href="https://www.facebook.com/<?php the_field('link_facebook','option'); ?>/" class="global-header__sns--facebook" target="_blank"></a></p><!-- / .global-footer__sns -->
    </div>
  </nav><!-- / .global-navigation -->
</header><!-- / .global-header -->
