<?php

/* Remove admin bar for normal users
============================================================================ */

function bv_remove_admin_bar() {

  if (!current_user_can('administrator') && !is_admin()) {
    show_admin_bar(false);
  }

}

add_action('after_setup_theme', 'bv_remove_admin_bar');

?>
