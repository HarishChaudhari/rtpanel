<?php
/**
 * The generic template file
 * 
 * @package rtPanel
 * 
 * @since rtPanel 2.0
 */
get_header(); ?>

    <?php
        $rtp_content_class = '';
        $full_width_content = "";

        // Full width grid for buddypress or bbpress
        if ( rtp_get_sidebar_id() === 0 )
            $full_width_content = "rtp-full-width-content";
        
        if ( is_archive() ) {
            $rtp_content_class = ' class="rtp-content-section ' . $full_width_content . ' rtp-multiple-post" ';
        } elseif ( is_page() || is_single() || is_404() ) {
            $rtp_content_class = ' class="rtp-content-section ' . $full_width_content . ' rtp-singular" ';
        } elseif ( is_home() ) {
            $rtp_content_class = ' class="rtp-content-section ' . $full_width_content . ' rtp-blog-post" ';
        } else {
            $rtp_content_class = ' class="rtp-content-section ' . $full_width_content . '"';
        }
    ?>
    <section id="content" role="main"<?php echo $rtp_content_class; ?>>
        <?php rtp_hook_begin_content(); ?>

        <?php get_template_part( 'loop', 'common' ); ?>

        <?php rtp_hook_end_content(); ?>
    </section><!-- #content -->

    <?php (rtp_get_sidebar_id() === 0) ? '' : rtp_hook_sidebar(); ?>

<?php get_footer(); ?>