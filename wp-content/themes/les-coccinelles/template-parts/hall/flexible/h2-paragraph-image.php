<?php

$index = $args['idx'] ?? false;

if ($index < 10) {
    $index = '0' . $index . '.';
}
$title = get_sub_field('title');
$text = get_sub_field('text');
$image = get_sub_field('image');

?>

<div class="col-span-full lg:col-start-2 lg:col-span-10 flex flex-col gap-2 first:pb-8 lg:first:pb-12 not-first:pb-8 lg:not-first:pb-12 not-last:py-8 lg:not-last:py-12 last:pt-8 lg:last:pt-12">
    <span class="text-base text-red"><?= $index; ?></span>
    <div class="grid-default lg:grid-cols-10 gap-y-6">
        <?php if ($title): ?>
            <h3 class="text-2xl font-medium text-brown col-span-full md:col-span-3 "><?= $title ?></h3>
        <?php endif; ?>
        <div class="flex flex-col gap-6 col-span-full md:col-start-5 md:col-span-4 lg:col-start-5 lg:col-span-6">
            <?php if ($text): ?>
                <div class="paragraph">
                    <?= $text ?>
                </div>
            <?php endif; ?>
            <?php if ($image): ?>
                <?= wp_get_attachment_image($image['ID'], '1536x1536', attr: [
                        'class' => 'h-full w-full object-cover aspect-square max-h-98',
                        'alt' => $image['alt']
                ]); ?>
            <?php endif; ?>
        </div>
    </div>
</div>