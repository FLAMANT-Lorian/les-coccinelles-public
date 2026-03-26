<?php

$text_media = get_field('text-media');
$title = $text_media['title'];
$content = $text_media['content'];
$button = $text_media['button'];
$image = $text_media['image'];
$image_position = $text_media['image-position'];

?>

<section class="rg:bg-leaf-to-bottom-left rg:bg-no-repeat rg:bg-position-[top_-80px_right_-80px]">
    <div class="max-width-screen py-default px-default grid-default gap-y-10 rg:items-center text-brown">
        <div class="flex flex-col items-start col-span-full rg:col-span-4 rl:col-span-3 lg:col-span-5 <?= $image_position === 'right' ? 'rg:col-start-1' : 'rg:col-start-5 lg:col-start-8' ?>">
            <?php if ($title): ?>
                <h2 data-text-reveal data-dir="top" class="text-big pb-3 rg:pb-4">
                    <span class="mask-content">
                        <?= $title ?>
                    </span>
                </h2>
            <?php endif; ?>
            <?php if ($content): ?>
                <div data-text-reveal data-dir="left" class="paragraph pb-8">
                    <div class="mask-content">
                        <?= $content ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if ($button): ?>
                <a href="<?= $button['url'] ?>"
                   aria-label="<?= $button['title'] ?>"
                   title="<?= $button['title'] ?>"
                   class="btn-primary-outlined">
                    <?= $button['title'] ?>
                </a>
            <?php endif; ?>
        </div>
        <?php if ($image): ?>
            <div data-img-reveal data-dir="left" class="col-span-full rg:col-span-4 lg:col-span-6 <?= $image_position === 'right' ? 'rg:col-start-5 lg:col-start-7' : 'rg:col-start-1' ?>">
                <?= wp_get_attachment_image($image['ID'], 'large', attr: [
                        'class' => 'mask-content aspect-square sm:aspect-5/3 rg:aspect-4/3 lg:aspect-5/3 w-full h-full object-cover object-center',
                        'alt' => $image['alt'],
                ]); ?>
            </div>
        <?php endif; ?>
    </div>
</section>
