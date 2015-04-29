    <footer class="footer">
      <?php get_template_part( 'content/footer' ); ?>
    </footer>

    <!-- Scripts -->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>-->
    <script src="<?php bloginfo('template_directory'); ?>/assets/dist/js/vendor/ion.rangeSlider.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/assets/dist/js/main.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/assets/dist/js/vendor/match-height.js"></script> 
    <script src="<?php bloginfo('template_directory'); ?>/assets/dist/js/vendor/number.js"></script>

    <script>
      $('.number').number( true, 0, ',', ' ' );
    </script>

    <?php wp_footer(); ?>
  </body>
</html>
