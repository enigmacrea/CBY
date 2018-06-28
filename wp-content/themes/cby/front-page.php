<?php /* Template Name: Front-page */ get_header(); ?>


<section id="hero">
  <div class="container">
    <div class="row">
      <div class="col-lg-8" id="hero-left">

        <!-- Hero Image -->
        <?php if ( get_field( 'hero_image' ) ) { ?>
          <img alt="Celebrity Branding You" class="img-fluid" src="<?php the_field( 'hero_image' ); ?>" />
        <?php } ?>

        <!-- Hero Text -->
        <div id="hero-text-wrap"><span class="hero-text white-text text-blockhero-text"><?php the_field( 'hero_text' ); ?></span></div>

        <!-- Hero CTA -->
        <?php if ( have_rows( 'cta' ) ) : ?>
          <?php while ( have_rows( 'cta' ) ) : the_row(); ?>
            <div id="hero-cta"><button onclick="location.href='<?php the_sub_field( 'cta_link' ); ?>'" class="btn btn-primary hero-cta" type="button"><?php the_sub_field( 'cta_text' ); ?></button></div>
          <?php endwhile; ?>
        <?php endif; ?>

      </div>
      <div class="col">

        <!-- Hero Book Image -->
        <?php if ( get_field( 'hero_book_image' ) ) { ?>
          <img width="80%" class="img-fluid d-flex m-auto pulse animated" alt="Celebrity Branding You" src="<?php the_field( 'hero_book_image' ); ?>"  />
        <?php } ?>

      </div>
    </div>
  </div>
</section>
<section id="main-content">
  <main>
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-xl-8 main-left">

          <!-- Homepage Content -->
          <?php the_field( 'content' ); ?>
        </div>

        <!-- Sidebar -->
        <?php if ( is_active_sidebar( 'sidebar1' ) ) : ?>
          <div class="col-md-6 col-xl-4 main-right">
            <ul id="sidebar">
              <?php dynamic_sidebar( 'sidebar1' ); ?>
            </ul>
          </div>
        <?php endif; ?>

      </div>

      <!-- As sin in Image -->
      <?php if ( get_field( 'as_sin_in', 'option' ) ) { ?>
        <div class="row">
          <div class="col">
            <img class="img-fluid d-flex justify-content-center align-content-center sinin" src="<?php the_field( 'as_sin_in', 'option' ); ?>" />
          </div>
        </div>
      <?php } ?>

    </div>
  </main>
</section>
<section id="testimonials">
  <div class="container"></div>
</section>


<?php get_footer(); ?>
