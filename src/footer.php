</main>

<footer class="pt-20 lg:pt-32 pb-20">
    <div class="container">
        <div class="grid grid-cols-12 gap-[30px]">
            <div class="col-span-12 xl:col-span-6 2xl:col-span-5 mb-10 2xl:mb-0">
               
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
