<?php

$index = $args['idx'] ?? false;

if ($index < 10) {
    $index = '0' . $index . '.';
}
$title = get_sub_field('title');
$text = get_sub_field('text');

?>

<div class="col-span-full lg:col-start-2 lg:col-span-10 flex flex-col gap-2 first:pb-8 lg:first:pb-12 not-first:pb-8 lg:not-first:pb-12 not-last:py-8 lg:not-last:py-12 last:pt-8 lg:last:pt-12">
    <span class="text-base text-red"><?= $index; ?></span>
    <div class="grid-default lg:grid-cols-10 gap-y-6">
        <?php if ($title): ?>
            <h3 class="text-2xl font-medium text-brown col-span-full md:col-span-3 "><?= $title ?></h3>
        <?php endif; ?>
        <?php if ($text): ?>
            <div class="paragraph col-span-full md:col-start-5 md:col-span-4 lg:col-start-5 lg:col-span-6">
                <?= $text ?>
            </div>
        <?php endif; ?>
    </div>
</div>
