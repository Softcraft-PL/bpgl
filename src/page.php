<?php get_header(); ?>


<section class="py-20 lg:pb-32">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-12 gap-[30px]">
            <div class="content col-span-12 lg:col-span-9">
                <?php while (have_posts()) : the_post(); ?>
                    <h1 class="text-2xl mb-4"><?php the_title(); ?></h1>
                    <?php the_content(); ?>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>


