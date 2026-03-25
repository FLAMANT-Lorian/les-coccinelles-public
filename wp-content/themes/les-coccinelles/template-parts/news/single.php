<?php
global $cpt_news;

$title = get_the_title();
$date = get_the_date('d / m / Y');
$images = get_field('images');

?>

<div class="rg:bg-leaf-to-top-left rg:bg-position-[right_-110px_bottom_110px] rg:bg-no-repeat">
    <div class="max-width-screen px-default py-default grid-default gap-y-8">
        <div class="col-span-full md:col-span-4 lg:col-span-5 flex flex-col gap-y-4">
            <?php if ($title): ?>
                <h1 class="text-2.5xl lg:text-4.5xl leading-9 lg:leading-11 font-medium text-brown"><?= $title ?></h1>
            <?php endif; ?>
            <?php if ($date): ?>
                <div class="flex flex-row gap-2 items-center text-brown">
                    <svg class="text-green" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <use xlink:href="#leaf"></use>
                    </svg>
                    <p>
                        <span>Publié le</span>
                        <span><?= $date ?></span>
                    </p>
                </div>
            <?php endif; ?>
            <?php if (get_the_content()): ?>
                <div class="mt-2 flex flex-col gap-y-4 paragraph">
                    <?php the_content() ?>
                </div>
            <?php endif; ?>
        </div>
        <?php if ($images): ?>
            <div class="col-span-full md:col-span-4 md:col-start-6 lg:col-start-7 lg:col-span-6 mt-2 grid lg:grid-cols-2 lg:grid-rows-[repeat(3,200px)] gap-6">
                <?php foreach ($images as $index => $image): $index++;
                    
                    $classes = [
                            1 => 'lg:h-106 lg:row-span-2 lg:col-span-1 lg:col-start-1 lg:row-start-1',
                            2 => 'lg:h-50 lg:col-span-1 lg:col-start-2 lg:row-start-1',
                            3 => 'lg:h-50 lg:row-start-3 lg:col-span-1 lg:col-start-1',
                            4 => 'lg:h-106 lg:row-span-2 lg:row-start-2'
                    ];
                    
                    ?>
                    <a href="<?= $image['url'] ?>"
                       aria-label="Voir l’image en grand"
                       title="Voir l’image en grand"
                       class="<?= $index > 4 ? 'hidden' : $classes[$index] ?> "
                       data-fancybox="single-news">
                        <?= wp_get_attachment_image($image['ID'], 'large', attr: [
                                'class' => 'max-lg:aspect-square object-cover h-full w-full',
                                'alt' => $image['alt']
                        ]); ?>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <a href="<?= get_post_type_archive_link($cpt_news['cpt_name']) ?>"
           class="btn-back-filled col-span-full justify-self-center"
           aria-label="Retour aux actualités"
           title="Retour aux actualités">
            Retour aux actualités
        </a>
    </div>
</div>