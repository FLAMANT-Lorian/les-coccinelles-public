<?php

$type = $args['hidden_input_type'] ?? false;

?>

<fieldset class="grid grid-col-1 md:grid-cols-2 gap-6">
    <legend class="sr-only">Informations principales</legend>
    
    <?php if ($type): ?>
        <input type="hidden" name="type" value="<?= $type ?>">
    <?php endif; ?>

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