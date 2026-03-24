<?php

$index = $args['index'] ?? null;

$title = get_the_title();
$alt = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true);
$thumbnail = get_the_post_thumbnail(size: 'large', attr: [
        'class' => 'w-full max-h-60 lg:max-h-70 object-cover h-full trans-all',
        'alt' => $alt
]);
$excerpt = get_the_excerpt();
$date = get_the_date('d F Y');

?>

<article itemscope itemtype="https://schema.org/BlogPosting"
         class="h-full flex flex-col news-card relative border border-beige-dark min-w-[calc(100vw-48px)] md:min-w-[calc((100vw-128px)/2)] rg:min-w-auto snap-center"
         id="<?= $index ?>">
    <?php if ($thumbnail): ?>
        <div class="max-h-60 lg:max-h-70 overflow-hidden">
            <?= $thumbnail ?>
        </div>
    <?php endif; ?>
    <div class="p-4 rg:p-6 bg-white flex flex-col grow">
        <?php if ($date): ?>
            <span class="flex flex-row gap-2 items-center mb-2">
            <svg class="text-green" width="24" height="24" viewBox="0 0 24 24" fill="none"
                 xmlns="http://www.w3.org/2000/svg">
                <use xlink:href="#leaf"></use>
            </svg>
            <time datetime="<?= $date ?>" itemprop="datePublished"
                  class="text-gray text-base font-normal"><?= $date ?></time>
        </span>
        <?php endif; ?>
        <?php if ($title): ?>
            <h3 itemprop="headline" class="text-xl rg:text-2xl-fixed font-medium mb-3 text-brown"><?= $title ?></h3>
        <?php endif; ?>
        <?php if ($excerpt): ?>
            <p itemprop="description" class="text-base text-gray rg:text-lg line-clamp-3 mb-4"><?= $excerpt ?></p>
        <?php endif; ?>
        <span class="more-text text-base text-red font-medium mt-auto">En savoir plus</span>
    </div>
    <a class="absolute inset-0 z-1"
       aria-label="Vers le détail de l'article"
       title="Vers le détail de l'article"
       href="<?= get_the_permalink() ?>">
        <span class="sr-only">Vers le détail de l'article</span>
    </a>
</article>
