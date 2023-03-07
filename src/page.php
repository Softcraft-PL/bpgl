<?php get_header(); ?>

<section class="section">
    <div class="container">
        <div class="row">
            <div class="col">
                <?php while (have_posts()) : the_post(); ?>
                    <?php the_content(); ?>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>


