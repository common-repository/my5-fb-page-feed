<?php
/*
Plugin Name: My5 FB page feed
Description: Widget that Get all facebook page feed with cover image and count likes.
Version: 1.0
Author: Infoseek Team
Author URI: http://infoseeksoftwaresystems.com/
License: GPL2
*/

include('class.php');
function fpfmy5_fbscript() {
?>
<script>
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.9";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<?php
}
add_action( 'wp_footer', 'fpfmy5_fbscript' );