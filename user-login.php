<?php ob_start(); /* Template Name: Logga in */ ?>

<?php get_header(); ?>

<div class="wrapper">
  <div class="login">
    <?php echo do_shortcode('[bv_login_form]'); ?>
  </div>
    
  <div class="login_help">
    <a href="/reset" class="login_lost-pwd">Har du glömt ditt lösenord?</a>
    <!-- <a class="lost" href="<?php echo wp_lostpassword_url(); ?>">Lost your password?</a> -->
    <p class="login_copy">Har du inget konto?</p>

    <form method="post" class="login_signup--form" action="<?php echo home_url('/registrera-dig') ?>">
      <button class="login_signup--btn" title="Registrera dig">Registrera dig</button>
    </form>
  </div>
</div>

<?php get_footer(); ?>
