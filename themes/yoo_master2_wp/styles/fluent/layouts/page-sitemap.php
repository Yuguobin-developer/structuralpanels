<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>

        <article id="post-<?php the_ID() ?>" <?php post_class('uk-article') ?> typeof="Article">

            <div class="uk-container uk-container-small">

                <meta property="name" content="<?= esc_html(get_the_title()) ?>">
                <meta property="author" typeof="Person" content="<?= esc_html(get_the_author()) ?>">
                <meta property="dateModified" content="<?= get_the_modified_date('c') ?>">
                <meta class="uk-margin-remove-adjacent" property="datePublished" content="<?= get_the_date('c') ?>">

                <?php the_title('<h1 class="uk-article-title">', '</h1>') ?>

                <?php if(have_rows('sitemap-post-information')): ?>
                <div class="sitemap-post-information uk-margin-large-top">

                    <?php while(have_rows('sitemap-post-information')): the_row();
                        $exclusions = get_sub_field('sitemap-post-information-exclusions');
                        $name = get_sub_field('sitemap-post-information-name');
                        $order = get_sub_field('sitemap-post-information-order');
                        $orderby = get_sub_field('sitemap-post-information-orderby');
                        $slug = get_sub_field('sitemap-post-information-slug');
                    ?>

                        <?php
                            $args = array(
                                'order' => 'ASC',
                                'orderby' => 'menu_order',
                                'post__not_in' => explode( ',', $exclusions ),
                                'post_type' => $slug,
                                'posts_per_page' => -1,
                            );
                            $sitemap_posts = new WP_Query($args);
                        ?>

                        <?php if($sitemap_posts->have_posts()): ?>
                        <div class="posts <?php echo $slug; ?> uk-margin-medium-top">
                            <h2><?php echo $name; ?></h2>
                            <?php while($sitemap_posts->have_posts()) : $sitemap_posts->the_post(); ?>
                            <span class="post <?php echo $slug; ?> uk-text-break"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
                            <?php endwhile; ?>
                        </div>
                        <?php endif; ?>

                        <?php wp_reset_postdata(); ?>

                    <?php endwhile; ?>

                </div>
                <?php endif; ?>

            </div>

        </article>


    <?php endwhile; ?>
<?php endif; ?>
