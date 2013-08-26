<?php
/**
 * The template for displaying Google Custom Search or WordPress Default Search
 *
 * @package rtPanel
 * 
 * @since rtPanel 2.0
 */
get_header(); ?>

<?php global $rtp_general; ?>

    <section id="content" role="main" class="rtp-content-section rtp-multiple-post<?php echo ( $rtp_general['search_code'] && $rtp_general['search_layout'] ) ? ' rtp-full-width-content' : ''; ?>"><!-- content begins --><?php

        rtp_hook_begin_content();

        if ( $rtp_general['search_code'] ) {
            $version = NULL;
            /* Check which version of Google Search Element Code is being used */
            if ( preg_match( '/customSearchControl.draw\(\'cse\'(.*)\)\;/i', $rtp_general['search_code'], $split_code ) ) {
                $version = 1; // Google Search Element V1 code
            } elseif ( preg_match('/\<gcse:(searchresults-only|searchresults|search).*\>\<\/gcse:(searchresults-only|searchresults|search)\>/i', $rtp_general['search_code'] ) ) {
                $version = 2; // Google Search Element V2 code
            } ?>
                <h1 class="post-title rtp-main-title"><?php printf( __( 'Search Results for: %s', 'rtPanel' ), '<span>' . get_search_query() . '</span>' ); ?></h1><?php
                if ( 1 == $version ) {
                    $search_code = preg_split('/customSearchControl.draw\(\'cse\'(.*)\)\;/i', $rtp_general['search_code']);
                    echo $search_code[0];
                    echo $split_code[0];
                    echo "customSearchControl.execute('" . get_search_query() . "');";
                    echo $search_code[1];
                } elseif ( 2 == $version ) {
                    echo preg_replace('/\<gcse:(searchresults-only|searchresults|search)(.*)\>\<\/gcse:(searchresults-only|searchresults|search)\>/i', '<gcse:$1 queryParameterName="s"$2></gcse:$3>', $rtp_general['search_code'] );
                }
        } else {
            get_template_part( 'loop', 'common' );
        } ?>

        <?php rtp_hook_end_content(); ?>

    </section><!-- #content -->

    <?php if ( !$rtp_general['search_code'] || !$rtp_general['search_layout'] ) rtp_hook_sidebar(); ?>

<?php get_footer(); ?>