<?php 

include_once "OptimizedImage.php";

const examples = 11;
const descriptions = [
    "Casa en un barrio tranquilo, ideal para familias.",
    "Apartamento moderno",
    "Casa elegante y minimalista",
    "Apartamento chiquito pero acogedor",
    "Casa de clase media",
    "Casa grande en llanuras",
    "Edificio con arquitectura moderna",
    "Cabaña chiquita en un bosque",
    "Casa con bosque privado",
    "Apartamento común y corriente",
    "Casa con piscina y jardín",
];

const locations = [
    "Valecia,Carabobo",
    "Caracas,DC",
    "Maracay,Aragua",
    "Valencia,Carabobo",
    "Maracaibo,Zulia",
    "Barquisimeto,Lara",
    "Mérida,Mérida",
    "Ciudad Guayana,Bolívar",
    "Cumaná,Sucre",
    "Puerto La Cruz,Anzoátegui",
    "Valencia,Carabobo"
];

const prices = [
    "5.000$",
    "30.000$",
    "50.000$",
    "15.000$",
    "25.000$",
    "40.000$",
    "30.000$",
    "100.000$",
    "200.000$",
    "2.000$",
    "20.000$"
];

function RandomImages() {
    $dir = "assets/example";
    $files = [];
    for($i = 0; $i < examples; $i++) {
        $files[] = "$dir/$i.jpeg";
    }
    $current = 1;
    // shuffle($files);
    $json = [];
    for($i = 0; $i < examples; $i++) {
        $json["img_$i"] = [
            "src" => $files[ $i ],
            "description" => descriptions[ $i ],
            "location" => locations[ $i ],
            "price" => prices[ $i ],
            "current" => ($i === $current) ? "true" : "false" // This will be used to determine what card is user looking at
        ];
    }
    return $json;
}

function HousingMoving() {
    $json = RandomImages();

    ?>

    <div class="housing-moving-ctn flex items-center my-10 w-full mx-auto font-ubuntu overflow-hidden relative">
        <div id="housing-moving" class="flex flex-row gap-4 flex-nowrap transition-all duration-700 ease-in-out" style>
            <?php foreach($json as $i => $v): 
                $key = $i;
                $src = $v["src"];
                $description = $v["description"];
                $location = $v["location"];
                $price = $v["price"];
                $current = $v["current"];
                $uuid = md5( uniqid( rand() % rand() ) );

                ?>
                <div class="housing-card flex flex-col gap-4 w-170 object-cover" 
                     data-key="<?= $key ?>"
                     data-src="<?= $src ?>"
                     data-description="<?= $description ?>"
                     data-location="<?= $location ?>"
                     data-price="<?= $price ?>"
                     data-current="<?= $current ?>"
                     data-uuid="<?= $uuid ?>"
                    >

                    <?php 
                        OptimizedImage(
                            src: $v["src"], 
                            alt: $v["description"], 
                            class: "housing-image w-full h-80 saturate-150 object-cover img_$uuid",
                            style: $current === "false" ? "filter: brightness(50%) blur(2px)" : "",
                        ); 
                    ?>
                    <div 
                        class="housing-info flex flex-col gap-1 text-gr80"
                        style="<?= $current === "false" ? "display: none;" : "" ?>"
                    >
                        <h3 class="housing-title font-bold text-2xl"><?= $description ?></h3>
                        <p class="housing-location font-medium">Lugar: <?= $location ?></p>
                        <p class="housing-price font-medium">Precio: <?= $price ?> </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

<?php } ?>