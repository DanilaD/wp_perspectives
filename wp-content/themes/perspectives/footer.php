<?php
/**
 * Created by PhpStorm.
 * User: Danila
 * Date: 2/24/2018
 * Time: 3:36 PM
 */
?>
<footer class="site-footer">

    <?php
    if ( is_active_sidebar( 'sidebar-2' ) ||
        is_active_sidebar( 'sidebar-3' ) ) :
        ?>

        <aside class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Footer', 'twentyseventeen' ); ?>">
            <?php
            if ( is_active_sidebar( 'sidebar-2' ) ) { ?>
                <div class="widget-column footer-widget-1">
                    <?php dynamic_sidebar( 'sidebar-2' ); ?>
                </div>
            <?php }
            if ( is_active_sidebar( 'sidebar-3' ) ) { ?>
                <div class="widget-column footer-widget-2">
                    <?php dynamic_sidebar( 'sidebar-3' ); ?>
                </div>
            <?php } ?>
        </aside><!-- .widget-area -->

    <?php else : ?>

    <div class="row">
        <div class="col-sm-6 col-xs-12" id="left">
            <h5>© <?php echo date('Y');?></h5>
        </div>
        <div class="col-sm-6 col-xs-12 social-icons" id="right">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
            <a href="#"><i class="fa fa-envelope"></i></a>
        </div>
    </div>
    <?php endif; ?>

</footer>
<?php wp_footer(); ?>
</body>

</html>