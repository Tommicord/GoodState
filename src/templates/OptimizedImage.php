<?php

function OptimizedImage(
    string $src, 
    string $alt = "", 
    string $class = "", 
    string $style = "",
    string $loading = "lazy"
) {
    ?>
    <img 
        src="<?php echo $src; ?>" 
        alt="<?php echo $alt; ?>" 
        loading="<?php echo $loading; ?>"
        fetchpriority="low"
        decoding="async"
        class="<?php echo $class; ?>"
        style="<?php echo $style; ?>"
    >
    <?php
}
?>