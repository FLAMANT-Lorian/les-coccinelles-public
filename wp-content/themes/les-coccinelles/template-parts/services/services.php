<?php

$services = get_field('services');
$title = $services['title'];
$content = $services['content'];
$items = $services['services'];

?>

<section class="rg:bg-leaf-to-top-right rg:bg-no-repeat rg:bg-position-[bottom_-80px_left_-80px]">
    <div class="max-width-screen px-default py-default grid-default gap-y-10">
        <div class="text-center col-span-full lg:col-start-4 lg:col-span-6">
            <?php if ($title): ?>
                <h2 class="text-brown text-big pb-3"><?= $title ?></h2>
            <?php endif; ?>
            <?php if ($content): ?>
                <div class="paragraph">
                    <p><?= $content ?></p>
                </div>
            <?php endif; ?>
        </div>
        <?php if ($items): ?>
            <div class="grid grid-cols-4 md:grid-cols-8 lg:grid-cols-10 gap-x-6 gap-y-14 col-span-full xg:col-start-2 xg:col-span-10">
                <?php foreach ($items as $index => $item): ?>
                    <div itemprop="makesOffer" class="service-item flex flex-col items-center relative col-span-full md:col-span-4 md:last:col-span-8 rg:last:col-start-3 rg:last:col-span-4 rl:last:col-start-3 rl:last:col-span-4 lg:odd:col-span-3 lg:even:col-span-4 lg:even:mt-8 ?>">
                        <?php if ($item['image']): ?>
                            <div class="overflow-hidden">
                                <?= wp_get_attachment_image($item['image']['ID'], 'large', attr: [
                                        'class' => 'h-66 sm:h-80 lg:h-70 object-cover object-center trans-all',
                                        'alt' => $item['image']['alt']
                                ]) ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($item['name']): ?>
                            <span itemprop="name" class="relative z-1 btn-services -mt-5.75 rg:-mt-7.25">
                                <?= $item['name'] ?>
                            </span>
                        <?php endif; ?>
                        <?php if ($item['button']): ?>
                            <a class="absolute inset-0 z-2"
                               aria-label="<?= $item['button']['title'] ?>"
                               title="Vers la page : <?= $item['button']['title'] ?>"
                               href="<?= $item['button']['url'] ?>">
                                <span class="sr-only">
                                    <?= $item['button']['title'] ?>
                                </span>
                            </a>
                        <?php endif; ?>
                    </div>
                
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
