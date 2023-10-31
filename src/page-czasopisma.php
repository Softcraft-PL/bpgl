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
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-12 gap-[30px]">
            <div class="col-span-12 lg:col-span-9">
                <h1 class="text-3xl lg:text-4xl font-bold m-0"><?php echo get_the_title(); ?></h1>
                <p class="font-light mt-6">Zapraszamy do zapoznania się z czasopismami na stronie „Wiadomości Archeologicznych”</p>
                <p class="font-light mt-4 mb-20"><a class="underline" href="http://www.wiadomosci-archeologiczne.pl" target="_blank">Przejdź do strony „Wiadomości Archeologicznych”</a></p>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
