<?php

$label = $args['label'] ?? 'Label';
$name = $args['name'] ?? 'name';
$id = $args['id'] ?? '';
$class = $args['class'] ?? '';
$placeholder = $args['placeholder'] ?? '';
$required = $args['required'] ?? false;

?>

<div class="field flex flex-col gap-y-1 <?= $class ?>">
    <label class="ml-3 font-medium text-brown "
           for="<?= $id ?>"><?= $label ?><?= $required ? ' <strong class="text-red">*</strong>' : '' ?></label>
    <textarea id="<?= $id ?>"
              name="<?= $name ?>"
              placeholder="<?= $placeholder ?>"></textarea>
</div>
