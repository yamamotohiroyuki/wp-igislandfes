<?php get_header(); ?>
<?php get_template_part( 'inc/thema', 'header' ); ?>
<main class="global-main">
  <?php
  $global_inc_root = 'inc/global/global';
  $news_inc_root = 'inc/news/news';
  if(is_front_page()):
    get_template_part( 'inc/top/integration' , 'top');
  elseif(is_news()):
    get_template_part( $global_inc_root , 'contents-header');
    if(is_home() || is_archive() || is_author() || is_category() || is_tag()):
      get_template_part( $news_inc_root , 'archive');
    elseif(is_single()):
      get_template_part( $news_inc_root , 'single');
    else:
      get_template_part( $news_inc_root , 'archive');
    endif;
  elseif(is_page()):
    if(is_page('drone-shot')):
      get_template_part( 'inc/drone-shot/integration' , 'drone-shot');
    elseif(is_page('drone-rental')):
      get_template_part( 'inc/drone-rental/integration' , 'drone-rental');
    elseif(is_page('drone-field')):
      get_template_part( 'inc/drone-field/integration' , 'drone-field');
    else:
      get_template_part( $global_inc_root , 'contents-header');
      if(is_page('contact')):
        get_template_part( 'inc/page/contact-page');
      else:
        get_template_part( 'inc/page/common' , 'page');
      endif;
    endif;
  elseif(is_404()):
    get_template_part( $global_inc_root , 'contents-header');
    get_template_part( $global_inc_root , '404');
  else:
  endif;
  
  if(!is_news() || is_single()):
    get_template_part( $global_inc_root , 'archive');
  endif;
  
  
  if(!is_page('contact')):
    get_template_part( $global_inc_root , 'contact');
  endif;
  ?>
</main><!-- / .global-main -->
<?php get_template_part( 'inc/thema', 'footer' ); ?>
<?php get_footer(); ?>
