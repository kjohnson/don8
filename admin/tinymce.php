<?php

final class don8TinyMCE
{
    function __construct()
    {
        // Add a tinyMCE button to our post and page editor
        add_filter( 'media_buttons_context', array( $this, 'insert_button' ) );
    }

    public function insert_button( $context )
    {
        global $pagenow;
        if( 'post.php' != $pagenow ){
            return $context;
        }

        add_thickbox();

        $button_text = __( 'Add Donate Button', '' );

        return '
<a id="don8" class="button thickbox" href="#TB_inline?width=100%&height=100%&inlineId=don8-thickbox" data-editor="content">
    <span class="don8-icon"></span>
    ' . $button_text . '
</a>
<div id="don8-thickbox" style="display:none;">

    <h2>' . $button_text . '</h2>

    <p>
        <label for="don8-cause">' . __( 'Cause', 'don8' ) . '</label>
        <input type="text" id="don8-cause" name="don8-cause" class="widefat" value="' . get_option( 'don8_cause' ) . '">
    </p>
    
    <p>
        <label for="don8-currency">' . __( 'Currency Code', 'don8' ) . '</label>
        <input type="text" id="don8-currency" name="don8-currency" class="widefat" value="' . get_option( 'don8_currency' ) . '">
    </p>
    
    <p>
        <label for="don8-amount">' . __( 'Amount', 'don8' ) . '</label>
        <input type="text" id="don8-amount" name="don8-amount" class="widefat" value="' . get_option( 'don8_value' ) . '">
    </p>
    
    <p>
        <label for="don8-button">' . __( 'Button', 'don8' ) . '</label>
        <input type="text" id="don8-button" name="don8-button" class="widefat" value="' . $this->get_button() . '">
    </p>

    <p>
        <button id="add-don8" class="button button-primary">' . $button_text . '</button>
    </p>

</div>
        ';
    }

    protected function get_button()
    {
        $button = get_option( 'don8_button' );
        if( filter_var( $button, FILTER_VALIDATE_INT ) ){
            $button = filter_var( $button, FILTER_VALIDATE_INT );
            $button = wp_get_attachment_image_src( $button );
            $button = array_shift( $button );
        }
        return $button;
    }

}

$don8 = new don8TinyMCE();