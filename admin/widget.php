<?php
/**
 * Created by PhpStorm.
 * User: kylemaurer
 * Date: 10/8/14
 * Time: 6:18 PM
 */

// Hook our function into the "widget_init" action
add_action( 'widgets_init', 'don8_add_widgets' );

/**
 * Registers all of our widgets
 */
function don8_add_widgets() {

	register_widget( 'Don8Widget' );
}

/**
 * An awesome class that creates an incredible widget for use on the WordPress widgets page.
 *
 * CHANGE THIS CLASS NAME to whatever you want (no spaces, no dashes, just letters, numbers, and underscores), and make
 * sure this matches EXACTLY what is in "register_widget" in the other file.
 */
class Don8Widget extends WP_Widget {

	/**
	 * The main construct function. Launches on the class load.
	 *
	 * Do NOT delete this function, but please modify it.
	 */
	public function __construct() {

		// Construct this widget based off of the parent. This is very important and necessary.
		parent::__construct(

		// This is your widget "id_base". Just make it unique, all lowercase, no dashes, and no spaces. Just letters,
		// numbers, and underscores. Make it unique!
			'don8_widget',

			// This is the title of your widget. This is what will show on the left side (available widgets) on the widget
			// customization screen. Make it whatever you want!
			'Don8',

			// This is the widget description. Again, this will show in the available widgets area under your custom
			// widget. Make it whatever you want as well!
			array(
				'description' => 'Renders a button which visitors can click on to make a donation to your cause.',
			)
		);
	}

	/**
	 * Fires when displaying the widget on the front-end.
	 *
	 * Do NOT delete this function, but please modify it.
	 *
	 * @param array $args The current widget args.
	 * @param array $instance The current widget instance.
	 */
	public function widget( $args, $instance ) {

		// Echo out anything before the widget, don't mess with this or delete it.
		echo $args['before_widget'];

		// Echo out the title (if it's set), don't mess with this or delete it.
		if ( ! empty( $instance['title'] ) ) {

			echo $args['before_title'];
			echo apply_filters( 'widget_title', $instance['title'] );
			echo $args['after_title'];
		}

		// Everything below here (up until echoing out after_widget) is fully in your control. This is where the display
		// of your widget will be. Add HTML, add PHP, add Javascript, add whatever!
		$email    = isset( $instance['email'] ) ? $instance['email'] : '';
		$cause    = isset( $instance['cause'] ) ? $instance['cause'] : '';
		$value    = isset( $instance['value'] ) ? $instance['value'] : '';
		$currency = isset( $instance['currency'] ) ? $instance['currency'] : '';
		$image    = isset( $instance['image'] ) ? $instance['image'] : false;
		$image    = ! empty( $image ) ? $image : get_option( 'don8_button' );

		$button = '<form name="_xclick" action="https://www.paypal.com/uk/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="' . esc_html( $email ) . '">
<input type="hidden" name="item_name" value="' . esc_html( $cause ) . '">
<input type="hidden" name="currency_code" value="' . esc_html( $currency ) . '">
<input type="hidden" name="amount" value="' . esc_html( $value ) . '">
<input type="image" src="' . wp_get_attachment_url( $image ) . '" border="0" name="submit" alt="Donate to ' . esc_html( $cause ) . '">
</form>';

		echo $button;

		// Echo out anything after the widget, don't mess with this or delete it.
		echo $args['after_widget'];
	}

	/**
	 * Fires on the backend, inside of the widget. Used for customizing the current widget's options.
	 *
	 * If your widget doesn't need any options, just delete this whoooole function.
	 *
	 * @param array $instance The current widget instance.
	 *
	 * @return string|void Generally nothing.
	 */
	public function form( $instance ) {

		// Get options
		$title    = isset( $instance['title'] ) ? $instance['title'] : '';
		$email    = isset( $instance['email'] ) ? $instance['email'] : '';
		$cause    = isset( $instance['cause'] ) ? $instance['cause'] : '';
		$value    = isset( $instance['value'] ) ? $instance['value'] : '';
		$currency = isset( $instance['currency'] ) ? $instance['currency'] : '';
		$image    = isset( $instance['image'] ) ? $instance['image'] : '';

		// Output the HTML
		// These can be confusing. Just copy/paste them as needed and be sure to change the txt where needed (like in
		// the first one, change "title" wherever it exists)
		?>
		<!-- The widget title -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
			<input type="text" name="<?php echo $this->get_field_name( 'title' ); ?>" class="widefat"
			       id="<?php echo $this->get_field_id( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>"/>
		</p>
		<!-- The paypal email -->
		<p>
			<label for="<?php echo $this->get_field_id( 'email' ); ?>">Email:</label>
			<input type="text" name="<?php echo $this->get_field_name( 'email' ); ?>" class="widefat"
			       id="<?php echo $this->get_field_id( 'email' ); ?>" value="<?php if ( ! empty( $email ) ) {
				echo esc_attr( $email );
			} else {
				echo get_option( 'don8_paypal_email' );
			} ?>"/>
		</p>
		<!-- The cause -->
		<p>
			<label for="<?php echo $this->get_field_id( 'cause' ); ?>">Cause:</label>
			<input type="text" name="<?php echo $this->get_field_name( 'cause' ); ?>" class="widefat"
			       id="<?php echo $this->get_field_id( 'cause' ); ?>" value="<?php if ( ! empty( $cause ) ) {
				echo esc_attr( $cause );
			} else {
				echo get_option( 'don8_cause' );
			} ?>"/>
		</p>
		<!-- The currency code -->
		<p>
			<label for="<?php echo $this->get_field_id( 'currency' ); ?>">Currency:</label>
			<input type="text" name="<?php echo $this->get_field_name( 'currency' ); ?>" class="widefat"
			       id="<?php echo $this->get_field_id( 'currency' ); ?>" value="<?php if ( ! empty( $currency ) ) {
				echo esc_attr( $currency );
			} else {
				echo get_option( 'don8_currency' );
			} ?>"/>
		</p>
		<!-- The amount -->
		<p>
			<label for="<?php echo $this->get_field_id( 'value' ); ?>">Amount:</label>
			<input type="text" name="<?php echo $this->get_field_name( 'value' ); ?>" class="widefat"
			       id="<?php echo $this->get_field_id( 'value' ); ?>" value="<?php if ( ! empty( $value ) ) {
				echo esc_attr( $value );
			} else {
				echo get_option( 'don8_value' );
			} ?>"/>
		</p>

		<!-- An image uploader -->
		<p>
			<?php don8_media_uploader( $this->get_field_name( 'image' ), $image ); ?>
		</p>
	<?php
	}

	/**
	 * Fires when hitting the save button. Used to sanitize widget options on save.
	 *
	 * If your widget has no options, delete this whooole function.
	 *
	 * @param array $new_instance The post-updated instance.
	 * @param array $old_instance The pre-updated instance.
	 *
	 * @return array The new, sanitized instance.
	 */
	public function update( $new_instance, $old_instance ) {

		// Get our new options and sanitize them as needed
		// Anything existing in form needs to exist here!
		$instance             = array();
		$instance['title']    = ! empty( $new_instance['title'] ) ? strip_tags( $new_instance['title'] ) : null;
		$instance['email']    = ! empty( $new_instance['email'] ) && is_email( $new_instance['email'] ) ? strip_tags( $new_instance['email'] ) : null;
		$instance['cause']    = ! empty( $new_instance['cause'] ) ? strip_tags( $new_instance['cause'] ) : null;
		$instance['value']    = ! empty( $new_instance['value'] ) ? floatval( $new_instance['value'] ) : null;
		$instance['currency'] = ! empty( $new_instance['currency'] ) ? strip_tags( $new_instance['currency'] ) : null;
		$instance['image']    = isset( $new_instance['image'] ) ? $new_instance['image'] : null;

		// Return our sanitized options
		return $instance;
	}
}