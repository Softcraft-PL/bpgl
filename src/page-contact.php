<?php /* Template Name: Kontakt */ ?>


<?php get_header(); ?>

<section class="content py-20 lg:pb-32">
    <div class="container mx-auto px-[16px] grid grid-cols-12 gap-8">
        <?php
            $branch1 = get_field('branch_1', 225);
            $branch2 = get_field('branch_2', 225);
        ?>

        <div class="col-span-12 xl:col-span-6">
            <div class="col-span-12 xl:col-span-3">
                <h2 class="text-lg mb-2">Linia</h2>
                <div class="mb-2">
                    <?php echo $branch1['street']; ?><br>
                    <span><?php echo $branch1['post_code']; ?> <?php echo $branch1['city']; ?></span><br>
                    tel. <?php echo $branch1['phone']; ?><br>
                    e-mail: <?php echo $branch1['email']; ?>
                </div>
                <div>
                    <div class="mb-1"><?php echo $branch1['hours_1']; ?></div>
                    <div><?php echo $branch1['hours_2']; ?></div>
                </div>
            </div>
            <div class="col-span-12 xl:col-span-3 mt-6">
                <h2 class="text-lg mb-2">Strzepcz</h2>
                <div class="mb-2">
                    <?php echo $branch2['street']; ?><br>
                    <span><?php echo $branch2['post_code']; ?> <?php echo $branch2['city']; ?></span><br>
                    tel. <?php echo $branch2['phone']; ?><br>
                    e-mail: <?php echo $branch2['email']; ?>
                </div>
                <div>
                    <div class="mb-1"><?php echo $branch2['hours_1']; ?></div>
                    <div><?php echo $branch2['hours_2']; ?></div>
                </div>
            </div>
        </div>

        <div class="col-span-12 xl:col-span-6">
            <?php echo do_shortcode('[contact-form-7 id="8427a6f" title="Formularz 1"]'); ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
