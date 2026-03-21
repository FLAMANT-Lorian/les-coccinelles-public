<?php

if (is_front_page() || !function_exists('yoast_breadcrumb')) {
    return;
}

?>

<div class="bg-beige-medium">
    <div class="max-width-screen px-default py-3 [&_span]:text-base [&_span]:whitespace-nowrap [&_span]:flex [&_span]:gap-2 [&_span]:text-brown [&_span]:font-normal [&_a]:text-red [&_a]:font-bold [&_a:hover]:underline [&_a]:trans-all [&_span>span:last-child]:line-clamp-1">
        <?= yoast_breadcrumb(); ?>
    </div>
</div>
