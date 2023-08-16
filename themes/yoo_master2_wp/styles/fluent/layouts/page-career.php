<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>

    <article class="uk-article">

        <h1 class="uk-article-title"><?php the_title(); ?></h1>

        <?php the_content(''); ?>

        <?php if( have_rows('career-centre-new-job-posting') ): ?>
        <div class="job-posting-content uk-margin-large-top">

            <?php while( have_rows('career-centre-new-job-posting') ): the_row();

                // vars
                $title = get_sub_field('job-posting-title');
                $description = get_sub_field('job-posting-description');
                $link = get_sub_field('job-posting-link');
                ?>

                <div id="<?php echo $title; ?>" class="job-posting">

                    <div class="title">
                        <h2 class="uk-h4"><?php echo $title; ?></h2>
                    </div>

                    <div class="description uk-margin-top"><?php echo $description; ?></div>

                    <div class="button uk-margin-top"><a class="uk-button uk-button-primary uk-button-small" href="<?php echo $link; ?>">Apply Now</a></div>

                </div>

            <?php endwhile; ?>

        </div>

    <?php else: ?><div class="no-postings-message uk-margin-top"><?php the_field('career-no-postings'); ?></div>

    <?php endif; ?>

    </article>

    <?php endwhile; ?>
<?php endif; ?>
