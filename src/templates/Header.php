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

    <header class="w-full bg-primary/95 backdrop-blur-md h-20 flex items-center justify-center border-b border-gr40 light:border-gr80 absolute z-50 top-0 left-0">
        <div class="navbar-ctn flex justify-between items-center w-full mx-4 md:mx-12">
            <!-- Mobile Menu Button -->
            <button id="mobile-menu-btn" class="md:hidden flex flex-col justify-center items-center w-8 h-8 gap-1.5" aria-label="Menu">
                <span class="w-6 h-0.5 bg-gr80 light:text-gr40 transition-all duration-300"></span>
                <span class="w-6 h-0.5 bg-gr80 light:text-gr40 transition-all duration-300"></span>
                <span class="w-6 h-0.5 bg-gr80 light:text-gr40 transition-all duration-300"></span>
            </button>

            <!-- Desktop Navigation -->
            <ul class="hidden md:flex items-center gap-6 lg:gap-8 text-gr80 light:text-gr40 text-sm lg:text-[15.6px] font-ubuntu font-semibold">
                <?php foreach($links1 as $name => $url) : ?>
                    <li>
                        <a href="<?php echo $url; ?>" class="hover:text-accent transition-colors duration-300 relative group">
                            <?php echo $name; ?>
                            <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-accent group-hover:w-full transition-all duration-300"></span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>

            <ul class="hidden md:flex items-center gap-4 lg:gap-6 text-gr80 light:text-gr40 text-sm lg:text-[15.6px] font-ubuntu font-semibold">
                <?php foreach($links2 as $name => $url) : ?>
                    <li>
                        <a href="<?php echo $url; ?>" class="hover:text-accent transition-colors duration-300 relative group" aria-label="<?php echo ucfirst($name); ?>">
                            <?php echo $name; ?>
                            <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-accent group-hover:w-full transition-all duration-300"></span>
                        </a>
                    </li>
                <?php endforeach; ?>

                <li>
                    <button class="cursor-pointer flex justify-center items-center w-9 h-9 lg:w-10 lg:h-10 rounded-lg hover:bg-gr40 light:hover:bg-gr60 transition-all duration-300" aria-label="Search" value="Search">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gr80 light:text-gr40 hover:text-accent transition-colors duration-300">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M3 10a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                            <path d="M21 21l-6 -6" />
                        </svg>
                    </button>
                </li>
                <li>
                    <a href="/carrito" class="flex justify-center items-center w-9 h-9 lg:w-10 lg:h-10 rounded-lg hover:bg-gr40 light:hover:bg-gr60 transition-all duration-300" aria-label="Shopping Cart">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gr80 light:text-gr40 hover:text-accent transition-colors duration-300">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M4 19a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                            <path d="M15 19a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                            <path d="M17 17h-11v-14h-2" />
                            <path d="M6 5l14 1l-1 7h-13" />
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="/perfil" class="flex justify-center items-center w-9 h-9 lg:w-10 lg:h-10 rounded-lg hover:bg-gr40 light:hover:bg-gr60 transition-all duration-300" aria-label="User Profile">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gr80 light:text-gr40 hover:text-accent transition-colors duration-300">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                            <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                        </svg>
                    </a>
                </li>
            </ul>

            <div class="flex items-center">
                <h3 class="text-lg lg:text-xl font-ubuntu font-bold"> 
                    <a href="/" class="text-transparent bg-clip-text bg-gradient-to-r from-accent to-orange-500 hover:from-orange-500 hover:to-accent transition-all duration-300">GoodState</a>
                </h3>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden absolute top-20 left-0 w-full bg-primary/95 backdrop-blur-md border-b border-gr40 light:border-gr80">
            <div class="flex flex-col p-4 gap-4">
                <?php foreach($links1 as $name => $url) : ?>
                    <a href="<?php echo $url; ?>" class="text-gr80 light:text-gr40 text-sm font-ubuntu font-semibold hover:text-accent transition-colors duration-300 py-2">
                        <?php echo $name; ?>
                    </a>
                <?php endforeach; ?>
                <?php foreach($links2 as $name => $url) : ?>
                    <a href="<?php echo $url; ?>" class="text-gr80 light:text-gr40 text-sm font-ubuntu font-semibold hover:text-accent transition-colors duration-300 py-2">
                        <?php echo $name; ?>
                    </a>
                <?php endforeach; ?>
                <div class="flex items-center gap-4 pt-2 border-t border-gr40 light:border-gr80">
                    <button class="cursor-pointer flex justify-center items-center w-9 h-9 rounded-lg hover:bg-gr40 light:hover:bg-gr60 transition-all duration-300" aria-label="Search">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gr80 light:text-gr40 hover:text-accent transition-colors duration-300">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M3 10a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                            <path d="M21 21l-6 -6" />
                        </svg>
                    </button>
                    <a href="/carrito" class="flex justify-center items-center w-9 h-9 rounded-lg hover:bg-gr40 light:hover:bg-gr60 transition-all duration-300" aria-label="Shopping Cart">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gr80 light:text-gr40 hover:text-accent transition-colors duration-300">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M4 19a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                            <path d="M15 19a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                            <path d="M17 17h-11v-14h-2" />
                            <path d="M6 5l14 1l-1 7h-13" />
                        </svg>
                    </a>
                    <a href="/perfil" class="flex justify-center items-center w-9 h-9 rounded-lg hover:bg-gr40 light:hover:bg-gr60 transition-all duration-300" aria-label="User Profile">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gr80 light:text-gr40 hover:text-accent transition-colors duration-300">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                            <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <script>
            document.getElementById('mobile-menu-btn').addEventListener('click', function() {
                const menu = document.getElementById('mobile-menu');
                menu.classList.toggle('hidden');
            });
        </script>
    </header>

<?php } ?>