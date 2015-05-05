<?php

class Draft_Post {

    function post_draft() {
        if (isset($_POST['post_draft'])) {
            set_query_var('pid', $_POST['pid']);
            wp_update_post(array('ID' => get_query_var('pid'), 'post_status' => 'draft'));

            $current_user = wp_get_current_user();
            $user_url = $current_user->user_login;
            $url = home_url('/'.$user_url);
            wp_redirect($url);

            exit();
        }
    }

    function __construct() {

        add_action('init', array($this, 'post_draft'), 11);

    }

}

New Draft_Post;

?>
