<?php
global $cpt_news, $cpt_events;

$id = $args['id'] ?? false;
$cpt_name = $args['cpt_name'] ?? false;
$form_id = $args['form_id'] ?? false;
$inputClass = $args['input_class'] ?? false;
$wrapperClass = $args['wrapper_class'] ?? false;

$title = get_field('title', $id);
$subtitle = get_field('subtitle', $id);

/* SEARCH */
$term = esc_html($_GET['search'] ?? '');
$content = get_filtered_items($term, $cpt_name);
$value = $term;

?>

<section class="rg:bg-leaf-to-bottom-right rg:bg-position-[top_110px_left_-110px] rg:bg-no-repeat">
    <div class="max-width-screen px-default py-default grid-default gap-y-8">
        <div class="col-span-full text-center flex flex-col gap-y-2">
            <?php if ($subtitle): ?>
                <h2 class="text-xl rg:text-2xl text-red font-medium"><?= $subtitle ?></h2>
            <?php endif; ?>
            <?php if ($title): ?>
                <span class="text-big text-brown"><?= $title ?></span>
            <?php endif; ?>
        </div>
        <form id="<?= $form_id ?>" action="<?= get_post_type_archive_link($cpt_name) ?>" method="get"
              class="col-span-full justify-self-center rg:justify-self-end <?= $cpt_name === $cpt_events['cpt_name'] ? 'xg:col-end-12' : '' ?>">
            <fieldset>
                <?php get_template_part('template-parts/forms/input/search', args: [
                        'name' => 'search',
                        'label' => 'Rechercher',
                        'placeholder' => 'Rechercher',
                        'class' => $inputClass,
                        'value' => !empty($value) ? $value : false
                ]); ?>
            </fieldset>
            <input class="sr-only" type="submit" value="Rechercher">
        </form>
        <div class="<?= $wrapperClass ?> col-span-full grid-default items-center justify-center gap-y-6 md:gap-y-10">
            
            <?= $content ?>
        </div>
    </div>
</section>
