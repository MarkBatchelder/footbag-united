<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>

<tr id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
    <td class="move-header">
        <?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) && twentyfourteen_categorized_blog() ) : ?>

        <div class="entry-meta">
            <span class="cat-links"><?php echo get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'twentyfourteen' ) ); ?></span>
        </div>

        <?php
            endif;

            if ( is_single() ) :
                the_title( '<h2 class="move-title">', '</h2>' );
            else :
                the_title( '<h2 class="move-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
            endif;
        ?>

        <?php
            if(get_field('technical_name'))
            {
                echo '<h3 class="move-subtitle">' . get_field('technical_name') . '</h3>';
            }
        ?>
        
        <?php
            echo get_the_term_list( $post->ID, 'move_type', '<div class="move-type">', ', ', '</div>' );
        ?>
    </td>

    <td class="move-basics">
        <?php
            echo get_the_term_list( $post->ID, 'move_difficulty', '<div class="difficulty">', '', '</div>' );
        ?>
        <div class="adds"><?php the_field('adds'); ?></div>
    </td>

    <td class="move-details">
        <?php
            if(get_field('jobs_notation'))
            {
                echo '<pre class="notation1" title="Jobs Notation">' . get_field('jobs_notation') . '</pre>';
            }

            if(get_field('jobs_notation_2'))
            {
                echo '<pre class="notation2" title="Another Jobs Notation">' . get_field('jobs_notation_2') . '</pre>';
            }
        ?>

        <?php
            if(get_field('description'))
            {
                echo '<p class="description">' . get_field('description') . '</p>';
            }

            if(get_field('example'))
            {
                echo '<p class="example"><strong>Example:</strong> ' . get_field('example') . '</p>';
            }
        ?>
    </td>

    <td class="move-video">
        <?php
            if ( 'post' == get_post_type() )
                twentyfourteen_posted_on();

            if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) :
        ?>
        <span class="move-video-link"><?php comments_popup_link( __( 'Post a Video', 'twentyfourteen' ), __( '1 Video', 'twentyfourteen' ), __( '% Videos', 'twentyfourteen' ) ); ?></span>
        <?php
            endif;
        ?>
        <?php twentyfourteen_post_thumbnail(); ?>
    </td>
</tr><!-- #post-## -->
