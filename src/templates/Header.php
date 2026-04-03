<?php

function TemplateHeader() {
    $links1 = [
        "Vender" => "/vender",
        "Alquilar" => "/alquilar",
        "Mudanza" => "/mudanza",
    ];
    $links2 = [
        "Inicio" => "/inicio",
        "Nosotros" => "/nosotros",
        "Contacto" => "/contacto",
    ];

    ?>

    <header class="w-full bg-primary h-20 flex items-center justify-center border-b-[0.20px] border-gr40 light:border-gr80 absolute z-999 top-0 left-0">
        <div class="navbar-ctn flex justify-between items-center w-full mx-12">
            <ul class="navbar-ctn flex items-center gap-8 text-gr80 light:text-gr40 text-[15.6px] font-ubuntu font-bold">
                <?php foreach($links1 as $name => $url) : ?>

                    <li>
                        <a href="<?php echo $url; ?>" class="hover:text-hover transition-colors duration-300">
                            <?php echo $name; ?>
                        </a>
                    </li>

                <?php endforeach; ?>
            </ul>

            <ul class="navbar flex items-center gap-8 text-gr80 light:text-gr40 text-[15.6px] font-ubuntu font-bold">
                <?php foreach($links2 as $name => $url) : ?>

                    <li>
                        <a href="<?php echo $url; ?>" class="hover:text-hover transition-colors duration-300">
                            <?php echo $name; ?>
                        </a>
                    </li>

                <?php endforeach; ?>

                <li>
                    <button class="cursor-pointer flex justify-center items-center hover:brightness-150 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#bcbcbc" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-search light:invert">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M3 10a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                            <path d="M21 21l-6 -6" />
                        </svg>
                    </button>
                </li>
                <li>
                    <a href="/carrito" class="flex justify-center items-center hover:brightness-150 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#bcbcbc" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-shopping-cart light:invert">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M4 19a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                            <path d="M15 19a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                            <path d="M17 17h-11v-14h-2" />
                            <path d="M6 5l14 1l-1 7h-13" />
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="/perfil" class="flex justify-center items-center hover:brightness-150 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#bcbcbc" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user light:invert">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                            <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                        </svg>
                    </a>
                </li>
            </ul>

            <div class="flex items-center">
                <h3 class="text-white text-lg font-normal light:text-accent"> 
                    <a href="/" class="hover:text-hover transition-colors duration-300">GoodState</a>
                </h3>
            </div>
        </div>
    </header>

<?php } ?>