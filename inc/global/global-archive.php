<div class="global-archive">
  <h2 class="big-title">
    <span class="big-title__en">What's New</span>
    <span class="big-title__ja">最新情報</span>
  </h2>
  <div class="archive-list">
    <ul>
    <?php
    $args = array(
      'post_type' => array('post'),
      'posts_per_page' => 5 
    );
    $the_query = new WP_Query( $args );
    if ( $the_query->have_posts() ) :
      while ( $the_query->have_posts() ) : $the_query->the_post();
      get_template_part( 'inc/news/archive' , 'cell');
      endwhile;
    endif;
    wp_reset_postdata();
    ?>
    </ul>
  </div><!-- / .archive-list -->
  <p class="global-archive__button"><a href="<?php
    echo get_permalink( get_page_by_path( 'news' )->ID );
  ?>" class="link-button is-primary"><span>More</span></a></p>
</div><!-- / .global-archive -->