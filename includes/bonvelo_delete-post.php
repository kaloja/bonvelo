<?php

class Delete_Post {

  function post_delete() {
    if (isset($_POST['post_delete'])) {
      set_query_var('pid', $_POST['pid']);
      wp_trash_post(get_query_var('pid'), true);

      $current_user = wp_get_current_user();
      $user_url = $current_user->user_login;
      $url = home_url('/'.$user_url);
      wp_redirect($url);
      
      exit();
    }
  }

  function __construct() {

    add_action('init', array($this, 'post_delete'), 11);

  }

}

New Delete_Post;

?>
