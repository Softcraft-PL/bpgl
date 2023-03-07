<!DOCTYPE html>
<html lang="pl-PL">

<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#6377FE">

    <link rel="apple-touch-icon" sizes="180x180" href="/wp-content/themes/pma/img/icon-180.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/wp-content/themes/pma/img/icon-16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/wp-content/themes/pma/img/icon-32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/wp-content/themes/pma/img/icon-96.png">

    <link rel="stylesheet" href="/wp-content/themes/pma/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;700&family=Lato:wght@300;400&display=swap" rel="stylesheet">

    <?php wp_head(); ?>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-XXXXXXXXX"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-XXXXXXXXXX');
    </script>
</head>

<body <?php body_class(); ?>>

<header id="header" class="navbar">
    <div class="container mx-auto flex justify-between items-center">
        <a href="/">
            <svg width="98" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMinYMin meet" viewBox="0 0 246 179" xml:space="preserve" class="pma-logo-image"><path fill="none" stroke="#000" stroke-width="2" d="M51.942 1h142s10.75 28.75 13 31.5 28.375 25.75 33.875 37 5.56 26.352 1.06 37.977c-8.75 29-73.935 70.273-73.935 70.273h-89s-66.75-42.625-76.334-74.092C.293 92.607-.058 78.75 5.192 68.25c4.75-10.75 27.451-27.612 32.5-33.375S51.942 1 51.942 1z"/><path fill="none" stroke="#000" stroke-width="2" d="M25.395 87.048v12.619h27.813c.606-.505.555-12.064 0-12.619H25.395z"/><path fill="none" stroke="#000" stroke-width="2" d="M19.27 81.5v25.969s5.875.063 6.125-.125.594-2.222.829-2.362c.207-.124 29.511-.065 29.511-.065s1.958-.041 3.292-1.416 1.167-3.375 1.167-3.375V85.583s-.161-1.031-1.167-2.667c-.667-1.083-3.25-1.375-3.25-1.375L19.27 81.5zM101.926 70.764v34.503s.846 1.692 3.151 1.692 3.228-1.767 3.228-1.767V78.334s-.116-1.465.422-1.998c.478-.473 1.421-.577 1.421-.577h7.685s.982.402 1.462.825c.632.557.766 1.289.766 1.289v27.397s.305 1.805 2.88 1.806c2.735.001 3.268-1.685 3.268-1.685V78.256s.178-1.135.555-1.769c.429-.722 1.251-.805 1.251-.805l7.876.077s1.079.201 1.505.679c.516.578.608 1.473.608 1.473v27.549s.423 1.616 2.882 1.616c2.572 0 3.151-1.607 3.151-1.607V74.645s-.23-1.421-1.575-2.613-2.19-1.268-2.19-1.268l-14.523-.23s-1.276 1.421-2.693 1.421-2.34-1.421-2.34-1.421l-18.79.23zM189.276 81.583v5.25h31.584s2.207.338 2.219 2.917c.012 2.626-2.371 2.906-2.371 2.906h-27.781s-1.721.42-2.75 1.375c-.859.797-1.203 2.781-1.203 2.781l.047 6.953s.469.953 1.422 1.813c1.021.92 2.453 1.25 2.453 1.25h35.734l-.25-21.969s.172-1.344-1-2.281-2.531-.891-2.531-.891l-35.573-.104z"/><path fill="none" stroke="#000" stroke-width="2" d="M222.239 96.859v5.906h-24.641s-3.156-.18-3.156-3.023 3.547-3.023 3.547-3.023l24.25.14zM63.192 107.076h33.25M149.755 107.076h33.312M149.755 96.813h33.625M63.505 96.813h32.937"/><path d="M67.067 99.938h3.75v3.75h-3.75zM78.099 99.938h3.75v3.75h-3.75zM89.849 99.938h3.75v3.75h-3.75zM152.88 99.938h3.75v3.75h-3.75zM163.911 99.938h3.75v3.75h-3.75zM175.661 99.938h3.75v3.75h-3.75zM67.541 93.287c-.864 0-1.564-.597-1.564-1.332v-7.47c0-.736.7-1.332 1.564-1.332h2.803c.864 0 1.565.596 1.565 1.332v7.47c0 .735-.701 1.332-1.565 1.332h-2.803zM78.416 93.287c-.864 0-1.564-.597-1.564-1.332v-7.47c0-.736.7-1.332 1.564-1.332h2.803c.864 0 1.565.596 1.565 1.332v7.47c0 .735-.701 1.332-1.565 1.332h-2.803zM90.322 93.287c-.864 0-1.564-.597-1.564-1.332v-7.47c0-.736.7-1.332 1.564-1.332h2.803c.864 0 1.565.596 1.565 1.332v7.47c0 .735-.701 1.332-1.565 1.332h-2.803zM153.354 93.287c-.863 0-1.564-.597-1.564-1.332v-7.47c0-.736.701-1.332 1.564-1.332h2.803c.865 0 1.565.596 1.565 1.332v7.47c0 .735-.7 1.332-1.565 1.332h-2.803zM164.385 93.287c-.865 0-1.564-.597-1.564-1.332v-7.47c0-.736.699-1.332 1.564-1.332h2.803c.863 0 1.564.596 1.564 1.332v7.47c0 .735-.701 1.332-1.564 1.332h-2.803zM176.134 93.287c-.864 0-1.564-.597-1.564-1.332v-7.47c0-.736.7-1.332 1.564-1.332h2.803c.864 0 1.565.596 1.565 1.332v7.47c0 .735-.701 1.332-1.565 1.332h-2.803zM14.942 78.417h46.334L39.734 62.25v-2.417h-1.625v2.334zM184.38 78.417h46.333L209.171 62.25v-2.417h-1.625v2.334z"/><path d="m64.021 78.719-2.678.031.006 1.833h37.26V67.75h49.333v12.833h36.438V78.75h-2.604l15.486-10.94-46.236-.06-27.792-18.333-27.208 18.166-46.759.166"/></svg>
        </a>

        <nav class="navbar__nav-desktop">
            <?php wp_nav_menu(array('theme_location' => 'nav-menu', 'container' => false)); ?>
        </nav>

        <nav id="navbar__nav-mobile" class="navbar__nav-mobile">
            <div class="container flex flex-col items-center">
                <?php wp_nav_menu(array('theme_location' => 'nav-menu', 'container' => false)); ?>
            </div>
        </nav>

        <div id="navbar__toggle" class="navbar__toggle" onclick="slideToggle()"><i class="navbar__toggle-icon"></i></div>
    </div>
</header>

<main>
