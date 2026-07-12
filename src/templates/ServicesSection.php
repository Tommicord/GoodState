<?php

function ServicesSection() {
    $services = [
        [
            "icon" => "home",
            "title" => "Venta de Propiedades",
            "description" => "Te ayudamos a vender tu propiedad al mejor precio del mercado con estrategias de marketing efectivas."
        ],
        [
            "icon" => "key",
            "title" => "Alquiler de Inmuebles",
            "description" => "Encuentra el alquiler perfecto o pon tu propiedad en renta con gestión profesional."
        ],
        [
            "icon" => "truck",
            "title" => "Servicios de Mudanza",
            "description" => "Simplifica tu traslado con nuestros servicios integrales de mudanza y logística."
        ],
        [
            "icon" => "chart",
            "title" => "Tasaciones Profesionales",
            "description" => "Obtén valoraciones precisas de tu propiedad con nuestros expertos certificados."
        ],
        [
            "icon" => "shield",
            "title" => "Asesoría Legal",
            "description" => "Asistencia legal completa para todas tus transacciones inmobiliarias."
        ],
        [
            "icon" => "search",
            "title" => "Búsqueda Personalizada",
            "description" => "Te encontramos la propiedad ideal según tus necesidades y presupuesto."
        ]
    ];

    $icons = [
        "home" => '<path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline>',
        "key" => '<path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"></path>',
        "truck" => '<rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle>',
        "chart" => '<line x1="12" y1="20" x2="12" y2="10"></line><line x1="18" y1="20" x2="18" y2="4"></line><line x1="6" y1="20" x2="6" y2="16"></line>',
        "shield" => '<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>',
        "search" => '<circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line>'
    ];

    ?>

    <section class="services-section w-full py-20 bg-black light:bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-ubuntu font-bold text-gr80 light:text-gr20 mb-4">
                    Nuestros <span class="text-accent">Servicios</span>
                </h2>
                <p class="text-gr40 light:text-gr60 text-lg font-roboto max-w-2xl mx-auto">
                    Ofrecemos soluciones integrales para todas tus necesidades inmobiliarias con un equipo de profesionales dedicados
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php foreach($services as $index => $service): ?>
                    <div class="service-card group bg-gr95 light:bg-gr5 p-8 rounded-xl hover:bg-gr90 light:hover:bg-gr10 transition-all duration-300 border border-gr40 light:border-gr80 hover:border-accent">
                        <div class="w-16 h-16 bg-accent/10 rounded-lg flex items-center justify-center mb-6 group-hover:bg-accent/20 transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-accent">
                                <?= $icons[$service["icon"]] ?>
                            </svg>
                        </div>
                        
                        <h3 class="text-xl font-ubuntu font-bold text-gr80 light:text-gr20 mb-3">
                            <?= $service["title"] ?>
                        </h3>
                        <p class="text-gr40 light:text-gr60 text-sm font-roboto leading-relaxed">
                            <?= $service["description"] ?>
                        </p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

<?php } ?>
