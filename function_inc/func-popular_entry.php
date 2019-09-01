<?php
// 人気記事出力用
function getPostViews($postID){
	$count_key = 'post_views_count';
	
	
	$count = get_post_meta($postID, $count_key, true);
	
	
	if($count==''){
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
		return "0";
	}
	return $count;
}
function setPostViews($postID) {
	$count_key = 'post_views_count';
	
	$limit_count_key = 'post_views_limit_count';
	$limit_date_key = 'post_views_limit_date';
	
	$limitdate = "+3 day";//3日でリセットされる
	
	
	$count = get_post_meta($postID, $count_key, true);
	
	
	$start_date = get_post_meta($postID, $limit_date_key, true);
	$limit_count = get_post_meta($postID, $limit_count_key, true);
	
	$now_date = time();
	$now_timestamp = date( "Y/m/d G:i:s" , $now_date );
	
	
	if( $start_date == '' ):
		$limit_count = 0;
		delete_post_meta($postID, $limit_date_key);
		add_post_meta($postID, $limit_date_key, $now_timestamp);
		delete_post_meta($postID, $limit_count_key);
		add_post_meta($postID, $limit_count_key, '0');
	else:
		$start_timestamp = strtotime( $start_date );
		$target = strtotime( $limitdate, $start_timestamp );
		$now = strtotime( $now_timestamp );
		if( $target > $now ):
	
			$limit_count++;
			update_post_meta($postID, $limit_count_key, $limit_count);
			
		else:
			$limit_count=='';
	
			$start_date = $now_timestamp;
			delete_post_meta($postID, $limit_date_key);
			add_post_meta($postID, $limit_date_key, $now_timestamp);
			delete_post_meta($postID, $limit_count_key);
			add_post_meta($postID, $limit_count_key, '0');
	
		endif;
	endif;
	
	
	if($count==''):
		$count = 0;
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
	else:
		$count++;
		update_post_meta($postID, $count_key, $count);
	endif;
	
}

remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
?>