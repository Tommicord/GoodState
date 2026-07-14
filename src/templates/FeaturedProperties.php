<?php

include_once "OptimizedImage.php";

function FeaturedProperties() {
    $featured = [
        [
            "src" => "/assets/featured-1.jpg",
            "title" => "Residencia de Lujo en Caracas",
            "description" => "Exclusiva residencia con vista panorámica a la ciudad",
            "location" => "Caracas, Los Palos Grandes",
            "price" => "450,000",
            "bedrooms" => 4,
            "bathrooms" => 3,
            "area" => "320"
        ],
        [
            "src" => "/assets/featured-2.jpg",
            "title" => "Apartamento Moderno",
            "description" => "Apartamento contemporáneo en zona exclusiva",
            "location" => "Valencia, La Trinidad",
            "price" => "180,000",
            "bedrooms" => 3,
            "bathrooms" => 2,
            "area" => "150"
        ],
        [
            "src" => "/assets/featured-3.jpg",
            "title" => "Casa Familiar",
            "description" => "Amplia casa perfecta para toda la familia",
            "location" => "Maracaibo, Santa Rita",
            "price" => "220,000",
            "bedrooms" => 3,
            "bathrooms" => 2,
            "area" => "90"
        ]
    ];

    ?>
    <section class="featured-properties w-full py-16 md:py-24 bg-gradient-to-b from-gr95 to-black light:from-gr5 light:to-white">
        <div class="container mx-auto px-4 md:px-6">
            <div class="text-center mb-12 md:mb-16">
                <span class="inline-block px-3 py-1 bg-accent/10 text-accent rounded-full text-xs md:text-sm font-semibold mb-4">EXCLUSIVO</span>
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-ubuntu font-bold text-gr80 light:text-gr20 mb-4">
                    Propiedades <span class="text-transparent bg-clip-text bg-gradient-to-b from-accent to-orange-500">Destacadas</span>
                </h2>
                <p class="text-gr60 light:text-gr40 text-sm md:text-lg font-roboto max-w-2xl mx-auto">
                    Descubre nuestra selección exclusiva de propiedades de alta calidad en las mejores ubicaciones de Venezuela
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php foreach($featured as $index => $property): ?>
                    <div class="property-card group bg-white light:bg-gr10 rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3 border border-gr20 light:border-gr80">
                        <div class="relative overflow-hidden">
                            <?php 
                                OptimizedImage(
                                    src: $property["src"],
                                    alt: $property["title"],
                                    class: "w-full h-72 object-cover group-hover:scale-110 transition-transform duration-700"
                                );
                            ?>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div class="absolute top-4 left-4 bg-accent text-white px-3 py-1.5 rounded-full text-sm font-bold shadow-lg">
                                Destacado
                            </div>
                            <div class="absolute bottom-4 left-4 right-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300 transform translate-y-4 group-hover:translate-y-0">
                                <a href="#" class="bg-white text-primary px-4 py-2 rounded-lg text-sm font-bold hover:bg-accent hover:text-white transition-colors duration-300">
                                    Ver detalles
                                </a>
                            </div>
                        </div>
                        
                        <div class="p-6">
                            <h3 class="text-xl font-ubuntu font-bold text-gr20 light:text-gr80 mb-2 group-hover:text-accent transition-colors duration-300">
                                <?= $property["title"] ?>
                            </h3>
                            <p class="text-gr40 light:text-gr60 text-sm font-roboto mb-4 line-clamp-2">
                                <?= $property["description"] ?>
                            </p>
                            
                            <div class="flex items-center text-gr40 light:text-gr60 text-sm mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2 text-accent">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                    <circle cx="12" cy="10" r="3"></circle>
                                </svg>
                                <?= $property["location"] ?>
                            </div>

                            <div class="flex items-center justify-between text-gr40 light:text-gr60 text-sm mb-4">
                                <div class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-accent">
                                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                    </svg>
                                    <?= $property["bedrooms"] ?> hab
                                </div>
                                <div class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-accent">
                                        <path d="M9 12h6"></path>
                                        <path d="M12 3v18"></path>
                                        <rect x="3" y="6" width="18" height="12" rx="2"></rect>
                                    </svg>
                                    <?= $property["bathrooms"] ?> baños
                                </div>
                                <div class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-accent">
                                        <path d="M3 3v18h18"></path>
                                        <path d="M18.7 8l-5.1 5.2-2.8-2.7L7 14.3"></path>
                                    </svg>
                                    <?= $property["area"] ?> m²
                                </div>
                            </div>

                            <div class="flex items-center justify-between pt-4 border-t border-gr20 light:border-gr80">
                                <span class="text-2xl font-bold text-accent">$<?= $property["price"] ?></span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="text-center mt-12 md:mt-16">
                <a href="#" class="inline-flex items-center gap-2 bg-gradient-to-b from-accent to-orange-500 text-white px-6 md:px-8 py-3 md:py-4 rounded-sm font-bold text-sm md:text-lg transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                    Ver todas las propiedades
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" class="md:w-5 md:h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14"></path>
                        <path d="M12 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>

<?php } ?>
