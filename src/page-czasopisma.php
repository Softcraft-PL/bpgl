<?php /* Template Name: Czasopisma */ ?>

<?php get_header(); ?>

<?php
$categories = get_terms(
    array('nazwy-czasopism'),
    array(
        'hide_empty' => false,
        'orderby' => 'name',
        'order' => 'ASC',
        )
    );
?>

<section class="py-20 lg:pb-32">
    <div class="container mx-auto">
        <div class="grid grid-cols-12 gap-[30px]">
            <div class="col-span-12 lg:col-span-9">
                <h1 class="text-3xl lg:text-4xl font-bold m-0"><?php echo get_the_title(); ?></h1>
                <p class="font-light mt-6 mb-20">Czasopisma najlepsze, bo nasze</p>
            </div>
        </div>

        <?php if($categories) : ?>
        <?php foreach($categories as $category) : ?>

            <?php
            $args = array(
                'post_type' => 'czasopisma',
                'posts_per_page' => 3,
                'post_status' => 'publish',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'nazwy-czasopism',
                        'field'    => 'slug',
                        'terms'    => $category->slug,
                    ),
                ),
                'ignore_sticky_posts' => true
            );
            ?>

            <?php $posts = new WP_Query($args); ?>

            <?php if($posts->have_posts()) : ?>
                <h2 class="mb-4"><?php echo $category->name ?></h2>

                <div class="grid grid-cols-12 gap-[30px]">
                <?php while ($posts->have_posts()) : $posts->the_post(); ?>
                    <div class="col-span-12 lg:col-span-4 flex flex-col mb-20">
                        <?php the_post_thumbnail(array(465, 250), array('class' => 'border-radius-5 object-cover w-full')); ?>
                        <h2 class="text-lg font-bold mt-4 mb-2"><?php the_title(); ?></h2>
                        <div class="flex-grow font-light"><?php echo wp_trim_words(get_the_content(), 30, '...' ); ?></div>
                        <a class="mt-4 font-bold text-black flex" href="<?php the_permalink(); ?>">Zobacz <svg class="ml-1 mt-[3px]" width="22" height="22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4.79 16.605a.75.75 0 0 1-.067-.984l.067-.077L15.397 4.938a.75.75 0 0 1 1.128.984l-.067.077L5.85 16.605a.75.75 0 0 1-1.06 0Z" fill="#2A2A2A"/><path d="M7.391 6.236a.75.75 0 0 1-.114-1.492l.11-.008 8.538-.018a.75.75 0 0 1 .744.64l.008.111-.018 8.538a.75.75 0 0 1-1.492.108l-.008-.11.016-7.786-7.784.017Z" fill="#2A2A2A"/></svg></a>
                    </div>
                <?php endwhile; ?>
                </div>
            <?php endif; ?>

            <?php wp_reset_postdata(); ?>

            <a href="/<?php echo 'nazwy-czasopism/'.$category->slug; ?>">Zobacz więcej</a>

        <?php endforeach; ?>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>
