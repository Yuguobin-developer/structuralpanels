<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme.
 * It is used to display a list of blog posts or other post types.
 */

get_header(); // Include the header.php template

if (have_posts()) :
    while (have_posts()) :
        the_post();
        // The template tags and HTML structure to display each post
        // For example:
        ?>
        <article <?php post_class(); ?>>
            <!-- <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2> -->
            <?php the_content(); ?>
        </article>
        <?php
    endwhile;
else :
    // If no posts are found, display a message
    echo '<p>No content found.</p>';
endif;

get_footer(); // Include the footer.php template
