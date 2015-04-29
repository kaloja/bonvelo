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
