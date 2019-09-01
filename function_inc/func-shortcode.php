<?php


function video_func( $atts, $content = null ) {
  extract( shortcode_atts( array(
    'video_id' => ''
  ), $atts ) );

  return '<div class="video-respons"><iframe src="https://www.youtube.com/embed/' . $video_id . '" frameborder="0" allowfullscreen="allowfullscreen"></iframe></div>';

}
add_shortcode('video', 'video_func');
// [vide vide_url="vide url"][/graph]



function graph_func( $atts, $content = null ) {
  extract( shortcode_atts( array(
    'graph_title' => '図',
    'graph_url' => ''
  ), $atts ) );

  if ($content == null):
    return '<figure class="graph"><img src="' . $graph_url . '" alt="' . $graph_title . '"/></figure>';
  else:
    return '<figure class="graph"><img src="' . $graph_url . '" alt="' . $graph_title . '"/><figcaption class="figcaption">' . $content . '</figcaption></figure>';
  endif;

}
add_shortcode('graph', 'graph_func');
// [graph graph_title="image title" graph_url="image url"]caption[/graph]



function graph_sc( $atts, $content = null ) {
  extract( shortcode_atts( array(
    'graph_title' => '図',
    'graph_id' => ''
  ), $atts ) );
  $image = wp_get_attachment_image( $graph_id, 'medium' );
  if ($content == null):
    return '<figure class="graph">'.$image.'</figure>';
  else:
    return '<figure class="graph">'.$image.'<figcaption class="figcaption">' . $content . '</figcaption></figure>';
  endif;
}
add_shortcode('graph_box', 'graph_sc');
// [graph_box graph_title="image title" graph_id="image url"]caption[/graph]

?>