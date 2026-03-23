<?php

$title = get_field('title');
$subtitle = get_field('subtitle');
$coordinate_title = get_field('coordinate-title');
$coordinate_text = get_field('coordinate-text');

$contact = get_field('contact', 'options');
$email = $contact['email'];
$phone = $contact['phone'];
$address = $contact['address'];
$access_plan = $contact['access-plan'];

?>

<section class="rg:bg-leaf-to-top-left rg:bg-position-[bottom_-110px_right_-110px] rg:bg-no-repeat">
    <div class="max-width-screen px-default py-default grid-default gap-y-8 lg:gap-y-15">
        <div class="col-span-full text-center flex flex-col gap-y-2">
            <?php if ($subtitle): ?>
                <h2 class="text-xl rg:text-2xl text-red font-medium"><?= $subtitle ?></h2>
            <?php endif; ?>
            <?php if ($title): ?>
                <span class="text-big text-brown"><?= $title ?></span>
            <?php endif; ?>
        </div>
        <div class="col-span-full grid grid-default max-lg:divide-y max-lg:divide-beige-dark/60">
            <div class="form col-span-full rl:col-start-2 rl:col-span-6 lg:col-start-1 lg:col-span-7 max-lg:pb-8">
                <h3 class="sr-only">Formulaire de contact</h3>
                <p class="paragraph mb-6">Les champs renseignés avec <strong class="text-red">*</strong> sont requis !
                </p>
                <form action="" method="POST" class="flex flex-col gap-y-6" novalidate>
                    <fieldset class="grid grid-col-1 md:grid-cols-2 gap-6">
                        <legend class="sr-only">Informations principales</legend>
                        
                        <?php get_template_part('template-parts/forms/input/text', args: [
                                'label' => 'Nom',
                                'name' => 'last-name',
                                'id' => 'last-name',
                                'class' => '',
                                'placeholder' => 'Doe',
                                'required' => true
                        ]); ?>
                        
                        <?php get_template_part('template-parts/forms/input/text', args: [
                                'label' => 'Prénom',
                                'name' => 'first-name',
                                'id' => 'first-name',
                                'class' => '',
                                'placeholder' => 'John',
                                'required' => true
                        ]) ?>
                        
                        <?php get_template_part('template-parts/forms/input/text', args: [
                                'label' => 'Adresse e-mail',
                                'name' => 'email',
                                'id' => 'email-address',
                                'class' => '',
                                'type' => 'email',
                                'placeholder' => 'johndoe@example.be',
                                'required' => true
                        ]) ?>
                        
                        <?php get_template_part('template-parts/forms/input/text', args: [
                                'label' => 'Téléphone',
                                'name' => 'tel',
                                'id' => 'tel',
                                'type' => 'tel',
                                'class' => '',
                                'placeholder' => '+XX XXX XX XX XX',
                                'required' => true
                        ]) ?>
                        
                        <?php get_template_part('template-parts/forms/input/text', args: [
                                'label' => 'Objet',
                                'name' => 'object',
                                'id' => 'object',
                                'class' => 'md:col-span-2',
                                'placeholder' => 'Demande de ...',
                                'required' => true
                        ]) ?>
                        
                        <?php get_template_part('template-parts/forms/input/textarea', args: [
                                'label' => 'Message',
                                'name' => 'message',
                                'id' => 'message',
                                'class' => 'md:col-span-2',
                                'placeholder' => 'Je vous contacte pour ...',
                                'required' => true
                        ]) ?>
                    
                    </fieldset>
                    <div class="flex flex-col md:flex-row gap-6">
                        <div class="acceptance-field">
                            <input type="checkbox" id="acceptance">
                            <label for="acceptance">J’accepte que mes données soient utilisées pour me recontacter et me
                                tenir informé(e) des actualités et événements. Elles resteront confidentielles et ne
                                seront jamais partagées à des tiers.</label>
                        </div>
                        <button type="submit"
                                class="submit-button self-end md:self-center btn py-3 bg-red border border-red text-white hover:text-brown hover:bg-transparent cursor-pointer">
                            Envoyer
                        </button>
                    </div>
                </form>
            </div>
            <span aria-hidden="true" class="max-lg:hidden flex justify-center">
                <span class="h-full w-px bg-beige-dark/60"></span>
            </span>
            <div class="coordinate flex flex-col gap-6 md:flex-row lg:flex-col md:gap-12 col-span-full rl:col-start-2 lg:col-start-9 lg:col-span-4 rl:col-span-6  max-lg:pt-8">
                <div class="flex flex-col gap-y-4 md:w-1/2 lg:w-full">
                    <?php if ($coordinate_title): ?>
                        <h3 class="text-xl rg:text-2xl font-medium"><?= $coordinate_title ?></h3>
                    <?php endif; ?>
                    <?php if ($coordinate_text): ?>
                        <p class="paragraph"><?= $coordinate_text ?></p>
                    <?php endif; ?>
                </div>
                <div class="md:w-1/2 lg:w-full">
                    <h3 class="text-xl rg:text-2xl font-medium mb-4">Coordonnées</h3>
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
                                            <span class="text-blue-500 underline hover:text-blue-800 trans-all">Plan d’accès</span>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </li>
                        <?php endif; ?>
                        <?php if ($email): ?>
                            <li class="flex flex-row gap-x-4 [&:hover_span]:text-red">
                                <a href="mailto:<?= $email ?>"
                                   aria-label="<?= $email ?>"
                                   title="Envoyer un email à <?= $email ?>"
                                   class="flex flex-row items-center gap-x-4">
                                    <svg class="text-red" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <use href="#email"></use>
                                    </svg>
                                    <span class="paragraph trans-all"><?= $email ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if ($phone): ?>
                            <li class=" [&:hover_span]:text-red flex flex-row gap-x-4">
                                <a href="tel:<?= $phone ?>"
                                   aria-label="<?= $phone ?>"
                                   title="Téléphoner au <?= $phone ?>"
                                   class="flex flex-row items-center gap-x-4">
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
            </div>
        </div>
    </div>
</section>
