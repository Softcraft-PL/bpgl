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
                            <div class="text p-6 md:p-6 bg-[rgba(0,0,0,.5)]">
                                <?php if ($slide['slide_title']) : ?>
                                    <h2 class="text-white text-3xl lg:text-4xl mb-4"><?php echo esc_html($slide['slide_title']); ?></h1>
                                <?php endif; ?>

                                <?php if ($slide['slide_text']) : ?>
                                    <div class="slider__dsc"><?php echo esc_html($slide['slide_text']); ?></div>
                                <?php endif; ?>

                                <?php if (isset($slide['slide_button']) && is_array($slide['slide_button'])) : ?>
                                    <a class="bg-[#f3701d] text-white text-base md:text-xl px-4 py-2" href="<?php echo esc_url($slide['slide_button']['url']); ?>" target="<?php echo esc_attr($slide['slide_button']['target']); ?>"><?php echo esc_html($slide['slide_button']['title']); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
            <?php endif;
            }
        }
        ?>
    </div>

    <?php
        $slideCount = count($slides);
        $slidesWithTitle = 0;

        for ($i = 0; $i < $slideCount; $i++) {
            if (!empty($slides[$i]['slide_title'])) {
                $slidesWithTitle++;
            }
        }

        if ($slidesWithTitle > 1) {
            echo '<div class="prev" onclick="plusSlides(-1)">&#10094;</div>';
            echo '<div class="next" onclick="plusSlides(1)">&#10095;</div>';

            echo '<div class="dots">';
            $slidesWithTitle = 0;
            for ($i = 0; $i < $slideCount; $i++) {
                if (!empty($slides[$i]['slide_title'])) {
                    $slidesWithTitle++;
                    echo '<span class="dot" onclick="currentSlide(' . $slidesWithTitle . ')"></span>';
                }
            }
            echo '</div>';
        }
    ?>
</section>

<script>
    let slideIndex = 0;
    let timeout;

    showSlides();

    // Next/previous controls
    function plusSlides(n) {
        clearTimeout(timeout);
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        clearTimeout(timeout);
        showSlides(slideIndex = n - 1);
    }

    function showSlides() {
        let i;
        let slides = document.getElementsByClassName("slide");
        let dots = document.getElementsByClassName("dot");
        if (slideIndex >= slides.length) { slideIndex = 0; } // Reset slideIndex to the first slide if it exceeds the number of slides
        if (slideIndex < 0) { slideIndex = slides.length - 1; } // Set slideIndex to the last slide if it goes below 0
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex].style.display = "flex";
		if(slideIndex) {
			dots[slideIndex].className += " active";
		}
        timeout = setTimeout(function() { plusSlides(1); }, 6000);
    }
</script>

<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 4,
    'paged' => $paged,
);
$posts = new WP_Query($args);
$articleCounter = 1;
?>

<div class="pt-20 pb-20">
    <div class="container mx-auto px-[16px]">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
            <section class="text-white bg-primary flex-1 md:flex flex-col p-6 md:p-8 bg-cover">
                <h1 class="text-3xl lg:text-4xl mb-8">Aktualne godziny otwarcia</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <?php
                        $branch1 = get_field('branch_1', 225);
                        $branch2 = get_field('branch_2', 225);
                    ?>
                    <div>
                        <h2 class="text-xl lg:text-2xl mb-2">Linia</h3>
                        <p class="text-lg"><?php echo $branch1['hours_1']; ?><br><br><?php echo $branch1['hours_2']; ?></p>
                    </div>
                    <div>
                        <h2 class="text-xl lg:text-2xl mb-2">Strzepcz</h3>
                        <p class="text-lg"><?php echo $branch2['hours_1']; ?><br><br><?php echo $branch2['hours_2']; ?></p>
                    </div>
                </div>
                <?php if (get_field('extra_info', 225)) : ?>
                <div class="grid grid-cols-1 text-lg mt-6">
                    <?php echo get_field('extra_info', 225); ?>
                </div>
                <?php endif ?>
            </section>
            <section style="padding: 2rem;" class="bg-[#f7f7f7] flex-1 md:flex p-6 md:p-8">
                <a href="https://m6175.lib.mol.pl" target="_blank" title="Katalog biblioteczny" class="flex flex-col w-full">
                    <h1 class="text-3xl lg:text-4xl text-[#f3701d] mb-8 lg:mb-0">Katalog biblioteczny online</h2>
                    <img width="340" height="64" alt="Katalog Libra" class="m-auto" src="/wp-content/themes/bpgl/img/libra.svg">
                </a>     
            </section>
        </div>
    </div>
</div>


<section class="pt-20 pb-20">
    <div class="container mx-auto px-[16px]">
        <div class="grid grid-cols-12 gap-5">
            <div class="col-span-12 lg:col-span-9">
                <h1 class="text-2xl font-bold m-0 mb-6">Aktualności</h1>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <?php while ($posts->have_posts()) : $posts->the_post(); ?>
            <article class="bg-[#f7f7f7] xl:flex">
                <div class="xl:w-1/2 overflow-hidden">
                    <?php the_post_thumbnail(array(465, 340), array('class' => 'border-radius-5 object-cover w-full h-[250px] xl:h-[340px] min-h-full transition-transform transform duration-400 grayscale-[25%] hover:grayscale-0 hover:scale-105', 'title' => get_the_title())); ?>
                </div>
                <div class="flex flex-col xl:w-1/2 p-4 xl:pl-4">
                    <div class="border-l-4 border-[#f3701d] pl-4">
                        <div class="text-sm text-[#f3701d]">
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
                        </div>
                        <h2 class="text-xl font-bold text-black hover:text-primary transition-all duration-200">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h2>
                        <time datetime="<?php echo get_the_date('c'); ?>" class="flex mb-2 text-md text-sm"><?php echo get_the_date(); ?></time>
                    </div>
                    <p class="flex-grow text-black-light font-light pl-4 mt-1"><?php echo wp_trim_words(get_the_content(), 30, '...'); ?></p>
                    <a class="more mt-4 font-bold text-black hover:text-primary transition-all duration-200 flex pl-4" href="<?php the_permalink(); ?>">Zobacz więcej <svg class="ml-1 mt-[3px]" width="22" height="22" fill="#2A2A2A" xmlns="http://www.w3.org/2000/svg"><path d="M4.79 16.605a.75.75 0 0 1-.067-.984l.067-.077L15.397 4.938a.75.75 0 0 1 1.128.984l-.067.077L5.85 16.605a.75.75 0 0 1-1.06 0Z" fill="#2A2A2A"/><path d="M7.391 6.236a.75.75 0 0 1-.114-1.492l.11-.008 8.538-.018a.75.75 0 0 1 .744.64l.008.111-.018 8.538a.75.75 0 0 1-1.492.108l-.008-.11.016-7.786-7.784.017Z" fill="#2A2A2A"/></svg></a>
                </div>
            </article>
            <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
        </div>
        <div class="flex justify-end">
            <a class="more mt-8 font-bold text-black hover:text-primary transition-all duration-200 flex" href="/aktualnosci">Zobacz wszystkie <svg class="ml-1 mt-[3px]" width="22" height="22" fill="#2A2A2A" xmlns="http://www.w3.org/2000/svg"><path d="M4.79 16.605a.75.75 0 0 1-.067-.984l.067-.077L15.397 4.938a.75.75 0 0 1 1.128.984l-.067.077L5.85 16.605a.75.75 0 0 1-1.06 0Z" fill="#2A2A2A"/><path d="M7.391 6.236a.75.75 0 0 1-.114-1.492l.11-.008 8.538-.018a.75.75 0 0 1 .744.64l.008.111-.018 8.538a.75.75 0 0 1-1.492.108l-.008-.11.016-7.786-7.784.017Z" fill="#2A2A2A"/></svg></a>
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


<section class="pt-20 pb-20 bg-[#f7f7f7]">
    <div class="container mx-auto px-[16px]">
        <div class="grid grid-cols-12 gap-5">
            <div class="col-span-12 lg:col-span-9">
                <h1 class="text-2xl font-bold m-0 mb-6">Nowości książkowe</h1>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
            <?php while ($books->have_posts()) : $books->the_post(); ?>

            <article class="relative bg-[#f7f7f7] group">
                <div class="relative h-0 pb-[calc(540/404*100%)] overflow-hidden">
                <?php the_post_thumbnail(array(404, 540), array('class' => 'absolute top-0 left-0 w-full h-full object-cover', 'title' => get_the_title())); ?>
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
            <?php wp_reset_postdata(); ?>

        </div>
        <div class="flex justify-end">
            <a class="more mt-8 font-bold text-black hover:text-primary transition-all duration-200 flex" href="/nowosci-ksiazkowe">Zobacz wszystkie <svg class="ml-1 mt-[3px]" width="22" height="22" fill="#2A2A2A" xmlns="http://www.w3.org/2000/svg"><path d="M4.79 16.605a.75.75 0 0 1-.067-.984l.067-.077L15.397 4.938a.75.75 0 0 1 1.128.984l-.067.077L5.85 16.605a.75.75 0 0 1-1.06 0Z" fill="#2A2A2A"/><path d="M7.391 6.236a.75.75 0 0 1-.114-1.492l.11-.008 8.538-.018a.75.75 0 0 1 .744.64l.008.111-.018 8.538a.75.75 0 0 1-1.492.108l-.008-.11.016-7.786-7.784.017Z" fill="#2A2A2A"/></svg></a>
        </div>
    </div>
</section>


<section class="pt-20 pb-20">
    <div class="container mx-auto px-[16px]">
        <div class="grid grid-cols-12 gap-5">
            <div class="col-span-12 lg:col-span-9">
                <h1 class="text-2xl font-bold m-0 mb-6">Nasi partnerzy</h1>
            </div>
        </div>
        <div class="flex flex-wrap justify-center items-center gap-4">
            <?php
            for ($i = 1; $i <= 10; $i++) {
                $logo = get_field('logo_' . $i);
                if ($logo && $logo['logo']['url']) { ?>
                <?php $alt_text = $logo['logo']['alt']; ?>
                <?php $title = $logo['logo']['title']; ?>
                    <div class="p-4">
                        <?php if (!empty($logo['url'])) : ?><a href="<?php echo esc_url($logo['url']); ?>" target="_blank"><?php endif; ?>
                            <img src="<?php echo esc_url($logo['logo']['url']); ?>" alt="<?php echo esc_attr($alt_text); ?>" title="<?php echo esc_attr($title); ?>" class="w-full h-[80px] object-contain rounded-lg">
                        <?php if (!empty($logo['url'])) : ?></a><?php endif; ?>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
</section>


<?php get_footer(); ?>