<?php

$history_items = get_field('history');

?>

<section class="history-section bg-leaf-to-top-right bg-position-[top_110px_left_-110px] bg-no-repeat">
    <h1 class="sr-only">À propos de l’asbl Les Coccinelles</h1>
    <div class="max-width-screen px-default py-default">
        <?php if ($history_items): ?>
            <div class="history rg:py-default grid-default gap-y-16">
                <?php foreach ($history_items as $history_item): ?>
                    
                    <?php get_template_part('template-parts/history/card', args: ['history_item' => $history_item]); ?>
                
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
