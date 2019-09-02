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
</div>

<script>
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