<?php if ( has_nav_menu( 'header' ) ) : ?>
    <nav
        id="site-navigation"
        class="main-navigation"
        role="navigation"
    >
        <?php
        wp_nav_menu( array(
            'menu_class'     => 'nav-menu',
            'theme_location' => 'header',
        ) );
        ?>
    </nav><!-- .main-navigation -->
<?php endif;