<?php
session_start();
class Update_Email {

    function update_useremail() {
        if (isset($_POST['post_update--email'])) {
           	
            $current_user = wp_get_current_user();
            $pwd = $_POST['post_email--pwd'];
            $user_id = $_POST['user_id'];
            $email = $_POST['post_email'];

            if ($current_user && wp_check_password($pwd, $current_user->data->user_pass, $user_id)) {

            	if (email_exists($email)) {
            		$_SESSION['email-exists'] = 'Vald e-post är redan registrerad';
            	}

            	else {
            		$userdata = array(
            			'ID' => esc_attr($user_id),
						'user_email' => esc_attr($email)
					);

            		wp_update_user($userdata);
            		$_SESSION['success'] = 'Din e-post är uppdaterad';

		            $user_url = $current_user->user_login;
		            $url = home_url('/'.$user_url);
		            wp_redirect($url);

		            exit();
            	}

            }

            else {
            	$_SESSION['failed-pwd'] = 'Fel lösenord';
            }

            //exit();
        }
    }

    function __construct() {
        add_action('init', array($this, 'update_useremail'), 11);
    }

}

New Update_Email;

?>
