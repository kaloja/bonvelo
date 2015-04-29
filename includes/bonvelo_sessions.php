<?php

function set_session() {
  if (!session_id() && !is_user_logged_in()) {
    session_start();

    $redirect_post = 'redirect';

    if (!isset($_SESSION['redirect-post'])) {
      $_SESSION['redirect-post'] = $redirect_post;
    }
  }
}

add_action('init', 'set_session');



function destroy_session() {
  if (session_id()) {
    session_destroy();
  }
}

add_action('wp_login', 'destroy_session');

?>
