<?php 

include_once "OptimizedImage.php";

function RandomImages() {
    $dir = "assets/result";
    $datas = glob("$dir/*_data.json");
    shuffle($datas);
    $props = [];
    for($i = 0; $i < count($datas); $i++) {
        $content = file_get_contents($datas[ $i ]);
        $json = json_decode( $content, true );
        $props[ $i ] = $json;
    }
    return $props;
}

function HousingMoving() {
    $full = RandomImages();
    $json = array_slice( $full, 0, 14 );

    ?>

    <div class="housing-moving-ctn flex items-center my-10 w-full mx-auto font-ubuntu overflow-hidden relative">
        <div id="housing-moving" class="flex flex-row gap-4 flex-nowrap transition-all duration-700 ease-in-out" style data-props="<?= htmlspecialchars( json_encode( $full ) ) ?>">
            <?php foreach($json as $i => $v): 
                $key = "img_$i";
                $src = $v["src"];
                $title = $v["title"];
                $description = $v["description"];
                $location = $v["location"];
                $price = $v["price"];
                $current = ( $i === 1 ) ? "true" : "false";
                $uuid = md5( uniqid( rand() % rand() ) ); // This will be used in JavaScript to identify the divs and change their content
                $bathrooms = $v["bathrooms"];
                $bedrooms = $v["bedrooms"];

                ?>
                <div class="housing-card flex flex-col gap-4 w-80 md:w-96 lg:w-160 object-cover flex-shrink-0" 
                     data-key="<?= $key ?>"
                     data-src="<?= $src ?>"
                     data-title="<?= $title ?>"
                     data-description="<?= $description ?>"
                     data-location="<?= $location ?>"
                     data-price="<?= $price ?>"
                     data-current="<?= $current ?>"
                     data-uuid="<?= $uuid ?>"
                     data-bathrooms="<?= $bathrooms ?>"
                     data-bedrooms="<?= $bedrooms ?>"
                    >

                    <?php 
                        OptimizedImage(
                            src: $v["src"], 
                            alt: $v["description"], 
                            class: "housing-image w-full h-48 md:h-56 lg:h-70 saturate-175 contrast-125 object-cover img_$uuid",
                            style: $current === "false" ? "filter: brightness(50%) blur(2px)" : "",
                        ); 
                    ?>
                    <div 
                        class="housing-info flex flex-row gap-4 text-gr80 w-full"
                        style="<?= $current === "false" ? "display: none;" : "" ?>"
                    >
                        <div class="housing-info flex flex-col gap-1 text-gr80 light:text-gr20">
                            <h4 class="housing-title font-bold text-lg md:text-xl lg:text-2xl"><?= $title ?></h4>
                            <p class="housing-title font-medium max-w-lg text-sm md:text-base"><?= $description ?></p>
                            <div class="housing-inner flex flex-row gap-4 md:gap-8">
                                <div>
                                    <p class="housing-location font-medium text-sm md:text-base"><span class="text-orange-400 light:text-orange-600"> Lugar: </span> <?= $location ?></p>
                                    <p class="housing-price font-medium text-sm md:text-base"><span class="text-orange-400 light:text-orange-600">Precio: </span> <?= $price ?>&dollar; </p>
                                </div>
                                <div class="housing-info2 flex flex-col gap-1">
                                    <p class="housing-bathrooms font-medium text-sm md:text-base"><span class="text-orange-400 light:text-orange-600">Baños: </span> <?= $bathrooms ?></p>
                                    <p class="housing-bedrooms font-medium text-sm md:text-base"><span class="text-orange-400 light:text-orange-600">Habitaciones: </span> <?= $bedrooms ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

<?php } ?>