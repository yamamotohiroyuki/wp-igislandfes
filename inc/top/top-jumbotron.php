<div class="jumbotron">
  <div class="jumbotron__inner">
    <div class="jumbotron__message">
      <figure><img src="<?php echo temp_add('img/top') ?>/jumbotron-message.png" alt="2019.10.20.SUN＠石垣市新栄公園多目的広場特設会場 石垣優良ダイビングサイト 島ぽよ presents IG ISLAND FES 2019 in Ishigaki 開催決定!!"></figure>
    </div>
  </div>
  <div class="jumbotron__bg">
    <div class="jumbotron-slick">
      <?php
      if(have_rows('sliders')):
        while(have_rows('sliders')): the_row();
          $image_url = wp_get_attachment_image_src(get_sub_field('photo'), 'jumbotron');
      ?>
      <div class="jumbotron-slick__cell" style="background-image: url('<?php echo $image_url[0]; ?>')"></div>
      <?php
        endwhile;
      endif; ?>
    </div>
  
  </div>
  
  <div class="jumbotron-modal">
    <div class="jumbotron-modal-window">
      <p class="jumbotron-modal-window__close"><button class="js-modal-close">&#xea84;</button></p>
      <h2 class="shake-little">Pickup News</h2>
      
      <?php
      $args = array(
        'posts_per_page' => 1,
        'post_type' => array('post'),
        'meta_query' => array(
          array(
            'key' => 'pickup',
            'value' => true
          )
        )
      );
      $the_query = new WP_Query( $args );
      if ( $the_query->have_posts() ) :
        while ( $the_query->have_posts() ) : $the_query->the_post();
      ?>
      
      <h3><?php echo get_the_title(); ?></h3>
      <p class="shake-little"><a href="<?php echo get_permalink(); ?>">詳細はこちら</a></p>
      
      
      <?php
        endwhile;
      endif;
      wp_reset_postdata();
      ?>
    </div>
  </div>
</div>

<script>
$(document).ready (function(){
  $('body').addClass('is-modal-open');
});
  
  
$(document).on('click', '.js-modal-close', function () {
  if ($('body').hasClass('is-modal-open')){
    // class remove
    $('body').removeClass('is-modal-open');
  }
});
  
$('.jumbotron-slick').slick({
  infinite: true,
  autoplay: true,
  pauseOnHover: false,
  draggable: false,
  autoplaySpeed: 4500,
  speed: 1000,
  dots: false,
  arrows: false,
  fade: true,
  cssEase: 'linear'
});
</script>