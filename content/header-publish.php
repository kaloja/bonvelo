<div class="wrapper">

  <nav class="site-nav">
    <ul class="site-nav_list ui-list">
      <li class="site-nav_item">
        <a href="<?php echo home_url('/annonser') ?>" class="site-nav_link" title="Annonser">Annonser</a>
      </li>

      <?php if (is_user_logged_in()): ?>

        <li class="site-nav_item">
          <?php $current_user = wp_get_current_user(); ?>
          <?php $username = $current_user->user_login; ?>
          <?php $fname =  $current_user->first_name; ?>
          <?php $lname =  $current_user->last_name; ?>
          <a href="<?php echo home_url('/'.$username) ?>" class="site-nav_link" title="Profil och inställningar">Konto</a>
          <!--<?php echo $fname.' '.$lname ?>-->
        </li>

        <li class="site-nav_item">
          <a href="<?php echo wp_logout_url(); ?>" class="site-nav_link" title="Logga ut">Logga ut</a>
        </li>

      <?php else: ?>

        <li class="site-nav_item">
          <a href="<?php echo home_url('/logga-in') ?>" class="site-nav_link" title="Logga in">Logga in</a>
        </li>

      <?php endif; ?>

      <li class="site-nav_item">
        <button class="site-nav_link btn-cta" title="Publicera annons">Publicera</button>
      </li>
    </ul>
  </nav>

</div>
