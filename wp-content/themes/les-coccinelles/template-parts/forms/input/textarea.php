<?php

$label = $args['label'] ?? 'Label';
$name = $args['name'] ?? 'name';
$id = $args['id'] ?? '';
$class = $args['class'] ?? '';
$placeholder = $args['placeholder'] ?? '';
$required = $args['required'] ?? false;
$error = $args['error'] ?? false;
$value = $args['value'] ?? '';

?>

<div class="field flex flex-col gap-y-1 <?= $class ?>">
    <label class="ml-3 font-medium text-brown self-start"
           for="<?= $id ?>"><?= $label ?><?= $required ? ' <strong class="text-red">*</strong>' : '' ?></label>
    <textarea id="<?= $id ?>"
              name="<?= $name ?>"
              placeholder="<?= $placeholder ?>"><?= $value ?: '' ?></textarea>
    <?php if ($error): ?>
        <p class="error"><?= $error ?></p>
    <?php endif; ?>
</div>
