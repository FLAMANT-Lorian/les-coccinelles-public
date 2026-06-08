<?php get_header(); ?>
    
    <div class="rg:bg-[url(/wp-content/themes/les-coccinelles/assets/img/svgs/leaf-bg-to-top-right.svg),url(/wp-content/themes/les-coccinelles/assets/img/svgs/leaf-bg-to-bottom-left.svg)] rg:bg-no-repeat rg:bg-position-[bottom_-60px_left_-60px,top_-60px_right_-60px]">
        <div class="max-width-screen px-default py-32 flex flex-col items-center justify-center text-center">
            <h1 data-text-reveal data-dir="left" class="text-7xl rg:text-9xl font-medium text-red pb-4">
                <span class="mask-content">
                    404
                </span>
            </h1>
            <span data-text-reveal data-dir="top" class="text-3xl font-medium text-brown pb-4">
                <span class="mask-content">
                    Page non trouvée
                </span>
            </span>
            <p data-text-reveal data-dir="top" class="paragraph text-brown">
                <span class="mask-content">
                    La page que vous cherchez n'a pas été trouvée&nbsp;!
                </span>
            </p>
            <a href="<?= home_url(); ?>"
               aria-label="Retour à l'accueil"
               title="Retour à l'accueil"
               class="btn-back-filled mt-12">
                Retour à l'accueil
            </a>
        </div>
    </div>

<?php get_footer(); ?>