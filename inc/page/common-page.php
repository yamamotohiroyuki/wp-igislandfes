
<?php
while ( have_posts() ) :
  the_post();
  get_template_part( 'inc/contents' , 'header');

  if(is_page('about')):
?>
<div class="contents-main">
  <div class="contents-style">
    <?php the_content(); ?>
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
endwhile;
?>
