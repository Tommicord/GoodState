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
            "bedrooms" => 5,
            "bathrooms" => 4,
            "area" => "280"
        ]
    ];

    ?>

    <section class="featured-properties w-full py-20 bg-gr95 light:bg-gr5">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-ubuntu font-bold text-gr20 light:text-gr80 mb-4">
                    Propiedades <span class="text-accent">Destacadas</span>
                </h2>
                <p class="text-gr40 light:text-gr60 text-lg font-roboto max-w-2xl mx-auto">
                    Descubre nuestra selección exclusiva de propiedades de alta calidad en las mejores ubicaciones de Venezuela
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php foreach($featured as $index => $property): ?>
                    <div class="property-card group bg-white light:bg-gr10 rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                        <div class="relative overflow-hidden">
                            <?php 
                                OptimizedImage(
                                    src: $property["src"],
                                    alt: $property["title"],
                                    class: "w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500"
                                );
                            ?>
                            <div class="absolute top-4 right-4 bg-accent text-white px-3 py-1 rounded-full text-sm font-bold">
                                Destacado
                            </div>
                        </div>
                        
                        <div class="p-6">
                            <h3 class="text-xl font-ubuntu font-bold text-gr20 light:text-gr80 mb-2">
                                <?= $property["title"] ?>
                            </h3>
                            <p class="text-gr40 light:text-gr60 text-sm font-roboto mb-4">
                                <?= $property["description"] ?>
                            </p>
                            
                            <div class="flex items-center text-gr40 light:text-gr60 text-sm mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                    <circle cx="12" cy="10" r="3"></circle>
                                </svg>
                                <?= $property["location"] ?>
                            </div>

                            <div class="flex items-center justify-between text-gr40 light:text-gr60 text-sm mb-4">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-1">
                                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                    </svg>
                                    <?= $property["bedrooms"] ?> hab
                                </div>
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-1">
                                        <path d="M9 12h6"></path>
                                        <path d="M12 3v18"></path>
                                        <rect x="3" y="6" width="18" height="12" rx="2"></rect>
                                    </svg>
                                    <?= $property["bathrooms"] ?> baños
                                </div>
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-1">
                                        <path d="M3 3v18h18"></path>
                                        <path d="M18.7 8l-5.1 5.2-2.8-2.7L7 14.3"></path>
                                    </svg>
                                    <?= $property["area"] ?> m²
                                </div>
                            </div>

                            <div class="flex items-center justify-between pt-4 border-t border-gr20 light:border-gr80">
                                <span class="text-2xl font-bold text-accent">$<?= $property["price"] ?></span>
                                <a href="#" class="bg-primary hover:bg-gr40 text-white px-4 py-2 rounded-lg text-sm font-bold transition-colors duration-300">
                                    Ver detalles
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="text-center mt-12">
                <a href="#" class="inline-block bg-accent hover:bg-orange-600 text-white px-8 py-3 rounded-lg font-bold transition-colors duration-300">
                    Ver todas las propiedades
                </a>
            </div>
        </div>
    </section>

<?php } ?>
