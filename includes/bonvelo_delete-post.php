<?php

class Delete_Post {

  function post_delete() {
    if (isset($_POST['post_delete'])) {
      set_query_var('pid', $_POST['pid']);
      wp_trash_post(get_query_var('pid'), true);

      // Ska redirecta till profilsida, eventuellt någon bekräftelse på borttagning.
      wp_redirect(home_url());
      exit();
    }
  }

  function __construct() {

    add_action('init', array($this, 'post_delete'), 11);

  }

}

New Delete_Post;

?>
