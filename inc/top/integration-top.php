<?php
$inc_root = 'inc/top/top';
?>
<div class="jumbotron">
  <div class="jumbotron__inner">
    <div class="jumbotron__message">
      <figure><img src="<?php echo temp_add('img/global') ?>/brand-igislandfes-2019-full-white.svg" alt="IG ISLAND FES 2019 in Ishigaki"></figure>
      <h1>2019.10.20.SUN＠石垣市新栄公園多目的広場特設会場<br>
      石垣優良ダイビングサイト 島ぽよ presents</h1>
      <h2>IG ISLAND FES 2019 in Ishigaki<br>
        開催決定!!</h2>
    </div>
  </div>
</div>
<div class="global-section">
  <div class="news-top">
    <div class="news-top__header function-title">
      <h2 class="function-title__title">News</h2>
      <div class="function-title__menu">
        <ul>
          <li><a href="#">Read More</a></li>
          <li><a href="#">RSS</a></li>
        </ul>
      </div>
    </div>
    <div class="news-slick">
      <div class="news-slick__cell news-card">
        <a href="#">
          <p>2019.00.00</p>
          <h3>ニュースタイトルニュースタイトルニュースタイトルニュースタイトル</h3>
        </a>
      </div>
      <div class="news-slick__cell news-card">
        <a href="#">
          <p>2019.00.00</p>
          <h3>ニュースタイトルニュースタイトルニュースタイトルニュースタイトル</h3>
        </a>
      </div>
      <div class="news-slick__cell news-card">
        <a href="#">
          <p>2019.00.00</p>
          <h3>ニュースタイトルニュースタイトルニュースタイトルニュースタイトル</h3>
        </a>
      </div>
      <div class="news-slick__cell news-card">
        <a href="#">
          <p>2019.00.00</p>
          <h3>ニュースタイトルニュースタイトルニュースタイトルニュースタイトル</h3>
        </a>
      </div>
      <div class="news-slick__cell news-card">
        <a href="#">
          <p>2019.00.00</p>
          <h3>ニュースタイトルニュースタイトルニュースタイトルニュースタイトル</h3>
        </a>
      </div>
      <div class="news-slick__cell news-card">
        <a href="#">
          <p>2019.00.00</p>
          <h3>ニュースタイトルニュースタイトルニュースタイトルニュースタイトル</h3>
        </a>
      </div>
      <div class="news-slick__cell news-card">
        <a href="#">
          <p>2019.00.00</p>
          <h3>ニュースタイトルニュースタイトルニュースタイトルニュースタイトル</h3>
        </a>
      </div>
    </div>
    <div class="news-top__footer">
      <p><a href="#">Read More</a></p>
    </div>
    <script>
    $('.news-slick').slick({
      dots: true,
      infinite: false,
      speed: 300,
      slidesToShow: 3,
      slidesToScroll: 3,
      dots: false,
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
          <figure class="top-contents-card__photo"><img src="<?php echo temp_add('img') ?>/istockphoto-515645702-2048x2048.jpg" alt=""></figure>
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