<?php
$term = 'items';

$flexible = get_field($term);
$index = 1;

?>

<?php if (have_rows($term)): ?>
    <section>
        <div class="max-width-screen grid-default px-default py-default lg:pt-0 lg:pb-24 divide-y divide-beige-dark/60">
            <h2 class="sr-only">Informations sur la salle</h2>
            <?php while (have_rows($term)): the_row(); ?>
                
                <?php
                if (get_row_layout() === 'h3-paragraph') {
                    get_template_part('template-parts/hall/flexible/h2-paragraph', args: ['idx' => $index]);
                    $index++;
                } elseif (get_row_layout() === 'h3-paragraph-image') {
                    get_template_part('template-parts/hall/flexible/h2-paragraph-image', args: ['idx' => $index]);
                    $index++;
                } elseif (get_row_layout() === 'title-list-icons') {
                    get_template_part('template-parts/hall/flexible/title-list-icons', args: ['idx' => $index]);
                    $index++;
                }
                ?>
            
            
            <?php endwhile; ?>
        </div>
    </section>
<?php endif; ?>
