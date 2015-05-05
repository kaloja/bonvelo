<?php

class Publish_Post {

  function post_publish() {
    if (isset($_POST['post_publish'])) {
      set_query_var('pid', $_POST['pid']);
      wp_update_post(array('ID' => get_query_var('pid'), 'post_status' => 'publish'));

      $current_user = wp_get_current_user();
      $user_url = $current_user->user_login;
      $url = home_url('/'.$user_url);
      wp_redirect($url);

      exit();
    }
  }

  function __construct() {

    add_action('init', array($this, 'post_publish'), 11);

  }

}

New Publish_Post;

?>
