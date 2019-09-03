
<?php
while ( have_posts() ) :
  the_post();
  get_template_part( 'inc/contents' , 'header');
?>
<div class="contents-main">
  <div class="contents-style">
    <?php the_content(); ?>
  </div>
</div>
<?php
endwhile;
?>