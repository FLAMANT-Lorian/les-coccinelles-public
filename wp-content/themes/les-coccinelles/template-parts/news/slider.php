<?php

global $cpt_news;

$query_args = [
        'post_type' => $cpt_news['cpt_name'],
        'posts_per_page' => 3,
        'order' => 'ASC'
];

$title = $args['title'] ?? 'Nos actualités';

$news = new WP_Query($query_args);
$index = 1;
?>

<?php if ($news->have_posts()) : ?>
    <section class="bg-beige-medium news-slider">
        <div class="max-width-screen px-default py-default grid-default gap-y-8 rg:gap-y-12">
            <?php if ($title): ?>
                <h2 class="col-span-full text-center text-brown text-2xl font-medium"><?= $title ?></h2>
            <?php endif; ?>
            <div class="news-track col-span-full flex flex-row gap-4 overflow-x-scroll snap-mandatory snap-x">
                <?php while ($news->have_posts()): $news->the_post(); ?>
                    
                    <?php get_template_part('template-parts/news/card', args: ['index' => $index]); ?>
                    
                    <?php $index++; endwhile; ?>
            </div>
            <div class="news-dots dots col-span-full rg:hidden!">
                <?php foreach ($news->posts as $index => $news): ?>
                    <div aria-hidden="true" class="dot cursor-pointer md:even:hidden" id="<?= $index + 1 ?>"></div>
                <?php endforeach; ?>
            </div>
            <a href="<?= get_post_type_archive_link($cpt_news['cpt_name']) ?>"
               aria-label="Voir toutes les actualités"
               title="Vers la page d’archives des actualités"
               class="col-span-full justify-self-center btn-primary-filled">
                Voir toutes les actualités
            </a>
        </div>
    </section>
<?php endif; wp_reset_postdata(); ?>
