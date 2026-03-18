<?php

$main = get_field('main');
$title = $main['title'];
$text = $main['text'];
$images = $main['gallery'];

?>

<div class="max-width-screen grid-default gap-y-8 rg:gap-y-15 px-default py-default">
    <div class="col-span-full md:col-start-2 md:col-span-6 rl:col-start-3 rl:col-span-4 lg:col-start-3 lg:col-span-8 xg:col-start-4 xg:col-span-6">
        <?php if ($title): ?>
            <h1 class="text-2.5xl font-medium pb-2.5 md:text-center text-brown">
                <?= $title ?>
            </h1>
        <?php endif; ?>
        <?php if ($text): ?>
            <div class="paragraph">
                <?= $text ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="col-span-full grid gap-6 grid-cols-1 sm:grid-cols-2 rg:grid-cols-12 rg:h-108">
        <?php if ($images): ?>
            <?php foreach ($images as $idx => $image): ?>
                <div class="col-span-full rg:nth-of-type-[2]:col-span-3 rg:nth-of-type-[2]:col-start-7 rg:nth-of-type-[3]:col-span-3 rg:nth-of-type-[3]:col-start-7 rg:nth-of-type-[3]:row-start-2 rg:first:col-span-6 rg:first:row-span-2 rg:last:col-span-3 rg:last:col-start-10 rg:last:row-span-2 sm:col-span-1 h-full overflow-hidden <?= $idx > 3 ? 'hidden' : '' ?>">
                    <a class="fancybox-image block h-full w-full"
                       href="<?= $image['url'] ?>"
                       data-fancybox="hall-gallery"
                       title="Voir l’image en grand"
                       aria-label="Voir l’image en grand">
                        <span class="sr-only">Voir l’image en grand</span>
                        <?= wp_get_attachment_image($image['ID'], '1536x1536', attr: [
                                'class' => 'h-full w-full object-cover max-rg:aspect-square',
                                'alt' => $image['alt']
                        ]); ?>
                    </a>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
