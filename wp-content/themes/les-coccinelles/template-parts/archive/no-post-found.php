<?php

$term = $args['term'] ?? false;

?>

<div class="no-post-found flex flex-col items-center gap-y-4 p-6 border border-beige-dark/60">
    <span class="w-20 h-20">
        <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
             stroke="currentColor"
             stroke-width="0.5" stroke-linecap="round" stroke-linejoin="round">
            <path d="m13.5 8.5-5 5"/>
            <path d="m8.5 8.5 5 5"/>
            <circle cx="11" cy="11" r="8"/>
            <path d="m21 21-4.3-4.3"/>
        </svg>
    </span>
    <span class="flex flex-row gap-x-1">
        Aucun résultat pour : <strong class="font-bold text-red"><?= $term ?></strong>
    </span>
</div>

