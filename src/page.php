<?php get_header(); ?>

<section class="content py-20 lg:pb-32">
    <div class="container mx-auto px-4 grid grid-cols-12 gap-8">
        <div class="col-span-12 lg:col-span-8">
            <?php while (have_posts()) : the_post(); ?>
                <h1 class="text-2xl mb-4 font-bold"><?php the_title(); ?></h1>
                <?php the_content(); ?>
            <?php endwhile; ?>
        </div>
        <div class="col-span-12 lg:col-span-4 flex">
            <?php if (has_post_thumbnail()) : ?>
                <div class="w-full">
                    <?php the_post_thumbnail('full', ['class' => 'h-auto w-full']); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
