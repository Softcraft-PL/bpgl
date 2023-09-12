<?php /* Template Name: Czasopismaa */ ?>

<?php get_header(); ?>

<?php $term = get_queried_object(); ?>

<section class="py-20 lg:pb-32"> 
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-12 gap-[30px]">
            <div class="col-span-12 lg:col-span-9">
                <h1 class="text-3xl lg:text-4xl font-bold mt-0 mb-6"><?php single_term_title(); ?></h1>
            </div>
        </div>

        <?php
        $args = array(
            'post_status' => 'publish',
            'tax_query' => array(
                array(
                    'taxonomy' => $term->taxonomy,
                    'field'    => 'slug',
                    'terms'    => $term->slug,
                ),
            ),
            //'ignore_sticky_posts' => true
        );
        ?>

        <?php $posts = new WP_Query($args); ?>

        <?php if($posts->have_posts()) : ?>
            <div class="grid grid-cols-12 gap-[30px]">
            <?php while ($posts->have_posts()) : $posts->the_post(); ?>
                <div class="col-span-12 lg:col-span-3 flex flex-col mb-20">
                <?php the_post_thumbnail(array(500, 348), array('class' => 'border-radius-5 object-cover w-full h-[500px]')); ?>
                    <h2 class="text-lg font-bold mt-4 mb-2 leading-5"><?php the_title(); ?></h2>
                    <div class="text-sm flex-grow font-light leading-4"><?php echo wp_trim_words(get_the_content(), 100, '...' ); ?></div>
                    <div class="flex mt-2">
                        <?php if (get_field('pdf')): ?>
                            <?php $file = get_field('pdf'); ?>
                            <div class="font-light"><a href="<?php echo $file['url']; ?>" target="_blank">PDF</a></div>
                        <?php endif; ?>
                        <?php if (get_field('contents')): ?>
                            <?php $file = get_field('contents'); ?>
                            <div class="font-light ml-auto"><a href="<?php echo $file['url']; ?>" target="_blank">Spis treści</a></div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endwhile; ?>
            </div>
        <?php endif; ?>

        <?php wp_reset_postdata(); ?>

    </div>
</section>

<?php get_footer(); ?>
