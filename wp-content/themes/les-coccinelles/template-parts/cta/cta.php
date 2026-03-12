<?php

$cta = get_field('cta');
$title = $cta['title'];
$text = $cta['text'];
$button = $cta['button'];
$image = $cta['background-image'];

?>

<section class="rg:bg-leaf-to-top-left rg:bg-no-repeat rg:bg-position-[bottom_-80px_right_-80px]">
    <div class="max-width-screen px-default py-default">
        <div class="relative grid-default px-6 md:px-0 py-default col-span-full bg-brown">
            <div class="relative z-1 col-span-full md:col-start-2 md:col-span-6 lg:col-start-3 lg:col-span-8 flex flex-col items-center text-center text-white">
                <?php if ($title): ?>
                    <h2 class="text-3xl font-medium mb-4"><?= $title ?></h2>
                <?php endif; ?>
                <?php if ($text): ?>
                    <p class="text-white paragraph mb-12"><?= $text ?></p>
                <?php endif; ?>
                <?php if ($button): ?>
                    <a class="btn-cta"
                       href="<?= $button['url'] ?>"
                       aria-label="<?= $button['title'] ?>"
                       title="<?= $button['title'] ?>">
                        <?= $button['title'] ?>
                    </a>
                <?php endif; ?>
            </div>
            <div class="absolute inset-0 opacity-30">
                <?= wp_get_attachment_image($image['ID'], '1536x1536', attr: [
                        'class' => 'w-full h-full object-cover',
                        'alt' => $image['alt']
                ]) ?>
            </div>
        </div>
    </div>
</section>
