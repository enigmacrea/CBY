<div class="footer-basic">
  <footer>
    <!--Footer Menu -->
    <?php wp_nav_menu( array( 'theme_location' => 'footer_menu', 'menu_class' => 'list-inline'   ) ); ?>

    <p class="copyright">Copyright © 2018 Celebrity Branding You.com </p>
  </footer>
</div>
<section id="signup">
  <div class="container">
    <div class="row">

      <!-- Footer Column 1 -->
      <?php if ( is_active_sidebar( 'footer1' ) ) : ?>
        <div class="col-md-4 col-lg-2">
          <?php dynamic_sidebar( 'footer1' ); ?>
        </div>
      <?php endif; ?>

      <!-- Footer Column 2 -->
      <?php if ( is_active_sidebar( 'footer2' ) ) : ?>
      <div class="col-md-4 col-lg-6">
          <?php dynamic_sidebar( 'footer2' ); ?>
          <?php dynamic_sidebar( 'disclamer' ); ?>
      </div>
        <?php endif; ?>


        <div class="col">
          <!-- Footer Column 3 (optional) -->
          <?php if ( is_active_sidebar( 'footer3' ) ) : ?>
            <?php dynamic_sidebar( 'footer3' ); ?>
          <?php endif; ?>

          <!-- Form -->
        <?php get_template_part( 'form' ); ?>

        </div>



      </div>
    </div>
  </section>

  <?php wp_footer(); ?>

</body>
</html>
