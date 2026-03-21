<?php
global $cpt_news;

$title = get_field('title', 156);
$subtitle = get_field('subtitle', 156);

$value = false;

$query_args = [
        'post_type' => $cpt_news['cpt_name'],
        'paged' => get_query_var('paged'),
        'order' => 'DESC',
        'orderby' => 'date',
];

if (!empty($_GET['search'])) {
    $term = esc_html($_GET['search']);
    $query_args['meta_query'] = [
            [
                    'key' => 'search-title',
                    'value' => $term,
                    'compare' => 'LIKE',
            ]
    ];
    $value = $term;
}

$news = new WP_Query($query_args);
wp_reset_postdata();
$index = 1;

?>

<section class="rg:bg-leaf-to-bottom-right rg:bg-position-[top_110px_left_-110px] rg:bg-no-repeat">
    <div class="px-default py-default grid-default gap-y-8">
        <div class="col-span-full text-center flex flex-col gap-y-2">
            <?php if ($subtitle): ?>
                <h2 class="text-xl rg:text-2xl text-red font-medium"><?= $subtitle ?></h2>
            <?php endif; ?>
            <?php if ($title): ?>
                <span class="text-big text-brown"><?= $title ?></span>
            <?php endif; ?>
        </div>
        <form id="search-news-form" action="<?= get_post_type_archive_link($cpt_news['cpt_name']) ?>" method="get"
              class="col-span-full justify-self-center rg:justify-self-end">
            <fieldset>
                <?php get_template_part('template-parts/forms/input/search', args: [
                        'name' => 'search',
                        'label' => 'Rechercher',
                        'placeholder' => 'Rechercher',
                        'class' => 'news-search-input',
                        'value' => !empty($value) ? $value : false
                ]); ?>
            </fieldset>
            <input class="sr-only" type="submit" value="Chercher parmis les actualités">
        </form>
        <div class="news-wrapper col-span-full grid-default items-center justify-center gap-y-6 md:gap-y-10">
            <?php if ($news->have_posts()): ?>
                <?php while ($news->have_posts()): $news->the_post(); ?>
                    <div class="col-span-full md:col-span-4 h-full">
                        <?php get_template_part('template-parts/news/card', args: ['index' => $index]); ?>
                    </div>
                    <?php $index++; endwhile; ?>
            <?php else: ?>
                <div class="col-span-full md:col-span-4">Aucun résultat</div>
            <?php endif; ?>
            <?= custom_pagination($news) ?>
        </div>
    </div>
</section>
