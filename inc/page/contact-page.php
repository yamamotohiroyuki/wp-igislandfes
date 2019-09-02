<div class="common-page">
  <?php
  while ( have_posts() ) :
    the_post();
  ?>
  <div class="common-page__inner">
    <div class="contents-style">
      <?php the_content(); ?>
      <?php get_template_part( 'inc/page/contact', 'form' ); ?>
    </div>
  </div>
  <?php
  endwhile;
  ?>
</div>