
<?php
$args = array(
  'post_type' => array('yda'),
  'order' => 'ASC',
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
  if($companies_tel == ''):
?>
  <li>
    <div class="companies-list__no-link">
      <span class="companies-list__name"><?php echo $companies_name; ?></span>
      <span class="companies-list__tel"><?php echo $companies_tel; ?></span>
    </a>
  </div>
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