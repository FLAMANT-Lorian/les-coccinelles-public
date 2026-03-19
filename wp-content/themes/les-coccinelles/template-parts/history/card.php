<?php

$item = $args['history_item'] ?? false;

?>

<?php if ($item): ?>
    <div class="history-card relative col-span-full lg:col-start-2 lg:col-span-10 grid grid-cols-4 md:grid-cols-8 rg:grid-cols-10 gap-x-5 gap-y-6">
        <div class="col-span-full md:col-span-4 flex flex-col gap-6">
            <?php if ($item['title']): ?>
                <h3 class="text-2xl rg:text-2.5xl font-medium"><?= $item['title']; ?></h3>
            <?php endif; ?>
            <?php if ($item['text']): ?>
                <div class="paragraph">
                    <?= $item['text']; ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="col-span-full md:col-span-4 max-rg:relative">
            <?php if ($item['year']): ?>
                <time datetime="<?= $item['year']; ?>"
                      class="absolute z-1 bottom-4 right-4 px-2 py-1 bg-red text-white "><?= $item['year']; ?></time>
            <?php endif; ?>
            <?php if ($item['image']): ?>
                <a href="<?= $item['image']['url'] ?>"
                   data-fancybox="history-item"
                   title="Voir l’image en grand"
                   aria-label="Voir l’image en grand">
                    <span class="sr-only">Voir l’image en grand</span>
                    <?= wp_get_attachment_image($item['image']['ID'], 'large', attr: [
                            'class' => 'max-h-64 rg:max-h-80 w-full object-cover',
                            'alt' => $item['image']['alt'],
                    ]); ?>
                </a>
            <?php endif; ?>
        </div>
    </div>

<?php endif; ?>
