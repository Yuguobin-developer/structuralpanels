<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>

    <article class="uk-article">

        <?php if (has_post_thumbnail()) : ?>
            <?php
            $width = get_option('thumbnail_size_w'); //get the width of the thumbnail setting
            $height = get_option('thumbnail_size_h'); //get the height of the thumbnail setting
            ?>
            <?php the_post_thumbnail(array($width, $height), array('class' => '')); ?>
        <?php endif; ?>

        <?php if(get_field('courses-featured-image')): ?>
    	<div class="image">
    		<img class="uk-thumbnail" src="<?php the_field('courses-featured-image'); ?>" alt="<?php the_title(); ?>" />
    	</div>
        <?php endif; ?>

        <h1 class="uk-article-title<?php if(get_field('courses-featured-image')): ?> uk-margin-large-top<?php endif; ?>"><?php the_title(); ?></h1>

        <?php the_content(''); ?>

    </article>

    <?php endwhile; ?>
<?php endif; ?>
