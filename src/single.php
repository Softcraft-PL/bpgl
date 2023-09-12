<?php get_header(); ?>

<section class="pt-10 lg:pt-20 pb-20 lg:pb-32">
    <div class="container mx-auto px-4">
        <?php while (have_posts()) : the_post(); ?>
            <article>
                <div class="grid grid-cols-12 lg:gap-10">
                    <div class="col-span-12 lg:col-span-7">
                        <div class="flex flex-col justify-center flex-1">
                            <time class="block text-greyDark"><?php echo apply_filters('the_date', get_the_date()); ?></time>
                            <div class="mb-4">Autor wpisu: <?php the_author(); ?></div>
                            <h2 class="text-xl lg:text-3xl mt-0 mb-3"><?php the_title(); ?></h2>
                            
                            <?php if (has_excerpt()): ?>
                            <div class="font-light text-lg"><?php the_excerpt(); ?></div>
                            <?php endif; ?>
                            <?php if (get_field('author')): ?>
                            <div class="font-light mb-2">Autor wpisu: <?php echo get_field('author') ?></div>
                            <?php endif; ?>
                            <?php if (get_field('pages')): ?>
                            <div class="font-light mb-2">Liczba stron: <?php echo get_field('pages') ?></div>
                            <?php endif; ?>
                            <?php if (get_field('pdf')): ?>
                                <?php $file = get_field('pdf'); ?>
                                <div class="font-light mb-2">PDF: <a href="<?php echo $file['url']; ?>" target="_blank">Pobierz</a></div>
                            <?php endif; ?>

                            <div class="mt-6">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-span-12 lg:col-span-5">
                        <?php if (has_post_thumbnail()) { the_post_thumbnail(array(830, 590), array('class' => 'border-radius-5 object-cover w-full h-[830px]')); } ?>
                    </div>

                    <div class="col-span-12 font-light">
                    
                            <?php if (get_field('contents')): ?>
                                    <h2>Spis treści</h2>
                                    <?php echo get_field('contents') ?>
                            <?php endif; ?>
                        
                    </div>
                </div>
            </article>
        <?php endwhile; ?>
    </div>
</section>

<?php get_footer(); ?>