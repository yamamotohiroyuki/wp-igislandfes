<footer class="global-footer">
  <div class="global-footer__header">
    <p class="global-footer__brand"><a href="<?php echo home_url() ?>"><img src="<?php echo temp_add('img/global') ?>/brand-igislandfes-2019-full-white.svg" alt="IG ISLAND FES 2019 in Ishigaki"></a></p>
    
    <nav class="global-footer__navigation">
      <?php
      $args = array(
        'post_type' => array('page'),
        'order' => 'ASC',
        'orderby' => 'menu_order',
        'meta_query' => array(
          array(
            'key' => 'footer_menu_parade',
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
      <ul>
        <li><?php echo global_menu_page_link($page_id, $global_menu_name); ?></li>
      </ul>
      <?php
        endwhile;
      endif;
      wp_reset_postdata();
      ?>
    </nav><!-- / .global-navigation -->
    
    <nav class="global-footer__sns">
      <ul>
        <li><a href="https://www.facebook.com/<?php the_field('link_facebook','option'); ?>/" class="global-footer__sns--facebook" target="_blank"></a></li>
      </ul>
    </nav><!-- / .global-footer__sns -->
  </div><!-- / .global-footer__header -->
  <div class="global-footer__data">
    <p class="global-copyright"><small>&copy; IG ISLAND FES All Rights Reserved.</small></p>
  </div><!-- / .global-footer__data -->
</footer><!-- / .global-footer -->