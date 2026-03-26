<?php

$index = $args['idx'] ?? false;

if ($index < 10) {
    $index = '0' . $index . '.';
}
$title = get_sub_field('title');
$text = get_sub_field('text');

?>

<div itemscope itemprop="itemListElement" itemtype="https://schema.org/ListItem"
     class="col-span-full lg:col-start-2 lg:col-span-10 flex flex-col gap-2 py-8 lg:py-12 first:pt-0 lg:first:pt-0 last:pb-0 lg:last:pb-0">
    <span class="text-base text-red"><?= $index; ?></span>
    <div class="grid-default lg:grid-cols-10 gap-y-6">
        <?php if ($title): ?>
            <h3 itemprop="name"
                class="sticky self-start top-6 text-2xl font-medium text-brown col-span-full md:col-span-3 ">
               <?= $title ?>
            </h3>
        <?php endif; ?>
        <?php if ($text): ?>
            <div data-text-reveal data-dir="left" itemprop="description"
                 class="paragraph col-span-full md:col-start-5 md:col-span-4 lg:col-start-5 lg:col-span-6">
                <div class="mask-content">
                    <?= $text ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
