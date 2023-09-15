<?php get_header(); ?>

<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 6,
    'paged' => $paged,
);
$posts = new WP_Query($args);
?>

<section class="py-32 bg-cover bg-center" style="background-image: url(/wp-content/themes/pma/img/bg.webp);">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-12 gap-[30px]">
            <div class="col-span-12">
                <h1 class="text-2xl text-white">Wydawnictwo Państwowego Muzeum Archeologicznego w Warszawie</h1>
            </div>
        </div>
    </div>
</section>

<section class="pt-20 pb-20 lg:pb-32">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-12 gap-[30px]">
            <div class="col-span-12 lg:col-span-9">
                <h1 class="text-3xl lg:text-4xl font-bold m-0 mb-6">Aktualności</h1>
            </div>
        </div>

        <div class="grid grid-cols-12 gap-[30px]">
            <?php while ($posts->have_posts()) : $posts->the_post(); ?>
                <div class="col-span-12 lg:col-span-4 flex flex-col mb-20">
                    <?php the_post_thumbnail(array(465, 340), array('class' => 'border-radius-5 object-cover w-full h-[340px]')); ?>
                    <time datetime="<?php echo get_the_date('c'); ?>" class="mt-2 text-md"><?php echo get_the_date(); ?></time>
                    <div class="text-md">Autor wpisu: <?php the_author(); ?></div>
                    <?php 
                        $categories = get_the_category();
                        if (!empty($categories)) {
                            $category_link = get_category_link($categories[0]->term_id);
                            echo '<div>Kategoria: <a href="' . esc_url($category_link) . '">' . esc_html($categories[0]->name) . '</a></div>';
                        }
                    ?>
                    <h2 class="text-lg font-bold mt-2 mb-2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <div class="flex-grow font-light"><?php echo wp_trim_words(get_the_content(), 30, '...' ); ?></div>
                    <a class="mt-4 font-bold text-black flex" href="<?php the_permalink(); ?>">Zobacz więcej <svg class="ml-1 mt-[3px]" width="22" height="22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4.79 16.605a.75.75 0 0 1-.067-.984l.067-.077L15.397 4.938a.75.75 0 0 1 1.128.984l-.067.077L5.85 16.605a.75.75 0 0 1-1.06 0Z" fill="#2A2A2A"/><path d="M7.391 6.236a.75.75 0 0 1-.114-1.492l.11-.008 8.538-.018a.75.75 0 0 1 .744.64l.008.111-.018 8.538a.75.75 0 0 1-1.492.108l-.008-.11.016-7.786-7.784.017Z" fill="#2A2A2A"/></svg></a>
                </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>