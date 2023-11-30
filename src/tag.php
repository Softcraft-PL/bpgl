<?php get_header(); ?>

<?php $term = get_queried_object(); ?>

<section class="py-20 lg:pb-32"> 
    <div class="container mx-auto px-[16px]">
        <div class="grid grid-cols-12 gap-[30px]">
            <div class="col-span-12 lg:col-span-9 mb-10">
                <h1 class="text-3xl lg:text-4xl font-bold mt-0 mb-10">Więcej dla: <?php single_term_title(); ?></h1>
                <?php
                    $tags = get_terms(array(
                        'taxonomy' => 'post_tag',
                        'hide_empty' => false,
                    ));
                    if ($tags) {
                        foreach ($tags as $tag) {
                            $tag_link = get_tag_link($tag);
                            echo '<a href="' . esc_url($tag_link) . '" class="inline-block text-black font-bold hover:text-[#f3701d] py-1 px-3 text-sm mr-2 mb-2 border border-l-4 border-[#f2f0ee] hover:border-l-[#f3701d] transition-all duration-200">' . esc_html($tag->name) . '</a>';
                        }
                    }
                ?>
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
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <?php while ($posts->have_posts()) : $posts->the_post(); ?>
                <article class="bg-[#f2f0ee] xl:flex">
                    <div class="xl:w-1/2">
                        <?php the_post_thumbnail(array(465, 340), array('class' => 'border-radius-5 object-cover w-full h-[250px] xl:h-[340px] min-h-full')); ?>
                    </div>
                    <div class="flex flex-col xl:w-1/2 p-4 xl:pl-4">
                        <div class="border-l-4 border-[#f3701d] pl-4">
                            <div class="text-sm text-[#f3701d]">
                                <?php
                                $tags = get_the_tags();
                                if ($tags) {
                                    $tag_links = array();
                                    foreach ($tags as $tag) {
                                        $tag_links[] = '<a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a>';
                                    }
                                    echo implode(', ',  $tag_links);
                                }
                                ?>
                            </div>
                            <h2 class="text-xl font-bold text-black hover:text-primary transition-all duration-200">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h2>
                            <time datetime="<?php echo get_the_date('c'); ?>" class="flex mb-2 text-md text-sm"><?php echo get_the_date(); ?></time>
                        </div>
                        <p class="flex-grow text-black-light font-light pl-4 mt-1"><?php echo wp_trim_words(get_the_content(), 30, '...'); ?></p>
                        <a class="more mt-4 font-bold text-black hover:text-primary transition-all duration-200 flex pl-4" href="<?php the_permalink(); ?>">Zobacz więcej <svg class="ml-1 mt-[3px]" width="22" height="22" fill="#2A2A2A" xmlns="http://www.w3.org/2000/svg"><path d="M4.79 16.605a.75.75 0 0 1-.067-.984l.067-.077L15.397 4.938a.75.75 0 0 1 1.128.984l-.067.077L5.85 16.605a.75.75 0 0 1-1.06 0Z" fill="#2A2A2A"/><path d="M7.391 6.236a.75.75 0 0 1-.114-1.492l.11-.008 8.538-.018a.75.75 0 0 1 .744.64l.008.111-.018 8.538a.75.75 0 0 1-1.492.108l-.008-.11.016-7.786-7.784.017Z" fill="#2A2A2A"/></svg></a>
                    </div>
                </article>
            <?php endwhile; ?>
            </div>
        <?php endif; ?>

        <?php wp_reset_postdata(); ?>

    </div>
</section>

<?php get_footer(); ?>
