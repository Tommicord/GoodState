<?php

function Testimonials() {
    $testimonials = [
        [
            "name" => "María González",
            "location" => "Caracas",
            "text" => "Encontré mi casa soñada gracias a GoodState. El proceso fue increíblemente fácil y el equipo muy profesional. ¡Recomendado al 100%!",
            "rating" => 5,
            "image" => "/assets/testimonial-1.jpg"
        ],
        [
            "name" => "Carlos Rodríguez",
            "location" => "Valencia",
            "text" => "Vendí mi propiedad en tiempo récord y al mejor precio. La estrategia de marketing que utilizaron fue excelente. Muy agradecido por su servicio.",
            "rating" => 5,
            "image" => "/assets/testimonial-2.jpg"
        ],
        [
            "name" => "Ana Martínez",
            "location" => "Maracaibo",
            "text" => "El servicio de mudanza fue impecable. Se encargaron de todo y no tuve que preocuparme por nada. Definitivamente volveré a usar sus servicios.",
            "rating" => 5,
            "image" => "/assets/testimonial-3.jpg"
        ]
    ];

    ?>

    <section class="testimonials-section w-full py-20 bg-gr95 light:bg-gr5">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-ubuntu font-bold text-gr20 light:text-gr80 mb-4">
                    Lo que dicen nuestros <span class="text-accent">Clientes</span>
                </h2>
                <p class="text-gr40 light:text-gr60 text-lg font-roboto max-w-2xl mx-auto">
                    Descubre las experiencias de personas que ya encontraron su hogar ideal con nosotros
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php foreach($testimonials as $index => $testimonial): ?>
                    <div class="testimonial-card bg-white light:bg-gr10 p-8 rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300">
                        <div class="flex items-center mb-6">
                            <div class="w-16 h-16 bg-accent/20 rounded-full flex items-center justify-center mr-4">
                                <span class="text-2xl font-bold text-accent">
                                    <?= substr($testimonial["name"], 0, 1) ?>
                                </span>
                            </div>
                            <div>
                                <h4 class="text-lg font-ubuntu font-bold text-gr20 light:text-gr80">
                                    <?= $testimonial["name"] ?>
                                </h4>
                                <p class="text-sm text-gr40 light:text-gr60">
                                    <?= $testimonial["location"] ?>
                                </p>
                            </div>
                        </div>

                        <div class="flex mb-4">
                            <?php for($i = 0; $i < 5; $i++): 
                                $fill = $i < $testimonial["rating"] ? "currentColor" : "none";
                                $class = $i < $testimonial["rating"] ? "text-accent" : "text-gr40 light:text-gr60";
                            ?>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="<?php echo $fill; ?>" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="<?php echo $class; ?>">
                                    <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                </svg>
                            <?php endfor; ?>
                        </div>

                        <p class="text-gr40 light:text-gr60 text-sm font-roboto leading-relaxed italic">
                            "<?= $testimonial["text"] ?>"
                        </p>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="text-center mt-12">
                <div class="flex items-center justify-center gap-2 text-gr40 light:text-gr60">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                    </svg>
                    <span class="font-bold text-lg">4.9/5</span>
                    <span class="text-sm">basado en 500+ reseñas</span>
                </div>
            </div>
        </div>
    </section>

<?php } ?>
