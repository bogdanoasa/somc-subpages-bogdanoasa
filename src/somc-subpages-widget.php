<?php
class SOMC_widget extends WP_Widget {
	function __construct() {
		parent::__construct(
			'somc_widget',
			__('SOMC Subpages', ''),
			array( 'description' => __( 'This widget will display subpages of the current page', '' ), )
		);
	}

	public function widget( $args, $instance ) {
		if(is_page()) {
			global $post; 

			$title = apply_filters( 'widget_title', $instance['title'] );
			$sort = $instance['sort'];


				echo $args['before_widget'];

				$SOMC_walker_widget = new SOMC_walker();
				$pages = wp_list_pages(array('title_li'=>$args['before_title'] . $title . $args['after_title'].'<span class="somc_display"></span><span class="somc_sort '.($sort=="ASC" ? 'desc':'asc').'"></span>','echo'=>0,'child_of'=>$post->ID,'sort_column'=>'post_title','sort_order'=>$sort,'walker'=>$SOMC_walker_widget));

				if(!empty($pages)) {
					echo '<ul class="somc_subpages_widget">';
					echo $pages;
					echo '</ul>';
				}
				echo $args['after_widget'];
			
		}
	}

	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'Subpages', '' );
		}
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'sort' ); ?>"><?php _e( 'Default sort:' ); ?></label> 
		<select id="<?php echo $this->get_field_id( 'sort' ); ?>" name="<?php echo $this->get_field_name( 'sort' ); ?>">
			<option value="asc" <?php if(esc_attr( $sort )=='asc') echo 'selected'; ?>>ASC</option>
			<option value="desc" <?php if(esc_attr( $sort )=='desc') echo 'selected'; ?>>DESC</option>
		</select>
		</p>
		<?php 
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['sort'] = ( ! empty( $new_instance['sort'] ) ) ? strip_tags( $new_instance['sort'] ) : '';

		return $instance;
	}
}

function register_SOMC_widget() {
    register_widget( 'SOMC_widget' );
}
add_action( 'widgets_init', 'register_SOMC_widget' );