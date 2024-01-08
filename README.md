Our in house WordPress extension for streaming audio without exposing the links to easy download by unscrupulous third parties. NGINX config is not that easy to change unless the files are in a WooCommerce download folder which is the typical way to control access.

To use, set the permissions of your wav files to disallow read by public, you can do this with any FTP client.

You will need to use a child theme with the code in the functions.PHP file. Call the .wav files like this:

[protected_audio file="2024/01/filename.wav"]

following the directory structure established by WordPress, e.g. "year/month/filename.wav" , you don't need the earlier address, e.g. https://yourdomain.com/wp-content/uploads/ this is handled by the shortcode in the child theme.

Put the serve-wav.php file in a folder in your plugins directory and activate it.

This version still has extensive debugging functionality that is probably redundant. It generates an alphanumeric token on plugin install, a couple times we found that we needed to generate a new one because the generated token used a character that wasn't recognised by the "read" script.
