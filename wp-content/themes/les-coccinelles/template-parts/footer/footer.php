<?php

$contact = get_field('contact', 'options');
$email = $contact['email'];
$phone = $contact['phone'];
$address = $contact['address'];
$access_plan = $contact['access-plan'];

$social_networks = get_field('social-networks', 'options');
$instagram = $social_networks['instagram'];
$facebook = $social_networks['facebook'];

?>

<footer class="bg-brown" id="footer">
    <h2 class="sr-only">Pied de page</h2>
    <div class="max-width-screen px-default py-12 grid-default gap-y-10 lg:gap-y-16">
        <div class="flex flex-col gap-6 col-span-4">
            <a href="<?= home_url() ?>"
               aria-label="Aller vers la page d’accueil"
               title="Aller vers la page d’accueil">
                <span class="sr-only">Aller vers la page d'accueil</span>
                <svg class="max-md:self-center" width="188" height="55" viewBox="0 0 300 88" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <use xlink:href="#logo-inversed"></use>
                </svg>
            </a>
            <ul class="flex flex-col gap-4 paragraph">
                <?php if ($address): ?>
                    <?php if ($access_plan): ?>
                        <li class="text-white">
                            <a href="<?= $access_plan ?>"
                               target="_blank"
                               title="Vers le plan d’accès"
                               class="flex flex-row items-center gap-4 opacity-60 hover:opacity-100 focus:opacity-100 trans-all">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <use xlink:href="#map"></use>
                                </svg>
                                <span><?= $address ?></span>
                            </a>
                        </li>
                    <?php else: ?>
                        <li class="text-white flex flex-row items-center gap-4 opacity-60 ">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <use xlink:href="#map"></use>
                            </svg>
                            <span><?= $address ?></span>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if ($phone): ?>
                    <li class="text-white">
                        <a href="tel:<?= $phone ?>"
                           target="_blank"
                           title="Téléphoner au : <?= $phone ?>"
                           class="flex flex-row items-center gap-4 opacity-60 hover:opacity-100 focus:opacity-100 trans-all">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <use xlink:href="#phone"></use>
                            </svg>
                            <span><?= $phone ?></span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if ($email): ?>
                    <li class="text-white">
                        <a href="mailto:<?= $email ?>"
                           target="_blank"
                           title="Envoyer un mail à : <?= $email ?>"
                           class="flex flex-row items-center gap-4 opacity-60 hover:opacity-100 focus:opacity-100 trans-all">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <use xlink:href="#email"></use>
                            </svg>
                            <span><?= $email ?></span>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
        <nav aria-label="Navigation secondaire" class="max-md:sr-only footer-nav col-span-4 lg:col-span-3">
            <h3>Navigation</h3>
            <?= wp_nav_menu([
                    'theme_location' => 'footer',
                    'container' => false,
                    'menu_class' => 'flex flex-col gap-4',
            ]); ?>
        </nav>
        <nav aria-label="Navigation rgpd" class="footer-nav col-span-4 lg:col-span-2">
            <h3 class="max-md:hidden">Rgpd</h3>
            <?= wp_nav_menu([
                    'theme_location' => 'rgpd',
                    'container' => false,
                    'menu_class' => 'flex flex-col max-md:items-center gap-4',
            ]); ?>
        </nav>
        <div class="col-span-4 max-md:row-start-2 lg:col-span-3">
            <h3 class="lg:text-right">Retrouvez nous sur<br/>les réseaux sociaux</h3>
            <?php if ($facebook || $instagram): ?>
                <ul class="flex flex-row max-md:justify-center lg:justify-end gap-6">
                    <?php if ($facebook): ?>
                        <li class="text-white opacity-60 hover:opacity-100 focus-within:opacity-100 trans-all">
                            <a href="<?= $facebook ?>"
                               target="_blank"
                               aria-label="Vers le compte Facebook de l’asbl"
                               title="Vers le compte Facebook de l’asbl"
                               class="w-6 h-6 flex justify-center items-center">
                                <span class="sr-only">Vers le compte Facebook de l’asbl</span>
                                <svg width="14" height="24" class="h-4.5" viewBox="0 0 14 24" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <use xlink:href="#facebook"></use>
                                </svg>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if ($instagram): ?>
                        <li class="text-white opacity-60 hover:opacity-100 focus-within:opacity-100 trans-all">
                            <a href="<?= $instagram ?>"
                               target="_blank"
                               aria-label="Vers le compte Instagram de l’asbl"
                               title="Vers le compte Instagram de l’asbl"
                               class="w-6 h-6 flex justify-center items-center">
                                <span class="sr-only">Vers le compte Instagram de l’asbl</span>
                                <svg width="24" height="24" class="h-4.5" viewBox="0 0 24 24" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <use xlink:href="#instagram"></use>
                                </svg>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            <?php endif; ?>
        </div>
        <div class="col-span-4 md:col-span-8 lg:col-span-12 flex flex-col md:flex-row md:justify-between gap-5 justify-center items-center pt-4 border-t border-t-white/60">
            <span class="paragraph text-white opacity-60">© ASBL Les Coccinelles <?= date('Y') ?></span>
            <div class="flex flex-row items-center gap-2 paragraph text-white">
                <span class="opacity-60">Site réalisé par</span>
                <a aria-label="Vers le site web de Lorian Flamant"
                   title="Vers le site web de Lorian Flamant"
                   target="_blank"
                   class="font-semibold opacity-60 hover:opacity-100 focus:opacity-100 trans-all"
                   href="https://lorianflamant.com">
                    Lorian Flamant
                </a>
            </div>
        </div>
    </div>
</footer>
