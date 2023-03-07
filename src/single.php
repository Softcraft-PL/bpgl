<?php get_header(); ?>

<section class="pt-10 lg:pt-20 pb-20 lg:pb-32">
    <div class="container mx-auto">
        <?php while (have_posts()) : the_post(); ?>
            <article>
                <div class="grid grid-cols-12 lg:gap-10">
                    <div class="col-span-12 lg:col-span-6">
                        <div class="flex flex-col justify-center flex-1">
                            <time class="block text-greyDark mb-4"><?php echo apply_filters('the_date', get_the_date()); ?></time>
                            <h2 class="text-xl lg:text-3xl mt-0 mb-3"><?php the_title(); ?></h2>
                            <?php if (has_excerpt()): ?>
                            <div class="font-light text-lg"><?php the_excerpt(); ?></div>
                            <?php endif; ?>
                            <?php if (get_field('author')): ?>
                            <div class="font-light">Autor: <?php echo get_field('author') ?></div>
                            <?php endif; ?>
                            <?php if (get_field('pages')): ?>
                            <div class="font-light">Liczba stron: <?php echo get_field('pages') ?></div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="col-span-12 lg:col-span-6">
                        <?php if (has_post_thumbnail()) { the_post_thumbnail(array(700, 450), array('class' => 'border-radius-5 object-cover w-full h-[450px]')); } ?>
                    </div>

                    <div class="col-span-12 lg:columns-2 lg:gap-10 font-light">
                        <div>
                        <?php if (get_field('contents')): ?>
                            <h2>Spis treści</h2>
                         <?php echo get_field('contents') ?>
                            <?php endif; ?>
                        </div>
                        <?php the_content(); ?>
                    </div>
                </div>
            </article>
        <?php endwhile; ?>
    </div>
</section>

<?php get_footer(); ?>