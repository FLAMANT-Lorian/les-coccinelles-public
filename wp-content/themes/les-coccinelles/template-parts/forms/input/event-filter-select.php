<?php

$value = $args['value'] ?? false;

?>

<div class="field w-full">
    <label for="filter" class="sr-only">Filter les événements</label>
    <select name="order" id="filter" class="w-full cursor-pointer event-filter-select">
        <option value="" <?php if ($value === ''): ?>selected<?php endif; ?>>Filtrer</option>
        <option value="asc" <?php if ($value === 'asc'): ?>selected<?php endif; ?>>Date croissante</option>
        <option value="desc" <?php if ($value === 'desc'): ?>selected<?php endif; ?>>Date décroissante</option>
    </select>
</div>
