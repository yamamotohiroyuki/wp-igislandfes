<div class="common-page">
  <?php
  while ( have_posts() ) :
    the_post();
  ?>
  <div class="common-page__inner">
    <div class="contents-style">
      <?php the_content(); ?>
    </div>
  </div>
  <?php
  endwhile;
  ?>
</div>