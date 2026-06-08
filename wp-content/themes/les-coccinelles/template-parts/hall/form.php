<?php

$contact = get_field('contact', 'options');
$email = $contact['email'];
$phone = $contact['phone'];
$address = $contact['address'];
$access_plan = $contact['access-plan'];

$form = get_field('form');
$title = $form['title'];
$coordinate_title = $form['coordinate-title'];
$calendar_title = $form['calendar-title'];

?>


<section class="bg-beige-medium">
    <div class="max-width-screen py-default px-default grid-default">
        <?php if ($title): ?>
            <h2 data-text-reveal data-dir="top"
                class="col-span-full text-center text-3xl lg:text-4.5xl font-medium text-brown mb-8 rl:mb-15">
                <span class="mask-content">
                    <?= $title ?>
                </span>
            </h2>
        <?php endif; ?>
        <div class="col-span-full grid grid-default max-lg:divide-y max-lg:divide-beige-dark/60">
            <div class="relative form col-span-full rl:col-start-2 rl:col-span-6 lg:col-start-1 lg:col-span-7 max-lg:pb-8">
                <h3 class="sr-only">Formulaire de contact</h3>
                <p class="paragraph text-black/80 mb-6">Les champs renseignés avec <strong class="text-red">*</strong> sont requis !
                </p>
                <?php get_template_part('template-parts/forms/fieldset', args: [
                        'hidden_input_type' => 'availability_request'
                ]); ?>
            </div>
            <span aria-hidden="true" class="max-lg:hidden flex justify-center">
                <span class="h-full w-px bg-beige-dark/60"></span>
            </span>
            <div class="flex flex-col gap-6 md:flex-row lg:flex-col md:gap-12 col-span-full rl:col-start-2 lg:col-start-9 lg:col-span-4 rl:col-span-6  max-lg:pt-8">
                <div class="coordinate md:w-1/2 lg:w-full">
                    <?php if ($coordinate_title): ?>
                        <h3 class="text-xl rg:text-2xl font-medium pb-4"><?= $coordinate_title ?></h3>
                    <?php endif; ?>
                    <ul class="flex flex-col gap-y-4">
                        <?php if ($address): ?>
                            <li class="flex flex-row gap-x-4">
                                <svg class="mt-4 text-red" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <use href="#map"></use>
                                </svg>
                                <div class="flex flex-col justify-start gap-2">
                                    <span itemprop="address" class="paragraph text-black/80"><?= $address ?></span>
                                    <?php if ($access_plan): ?>
                                        <a href="<?= $access_plan ?>"
                                           aria-label="Plan d’accès"
                                           title="Voir le plan d'accès"
                                           target="_blank">
                                            <span class="paragraph text-blue-700! underline hover:text-blue-800! focus:text-blue-800! trans-all">Plan d’accès</span>
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
                                    <span itemprop="email" class="paragraph text-black/80 trans-all"><?= $email ?></span>
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
                                    <span itemprop="telephone" class="paragraph text-black/80 trans-all"><?= $phone ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="calendar flex flex-col gap-y-4 md:w-1/2 lg:w-full">
                    <?php if ($calendar_title): ?>
                        <h3 class="text-xl rg:text-2xl font-medium"><?= $calendar_title ?></h3>
                        <div id="hall-calendar" class="" data-url="<?= LARAVEL_API_URL . '/bookings' ?>"></div>
                        <div class="flex flex-row justify-center gap-x-8 mt-4 pt-4 border-t border-t-beige-dark/60">
                            <span class="flex flex-row items-center gap-4 before:content-[''] before:w-3 before:h-3 before:bg-red before:rounded-full before:block">Indisponible</span>
                            <span class="flex flex-row items-center gap-4 before:content-[''] before:w-3 before:h-3 before:bg-beige-light before:border before:border-beige-dark before:rounded-full before:block">Disponible</span>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
