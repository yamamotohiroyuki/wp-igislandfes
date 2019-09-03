
<div class="contents-main">
  <div class="contents-main__inner">
    <div class="contents-style">
      
      <div class="news-archive">
        <div class="archive-list">
          <ul>
            <?php
            if ( have_posts() ) :
              while ( have_posts() ) :
                the_post();
                get_template_part( 'inc/news/archive' , 'cell');
              endwhile;
            else :
              get_template_part( 'inc/news/archive' , 'cell-none');
            endif;
            ?>
          </ul>
        </div>
      </div>
      
      
    </div>
  </div>
</div>