<?php
/**
 * The generic template file
 * 
 * @package rtPanel
 * 
 * @since rtPanel 2.0
 */
?>

<?php get_header(); ?>

    <?php get_sidebar(); ?>

    <?php
    $rtp_content_class = '';
    if ( is_search() || is_archive() ) {
        $rtp_content_class = ' class="rtp-multiple-post" ';
    } elseif ( is_page() || is_single() || is_404() ) {
        $rtp_content_class = ' class="rtp-single-post" ';
    } elseif ( is_home() ) {
        $rtp_content_class = ' class="rtp-blog-post" ';
    } else {
        $rtp_content_class = '';
    }
    ?>
    <div id="content"<?php echo $rtp_content_class; ?>>
        <?php rtp_hook_begin_content(); ?>

        <?php get_template_part( 'loop', 'common' ); ?>

        <?php rtp_hook_end_content(); ?>
    </div><!-- #content -->

<?php get_footer(); ?>