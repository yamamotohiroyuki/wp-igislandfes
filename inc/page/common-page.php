
<?php
while ( have_posts() ) :
  the_post();
  get_template_part( 'inc/contents' , 'header');
  $underconstruction = get_field('underconstruction');
  if($underconstruction):
  ?>
<div class="contents-main">
  <div class="contents-main__inner">
    <div class="contents-style">
    <?php get_template_part( 'inc/underconstruction'); ?>
    </div>
  </div>
</div>
  <?php
  else:
    if(is_page('about')):
  ?>
<div class="contents-main">
  <div class="contents-style">
    <?php the_content(); ?>
  </div>
</div>
  <?php
    elseif(is_page('movie')):
  ?>
<div class="contents-main">
  <div class="contents-style">
    <?php the_content(); ?>
    <ul class="gallery-list">
      <?php
      if(have_rows('movies')):
        while(have_rows('movies')): the_row();
          $movie_id = get_sub_field('movie');
          $movie_text = get_sub_field('text');
      ?>
      <li>
        <figure>
          <a href="https://www.youtube.com/embed/<?php echo $movie_id; ?>" class="js-modal-video" data-group="gallery">
            <img src="http://img.youtube.com/vi/<?php echo $movie_id; ?>/maxresdefault.jpg" alt="<?php echo $movie_text; ?>">
            <span><?php echo $movie_text; ?></span>
          </a>
        </figure>
      </li>
      <?php
        endwhile;
      endif; ?>
    </ul>
  </div>
</div>
  <?php
    elseif(is_page('photo')):
  ?>
<div class="contents-main">
  <div class="contents-style">
    <?php the_content(); ?>
    <ul class="gallery-list">
      <?php
      if(have_rows('photos')):
        while(have_rows('photos')): the_row();
          $photo_url = wp_get_attachment_image_src(get_sub_field('photo'), 'contents_thumbnail');
          $photo_large_url = wp_get_attachment_image_src(get_sub_field('photo'), 'large');
          $photo_text = get_sub_field('text');
      ?>
      <li>
        <figure>
          <a href="<?php echo $photo_large_url[0]; ?>" class="js-modal-gallery" data-group="gallery">
            <img src="<?php echo $photo_url[0]; ?>" alt="<?php echo $photo_text; ?>">
            <span><?php echo $photo_text; ?></span>
          </a>
        </figure>
      </li>
      <?php
        endwhile;
      endif; ?>
    </ul>
  </div>
</div>
  <?php
    elseif(is_page('yda')):
  ?>
<div class="contents-main">
  <div class="contents-style">
    <?php the_content(); ?>
      
    <?php
    $args = array(
      'post_type' => array('yda'),
      'order' => 'DESC',
      'posts_per_page' => 9999
    );
    $the_query = new WP_Query( $args );
    if ( $the_query->have_posts() ) :
    ?>
    <ul class="companies-list">
    <?php
      while ( $the_query->have_posts() ) : $the_query->the_post();
      $page_id = get_the_ID();
      $companies_name = get_the_title($page_id);
      $companies_link = get_field('companies-list-link', $page_id);
      $companies_tel = get_field('companies-list-tel', $page_id);
      if($companies_link == ''):
    ?>
      <li>
        <div class="companies-list__no-link">
          <span class="companies-list__name"><?php echo $companies_name; ?></span>
          <span class="companies-list__tel"><?php echo $companies_tel; ?></span>
        </div>
      </li>
    <?php
      else:
    ?>
      <li>
        <a href="<?php echo $companies_link; ?>" target="_blank">
          <span class="companies-list__name"><?php echo $companies_name; ?></span>
          <span class="companies-list__tel"><?php echo $companies_tel; ?></span>
        </a>
      </li>
    <?php
      endif;
      endwhile;
    ?>
    </ul>
    <?php
    endif;
    wp_reset_postdata();
    ?>
  </div>
</div>
  <?php
    else:
  ?>
<div class="contents-main">
  <div class="contents-main__inner">
    <div class="contents-style">
      <?php the_content(); ?>
    </div>
  </div>
</div>
<?php
    endif;
  endif;
endwhile;
?>
