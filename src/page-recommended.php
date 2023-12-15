<?php /* Template Name: Polecane książki */ ?>

<?php get_header(); ?>

<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
    'post_type' => 'ksiazki',
    'post_status' => 'publish',
    'posts_per_page' => 4,
    'paged' => $paged,
    'meta_query'     => array(
        array(
            'key'   => 'recommended',
            'value' => true,
        ),
    ),
);
$books = new WP_Query($args);
?>

<section class="pt-20 pb-20">
    <div class="container mx-auto px-[16px]">
        <div class="grid grid-cols-12 gap-5">
            <div class="col-span-12 lg:col-span-9 mb-10">
                <h1 class="text-4xl font-bold m-0">Polecane książki</h1>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
            <?php while ($books->have_posts()) : $books->the_post(); ?>

            <article class="relative bg-[#f7f7f7] group">
                <div class="relative h-0 pb-[calc(540/404*100%)] overflow-hidden">
                <?php the_post_thumbnail(array(404, 540), array('class' => 'absolute top-0 left-0 w-full h-full object-cover')); ?>
                </div>
                <div class="absolute bottom-0 left-0 w-full bg-[rgba(27,27,27,.7)] text-white transition-bg duration-300 ease-in-out group-hover:bg-[#28272e]">
                <div class="p-2">
                    <p class="text-sm text-[#f3701d]">
                        <?php
                        // Get custom tags from 'tagi' taxonomy
                        $custom_tags = wp_get_post_terms(get_the_ID(), 'tagi');
                        if (!empty($custom_tags)) {
                            $tag_links = array();
                            foreach ($custom_tags as $tag) {
                                $tag_links[] = '<a href="' . get_term_link($tag) . '">' . $tag->name . '</a>';
                            }
                            echo implode(', ', $tag_links);
                        }
                        ?>
                    </p>
                    <h2 class="text-lg font-bold text-white">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h2>
                    
                    </a>
                </div>
                </div>
            </article>

            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>

        </div>
    </div>
</section>

<?php get_footer(); ?>
