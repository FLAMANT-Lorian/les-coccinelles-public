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
            <h2 class="col-span-full text-center text-3xl lg:text-4.5xl font-medium text-brown mb-8 rl:mb-15"><?= $title ?></h2>
        <?php endif; ?>
        <div class="col-span-full grid grid-default max-lg:divide-y max-lg:divide-beige-dark/60">
            <div class="form col-span-full rl:col-start-2 rl:col-span-6 lg:col-start-1 lg:col-span-7 max-lg:pb-8">
                <h3 class="sr-only">Formulaire de contact</h3>
                <p class="paragraph mb-6">Les champs renseignés avec <strong class="text-red">*</strong> sont requis !
                </p>
                <form action="" method="POST" class="flex flex-col gap-y-6" novalidate>
                    
                    <?php get_template_part('template-parts/forms/fieldset', args: [
                            'hidden_input_type' => 'location'
                    ]); ?>
                    
                    <div class="flex flex-col md:flex-row gap-6">
                        <div class="acceptance-field">
                            <input type="checkbox" id="acceptance" class="cursor-pointer">
                            <label for="acceptance" class="cursor-pointer">J’accepte que mes informations soient
                                utilisées pour répondre à ma demande de disponibilité et pour me recontacter concernant
                                la location de la salle. Elles resteront confidentielles et ne seront jamais partagées à
                                des tiers.</label>
                        </div>
                        <button type="submit"
                                class="submit-button self-end md:self-center btn py-3 bg-red border border-red text-white hover:text-brown hover:bg-transparent focus:text-brown focus:bg-transparent cursor-pointer">
                            Envoyer
                        </button>
                    </div>
                </form>
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
                                    <span class="paragraph"><?= $address ?></span>
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
                                    <span class="paragraph trans-all"><?= $email ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if ($phone): ?>
                            <li class=" [&:hover_span]:text-red [&:focus-within_span]:text-red flex flex-row gap-x-4">
                                <a href="tel:<?= $phone ?>"
                                   aria-label="<?= $phone ?>"
                                   title="Téléphoner au <?= $phone ?>"
                                   class="flex flex-row gap-x-4 items-center">
                                    <svg class="text-red" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <use href="#phone"></use>
                                    </svg>
                                    <span class="paragraph trans-all"><?= $phone ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="calendar flex flex-col gap-y-4 md:w-1/2 lg:w-full">
                    <?php if ($calendar_title): ?>
                        <h3 class="text-xl rg:text-2xl font-medium"><?= $calendar_title ?></h3>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
