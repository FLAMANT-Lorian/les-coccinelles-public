<?php

$index = $args['index'] ?? null;
$title = get_the_title();
$alt = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true);
$thumbnail = get_the_post_thumbnail(size: 'large', attr: ['class' => 'h-full w-full object-cover', 'alt' => $alt]);
$excerpt = get_the_excerpt();
$address = get_field('address');
$date = get_field('date');
$hour = get_field('hour');
$facebook_link = get_field('facebook-link');

?>

<article itemscope itemtype="https://schema.org/Event" itemprop="event"
         id="<?= $index ?>"
         class="events-card relative flex flex-col md:flex-row md:h-62 rg:h-70 border border-beige-dark max-md:min-w-[calc(100vw-48px)]">
    <div class="relative md:w-1/2 h-full">
        <?php if ($thumbnail): ?>
            <div class="overflow-hidden [&_img]:trans-all h-62 sm:h-70 md:h-full">
                <?= $thumbnail ?>
            </div>
        <?php endif; ?>
        <?php if ($date && $hour): ?>
            <p class="first-letter:uppercase px-4 py-1 bg-red text-white absolute bottom-4 left-4"><?= $date ?>
                à <?= $hour ?></p>
        <?php endif; ?>
    </div>
    <div class="p-6 rl:p-8 bg-beige-light md:grow md:w-1/2 flex flex-col">
        <div class="flex flex-row gap-2 justify-between items-center mb-4">
            <?php if ($address): ?>
                <p class="text-gray flex flex-col gap-1 before:content-[''] before:w-6 before:h-px before:bg-red">
                    <?= $address ?>
                </p>
            <?php endif; ?>
            <?php if ($facebook_link): ?>
                <a href="<?= $facebook_link ?>"
                   itemprop="url"
                   aria-label="Voir l’événement sur Facebook"
                   title="Voir l’événement sur Facebook"
                   class="text-red relative z-2 hover:text-brown focus:text-brown trans-all"
                   target="_blank">
                    <span itemprop="sameAs" class="sr-only">Voir l’événement sur Facebook</span>
                    <svg width="14" height="24" class="h-4.5" viewBox="0 0 14 24" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <use xlink:href="#facebook"></use>
                    </svg>
                </a>
            <?php endif; ?>
        </div>
        <?php if ($title): ?>
            <h3 itemprop="name" class="text-xl rl:text-2.5xl text-brown font-medium pb-2"><?= $title ?></h3>
        <?php endif; ?>
        <?php if ($excerpt): ?>
            <p itemprop="description" class="paragraph line-clamp-3 mb-4"><?= $excerpt ?></p>
        <?php endif; ?>
        <span class="more-text text-base text-red font-medium mt-auto">En savoir plus</span>
    </div>
    <a href="<?= get_the_permalink() ?>"
       aria-label="Vers la page de l’événement"
       title="Vers la page de l’événement"
       class="absolute inset-0 z-1">
        <span class="sr-only">Vers la page de l’événement</span>
    </a>
</article>
