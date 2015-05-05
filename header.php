<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Bonvelo</title>

    <!-- Prefetch DNS for external assets -->
    <!-- <link rel="dns-prefetch" href="http://fonts.googleapis.com">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:100,300,300italic,400,700" type="text/css"> -->

    <!-- Stylesheets -->
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/dist/css/vendor/ion.rangeSlider.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/dist/css/vendor/ion.rangeSlider.skinHTML5.css">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/dist/css/main.css">

    <!-- Scripts -->
    <script src="<?php bloginfo('template_directory'); ?>/assets/dist/js/vendor/jquery-2.1.3.min.js"></script>
    
    <!-- Meta -->
    <meta name="description" content="Bonvelo">

    <?php wp_head(); ?>
  </head>
  <body>
    <?php ini_set('display_errors', 1); ?>
    <header class="header">
      <?php get_template_part('content/header'); ?>
    </header>

   <!--  <form id="login" action="login" method="post">
        <h1>Site Login</h1>
        <p class="status"></p>
        <label for="username">Username</label>
        <input id="username" type="text" name="username">
        <label for="password">Password</label>
        <input id="password" type="password" name="password">
        <a class="lost" href="<?php echo wp_lostpassword_url(); ?>">Lost your password?</a>
        <input class="submit_button" type="submit" value="Login" name="submit">
        <a class="close" href="">(close)</a>
        <?php wp_nonce_field( 'ajax-login-nonce', 'security' ); ?>
    </form>

<?php if (is_user_logged_in()) { ?>
    <a class="login_button" href="<?php echo wp_logout_url( home_url() ); ?>">Logout</a>
<?php } else { ?>
    <a class="login_button" id="show_login" href="">Login</a>
<?php } ?> -->