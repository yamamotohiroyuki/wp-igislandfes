<div class="global-section">
  <div class="top-contents-list">
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
      $global_menu_name = get_the_title($page_id);
      $global_menu_name_ja = get_field('title_ja', $page_id);
      $page_link = get_page_link($page_id);
    ?>
    
    <div class="top-contents-list__cell">
      <div class="top-contents-card">
        <a href="<?php echo $page_link; ?>">
          <figure class="top-contents-card__photo"><?php the_post_thumbnail('contents_thumbnail'); ?></figure>
          <div class="top-contents-card__body">
            <h2><?php echo $global_menu_name; ?></h2>
            <p><?php echo $global_menu_name_ja; ?></p>
          </div>
        </a>
      </div>
    </div>
    <?php
      endwhile;
    endif;
    wp_reset_postdata();
    ?>
  </div>
</div>