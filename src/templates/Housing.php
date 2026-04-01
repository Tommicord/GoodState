<?php

define("COUNT", 10);

function LazyImgs(int $orders = 3) {
    $dir = "assets/example/";

    for($i = 1; $i <= $orders && $i <= COUNT; $i++) {
        yield $i . ".jpg";
    }
}

function Base64(string $path) {
    if(!file_exists($path)) 
        return null;
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $content = file_get_contents($path);
    $base64 = base64_encode($content);
    return "data:image/$type;base64,$base64";
}

function HousingBanner() {
    // Obtener el generador de imágenes
    $imgs = LazyImgs(6);

    foreach($imgs as $i => $img) :
        $base64 = Base64("assets/example/" . $img);

        ?>

        <!-- Cargar la imagen -->

        <img 
            src="<?php echo $base64; ?>" 
            alt="Background House (Id : <?php echo $i; ?>)" 
            loading="lazy"
            fetchpriority="high"
            class="w-full h-full object-cover rounded-lg aspect-video contrast-125 saturate-200 brightness-32"
        >
    <?php endforeach;
} 

?>