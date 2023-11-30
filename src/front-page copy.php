<?php get_header(); ?>

<section class="slider">
    <div class="slideshow-container">
        <h1 class="visually-hidden">Slider</h1>

        <?php
        $slide1 = get_field('slide_1');
        $slide2 = get_field('slide_2');
        $slide3 = get_field('slide_3');

        $slides = array($slide1, $slide2, $slide3);

        foreach ($slides as $slide) {
            if (isset($slide['slide_img'])) {
                $image = $slide['slide_img'];
                if ($image) : ?>
                    <div class="slide fade">
                        <img class="slider__img" height="650" src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($slide['slide_title']); ?>">
                        <div class="container container-slider">
                            <div class="text">
                                <?php if ($slide['slide_title']) : ?>
                                    <h2 class="slider__header"><?php echo esc_html($slide['slide_title']); ?></h1>
                                <?php endif; ?>

                                <?php if ($slide['slide_text']) : ?>
                                    <div class="slider__dsc"><?php echo esc_html($slide['slide_text']); ?></div>
                                <?php endif; ?>

                                <?php if (isset($slide['slide_button'])) : ?>
                                    <a class="button button--arrow-right button--green mt-6" href="<?php echo esc_url($slide['slide_button']['url']); ?>" target="<?php echo esc_attr($slide['slide_button']['target']); ?>"><?php echo esc_html($slide['slide_button']['title']); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
            <?php endif;
            }
        }
        ?>
    </div>

    <?php $slideCount = count($slides); echo $slideCount; ?>
    <? if ($slideCount > 1) : ?>
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>

        <div class="dots">
            <?php
            for ($i = 1; $i <= $slideCount; $i++) {
                echo '<span class="dot" onclick="currentSlide(' . $i . ')"></span>';
            }
            ?>
        </div>
    <?php endif; ?>
</section>

<script>
    let slideIndex = 1;
    showSlides(slideIndex);

    // Next/previous controls
    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    // Thumbnail image controls
    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName("slide");
        let dots = document.getElementsByClassName("dot");
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "flex";
        if(dots[0]) {
            dots[slideIndex-1].className += " active";
        }

    }
</script>

<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 2,
    'paged' => $paged,
);
$posts = new WP_Query($args);
$articleCounter = 1;
?>

<div class="pt-20 pb-20">
    <div class="container mx-auto px-[16px]">
        <div class="grid grid-cols-12 gap-[30px]">
            <div class="col-span-12 lg:col-span-9">
                <h1 class="text-2xl font-bold m-0 mb-6">Aktualności</h1>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div class="col-span-1 gap-4 flex order-2">
                <div class="flex-1 flex flex-col gap-4">
                    <section class="bg-[#f2f0ee] flex-1 md:flex" style="background: url(/wp-content/themes/bpgl/img/bg_books.webp); background-size:cover; color: white; padding: 1rem; flex-direction: column;">
                        <h2 class="text-4xl mb-8">Aktualne godziny otwarcia</h2>
                        <div class="grid grid-cols-2 gap-4">
                            <?php
                                $branch1 = get_field('branch_1', 225);
                                $branch2 = get_field('branch_2', 225);
                            ?>
                            <div>
                                <h3 class="text-2xl mb-2">Linia</h3>
                                <p class="text-lg"><?php echo $branch1['hours_1']; ?><br><br><?php echo $branch1['hours_2']; ?></p>
                            </div>
                            <div>
                                <h3 class="text-2xl mb-2">Strzepcz</h3>
                                <p class="text-lg"><?php echo $branch2['hours_1']; ?><br><br><?php echo $branch2['hours_2']; ?></p>
                            </div>
                        </div>
                    </section>
                    <section style="padding: 1rem;" class="bg-[#f2f0ee] flex-1 md:flex">
                        <a href="https://m6175.lib.mol.pl" target="_blank" title="Katalog biblioteczny Libra" style="width: 100%;display: flex;/*! justify-content: center; */align-items: center;text-align: center;flex-direction: column;">
                            <h2 style="color: #f3701d;font-size: 3rem;/*! font-weight: bold; */margin-bottom: 3rem;">Katalog książek online</h2><img alt="Katalog Libra" style="height: 100px; max-width: 100%; object-fit: contain" src="https://m6175.lib.mol.pl/themes/medley/img/libra_net.svg">
                        </a>     
                    </section>
                </div>
            </div>
            <div class="col-span-1 gap-4 flex order-1">
                <section class="flex-1">
                    <div class="grid gap-4">
                        <?php while ($posts->have_posts()) : $posts->the_post(); ?>
                            <article class="bg-[#f2f0ee] md:flex">
                                <div class="md:w-1/2">
                                    <?php the_post_thumbnail(array(465, 340), array('class' => 'border-radius-5 object-cover w-full h-[340px] min-h-')); ?>
                                </div>
                                <div class="flex flex-col md:w-1/2 p-4 md:pl-4">
                                    <div class="border-l-4 border-[#f3701d] pl-4">
                                        <p class="text-sm text-[#f3701d]">
                                            <?php
                                            $tags = get_the_tags();
                                            if ($tags) {
                                                $tag_links = array();
                                                foreach ($tags as $tag) {
                                                    $tag_links[] = '<a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a>';
                                                }
                                                echo implode(', ',  $tag_links);
                                            }
                                            ?>
                                        </p>
                                        <h2 class="text-lg font-bold text-black">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_title(); ?>
                                            </a>
                                        </h2>
                                        <time datetime="<?php echo get_the_date('c'); ?>" class="flex mb-2 text-md text-sm"><?php echo get_the_date(); ?></time>
                                    </div>
                                    <p class="flex-grow text-black pl-4"> <?php echo wp_trim_words(get_the_content(), 30, '...'); ?></p>
                                    <a class="mt-4 font-bold text-black flex pl-4" href="<?php the_permalink(); ?>">Zobacz więcej <svg class="ml-1 mt-[3px]" width="22" height="22" fill="#2A2A2A" xmlns="http://www.w3.org/2000/svg"><path d="M4.79 16.605a.75.75 0 0 1-.067-.984l.067-.077L15.397 4.938a.75.75 0 0 1 1.128.984l-.067.077L5.85 16.605a.75.75 0 0 1-1.06 0Z" fill="#2A2A2A"/><path d="M7.391 6.236a.75.75 0 0 1-.114-1.492l.11-.008 8.538-.018a.75.75 0 0 1 .744.64l.008.111-.018 8.538a.75.75 0 0 1-1.492.108l-.008-.11.016-7.786-7.784.017Z" fill="#2A2A2A"/></svg></a>
                                </div>
                            </article>
                        <?php endwhile; ?>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

<section class="pt-20 pb-20">
    <div class="container mx-auto px-[16px]">
        <div class="grid grid-cols-12 gap-[30px]">
            <div class="col-span-12 lg:col-span-9">
                <h1 class="text-2xl font-bold m-0 mb-6">Aktualności</h1>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <?php while ($posts->have_posts()) : $posts->the_post(); ?>
            <article class="bg-[#f2f0ee] md:flex order-<?php echo $articleCounter ?>">
                <div class="md:w-1/2">
                    <?php the_post_thumbnail(array(465, 340), array('class' => 'border-radius-5 object-cover w-full h-[340px]')); ?>
                </div>
                <div class="flex flex-col md:w-1/2 p-4 md:pl-4">
                    <div class="border-l-4 border-[#f3701d] pl-4">
                        <p class="text-sm text-[#f3701d]">
                            <?php
                            $tags = get_the_tags();
                            if ($tags) {
                                $tag_links = array();
                                foreach ($tags as $tag) {
                                    $tag_links[] = '<a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a>';
                                }
                                echo implode(', ',  $tag_links);
                            }
                            ?>
                        </p>
                        <h2 class="text-lg font-bold text-black">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h2>
                        <time datetime="<?php echo get_the_date('c'); ?>" class="flex mb-2 text-md text-sm"><?php echo get_the_date(); ?></time>
                    </div>
                    <p class="flex-grow text-black pl-4"> <?php echo wp_trim_words(get_the_content(), 30, '...'); ?></p>
                    <a class="mt-4 font-bold text-black flex pl-4" href="<?php the_permalink(); ?>">Zobacz więcej <svg class="ml-1 mt-[3px]" width="22" height="22" fill="#2A2A2A" xmlns="http://www.w3.org/2000/svg"><path d="M4.79 16.605a.75.75 0 0 1-.067-.984l.067-.077L15.397 4.938a.75.75 0 0 1 1.128.984l-.067.077L5.85 16.605a.75.75 0 0 1-1.06 0Z" fill="#2A2A2A"/><path d="M7.391 6.236a.75.75 0 0 1-.114-1.492l.11-.008 8.538-.018a.75.75 0 0 1 .744.64l.008.111-.018 8.538a.75.75 0 0 1-1.492.108l-.008-.11.016-7.786-7.784.017Z" fill="#2A2A2A"/></svg></a>
                </div>
            </article>
            <?php $articleCounter++; ?>
            <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
        </div>
    </div>
</section>


<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
    'post_type' => 'ksiazki',
    'post_status' => 'publish',
    'posts_per_page' => 4,
    'paged' => $paged,
);
$books = new WP_Query($args);
?>

<section class="pt-20 pb-20 bg-[#f2f0ee]">
    <div class="container mx-auto px-[16px]">
        <div class="grid grid-cols-12 gap-[30px]">
            <div class="col-span-12 lg:col-span-9">
                <h1 class="text-2xl font-bold m-0 mb-6">Nowości książkowe</h1>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-5">
            <?php while ($books->have_posts()) : $books->the_post(); ?>

            <article class="relative bg-[#f2f0ee] group">
                <div class="relative h-0 pb-[calc(540/404*100%)] overflow-hidden">
                <?php the_post_thumbnail(array(404, 540), array('class' => 'absolute top-0 left-0 w-full h-full object-cover')); ?>
                </div>
                <div class="absolute bottom-0 left-0 w-full bg-[rgba(27,27,27,.7)] text-white transition-bg duration-300 ease-in-out group-hover:bg-[#28272e]">
                <div class="p-2">
                    <p class="text-sm text-[#f3701d]">
                        <?php
                        // Get custom tags from 'tagi' taxonomy
                        $custom_tags = wp_get_post_terms(get_the_ID(), 'tagi');
                        if (!empty($custom_tags)) {
                            $tag_links = array();
                            foreach ($custom_tags as $tag) {
                                $tag_links[] = '<a href="' . get_term_link($tag) . '">' . $tag->name . '</a>';
                            }
                            echo implode(', ', $tag_links);
                        }
                        ?>
                    </p>
                    <h2 class="text-lg font-bold text-white">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h2>
                    
                    </a>
                </div>
                </div>
            </article>

            <?php endwhile; ?>
        </div>
    </div>
</section>


<?php get_footer(); ?>