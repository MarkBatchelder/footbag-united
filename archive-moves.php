<?php
/**
 * The template for displaying Category pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<?php if ( have_posts() ) : ?>

			<header class="archive-header">
				<h1 class="archive-title"><?php the_archive_title() ?></h1>

				<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					endif;
				?>
			</header><!-- .archive-header -->

            <table class="taxonomy-moves">
                <thead class="move-thead">
                    <tr>
                        <th class="move-th-1">Name / Technical Name / Type</th>
                        <th class="move-th-2">Difficulty</th>
                        <th class="move-th-3">Jobs' Notation / Description</th>
                        <th class="move-th-4">Video Example</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                        // Start the Loop.
                        while ( have_posts() ) : the_post();

                        /*
                         * Include the post format-specific template for the content. If you want to
                         * use this in a child theme, then include a file called called content-___.php
                         * (where ___ is the post format) and that will be used instead.
                         */
                        get_template_part( 'table-moves-content', get_post_format() );

                        endwhile;
                        // Previous/next page navigation.
                        twentyfourteen_paging_nav();

                    else :
                        // If no content, include the "No posts found" template.
                        get_template_part( 'content', 'none' );

                    endif;
                ?>
                </tbody>
            </table>
		</div><!-- #content -->
	</section><!-- #primary -->

<?php
get_sidebar( 'content' );
get_sidebar();
get_footer();
