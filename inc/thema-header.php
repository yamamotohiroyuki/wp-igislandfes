<header class="global-header">
  <div class="global-header__header">
    <h1 class="global-brand"><a href="/"><img src="<?php echo temp_add('img/global') ?>/brand-igislandfes-2019.svg" alt="IG ISLAND FES 2019 in Ishigaki"></a></h1>
    <button class="global-header__trigger js-globalmenu-trigger">
      <span class="hamburger-icon">
        <span class="hamburger-icon__bar hamburger-icon__bar--1"></span><!-- / .hamburger-icon__bar hamburger-icon__bar--1 -->
        <span class="hamburger-icon__bar hamburger-icon__bar--2"></span><!-- / .hamburger-icon__bar hamburger-icon__bar--2 -->
        <span class="hamburger-icon__bar hamburger-icon__bar--3"></span><!-- / .hamburger-icon__bar hamburger-icon__bar--3 -->
      </span><!-- / .hamburger-icon -->
    </button><!-- / .global-header__trigger js-globalmenu-trigger -->
  </div><!-- / .global-header__header -->
  
  <nav class="global-navigation">
    <ul>
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
      <li><?php
        echo global_menu_page_link($page_id, $global_menu_name);
      ?></li>
    <?php
      endwhile;
    endif;
    wp_reset_postdata();
    ?>
    </ul>
  </nav><!-- / .global-navigation -->
  
</header><!-- / .global-header -->