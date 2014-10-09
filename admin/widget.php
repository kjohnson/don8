<?php
/**
 * Created by PhpStorm.
 * User: kylemaurer
 * Date: 10/8/14
 * Time: 6:18 PM
 */

// Include the back-end media uploader!
include_once( 'uploader.php' );

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
            'Don8 Widget',

            // This is the widget description. Again, this will show in the available widgets area under your custom
            // widget. Make it whatever you want as well!
            array(
                'description' => 'This widget will change your life',
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

        // Get other options. Don't worry toooooo much about what these are doing. Just copy/paste them, tweak the names,
        // but they work pretty well.

        // Get the checkbox option
        $checkbox  = isset( $instance['checkbox'] ) ? true : false;

        // Get the select box option
        $selectbox = isset( $instance['selectbox'] ) ? $instance['selectbox'] : false;

        // Get the image option
        $image = isset( $instance['image'] ) ? $instance['image'] : false;

        // Echo out the other options to the page.

        // Enter all the custom HTML you want here! Just like below.
        ?>
        <h2 class="title">A title!</h2>
        <div class="some-content">
            <p>Content, content, content!</p>
        </div>
        <?php

        // The checkbox
        if ( $checkbox ) {

            // Everything between these brackets will only happen IF the checkbox is checked.
            ?>
            The checkbox is checked! Woohoo!!
        <?php
        } else {

            // Everything here will happen when the checkbox is NOT checked.
            ?>
            The checkbox is NOT checked! Darn!
        <?php
        }

        // The select box
        if ( $selectbox ) {

            // This will show when the user has selected something, anything.
            ?>
            You have selected <?php echo $selectbox; ?>!
        <?php
        } else {

            // This will show if the select box has not been used.
            ?>
            You have not selected anything!
        <?php
        }

        // The image
        if ( $image ) {
            echo '<p>' . wp_get_attachment_image( $image, 'small' ) . '</p>';
        }

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
        $title = isset( $instance['title'] ) ? $instance['title'] : '';
        $checkbox  = isset( $instance['checkbox'] ) ? 'checked' : '';
        $selectbox = isset( $instance['selectbox'] ) ? $instance['selectbox'] : '';
        $image = isset( $instance['image'] ) ? $instance['image'] : '';

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

        <!-- A checkbox -->
        <p>
            <label for="<?php echo $this->get_field_id( 'checkbox' ); ?>">Checkbox</label>
            <input type="checkbox" name="<?php echo $this->get_field_name( 'checkbox' ); ?>"
                   id="<?php echo $this->get_field_id( 'checkbox' ); ?>" value="1" <?php echo $checkbox; ?> />
        </p>

        <!-- A select box -->
        <p>
            <label for="<?php echo $this->get_field_id( 'selectbox' ); ?>">Selectbox</label>
            <select name="<?php echo $this->get_field_name( 'selectbox' ); ?>"
                    id="<?php echo $this->get_field_id( 'selectbox' ); ?>">
                <option value="0">Select an option from below</option>
                <option value="Option 1" <?php selected( 'Option 1', $selectbox ); ?>>Option 1</option>
                <option value="Option 2" <?php selected( 'Option 2', $selectbox ); ?>>Option 2</option>
                <option value="Option 3" <?php selected( 'Option 3', $selectbox ); ?>>Option 3</option>
            </select>
        </p>

        <!-- An image uploader -->
        <p>
            <?php backend_media_uploader( $this->get_field_name( 'image' ), $image ); ?>
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
        $instance              = array();
        $instance['title']     = ! empty( $new_instance['title'] ) ? strip_tags( $new_instance['title'] ) : null;
        $instance['checkbox'] = isset( $new_instance['checkbox'] ) ? '1' : null;
        $instance['selectbox'] = isset( $new_instance['selectbox'] ) && $new_instance['selectbox'] != '0' ? $new_instance['selectbox'] : null;
        $instance['image'] = isset( $new_instance['image'] ) ? $new_instance['image'] : null;

        // Return our sanitized options
        return $instance;
    }
}