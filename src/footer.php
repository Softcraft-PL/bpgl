</main>
<?php $contact = get_field('contact', $post_id) ?? []; ?>
<?php $footer = get_field('footer', 44) ?? []; ?>
<footer class="pt-20 lg:pt-32 pb-20 bg-[#222222] xl:bg-bg-footer bg-contain bg-no-repeat bg-right text-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-12 gap-[30px]">
            <div class="col-span-12 xl:col-span-6 2xl:col-span-5 mb-10 2xl:mb-0">
                <a href="/">
                    <svg width="98" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMinYMin meet" viewBox="0 0 246 179" xml:space="preserve" class="pma-logo-image"><path fill="none" stroke="#FFF" stroke-width="2" d="M51.942 1h142s10.75 28.75 13 31.5 28.375 25.75 33.875 37 5.56 26.352 1.06 37.977c-8.75 29-73.935 70.273-73.935 70.273h-89s-66.75-42.625-76.334-74.092C.293 92.607-.058 78.75 5.192 68.25c4.75-10.75 27.451-27.612 32.5-33.375S51.942 1 51.942 1z"/><path fill="none" stroke="#FFF" stroke-width="2" d="M25.395 87.048v12.619h27.813c.606-.505.555-12.064 0-12.619H25.395z"/><path fill="none" stroke="#FFF" stroke-width="2" d="M19.27 81.5v25.969s5.875.063 6.125-.125.594-2.222.829-2.362c.207-.124 29.511-.065 29.511-.065s1.958-.041 3.292-1.416 1.167-3.375 1.167-3.375V85.583s-.161-1.031-1.167-2.667c-.667-1.083-3.25-1.375-3.25-1.375L19.27 81.5zM101.926 70.764v34.503s.846 1.692 3.151 1.692 3.228-1.767 3.228-1.767V78.334s-.116-1.465.422-1.998c.478-.473 1.421-.577 1.421-.577h7.685s.982.402 1.462.825c.632.557.766 1.289.766 1.289v27.397s.305 1.805 2.88 1.806c2.735.001 3.268-1.685 3.268-1.685V78.256s.178-1.135.555-1.769c.429-.722 1.251-.805 1.251-.805l7.876.077s1.079.201 1.505.679c.516.578.608 1.473.608 1.473v27.549s.423 1.616 2.882 1.616c2.572 0 3.151-1.607 3.151-1.607V74.645s-.23-1.421-1.575-2.613-2.19-1.268-2.19-1.268l-14.523-.23s-1.276 1.421-2.693 1.421-2.34-1.421-2.34-1.421l-18.79.23zM189.276 81.583v5.25h31.584s2.207.338 2.219 2.917c.012 2.626-2.371 2.906-2.371 2.906h-27.781s-1.721.42-2.75 1.375c-.859.797-1.203 2.781-1.203 2.781l.047 6.953s.469.953 1.422 1.813c1.021.92 2.453 1.25 2.453 1.25h35.734l-.25-21.969s.172-1.344-1-2.281-2.531-.891-2.531-.891l-35.573-.104z"/><path fill="none" stroke="#FFF" stroke-width="2" d="M222.239 96.859v5.906h-24.641s-3.156-.18-3.156-3.023 3.547-3.023 3.547-3.023l24.25.14zM63.192 107.076h33.25M149.755 107.076h33.312M149.755 96.813h33.625M63.505 96.813h32.937"/><path fill="#FFF" d="M67.067 99.938h3.75v3.75h-3.75zM78.099 99.938h3.75v3.75h-3.75zM89.849 99.938h3.75v3.75h-3.75zM152.88 99.938h3.75v3.75h-3.75zM163.911 99.938h3.75v3.75h-3.75zM175.661 99.938h3.75v3.75h-3.75zM67.541 93.287c-.864 0-1.564-.597-1.564-1.332v-7.47c0-.736.7-1.332 1.564-1.332h2.803c.864 0 1.565.596 1.565 1.332v7.47c0 .735-.701 1.332-1.565 1.332h-2.803zM78.416 93.287c-.864 0-1.564-.597-1.564-1.332v-7.47c0-.736.7-1.332 1.564-1.332h2.803c.864 0 1.565.596 1.565 1.332v7.47c0 .735-.701 1.332-1.565 1.332h-2.803zM90.322 93.287c-.864 0-1.564-.597-1.564-1.332v-7.47c0-.736.7-1.332 1.564-1.332h2.803c.864 0 1.565.596 1.565 1.332v7.47c0 .735-.701 1.332-1.565 1.332h-2.803zM153.354 93.287c-.863 0-1.564-.597-1.564-1.332v-7.47c0-.736.701-1.332 1.564-1.332h2.803c.865 0 1.565.596 1.565 1.332v7.47c0 .735-.7 1.332-1.565 1.332h-2.803zM164.385 93.287c-.865 0-1.564-.597-1.564-1.332v-7.47c0-.736.699-1.332 1.564-1.332h2.803c.863 0 1.564.596 1.564 1.332v7.47c0 .735-.701 1.332-1.564 1.332h-2.803zM176.134 93.287c-.864 0-1.564-.597-1.564-1.332v-7.47c0-.736.7-1.332 1.564-1.332h2.803c.864 0 1.565.596 1.565 1.332v7.47c0 .735-.701 1.332-1.565 1.332h-2.803zM14.942 78.417h46.334L39.734 62.25v-2.417h-1.625v2.334zM184.38 78.417h46.333L209.171 62.25v-2.417h-1.625v2.334z"/><path fill="#FFF" d="m64.021 78.719-2.678.031.006 1.833h37.26V67.75h49.333v12.833h36.438V78.75h-2.604l15.486-10.94-46.236-.06-27.792-18.333-27.208 18.166-46.759.166"/></svg>
                </a>
                <div class="mt-2 text-sm">
                    Państwowe Muzeum Archeologiczne – Dział Wydawnictw<br>
                    ul. Długa 52 (Arsenał)<br>
                    00-420 Warszawa<br>
                    <a href="mailto:wydawnictwo@pma.pl">wydawnictwo@pma.pl</a>
                </div>
            </div>
            <div class="col-span-12 2xl:col-span-1 hidden 2xl:block"></div>
            <div class="col-span-12 xl:col-span-6">
                <div class="grid grid-cols-12 gap-[30px] text-base">
                    <div class="col-span-12 lg:col-span-4">

                    </div>
                    <div class="col-span-12 lg:col-span-4">

                    </div>
                    <div class="col-span-12 lg:col-span-4 text-sm">
                        <h2 class="text-lg font-bold mb-3"><?php echo $footer['column_3_title']; ?></h2>
                        <?php wp_nav_menu(array('theme_location' => 'nav-menu-footer-1', 'container' => false)); ?>
                    </div>
                </div>
            </div>
            <div class="col-span-12 text-sm">
                Wydanictwo PMA. Wszystkie prawa zastrzeżone. Wykonanie: <a href="https://softcraft.pl" target="_blank" class="text-white">Softcraft</a>.
            </div>
        </div>
    </div>
</footer>

<script>
    // mobile menu
    let navOpened = false;

    function slideToggle() {
        let navMobile = document.getElementById('navbar__nav-mobile');

        if (navOpened) {
            navOpened = false;
            navMobile.style.height = '0';
            document.getElementById('navbar__toggle').classList.remove('navbar__toggle--open');
            document.getElementById('header').classList.remove('navbar--bg-on-toggle');
        } else {
            navOpened = true;
            navMobile.style.height = '100vh';
            document.getElementById('navbar__toggle').classList.add('navbar__toggle--open');
            document.getElementById('header').classList.add('navbar--bg-on-toggle');
        }
    }
</script>

<?php wp_footer(); ?>

</body>
</html>
