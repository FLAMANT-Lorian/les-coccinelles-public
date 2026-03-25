<?php
$banner = get_field('hero-banner');
$title = $banner['title'];
$text = $banner['text'];
$bg_image = $banner['bg-image'];
?>

<?php if ($banner): ?>
    <div class="hero-banner relative">
        <div class="max-width-screen h-[calc(100svh-96px)] rg:h-[calc(100svh-112px)] px-default py-default grid-default">
            <div class="col-span-full md:col-start-2 md:col-span-6 lg:col-start-3 lg:col-span-8 flex flex-col lg:grid lg:grid-cols-subgrid gap-y-6 items-center justify-center text-white">
                <?php if ($title): ?>
                    <h1 class="text-banner-title font-medium text-center lg:col-span-full lg:self-end"><?= $title ?></h1>
                <?php endif; ?>
                <?php if ($text): ?>
                    <p itemprop="description" class="text-banner-text font-normal text-center lg:col-start-2 lg:col-span-6 lg:self-start"><?= $text ?></p>
                <?php endif; ?>
            </div>
        </div>
        <?php if ($bg_image): ?>
            <span class="absolute inset-0 -z-2 bg-pure-black">
            <?= wp_get_attachment_image($bg_image['ID'], '2048x2048', attr: [
                    'class' => 'w-full h-full object-cover opacity-60',
                    'alt' => $bg_image['alt']
            ]); ?>
        </span>
        <?php endif; ?>
    </div>
<?php endif; ?>
