<?php /* Template Name: Kontakt */ ?>

<?php get_header(); ?>

<section class="py-20 lg:pb-32">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-12 gap-[30px]">
            <div class="col-span-12 lg:col-span-6">
                <h1 class="text-2xl mb-4"><?php the_title(); ?></h1>
                Państwowe Muzeum Archeologiczne – Dział Wydawnictw<br>
                ul. Długa 52 (Arsenał)<br>
                00-420 Warszawa<br>
                <a href="mailto:wydawnictwo@pma.pl">wydawnictwo@pma.pl</a>



                <iframe class="w-full mt-4" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2442.844818446261!2d20.99854617761488!3d52.24620225646326!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x471ecc7b5ace7f65%3A0xe16aae44455c2d7a!2sPa%C5%84stwowe%20Muzeum%20Archeologiczne!5e0!3m2!1spl!2spl!4v1687540888150!5m2!1spl!2spl" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>            </div>
            <div class="content col-span-12 lg:col-span-6">
                <?php while (have_posts()) : the_post(); ?>
                    <?php the_content(); ?>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>


