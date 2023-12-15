<?php get_header(); ?>

<section class="pt-10 lg:pt-20 pb-20 lg:pb-32">
    <div class="container mx-auto px-[16px]">
        <div class="grid grid-cols-12 lg:gap-10">
            <div class="content col-span-12 lg:col-span-9">
                <?php while (have_posts()) : the_post(); ?>
                    <article>
                    <div class="grid grid-cols-12 lg:gap-10">
                        <div class="col-span-12 lg:col-span-5">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="max-w-full h-auto">
                            <?php the_post_thumbnail(array(830, 590), array('class' => 'border-radius-5 object-cover w-full h-[830px] float-left lg:float-none lg:ml-0 lg:mr-4 lg:mb-4', 'title' => get_the_title()));
                            ?>
                            </div>
                        <?php endif; ?>
                        </div>

                        <div class="col-span-12 lg:col-span-7">
                        <div class="flex flex-col justify-center flex-1">
                            <time class="block text-greyDark"><?php echo apply_filters('the_date', get_the_date()); ?></time>
                            <h2 class="text-xl font-bold lg:text-3xl mt-0 mb-2"><?php the_title(); ?></h2>

                            <?php if (has_excerpt()) : ?>
                            <div class="font-light text-lg"><?php the_excerpt(); ?></div>
                            <?php endif; ?>

                            <div class="mt-2 text-black-light">
                            <?php the_content(); ?>
                            </div>
                        </div>
                        </div>
                    </div>
                    </article>
                <?php endwhile; ?>

                <?php $gallery = get_field('gallery'); ?>
                <?php if ($gallery) : ?>
                    <h2 class="text-2xl mt-4 mb-4">Relacja fotograficzna z wydarzenia</h2>
                    <?php echo do_shortcode($gallery); ?>
                <? endif ?>
            </div>

            <aside class="col-span-12 lg:col-span-3">
                <div class="mb-4">
                    <h2 class="text-2xl font-semibold mb-4">Tagi</h2>
                    <?php
                    $tags = get_the_tags();
                    if (!$tags) {
                        $tags = get_the_terms(get_the_ID(), 'tagi');
                    }
                    if ($tags) {
                        foreach ($tags as $tag) {
                        $tag_link = get_tag_link($tag);
                        echo '<a href="' . esc_url($tag_link) . '" class="inline-block text-black font-bold hover:text-[#f3701d] py-1 px-3 text-sm mr-2 mb-2 border border-l-4 border-[#f7f7f7] hover:border-l-[#f3701d] transition-all duration-200">' . esc_html($tag->name) . '</a>';
                        }
                    }
                    ?>
                </div>
                <div class="my-4">
                    <h2 class="text-2xl font-semibold mb-4">Najnowsze artykuły</h2>
                    <?php
                    $current_post_id = get_the_ID();

                    $args = array(
                        'posts_per_page' => 3,
                        'post_status' => 'publish',
                        'order' => 'DESC',
                        'orderby' => 'date',
                        'post__not_in' => array($current_post_id),
                    );

                    $latest_posts = new WP_Query($args);

                    if ($latest_posts->have_posts()) :
                        while ($latest_posts->have_posts()) : $latest_posts->the_post();
                    ?>
                        <article class="mb-6">
                        <h3 class="text-lg font-semibold mb-2 hover:text-primary transition-all duration-200"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <p class="text-black-light text-md mb-2"><?php echo wp_trim_words(get_the_content(), 30, '...'); ?></p>
                        <p class="text-primary text-xs">Opublikowany: <?php the_time('F j, Y'); ?></p>
                        </article>
                    <?php
                        endwhile;
                    endif;    
                    wp_reset_postdata();
                    ?>
                </div>
             </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>