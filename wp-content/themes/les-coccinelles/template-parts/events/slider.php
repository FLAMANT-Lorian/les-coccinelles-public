<?php

global $cpt_events;

$query_args = [
        'post_type' => $cpt_events['cpt_name'],
        'posts_per_page' => 3,
        'post__not_in' => [get_the_ID()],
        'order' => 'ASC'
];

$title = $args['title'] ?? 'Nos événements';

$news = new WP_Query($query_args);
$index = 1;
?>

<?php if ($news->have_posts()) : ?>
    <section class="bg-beige-medium slider">
        <div class="max-width-screen px-default py-default grid-default gap-y-8 rg:gap-y-12">
            <?php if ($title): ?>
                <h2 class="col-span-full lg:col-start-4 lg:col-span-6 text-center text-brown text-big"><?= $title ?></h2>
            <?php endif; ?>
            <div class="slider-track col-span-full flex flex-row md:grid md:grid-cols-8 lg:grid-cols-12 gap-4 overflow-x-scroll snap-mandatory snap-x">
                <?php while ($news->have_posts()): $news->the_post(); ?>
                    
                    <div class="col-span-full xg:col-start-2 xg:col-span-10 h-full">
                        <?php get_template_part('template-parts/events/card', args: ['index' => $index]); ?>
                    </div>
                    
                    <?php $index++; endwhile; ?>
            </div>
            <div class="slider-dots dots col-span-full md:hidden!">
                <?php foreach ($news->posts as $index => $news): ?>
                    <div aria-hidden="true" class="dot cursor-pointer md:even:hidden" data-id="<?= $index + 1 ?>"></div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif;
wp_reset_postdata(); ?>
