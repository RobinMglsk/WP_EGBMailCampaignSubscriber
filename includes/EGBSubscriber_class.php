<?php
/**
 * Adds EGBSubscriber_widget widget.
 */
class EGBSubscriber_widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'EGBSubscriber_widget', // Base ID
			esc_html__( 'EGB Mail Campaing Subscriber', 'egbmc_domain' ), // Name
			array( 'description' => esc_html__( 'Widget to display a subscribe to our newsletter form', 'egbmc_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {

        echo $args['before_widget'];
        
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}
		
		if($instance['first_name_field_text'] == 'true'){
			$label = true;
		}else{
			$label = false;
		}
        
        // widget Content     
		echo '
		<p>'.$instance['description'].'</p>
		<form action="#">

			<div class="form-group">
				'.($label ? '<label for="egbcm_first_name">'.$instance['first_name_field_text'].'</label>' : null).'
				<input type="text" class="wpcf7-form-control wpcf7-text" id="egbcm_first_name" placeholder="'.$instance['first_name_field_text'].'" required>
			</div>
			<div class="form-group">
				'.($label ? '<label for="egbcm_last_name">'.$instance['last_name_field_text'].'</label>' : null).'
				<input type="text" class="wpcf7-form-control wpcf7-text" id="egbcm_last_name" placeholder="'.$instance['last_name_field_text'].'" required>
			</div>
			<div class="form-group">
				'.($label ? '<label for="egbcm_company">'.$instance['company_field_text'].'</label>' : null).'
				<input type="text" class="wpcf7-form-control wpcf7-text" id="egbcm_company" placeholder="'.$instance['company_field_text'].'">
			</div>
			<div class="form-group">
				'.($label ? '<label for="egbcm_email">'.$instance['email_field_text'].'</label>' : null).'
				<input type="email" class="wpcf7-form-control wpcf7-text" id="egbcm_email" placeholder="'.$instance['email_field_text'].'" required>
			</div>

			<button type="submit" class="wpcf7-form-control wpcf7-submit">'.$instance['submit_button_text'].'</button>
			
		</form>
		';

		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Nieuwsbrief', 'egbmc_domain' );
		$description = !empty( $instance['description'] ) ? $instance['description'] : esc_html__( 'Schrijf u in op onze nieuwsbrief.', 'egbmc_domain' );
		$first_name_field_text = !empty( $instance['first_name_field_text'] ) ? $instance['first_name_field_text'] : esc_html__( 'Voornaam', 'egbmc_domain' );
		$last_name_field_text = !empty( $instance['last_name_field_text'] ) ? $instance['last_name_field_text'] : esc_html__( 'Naam', 'egbmc_domain' );
		$company_field_text = !empty( $instance['company_field_text'] ) ? $instance['company_field_text'] : esc_html__( 'Bedrijf', 'egbmc_domain' );
		$email_field_text = !empty( $instance['email_field_text'] ) ? $instance['email_field_text'] : esc_html__( 'E-mailadres', 'egbmc_domain' );
		$submit_button_text = !empty( $instance['submit_button_text'] ) ? $instance['submit_button_text'] : esc_html__( 'Inschrijven', 'egbmc_domain' );
		$labels = !empty( $instance['labels'] ) ? $instance['labels'] : esc_html__( true, 'egbmc_domain' );


		echo '
		<p>
		    <label for="'.esc_attr( $this->get_field_id( 'title' ) ).'">'.esc_attr( 'Title:', 'egbmc_domain' ).'</label> 
		    <input 
                class="widefat" 
                id="'.esc_attr( $this->get_field_id( 'title' ) ).'" 
                name="'.esc_attr( $this->get_field_name( 'title' ) ).'" 
                type="text" 
                value="'.esc_attr( $title ).'">
		</p>
		<p>
		    <label for="'.esc_attr( $this->get_field_id( 'description' ) ).'">'.esc_attr( 'Description:', 'egbmc_domain' ).'</label> 
		    <textarea 
                class="widefat" 
                id="'.esc_attr( $this->get_field_id( 'description' ) ).'" 
                name="'.esc_attr( $this->get_field_name( 'description' ) ).'" 
				type="text">'.esc_attr( $description ).'</textarea>
		</p>
		<h4>Fields<hr/></h4>
		<p>
		    <label for="'.esc_attr( $this->get_field_id( 'first_name_field_text' ) ).'">'.esc_attr( 'First name:', 'egbmc_domain' ).'</label> 
		    <input 
                class="widefat" 
                id="'.esc_attr( $this->get_field_id( 'first_name_field_text' ) ).'" 
                name="'.esc_attr( $this->get_field_name( 'first_name_field_text' ) ).'" 
                type="text" 
                value="'.esc_attr( $first_name_field_text ).'">
		</p>
		<p>
		    <label for="'.esc_attr( $this->get_field_id( 'last_name_field_text' ) ).'">'.esc_attr( 'Last name:', 'egbmc_domain' ).'</label> 
		    <input 
                class="widefat" 
                id="'.esc_attr( $this->get_field_id( 'last_name_field_text' ) ).'" 
                name="'.esc_attr( $this->get_field_name( 'last_name_field_text' ) ).'" 
                type="text" 
                value="'.esc_attr( $last_name_field_text ).'">
		</p>
		<p>
		    <label for="'.esc_attr( $this->get_field_id( 'company_field_text' ) ).'">'.esc_attr( 'Email address:', 'egbmc_domain' ).'</label> 
		    <input 
                class="widefat" 
                id="'.esc_attr( $this->get_field_id( 'company_field_text' ) ).'" 
                name="'.esc_attr( $this->get_field_name( 'company_field_text' ) ).'" 
                type="text" 
                value="'.esc_attr( $company_field_text ).'">
		</p>
		<p>
		    <label for="'.esc_attr( $this->get_field_id( 'email_field_text' ) ).'">'.esc_attr( 'Email address:', 'egbmc_domain' ).'</label> 
		    <input 
                class="widefat" 
                id="'.esc_attr( $this->get_field_id( 'email_field_text' ) ).'" 
                name="'.esc_attr( $this->get_field_name( 'email_field_text' ) ).'" 
                type="text" 
                value="'.esc_attr( $email_field_text ).'">
		</p>
		<p>
		    <label for="'.esc_attr( $this->get_field_id( 'submit_button_text' ) ).'">'.esc_attr( 'Button:', 'egbmc_domain' ).'</label> 
		    <input 
                class="widefat" 
                id="'.esc_attr( $this->get_field_id( 'submit_button_text' ) ).'" 
                name="'.esc_attr( $this->get_field_name( 'submit_button_text' ) ).'" 
                type="text" 
                value="'.esc_attr( $submit_button_text ).'">
		</p>
		<h4>Customize<hr/></h4>
		<p>
		    <label for="'.esc_attr( $this->get_field_id( 'labels' ) ).'">'.esc_attr( 'Labels:', 'egbmc_domain' ).'</label> 
		    <select 
                class="widefat" 
                id="'.esc_attr( $this->get_field_id( 'labels' ) ).'" 
				name="'.esc_attr( $this->get_field_name( 'labels' ) ).'">

				<option value="true" '.( $labels == 'true' ? 'selected' : null ).'>Visible</option>
				<option value="false" '.( $labels == 'false' ? 'selected' : null ).'>Hidden</option>

			</select>
		</p>';


		
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {

		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['description'] = ( ! empty( $new_instance['description'] ) ) ? sanitize_text_field( $new_instance['description'] ) : '';
		$instance['first_name_field_text'] = ( ! empty( $new_instance['first_name_field_text'] ) ) ? sanitize_text_field( $new_instance['first_name_field_text'] ) : '';
		$instance['last_name_field_text'] = ( ! empty( $new_instance['last_name_field_text'] ) ) ? sanitize_text_field( $new_instance['last_name_field_text'] ) : '';
		$instance['company_field_text'] = ( ! empty( $new_instance['company_field_text'] ) ) ? sanitize_text_field( $new_instance['company_field_text'] ) : '';
		$instance['email_field_text'] = ( ! empty( $new_instance['email_field_text'] ) ) ? sanitize_text_field( $new_instance['email_field_text'] ) : '';
		$instance['submit_button_text'] = ( ! empty( $new_instance['submit_button_text'] ) ) ? sanitize_text_field( $new_instance['submit_button_text'] ) : '';
		$instance['labels'] = ( ! empty( $new_instance['labels'] ) ) ? sanitize_text_field( $new_instance['labels'] ) : '';

		return $instance;
	}

}
?>