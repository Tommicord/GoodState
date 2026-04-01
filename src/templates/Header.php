<?php

function TemplateHeader() {
    $links = [
        "Inicio" => "/inicio",
        "Propiedades" => "/propiedades",
        "Nosotros" => "/nosotros",
        "Contacto" => "/contacto"
    ];

    ?>

    <header class="w-full bg-primary h-20 flex items-center justify-between">
        <div class="container mx-16 flex items-center justify-between">
            <h3 class="text-white text-lg font-medium light:text-accent"> <a href="/" class="hover:text-hover transition-colors duration-300">GoodState</a></h3>
        </div>

        <div class="navbar-ctn flex gap-2">
            <ul class="navbar flex items-center gap-2">
                <li>
                    <button class="bg-secondary light:bg-gr20 p-[0.6rem] rounded-full hover:brightness-75 transition-colors duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#bcbcbc" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-search">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M3 10a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                            <path d="M21 21l-6 -6" />
                        </svg>
                    </button>
                </li>
            </ul>

            <ul class="navbar flex items-center gap-8 text-gr80 light:text-gr40 text-[15.6px] font-ubuntu font-bold mx-12">

                <?php foreach($links as $name => $url) : ?>

                    <li>
                        <a href="<?php echo $url; ?>" class="hover:text-hover transition-colors duration-300">
                            <?php echo $name; ?>
                        </a>
                    </li>

                <?php endforeach; ?>
            </ul>
        </div>
    </header>

<?php } ?>