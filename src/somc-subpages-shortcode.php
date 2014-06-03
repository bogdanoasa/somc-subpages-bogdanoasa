<?php
function SOMC_shortcode_func( $atts ){
	if(is_page()) {
		global $post; 
		isset($atts['title']) ? $title = $atts['title']:$title = 'Subpages';
		(isset($atts['sort']) & ($atts['sort']=="ASC" or $atts['sort']=="DESC")) ? $sort = $atts['sort'] : $sort = "ASC"; 
		$SOMC_walker = new SOMC_walker();
		$pages = wp_list_pages(array('title_li'=>'<h3>'.$title.' </h3><span class="somc_display"></span><span class="somc_sort '.($sort=="ASC" ? 'desc':'asc').'"></span> ','echo'=>0,'child_of'=>$post->ID,'sort_column'=>'post_title','sort_order'=>$sort,'walker'=>$SOMC_walker));

		if(!empty($pages)) {
			echo '<ul class="somc_subpages_shortcode">';
			echo $pages;
			echo '</ul>';
		}		
	}
} //END SOMC_shortcode_func
add_shortcode( 'subpages', 'SOMC_shortcode_func' );