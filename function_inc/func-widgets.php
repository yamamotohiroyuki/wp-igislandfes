<?php


// ウィジット
function new_widgets_init() {
	// Area 1, located at the top of the sidebar.
	register_sidebar( array(
		'name' => __( 'News Widget Area', 'widgets' ),
		'id' => 'news-widget-area',
		'description' => __( 'news widget area', 'widget' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );
}
add_action( 'widgets_init', 'new_widgets_init' );


?>