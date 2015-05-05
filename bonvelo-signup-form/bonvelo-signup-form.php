<?php

/*
	Plugin Name: Bonvelo Signup Form
  Plugin URI: http://kaloja.se
  Description: Signup form plugin
  Version: 1.0
  Author: Mattias Haal
*/

class Signup {

	private $username;
	private $email;
	private $password;
	private $first_name;
	private $last_name;

	function __construct() {

		add_shortcode('bv_signup_form', array($this, 'bv_callback'));

	}

	public function bv_form() { ?>

		<form method="post" name="signup_form" class="signup_form" action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>">
			<input type="text" name="username" class="signup_username signup_input" value="<?php echo(isset($_POST['username']) ? $_POST['username'] : null); ?>" placeholder="Användarnamn" id="signup_name" required/>
			<input type="text" name="fname" class="signup_fname signup_input" value="<?php echo(isset($_POST['fname']) ? $_POST['fname'] : null); ?>" placeholder="Förnamn" id="signup_fname" required/>
			<input type="text" name="lname" class="signup_lname signup_input" value="<?php echo(isset($_POST['lname']) ? $_POST['lname'] : null); ?>" placeholder="Efternamn" id="signup_lname" required/>
			<input type="text" name="email" class="signup_email signup_input" value="<?php echo(isset($_POST['email']) ? $_POST['email'] : null); ?>" placeholder="E-post" id="signup_email" required/>
			<input type="password" name="password" class="signup_password signup_input" value="<?php echo(isset($_POST['password']) ? $_POST['password'] : null); ?>" placeholder="Lösenord" id="signup_password" required/>
			<p class="signup_submit">
				<?php if (isset($_POST['redirect-post'])): ?>
					<input type="hidden" name="redirect-post" value="<?php $_POST['redirect-post'] ?>">
				<?php endif; ?>
				<button name="submit" class="post_submit" title="Registrera dig">Registrera dig</button>
			</p>
		</form>

	<?php }

	function bv_validation() {

		if (empty($this->username)) {
			return new WP_Error('empty_field', 'Användarnamn saknas.');
		}

		if (username_exists($this->username)) {
			return new WP_Error('user_exist', 'Valt användarnamn är upptaget.');
		}

		if (empty($this->email)) {
			return new WP_Error('empty_field', 'E-post saknas.');
		}

		if (empty($this->password)) {
			return new WP_Error('empty_field', 'Lösenord saknas.');
		}

		if (strlen($this->username) < 4) {
      return new WP_Error('username_length', 'Användarnamnet är för kort. Det måste vara minst fyra tecken.');
    }

    if (strlen($this->password) < 5) {
      return new WP_Error('password', 'Lösenordet måste vara minst fem tecken långt.');
    }

    if (!is_email($this->email)) {
      return new WP_Error('invalid_email', 'Ogiltig e-post.');
    }

    if (email_exists($this->email)) {
      return new WP_Error('email', 'Vald e-post är redan registrerad.');
    }

	}

	function bv_signup() {

		$userdata = array(
			'user_login' => esc_attr($this->username),
			'user_email' => esc_attr($this->email),
			'user_pass' => esc_attr($this->password),
			'first_name' => esc_attr($this->first_name),
			'last_name' => esc_attr($this->last_name),
			'role' => 'editor'
		);

		$userpage = array(
			'post_title' => esc_attr($this->username),
			'post_content' => '',
			'post_status' => 'publish',
			'post_author' => 1,
			'post_type' => 'page',
			'page_template' => 'template-dashboard.php'
		);

		if (is_wp_error($this->bv_validation())) {
			echo $this->bv_validation()->get_error_message();
		}

		else {
			$register_user = wp_insert_user($userdata);
			$register_userpage = wp_insert_post($userpage);
		}

	}

	function bv_login($username, $password) {

	  $creds = array();
	  $creds['user_login'] = $username;
	  $creds['user_password'] = $password;
	  $user = wp_signon($creds, false);

	  if (!is_wp_error($user)) {

			if (isset($_POST['redirect-post'])) {
				$post_url = home_url('/skapa-annons');
				wp_redirect($post_url);
			}

			elseif ($user && is_object($user) && is_a($user, 'WP_User')) {
				$user_url = get_userdata($user->ID);
				$url = home_url('/'.$user_url->user_login);
				wp_redirect($url);
			}

    	else {
    		wp_redirect(home_url());
    	}

  	}

	}

	function bv_callback() {

		ob_start();

		$this->bv_form();

		if (isset($_POST['submit'])) {
      $this->username = $_POST['username'];
      $this->email = $_POST['email'];
      $this->password = $_POST['password'];
      $this->first_name = $_POST['fname'];
      $this->last_name = $_POST['lname'];
      $this->bv_validation();
      $this->bv_signup();
      $this->bv_login($this->username, $this->password);
    }

    return ob_get_clean();

	}

}

new Signup;

?>
