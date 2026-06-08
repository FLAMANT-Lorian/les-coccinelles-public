<?php

$label = $args['label'] ?? 'Rechercher';
$placeholder = $args['placeholder'] ?? 'Rechercher';
$name = $args['name'] ?? false;
$class = $args['class'] ?? '';
$value = $args['value'] ?? '';
?>

<?php if ($name): ?>
    <div class="field <?= $class ?>">
        <?php if ($label): ?>
            <label for="search" class="sr-only"><?= $label ?></label>
        <?php endif; ?>
        <input type="text" id="search" value="<?= $value ?>" class="search-input" name="<?= $name ?>" placeholder="<?= $placeholder ?>">
        <svg class="w-6 h-6 absolute top-1/2 -translate-y-1/2 left-4" viewBox="0 0 24 24" fill="none"
             xmlns="http://www.w3.org/2000/svg">
            <use href="#loop"></use>
        </svg>
    </div>
<?php endif; ?>
