<?php

$contact = get_field('contact', 'options');
$email = $contact['email'];
$phone = $contact['phone'];
$address = $contact['address'];
$access_plan = $contact['access-plan'];
$isPolicy = false;
$isLegals = false;
$classes = '';
$subtitle = '';


if (get_the_id() === 88) {
    $subtitle = 'Mentions Légales';
    $isLegals = true;
    $classes = 'md:col-start-3 md:col-span-4 lg:col-start-5 lg:col-span-4';
} elseif (get_the_id() === 252) {
    $subtitle = 'Politique de confidentialité';
    $isPolicy = true;
    $classes = 'rg:col-start-2 rg:col-span-6 lg:col-start-3 lg:col-span-8 xl:col-start-4 xl:col-span-6';
}

?>

<div class="rg:bg-leaf-to-bottom-right rg:bg-position-[top_-60px_left_-60px] rg:bg-no-repeat">
    <div class="max-width-screen px-default py-default grid-default gap-y-12">
        <div class="col-span-full text-center flex flex-col gap-y-2">
            <span data-text-reveal data-dir="top" class="text-xl rg:text-2xl text-red font-medium uppercase">
                <span class="mask-content">
                    RGPD
                </span>
            </span>
            <h1 data-text-reveal data-dir="top" class="text-big text-brown">
                <span class="mask-content">
                    <?= $subtitle ?>
                </span>
            </h1>
        </div>
        <section class="col-span-full <?= $classes ?> gap-y-8">
            <h2 class="sr-only">Contenu de <?= strtolower($subtitle) ?></h2>
            <div class="col-span-full">
                <?php if ($isLegals): ?>
                    <div>
                        <h3 class="text-xl rg:text-2xl font-medium mb-4">Les Coccinelles</h3>
                        <ul class="flex flex-col gap-y-4">
                            <?php if ($address): ?>
                                <li class="flex flex-row gap-x-4">
                                    <svg class="mt-4 text-red" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <use href="#map"></use>
                                    </svg>
                                    <div class="flex flex-col justify-start gap-2">
                                        <span itemprop="address" class="paragraph"><?= $address ?></span>
                                        <?php if ($access_plan): ?>
                                            <a href="<?= $access_plan ?>"
                                               aria-label="Plan d’accès"
                                               title="Voir le plan d'accès"
                                               target="_blank">
                                                <span class="paragraph text-blue-500! underline hover:text-blue-800! focus:text-blue-800! trans-all">Plan d’accès</span>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </li>
                            <?php endif; ?>
                            <?php if ($email): ?>
                                <li class="flex flex-row gap-x-4 [&:hover_span]:text-red [&:focus-within_span]:text-red">
                                    <a href="mailto:<?= $email ?>"
                                       aria-label="<?= $email ?>"
                                       title="Envoyer un email à <?= $email ?>"
                                       class="flex flex-row gap-x-4 items-center">
                                        <svg class="text-red" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <use href="#email"></use>
                                        </svg>
                                        <span itemprop="email" class="paragraph trans-all"><?= $email ?></span>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if ($phone): ?>
                                <li class=" [&:hover_span]:text-red [&:focus-within_span]:text-red flex flex-row gap-x-4">
                                    <a href="tel:<?= str_replace([' ', '(0)'], '', $phone) ?>"
                                       aria-label="<?= $phone ?>"
                                       title="Téléphoner au <?= $phone ?>"
                                       class="flex flex-row gap-x-4 items-center">
                                        <svg class="text-red" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <use href="#phone"></use>
                                        </svg>
                                        <span itemprop="telephone" class="paragraph trans-all"><?= $phone ?></span>
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <?php if ($isPolicy): ?>
                    <div class="rgpd-content">
                        <?php the_content() ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>
    </div>
</div>
