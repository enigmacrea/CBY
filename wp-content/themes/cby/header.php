<!doctype html>
<html style="font-family:Lato, sans-serif;">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title><?php bloginfo('name'); ?> <?php wp_title(''); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0">

  <?php wp_head(); ?>

</head>

<body>
  <header>
    <div class="d-block float-none d-flex flex-row flex-grow-1 flex-shrink-1 justify-content-center align-items-center align-content-center align-self-center m-auto" id="logo-wrap">

      <!-- Custom ACF Logo -->
      <?php if ( get_field( 'logo', 'option' ) ) { ?>
        <img class="img-fluid d-block" src="<?php the_field( 'logo', 'option' ); ?>" alt="Celebrity Branding You" width="auto" height="auto" data-bs-hover-animate="pulse" id="logo">
      <?php } ?>

    </div>
    <nav class="navbar navbar-dark navbar-expand-sm">
      <div class="container-fluid"><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
<!-- Primary Menu -->
  <?php wp_nav_menu( array( 'theme_location' => 'primary_menu', 'container_class' => 'collapse navbar-collapse', 'container_id' => 'navcol-1', 'menu_id' => 'navigation', 'menu_class' => 'nav navbar-nav mx-auto'   ) ); ?>
      </div>
    </nav>
  </header>
