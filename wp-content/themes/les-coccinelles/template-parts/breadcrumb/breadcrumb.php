<?php

if (is_front_page() || !function_exists('yoast_breadcrumb')) {
    return;
}

?>

<div class="bg-beige-medium">
    <div class="max-width-screen px-default py-3 [&_span]:text-base [&_span]:font-normal [&_a]:text-red [&_a]:font-bold [&_a:hover]:underline [&_a]:trans-all">
        <?= yoast_breadcrumb(); ?>
    </div>
</div>
