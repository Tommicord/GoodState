<?php

function CallToAction() {
    ?>

    <section class="cta-section w-full py-16 md:py-24 bg-gradient-to-br from-primary via-gr95 to-black light:from-primary light:via-gr5 light:to-white relative overflow-hidden">
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-0 left-0 w-96 h-96 bg-accent rounded-full filter blur-3xl transform -translate-x-1/2 -translate-y-1/2 animate-pulse"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-orange-500 rounded-full filter blur-3xl transform translate-x-1/2 translate-y-1/2 animate-pulse" style="animation-delay: 1s"></div>
        </div>
        
        <div class="container mx-auto px-4 md:px-6 relative z-10">
            <div class="max-w-4xl mx-auto text-center">
                <span class="inline-block px-3 py-1 bg-white/10 text-white rounded-full text-xs md:text-sm font-semibold mb-4 md:mb-6 backdrop-blur-sm">COMIENZA TU JORNADA</span>
                <h2 class="text-3xl md:text-4xl lg:text-5xl xl:text-6xl font-ubuntu font-bold text-white light:text-gr20 mb-4 md:mb-6">
                    ¿Listo para encontrar tu <span class="text-transparent bg-clip-text bg-gradient-to-b from-accent to-orange-500">hogar ideal</span>?
                </h2>
                <p class="text-base md:text-lg lg:text-xl text-gr80 light:text-gr40 font-roboto mb-8 md:mb-12 max-w-2xl mx-auto">
                    Únete a miles de venezolanos que ya encontraron su propiedad perfecta con GoodState. Tu nuevo hogar te espera.
                </p>
                
                <div class="flex flex-col sm:flex-row gap-3 md:gap-4 justify-center items-center mb-8 md:mb-12">
                    <a href="#" class="inline-flex items-center gap-2 bg-linear-to-r from-accent to-orange-500 text-white px-6 md:px-8 py-3 md:py-4 rounded-sm font-bold text-sm md:text-lg transition-all duration-300 transform hover:scale-105 shadow-xl hover:shadow-2xl">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" class="md:w-5 md:h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                        Buscar Propiedades
                    </a>
                    <a href="#" class="inline-flex items-center gap-2 bg-white hover:bg-gr95 text-primary px-6 md:px-8 py-3 md:py-4 rounded-sm font-bold text-sm md:text-lg transition-all duration-300 transform hover:scale-105 shadow-xl hover:shadow-2xl">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" class="md:w-5 md:h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                        </svg>
                        Contactar Asesor
                    </a>
                </div>

                <div class="flex flex-wrap justify-center gap-4 md:gap-8 text-white light:text-gr60">
                    <div class="flex items-center gap-2 bg-white/10 px-3 md:px-4 py-2 rounded-full backdrop-blur-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" class="md:w-5 md:h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-accent">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                        </svg>
                        <span class="font-medium text-xs md:text-sm">Sin comisiones ocultas</span>
                    </div>
                    <div class="flex items-center gap-2 bg-white/10 px-3 md:px-4 py-2 rounded-full backdrop-blur-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" class="md:w-5 md:h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-accent">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                        </svg>
                        <span class="font-medium text-xs md:text-sm">Asesoría personalizada</span>
                    </div>
                    <div class="flex items-center gap-2 bg-white/10 px-3 md:px-4 py-2 rounded-full backdrop-blur-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" class="md:w-5 md:h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-accent">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                        </svg>
                        <span class="font-medium text-xs md:text-sm">Proceso seguro</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php } ?>
