<div class="wrapper">
  <div class="logo">
    <a href="/"><img src="<?php bloginfo('template_directory'); ?>/assets/src/img/logo-bonvelo.svg" title="Bonvelo"></a>
  </div>

  <nav class="site-nav">
    <ul class="site-nav_list ui-list">
      <li class="site-nav_item">
        <a href="<?php echo home_url('/annonser') ?>" class="site-nav_link" title="Annonser">Annonser</a>
      </li>

      <?php if (is_user_logged_in()): ?>

        <?php if ($current_user): ?>
          <li class="site-nav_item">
            <?php $current_user = wp_get_current_user(); ?>
            <?php $username = $current_user->user_login; ?>
            <?php $fname =  $current_user->first_name; ?>
            <?php $lname =  $current_user->last_name; ?>
            <a href="<?php echo home_url('/'.$username) ?>" class="site-nav_link" title="Profil och inställningar"><?php echo $fname.' '.$lname ?></a>
            <!--<?php echo $fname.' '.$lname ?>-->
          </li>
        <?php endif; ?>

        <li class="site-nav_item">
          <a href="<?php echo wp_logout_url(); ?>" class="site-nav_link" title="Logga ut">Logga ut</a>
        </li>

      <?php else: ?>

        <li class="site-nav_item">
          <a href="<?php echo home_url('/logga-in') ?>" class="site-nav_link" title="Logga in">Logga in</a>
        </li>

      <?php endif; ?>

      <li class="site-nav_item">
        <?php if (is_page('skapa-annons') && (is_user_logged_in())): ?>

          <form method="post" action="<?php echo home_url('/skapa-annons') ?>">
            <input type="hidden" name="redirect-post" value="redirect-post">
            <button class="site-nav_link btn-cta--active" title="Skapa annons">Skapa annons</button>
          </form>

        <?php else: ?>

          <form method="post" action="<?php echo home_url('/skapa-annons') ?>">
            <input type="hidden" name="redirect-post" value="redirect-post">
            <button class="site-nav_link btn-cta" title="Skapa annons">Skapa annons</button>
          </form>

        <?php endif; ?>
      </li>
    </ul>
  </nav>

</div>
