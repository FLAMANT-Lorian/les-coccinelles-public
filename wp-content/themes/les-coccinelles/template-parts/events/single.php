<?php
global $cpt_events;

$title = get_the_title();
$alt = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true);
$thumbnail = get_the_post_thumbnail(size: 'large', attr: ['class' => 'aspect-square sm:h-100 xg:h-120 w-full h-full object-cover', 'alt' => $alt]);
$thumbnail_url = get_the_post_thumbnail_url(size: 'large');
$date = get_field('date');
$hour = get_field('hour');
$address = get_field('address');
$access_plan = get_field('access_plan');
$facebook_link = get_field('facebook-link');
$contents = get_field('content');
$contacts = get_field('contact');
?>

<section class="rg:bg-leaf-to-bottom-right rg:bg-position-[top_110px_left_-110px] rg:bg-no-repeat">
    <div class="px-default py-default grid-default gap-y-8 md:gap-y-12 max-width-screen">
        <?php if ($title): ?>
            <h2 class="text-2.5xl rg:text-4.5xl col-span-full text-center max-rg:mb-8 text-brown font-medium">
                <?= $title ?>
            </h2>
        <?php endif; ?>
        <?php if ($thumbnail): ?>
            <div class="col-span-full xg:col-start-2 xg:col-span-10">
                <a href="<?= $thumbnail_url ?>"
                   data-fancybox="event"
                   title="Voir l’image en grand"
                   aria-label="Voir l’image en grand">
                    <span class="sr-only">Voir l’image en grand</span>
                    <?= $thumbnail ?>
                </a>
            </div>
        <?php endif; ?>
        <div class="events-infos-wrapper col-span-full xg:col-start-2 xg:col-span-10 rg:grid rg:grid-cols-12 rg:gap-6 max-rg:divide-beige-dark/60 max-rg:divide-y">
            <?php if ($contents): ?>
                <article class="flex flex-col gap-8 rg:gap-15 max-rg:pb-12 rg:col-span-5">
                    <h3 class="sr-only">Contenu de l'événement</h3>
                    <?php foreach ($contents as $content):
                        $title = $content['title'];
                        $content = $content['paragraph'];
                        ?>
                        <div class="flex flex-col gap-2">
                            <?php if ($title): ?>
                                <h4 class="text-xl rg:text-2xl font-medium text-brown"><?= $title ?></h4>
                            <?php endif; ?>
                            <?php if ($content): ?>
                                <div class="event-content flex flex-col gap-6">
                                    <?= $content ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </article>
            <?php endif; ?>
            <div class="max-rg:pt-12 coordinate-event rg:self-start rg:sticky rg:top-12 rg:col-start-8 rg:col-span-5 xg:col-span-4 xg:col-start-9">
                <div>
                    <h3>Horaires</h3>
                    <ul class="flex flex-col gap-4">
                        <?php if ($date): ?>
                            <li class="first-letter:uppercase">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <use xlink:href="#calendar"></use>
                                </svg>
                                <span><?= $date ?></span>
                            </li>
                        <?php endif; ?>
                        <?php if ($hour): ?>
                            <li>
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <use xlink:href="#clock"></use>
                                </svg>
                                <span><?= $hour ?></span>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
                <div>
                    <h3>Renseignements</h3>
                    <?php if ($contacts): ?>
                        <ul class="flex flex-col gap-6">
                            <?php foreach ($contacts as $contact): ?>
                                <li>
                                    <ul class="flex flex-col">
                                        <?php if ($contact['full-name']): ?>
                                            <li class="pb-3"><?= $contact['full-name'] ?></li>
                                        <?php endif; ?>
                                        <?php if ($contact['tel']): ?>
                                            <li class="ml-4 mb-2">
                                                <svg class="text-red" width="24" height="24" viewBox="0 0 24 24"
                                                     fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <use xlink:href="#phone"></use>
                                                </svg>
                                                <span><?= $contact['tel'] ?></span>
                                            </li>
                                        <?php endif; ?>
                                        <?php if ($contact['email']): ?>
                                            <li class="ml-4">
                                                <svg class="text-red" width="24" height="24" viewBox="0 0 24 24"
                                                     fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <use xlink:href="#email"></use>
                                                </svg>
                                                <span><?= $contact['email'] ?></span>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
                <div>
                    <h3>Coordonnées</h3>
                    <ul>
                        <?php if ($address): ?>
                            <li class="items-start!">
                                <svg class="text-red" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <use xlink:href="#map"></use>
                                </svg>
                                <div class="flex flex-col gap-2">
                                    <span><?= $address ?></span>
                                    <?php if ($access_plan): ?>
                                        <a href="<?= $access_plan ?>"
                                           aria-label="Plan d'accès"
                                           title="Plan d'accès"
                                           target="_blank"
                                           class="text-blue-500 underline">
                                            Plan d’accès
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
        <a href="<?= get_post_type_archive_link($cpt_events['cpt_name']) ?>"
           class="btn-back-filled col-span-full justify-self-center"
           aria-label="Retour aux événéments"
           title="Retour aux événéments">
            Retour aux événéments
        </a>
    </div>
</section>
