<?php
$social_networks = get_field('social-networks', 'options');
$instagram = $social_networks['instagram'];
$facebook = $social_networks['facebook'];

$title = $args['title'] ?? false;
?>

<header>
    <?php if ($title): ?>
        <h1 class="sr-only"><?= $title ?></h1>
    <?php endif; ?>
    <a href="#content"
       aria-label="Aller au contenu principal"
       title="Aller au contenu principal"
       class="px-4 py-2 bg-brown text-white fixed z-10 top-4 -left-full focus:left-4 trans-all">
        Aller au contenu principal
    </a>
    <a href="#footer"
       aria-label="Aller au pied de page"
       title="Aller au pied de page"
       class="px-4 py-2 bg-brown text-white fixed z-10 top-4 -left-full focus:left-4 trans-all">
        Aller au pied de page
    </a>
    <div class="header-menu max-width-screen relative lg:flex lg:flex-row lg:justify-between lg:items-center lg:gap-x-10 lg:px-default lg:py-6">
        <div class="relative z-4 header-menu max-lg:px-default max-lg:py-6 flex flex-row justify-between items-center">
            <a href="<?= home_url() ?>"
               aria-label="Vers la page d’accueil"
               title="Vers la page d’accueil">
                <span class="sr-only">Vers la page d’accueil</span>
                <svg class="h-12 lg:h-16" viewBox="0 0 300 88" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <use class="w-full h-auto" xlink:href="#logo"></use>
                </svg>
            </a>
            <input type="checkbox" id="burger-menu" class="peer sr-only burger-menu-input lg:hidden">
            <label for="burger-menu"
                   class="burger-menu-label peer-focus-visible:outline peer-focus-visible:outline-orange-500">
                <span class="sr-only">Ouvrir le menu</span>
                <span class="line line-1"></span>
                <span class="line line-2"></span>
                <span class="line line-3"></span>
            </label>
        </div>
        <nav aria-hidden="false"
             class="nav-container max-lg:absolute max-lg:z-3 max-lg:h-svh max-lg:inset-0 trans-all max-lg:px-default max-lg:pb-6 max-lg:pt-24 max-lg:bg-beige-medium max-lg:flex max-lg:flex-col max-lg:gap-10">
            <h2 class="sr-only">Navigation prinicpale</h2>
            <?= wp_nav_menu([
                    'theme_location' => 'primary',
                    'container' => false,
                    'menu_class' => 'primary-nav',
            ]) ?>
            <?php if ($facebook || $instagram): ?>
                <div class="pt-4 border-t border-t-beige-dark/60 flex flex-row justify-center gap-6 lg:hidden">
                    <?php if ($facebook): ?>
                        <a href="<?= $facebook ?>"
                           target="_blank"
                           aria-label="Vers le compte Facebook de l’asbl"
                           title="Vers le compte Facebook de l’asbl"
                           class="text-brown hover:text-red focus:text-red h-6 flex justify-center items-center">
                            <span class="sr-only">Vers le compte Facebook de l’asbl</span>
                            <svg class="trans-all" width="14" height="24" viewBox="0 0 14 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <use xlink:href="#facebook"></use>
                            </svg>
                        </a>
                    <?php endif; ?>
                    <?php if ($instagram): ?>
                        <a href="<?= $instagram ?>"
                           target="_blank"
                           aria-label="Vers le compte Instagram de l’asbl"
                           title="Vers le compte Instagram de l’asbl"
                           class="text-brown hover:text-red focus:text-red w-6 h-6 flex justify-center items-center">
                            <span class="sr-only">Vers le compte Instagram de l’asbl</span>
                            <svg class="trans-all" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <use xlink:href="#instagram"></use>
                            </svg>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </nav>
    </div>
</header>
