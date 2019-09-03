


<div class="contents-main">
  <div class="contents-main__inner">
    <div class="contents-style">
      
      <div class="news-single">
      <?php
      while ( have_posts() ) :
        the_post();
      ?>
      <div class="news-single__inner">
        <p class="news-date"><time datetime="<?php echo get_the_date( 'Y-m-d' ); ?>"><?php echo get_the_date( 'Y.m.d' ); ?></time></p>
        <h1 class="news-title"><?php echo get_the_title(); ?></h1>
        <?php
          if(has_post_thumbnail()):
        ?>
          <figure class="news-photo"><?php
              the_post_thumbnail('large');
            ?></figure>
        <?php
          endif;
        ?>
        <?php the_content(); ?>
      </div>
      <?php
      endwhile;
      ?>
    </div>
      
      
    </div>
  </div>
</div>