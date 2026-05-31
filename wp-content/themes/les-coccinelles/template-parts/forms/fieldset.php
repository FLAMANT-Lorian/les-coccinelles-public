<?php

if (isset($_SESSION['errors'])) {
    $_SESSION['errors'] = false;
}

global $wp;

$type = $args['hidden_input_type'] ?? false;

$token = $_GET['token'] ?? false;
$success = $_GET['success'] ?? false;
$errors = null;
$values = null;
$message = false;

if ($success && $token) {
    $_SESSION['errors'] = false;
    $data = json_decode(base64_decode($token));
    $message = $data->message ?? null;
} elseif ($token) {
    $_SESSION['errors'] = true;
    $data = json_decode(base64_decode($token));
    $errors = $data->errors ?? null;
    $values = $data->values ?? null;
}

?>
<?php if ($success): ?>
    <div class="max-lg:mx-auto max-lg:h-80 max-w-100 flex flex-col items-center justify-center gap-y-8 lg:absolute lg:top-1/2 lg:left-1/2 lg:-translate-x-1/2 lg:-translate-y-1/2">
        <p class="text-center paragraph"><?= $message ?></p>
        <a href="<?= home_url() ?>"
           aria-label="Retour à l'accueil"
           title="Retour à l'accueil"
           class="btn-back-filled">
            Retour à l'accueil
        </a>
    </div>
    <?php return; ?>
<?php endif; ?>

<form action="<?= LARAVEL_API_URL . '/public-form-request' ?>" method="POST"
      class="form-request flex flex-col gap-y-8" novalidate>
    <fieldset class="grid grid-col-1 md:grid-cols-2 gap-8">
        <legend class="sr-only">Informations principales</legend>
        
        <?php if ($type): ?>
            <input type="hidden" name="type" value="<?= $type ?>">
        <?php endif; ?>
        
        <?php get_template_part('template-parts/forms/input/text', args: [
                'label' => 'Nom',
                'name' => 'last_name',
                'id' => 'last-name',
                'class' => '',
                'placeholder' => 'Doe',
                'required' => true,
                'value' => $values->last_name ?? false,
                'error' => $errors->last_name[0] ?? false
        ]); ?>
        
        <?php get_template_part('template-parts/forms/input/text', args: [
                'label' => 'Prénom',
                'name' => 'first_name',
                'id' => 'first-name',
                'class' => '',
                'placeholder' => 'John',
                'required' => true,
                'value' => $values->first_name ?? false,
                'error' => $errors->first_name[0] ?? false
        ]) ?>
        
        <?php get_template_part('template-parts/forms/input/text', args: [
                'label' => 'Adresse e-mail',
                'name' => 'email',
                'id' => 'email-address',
                'class' => '',
                'type' => 'email',
                'placeholder' => 'johndoe@example.be',
                'required' => true,
                'value' => $values->email ?? false,
                'error' => $errors->email[0] ?? false
        ]) ?>
        
        <?php get_template_part('template-parts/forms/input/text', args: [
                'label' => 'Téléphone',
                'name' => 'phone',
                'id' => 'tel',
                'type' => 'tel',
                'class' => '',
                'placeholder' => '+XX XXX XX XX XX',
                'required' => true,
                'value' => $values->phone ?? false,
                'error' => $errors->phone[0] ?? false
        ]) ?>
        
        <?php get_template_part('template-parts/forms/input/text', args: [
                'label' => 'Objet',
                'name' => 'object',
                'id' => 'object',
                'class' => 'md:col-span-2',
                'placeholder' => 'Demande de ...',
                'required' => true,
                'value' => $values->object ?? false,
                'error' => $errors->object[0] ?? false
        ]) ?>
        
        <?php get_template_part('template-parts/forms/input/textarea', args: [
                'label' => 'Message',
                'name' => 'message',
                'id' => 'message',
                'class' => 'md:col-span-2',
                'placeholder' => 'Je vous contacte pour ...',
                'required' => true,
                'value' => $values->message ?? false,
                'error' => $errors->message[0] ?? false
        ]) ?>
    
    </fieldset>
    <div class="flex flex-col md:flex-row gap-6">
        <div class="acceptance-field relative">
            <input type="checkbox" id="acceptance" name="acceptance" class="cursor-pointer"
                   <?php if ($values->acceptance ?? false): ?>checked<?php endif; ?>>
            <label for="acceptance" class="cursor-pointer">J’accepte que mes données soient utilisées
                pour me recontacter et me
                tenir informé(e) des actualités et événements. Elles resteront confidentielles et ne
                seront jamais partagées à des tiers.</label>
            <?php if ($errors->acceptance[0] ?? false): ?>
                <p class="error"><?= $errors->acceptance[0] ?></p>
            <?php endif; ?>
        </div>
        <button type="submit"
                class="submit-button self-end md:self-center btn py-3 bg-red border border-red text-white hover:text-brown hover:bg-transparent focus:text-brown focus:bg-transparent cursor-pointer">
            Envoyer
        </button>
    </div>
</form>