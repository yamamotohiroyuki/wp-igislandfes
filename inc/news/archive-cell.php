<?php 

$postcat = get_the_category();
$category_set = $postcat[0];
$category_link = get_category_link( $category_set->term_id );

$category_name = $category_set->cat_name;
?>
<li>
  <span class="archive-list__header">
    <span class="archive-list__header--set">
      <span class="archive-list__header--date"><time datetime="<?php echo get_the_date( 'Y-m-d' ); ?>"><?php echo get_the_date( 'Y.m.d' ); ?></time></span>
    </span>
  </span><!-- / .archive-list__header -->
  <span class="archive-list__body">
    <p>
      <?php
      if(get_field('news_title_only')):
      ?>
        <?php
        if ( have_rows ('news_files')):
          $fi == 0;
          while ( have_rows ('news_files')):
            $fi++;
            the_row();
            $file_src = get_sub_field ( 'news_file' );
            $file_type = get_sub_field ( 'news_file_type' );
            if($fi==1):
      ?><a href="<?php echo $file_src; ?>" class="is-<?php echo $file_type; ?>" target="_blank"><?php the_title(); ?></a><?php
            endif;
          endwhile;
        elseif ( get_field ('news_link_url')):
          $link = get_field ( 'news_link_url' );
          if(get_field('news_blank_link')):
        ?><a href="<?php echo $link; ?>" class="is-website" target="_blank"><?php the_title(); ?></a><?php
          else:
        ?><a href="<?php echo $link; ?>"><?php the_title(); ?></a><?php
          endif;
        else:
      ?><span><?php the_title(); ?></span><?php
        endif;
      else:
      ?><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a><?php
      endif;
      ?></p>
  </span>
</li>
