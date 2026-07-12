<?php

function CallToAction() {
    ?>

    <section class="cta-section w-full py-20 bg-gradient-to-r from-primary to-gr40 light:from-gr80 light:to-gr60 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-0 w-96 h-96 bg-accent rounded-full filter blur-3xl transform -translate-x-1/2 -translate-y-1/2"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-accent rounded-full filter blur-3xl transform translate-x-1/2 translate-y-1/2"></div>
        </div>
        
        <div class="container mx-auto px-6 relative z-10">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-4xl md:text-5xl font-ubuntu font-bold text-white mb-6">
                    ¿Listo para encontrar tu hogar ideal?
                </h2>
                <p class="text-xl text-gr80 light:text-gr20 font-roboto mb-8 max-w-2xl mx-auto">
                    Únete a miles de venezolanos que ya encontraron su propiedad perfecta con GoodState. Tu nuevo hogar te espera.
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                    <a href="#" class="bg-accent hover:bg-orange-600 text-white px-8 py-4 rounded-lg font-bold text-lg transition-all duration-300 transform hover:scale-105 shadow-lg">
                        Buscar Propiedades
                    </a>
                    <a href="#" class="bg-white hover:bg-gr95 text-primary px-8 py-4 rounded-lg font-bold text-lg transition-all duration-300 transform hover:scale-105 shadow-lg">
                        Contactar Asesor
                    </a>
                </div>

                <div class="mt-12 flex flex-wrap justify-center gap-8 text-white">
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                        </svg>
                        <span class="font-medium">Sin comisiones ocultas</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                        </svg>
                        <span class="font-medium">Asesoría personalizada</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                        </svg>
                        <span class="font-medium">Proceso seguro</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php } ?>
