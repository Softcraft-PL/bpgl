<?php /* Template Name: Monografie */ ?>

<?php get_header(); ?>

<?php
$categories = get_terms(
    array('nazwy-monografii'),
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
                <p class="font-light mt-6 mb-20">Monografie najlepsze, bo nasze</p>
            </div>
        </div>

        <?php if($categories) : ?>
        <?php foreach($categories as $category) : ?>

            <?php
            $args = array(
                'post_type' => 'monografie',
                'posts_per_page' => 4,
                'post_status' => 'publish',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'nazwy-monografii',
                        'field'    => 'slug',
                        'terms'    => $category->slug,
                    ),
                ),
                'ignore_sticky_posts' => true
            );
            ?>

            <?php $posts = new WP_Query($args); ?>

            <?php if($posts->have_posts()) : ?>
                <h2 class="mb-4 text-2xl"><?php echo $category->name ?></h2>

                <div class="grid grid-cols-12 gap-[30px]">
                <?php while ($posts->have_posts()) : $posts->the_post(); ?>
                    <div class="col-span-12 lg:col-span-3 flex flex-col mb-16">
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
                <a href="/<?php echo 'nazwy-monografii/'.$category->slug; ?>" class="button mb-32">Zobacz więcej</a>
            <?php endif; ?>
            
            <?php wp_reset_postdata(); ?>

        <?php endforeach; ?>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>
