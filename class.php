<?php
// Register and load the widget
function fpfmy5_load_widget() {
	register_widget( 'fpfmy5_widget' );
}
add_action( 'widgets_init', 'fpfmy5_load_widget' );

// Creating the widget 
class fpfmy5_widget extends WP_Widget {

function __construct() {
parent::__construct(

// Base ID of your widget
'fpfmy5_widget', 

// Widget name will appear in UI
__('FB page feed', 'fpfmy5_widget_domain'), 

// Widget description
array( 'description' => __( 'Widget that Get all facebook page feed with cover image and count likes.', 'fpfmy5_widget_domain' ), ) 
);
}

// Creating widget front-end

public function widget( $args, $instance ) {
$title 			= apply_filters( 'widget_title', $instance['title'] );
$fbpurl 		= apply_filters( 'widget_fbpurl', $instance['fbpurl'] );
$smallheader 	= apply_filters( 'widget_smallheader', $instance['smallheader'] );
$hide_cp 		= apply_filters( 'widget_hide_cp', $instance['hide_cp'] );
$FriendFace 	= apply_filters( 'widget_FriendFace', $instance['FriendFace'] );

// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];

// This is where you run the code and display the output
$fbpurlval 		= ( ! empty( $fbpurl ) ) ? strip_tags( $fbpurl ) : 'https://www.facebook.com/facebook';
$smallheaderval = ( ! empty( $smallheader ) ) ? strip_tags( $smallheader ) : 'false';
$hide_cpval 	= ( ! empty( $hide_cp ) ) ? strip_tags( $hide_cp ) : 'false';
$FriendFaceval	= ( ! empty( $FriendFace ) ) ? strip_tags( $FriendFace ) : 'false';
?>



<div class="fb-page" data-href="<?php echo $fbpurlval; ?>" data-tabs="timeline" data-small-header="<?php echo $smallheaderval; ?>" data-adapt-container-width="true" data-hide-cover="<?php echo $hide_cpval; ?>" data-show-facepile="<?php echo $FriendFaceval; ?>">
<blockquote cite="<?php echo $fbpurlval; ?>" class="fb-xfbml-parse-ignore">
<a href="<?php echo $fbpurlval; ?>">Facebook</a>
</blockquote></div>
<?php
echo $args['after_widget'];
}
		
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title 			= $instance[ 'title' ];
$fbpurl 		= $instance[ 'fbpurl' ];
$smallheader 	= $instance[ 'smallheader' ];
$hide_cp 		= $instance[ 'hide_cp' ];
$FriendFace 	= $instance[ 'FriendFace' ];
}
else {
$title = __( 'New title', 'fpfmy5_widget_domain' );
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
<label for="<?php echo $this->get_field_id( 'fbpurl' ); ?>"><?php _e( 'Facebook page url:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'fbpurl' ); ?>" name="<?php echo $this->get_field_name( 'fbpurl' ); ?>" type="text" value="<?php echo esc_attr( $fbpurl ); ?>" />

<label for="<?php echo $this->get_field_id( 'smallheader' ); ?>"><?php _e( 'Use Small Header:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'smallheader' ); ?>" name="<?php echo $this->get_field_name( 'smallheader' ); ?>" type="checkbox" value="true" <?php if($smallheader=='true'){echo 'checked';} ?> />

<label for="<?php echo $this->get_field_id( 'hide_cp' ); ?>"><?php _e( 'Hide Cover Photo:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'hide_cp' ); ?>" name="<?php echo $this->get_field_name( 'hide_cp' ); ?>" type="checkbox" value="true" <?php if($hide_cp=='true'){echo 'checked';} ?> />

<label for="<?php echo $this->get_field_id( 'FriendFace' ); ?>"><?php _e( 'Show Friends Faces:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'FriendFace' ); ?>" name="<?php echo $this->get_field_name( 'FriendFace' ); ?>" type="checkbox" value="true" <?php if($FriendFace=='true'){echo 'checked';} ?> />
</p>
<?php 
}
	
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] 			= ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
$instance['fbpurl'] 		= ( ! empty( $new_instance['fbpurl'] ) ) ? strip_tags( $new_instance['fbpurl'] ) : '';
$instance['smallheader'] 	= ( ! empty( $new_instance['smallheader'] ) ) ? strip_tags( $new_instance['smallheader'] ) : '';
$instance['hide_cp'] 		= ( ! empty( $new_instance['hide_cp'] ) ) ? strip_tags( $new_instance['hide_cp'] ) : '';
$instance['FriendFace'] 	= ( ! empty( $new_instance['FriendFace'] ) ) ? strip_tags( $new_instance['FriendFace'] ) : '';
return $instance;
}
} // Class wpb_widget ends here
