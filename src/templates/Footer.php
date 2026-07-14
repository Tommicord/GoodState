<?php

function TemplateFooter() {
    $footerLinks = [
        "Empresa" => [
            "Nosotros" => "/nosotros",
            "Carreras" => "/carreras",
            "Blog" => "/blog",
            "Prensa" => "/prensa"
        ],
        "Servicios" => [
            "Venta" => "/vender",
            "Alquiler" => "/alquilar",
            "Mudanza" => "/mudanza",
            "Tasaciones" => "/tasaciones"
        ],
        "Soporte" => [
            "Centro de Ayuda" => "/ayuda",
            "Contacto" => "/contacto",
            "FAQ" => "/faq",
            "Términos" => "/terminos"
        ],
        "Legal" => [
            "Privacidad" => "/privacidad",
            "Términos de Uso" => "/terminos-uso",
            "Cookies" => "/cookies",
            "Licencias" => "/licencias"
        ]
    ];

    $socialLinks = [
        "facebook" => "https://facebook.com/goodstate",
        "twitter" => "https://twitter.com/goodstate",
        "instagram" => "https://instagram.com/goodstate",
        "linkedin" => "https://linkedin.com/company/goodstate"
    ];

    $socialIcons = [
        "facebook" => '<path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>',
        "twitter" => '<path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>',
        "instagram" => '<rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>',
        "linkedin" => '<path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle>'
    ];

    ?>

    <footer class="w-full light:bg-gr90 light:to-white border-t border-gr40 light:border-gr80">
        <div class="container mx-auto px-4 md:px-6 py-12 md:py-16">
            <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-5 gap-6 md:gap-12">
                <!-- Brand Section -->
                <div class="col-span-2 md:col-span-2 lg:col-span-1">
                    <h3 class="text-2xl md:text-3xl font-ubuntu font-bold text-transparent bg-clip-text bg-linear-to-r from-accent to-orange-500 mb-4">
                        GoodState
                    </h3>
                    <p class="text-gr60 light:text-gr40 text-xs md:text-sm font-roboto mb-4 md:mb-6 leading-relaxed">
                        Tu portal inmobiliario de confianza en Venezuela. Encontramos el hogar perfecto para ti.
                    </p>
                    <div class="flex gap-2 md:gap-3">
                        <?php foreach($socialLinks as $platform => $url): ?>
                            <a href="<?php echo $url; ?>" class="w-8 h-8 md:w-12 md:h-12 bg-accent rounded-xl flex items-center justify-center" aria-label="<?php echo ucfirst($platform); ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" class="md:w-5 md:h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-white light:text-gr20">
                                    <?php echo $socialIcons[$platform]; ?>
                                </svg>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>

                <?php foreach($footerLinks as $category => $links): ?>
                    <div>
                        <h4 class="text-base md:text-lg font-ubuntu font-bold text-white light:text-gr20 mb-3 md:mb-4 group">
                            <?php echo $category; ?>
                            <span class="block h-0.5 w-0 bg-accent group-hover:w-full transition-all duration-300"></span>
                        </h4>
                        <ul class="space-y-2 md:space-y-3">
                            <?php foreach($links as $name => $url): ?>
                                <li>
                                    <a href="<?php echo $url; ?>" class="text-gr60 light:text-gr40 text-xs md:text-sm font-roboto hover:text-accent transition-colors duration-300 inline-flex items-center gap-1">
                                        <span class="opacity-0 group-hover:opacity-100 transition-opacity duration-300">→</span>
                                        <?php echo $name; ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Contact Info -->
            <div class="mt-8 md:mt-12 pt-6 md:pt-8 border-t border-gr40 light:border-gr80">
                <div class="grid grid-cols-3 gap-6 md:gap-3">
                    <div class="flex items-start gap-3 md:gap-4 group">
                        <div class="w-10 h-10 md:w-12 md:h-12 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="md:w-6 md:h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-accent">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                        </div>
                        <div>
                            <h5 class="text-white light:text-gr20 font-bold font-ubuntu mb-1 text-sm md:text-base">Ubicación</h5>
                            <p class="text-gr60 light:text-gr40 text-xs md:text-sm font-roboto">Caracas, Venezuela</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3 md:gap-4 group">
                        <div class="w-10 h-10 md:w-12 md:h-12 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="md:w-6 md:h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-accent">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                            </svg>
                        </div>
                        <div>
                            <h5 class="text-white light:text-gr20 font-bold font-ubuntu mb-1 text-sm md:text-base">Teléfono</h5>
                            <p class="text-gr60 light:text-gr40 text-xs md:text-sm font-roboto">+58 0414 411-4289</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3 md:gap-4 group">
                        <div class="w-10 h-10 md:w-12 md:h-12 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="md:w-6 md:h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-accent">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                <polyline points="22,6 12 13 2,6"></polyline>
                            </svg>
                        </div>
                        <div>
                            <h5 class="text-white light:text-gr20 font-bold font-ubuntu mb-1 text-sm md:text-base">Email</h5>
                            <p class="text-gr60 light:text-gr40 text-xs md:text-sm font-roboto">info@goodstate.ve</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Copyright -->
            <div class="mt-8 md:mt-12 pt-6 md:pt-8 border-t border-gr40 light:border-gr80 text-center">
                <p class="text-gr60 light:text-gr40 text-xs md:text-sm font-roboto">
                    <span class="text-accent font-bold">© <?php echo date('Y'); ?> GoodState.</span> Todos los derechos reservados.
                </p>
            </div>
        </div>
    </footer>

<?php } ?>
