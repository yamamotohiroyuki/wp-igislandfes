
<div class="global-section">
  <div class="news-top">
    <div class="news-top__header function-title">
      <h2 class="function-title__title">News</h2>
      <div class="function-title__menu">
        <ul>
          <li><a href="<?php
            $page = get_page_by_path('news');
            echo get_permalink( $page->ID );
            ?>">View All</a></li>
        </ul>
      </div>
    </div>
    <div class="news-slick">
      <?php
      $args = array(
        'post_type' => array('post')
      );
      $the_query = new WP_Query( $args );
      if ( $the_query->have_posts() ) :
        while ( $the_query->have_posts() ) : $the_query->the_post();
      ?>
      
      <div class="news-slick__cell news-card">
        <a href="<?php echo get_permalink(); ?>" class="news-card__wrap">
          <figure class="news-card__photo"><?php
            if(has_post_thumbnail()):
              the_post_thumbnail('news_thumbnail');
            else:
              echo '<img src="'. temp_add('img/global') .'/news_thumbnail_blank.png" alt="'.get_the_title().'">';
            endif;
            ?></figure>
          <div class="news-card__body">
            <p><time datetime="<?php echo get_the_date( 'Y-m-d' ); ?>"><?php echo get_the_date( 'Y.m.d' ); ?></time></p>
            <h3><?php echo get_the_title(); ?></h3>
          </div>
        </a>
      </div>
      
      <?php
        endwhile;
      endif;
      wp_reset_postdata();
      ?>
    </div>
    <div class="news-top__footer">
      <p><a href="#">View All</a></p>
    </div>
    <script>
    $('.news-slick').slick({
      infinite: false,
      speed: 300,
      slidesToShow: 3,
      slidesToScroll: 3,
      dots: false,
      adaptiveHeight: false,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: true,
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });
    </script>
  </div>
</div>
