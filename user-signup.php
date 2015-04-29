<?php ob_start(); /* Template Name: Registrering */ ?>

<?php get_header(); ?>

<div class="wrapper">
  <div class="signup">
    <?php echo do_shortcode('[bv_signup_form]'); ?>
	  

	  <div class="signup_help">
	  	<p class="signup_copy">Har du inget konto?</p>

	    <form method="post" class="signup_login--form" action="<?php echo home_url('/logga-in') ?>">
	      <button class="signup_login--btn" title="Logga in">Logga in</button>
	    </form>
	  </div>

	  <div class="signup_terms">
	  	<p>När du registrerar dig godkänner du Bonvelos <a href="#" class="signup_link">användarvillkor</a>.</p>
	  </div>
  </div>
</div>

<?php get_footer(); ?>
