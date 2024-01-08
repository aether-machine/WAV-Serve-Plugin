<?php

function enqueue_child_theme_styles() {
    wp_enqueue_style( 'child-style', get_stylesheet_uri(), array( 'parent-style' ) );
}
add_action( 'wp_enqueue_scripts', 'enqueue_child_theme_styles' );

/* Custom code goes below this line */

// Define shortcode to output the complete audio tag with the token
add_shortcode('protected_audio', 'protected_audio_shortcode');
function protected_audio_shortcode($atts) {
    // Extract attributes
    $atts = shortcode_atts(array(
        'file' => '', // Default value if 'file' attribute is not provided
    ), $atts, 'protected_audio');

    // Retrieve the stored token value
    $stored_token = get_option('wav_serve_token', '');

    // Construct the audio file URL with the token
    $audio_url = esc_url(home_url('/wp-content/wav-serve-plugin/serve-wav.php')) . '?file=' . esc_attr($atts['file']) . '&token=' . esc_attr($stored_token);

    // Generate the audio tag with the secure URL
    $audio_html = '<audio src="' . $audio_url . '" controls></audio>';

    // Return the audio HTML to be output wherever the shortcode is used
    return $audio_html;
}