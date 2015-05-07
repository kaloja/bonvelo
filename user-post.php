<?php ob_start(); /* Template Name: Publicering */ ?>

<?php get_header(); ?>

<?php if (is_user_logged_in()): ?>

  <?php get_template_part('content/post'); ?>

<?php else: ?>

  <div class="wrapper">
    <div class="login">
      <h2 class="login_title">Logga in för att skapa en annons</h2>
      <?php echo do_shortcode('[bv_login_form]'); ?>
    </div>
      
    <div class="login_help">
      <a href="#" class="login_lost-pwd">Har du glömt ditt lösenord?</a>

      <p class="login_copy">Har du inget konto?</p>

      <form method="post" class="login_signup--form" action="<?php echo home_url('/registrera-dig') ?>">
        <input type="hidden" name="redirect-post" value="redirect-post">
        <button class="login_signup--btn" title="Registrera dig">Registrera dig</button>
      </form>
    </div>
  </div>

<?php endif; ?>

<?php get_footer(); ?>
