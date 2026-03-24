<?php

$history_items = get_field('history');

?>

<section class="history-section rg:bg-leaf-to-top-right rg:bg-position-[top_110px_left_-110px] rg:bg-no-repeat">
    <div class="max-width-screen px-default py-default">
        <h2 class="sr-only">Historique de l’asbl Les Coccinelles</h2>
        <?php if ($history_items): ?>
            <div class="history rg:py-default grid-default gap-y-16" itemscope itemtype="https://schema.org/ItemList">
                <?php foreach ($history_items as $history_item): ?>
                    
                    <?php get_template_part('template-parts/history/card', args: ['history_item' => $history_item]); ?>
                
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
