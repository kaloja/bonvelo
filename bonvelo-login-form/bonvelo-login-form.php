<?php ini_set('display_errors', 1);

/*
  Plugin Name: Bonvelo Login Form
  Plugin URI: http://kaloja.se
  Description: Login form plugin
  Version: 1.0
  Author: Mattias Haal
*/

function bv_form() {

  if (!is_user_logged_in()) { ?>
    <form method="post" class="login_form" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
      <input name="login_username" type="text" class="login_username login_input" value="" placeholder="Användarnamn" id="login_name"/>
      <input name="login_password" type="password" class="login_password login_input" value="" placeholder="Lösenord" id="login_password"/>
      <p class="login_submit">
        <?php if (isset($_POST['redirect-post'])): ?>
          <input type="hidden" name="redirect-post" value="<?php $_POST['redirect-post'] ?>">
        <?php endif; ?>
        <!-- <input type="submit" name="submit" value="Logga in"> -->
        <button name="submit" class="post_submit" title="Logga in">Logga in</button>
      </p>
    </form>
  <?php }

  else {
    $current_user = wp_get_current_user();
    echo $current_user->user_login. ', du är inloggad.<br />';
    wp_loginout(home_url());
  }

}

function bv_auth($username, $password) {

  $creds = array();
  $creds['user_login'] = $username;
  $creds['user_password'] = $password;
  $user = wp_signon($creds, false);

  if (is_wp_error($user)) {
    // echo $user->get_error_message();

    if (empty($_POST['login_username'])) {
      echo 'Skriv in ditt användarnamn.';
    }

    if (empty($_POST['login_password'])) {
      echo 'Skriv in ditt lösenord.';
    }

    else {
      echo 'Användarnamnet och lösenordet stämmer inte överrens.';
    }

  }

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

function bv_process() {

  bv_form();

  if (isset($_POST['submit'])) {
    bv_auth($_POST['login_username'], $_POST['login_password']);
  }

}

function bv_shortcode() {

  ob_start();
  bv_process();
  return ob_get_clean();

}

add_shortcode('bv_login_form', 'bv_shortcode');

?>
