<?php
$social_networks = get_field('social-networks', 'options');
$instagram = $social_networks['instagram'];
$facebook = $social_networks['facebook'];
?>

<header>
    <a href="#content"
       aria-label="Aller au contenu principal"
       title="Aller au contenu principal"
       class="px-4 py-2 bg-brown text-white absolute top-4 -left-full focus:left-4 trans-all">
        Aller au contenu principal
    </a>
    <div class="header-menu max-width-screen relative rg:flex rg:flex-row rg:justify-between rg:items-center rg:gap-x-10 rg:px-default rg:py-6">
        <div class="relative z-2 header-menu max-rg:px-default max-rg:py-6 flex flex-row justify-between items-center">
            <a href="<?= home_url() ?>"
               aria-label="Vers la page d’accueil"
               title="Vers la page d’accueil">
                <span class="sr-only">Vers la page d’accueil</span>
                <svg class="h-12 rg:h-16" viewBox="0 0 300 88" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <use class="w-full h-auto" xlink:href="#logo"></use>
                </svg>
            </a>
            <input type="checkbox" id="burger-menu" class="peer sr-only burger-menu-input rg:hidden">
            <label for="burger-menu"
                   class="burger-menu-label peer-focus-visible:outline peer-focus-visible:outline-orange-500"
                   aria-label="Ouvrir le menu">
                <span class="sr-only">Ouvrir le menu</span>
                <span class="line line-1"></span>
                <span class="line line-2"></span>
                <span class="line line-3"></span>
            </label>
        </div>
        <div class="nav-container max-rg:absolute max-rg:z-1 max-rg:h-svh max-rg:inset-0 trans-all max-rg:px-default max-rg:pb-6 max-rg:pt-24 max-rg:bg-beige-medium max-rg:flex max-rg:flex-col max-rg:gap-10">
            <?= wp_nav_menu([
                    'theme_location' => 'primary',
                    'container' => false,
                    'menu_class' => 'primary-nav',
            ]) ?>
            <?php if ($facebook || $instagram): ?>
                <div class="text-brown pt-4 border-t border-t-beige-dark/60 flex flex-row justify-center gap-6 rg:hidden">
                    <?php if ($facebook): ?>
                        <a href="<?= $facebook ?>"
                           target="_blank"
                           aria-label="Vers le compte Facebook de l’asbl"
                           title="Vers le compte Facebook de l’asbl"
                           class="w-6 h-6 flex justify-center items-center">
                            <span class="sr-only">Vers le compte Facebook de l’asbl</span>
                            <svg width="14" height="24" viewBox="0 0 14 24" fill="none"
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
                           class="w-6 h-6 flex justify-center items-center">
                            <span class="sr-only">Vers le compte Instagram de l’asbl</span>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <use xlink:href="#instagram"></use>
                            </svg>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</header>
