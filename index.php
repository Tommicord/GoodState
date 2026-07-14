<?php
    include 'src/templates/Head.php';
    include 'src/templates/Header.php';
    include 'src/templates/HousingBanner.php';
    include 'src/templates/HousingMoving.php';
    include 'src/templates/FeaturedProperties.php';
    include 'src/templates/ServicesSection.php';
    include 'src/templates/Testimonials.php';
    include 'src/templates/CallToAction.php';
    include 'src/templates/Footer.php';
?>

<!DOCTYPE html>
<html lang="es" data-theme="dark" class="scroll-smooth md:scroll-auto scrollbar-thin scrollbar-thumb-gr40 scrollbar-track-gr80">
<head>
    <?php TemplateHead("Encuentra tu hogar"); ?>
</head>
<body class="w-full h-full bg-black light:bg-white overflow-x-hidden font-roboto">
    <?php TemplateHeader(); ?>

    <section class="hero w-full min-h-[500px] md:min-h-[600px] lg:h-150 flex items-center justify-center overflow-hidden">
        <div class="container flex flex-col lg:flex-row mx-auto text-left px-4 md:px-8">
            <div class="hero-title-ctn mx-0 lg:mx-20 mb-8 lg:mb-0">
                <h1 class="title text-3xl md:text-4xl lg:text-5xl text-gr80 light:text-gr20 font-ubuntu font-bold leading-tight">
                    La vivienda de tus sueños <br> esta en
                    <span class="text-accent span-app">GoodState</span>, <br>
                    ¡Encuéntrala ahora!
                </h1>
            </div>
        </div>
        <div class="housing-eg relative ml-0 lg:ml-8 w-full h-full hidden lg:block">
            <?php HousingExample(); ?>
        </div>
    </section>

    <div class="spacer w-full h-24 md:h-32 lg:h-48"></div>

    <section class="housing-moving w-full flex flex-col items-center justify-center px-4">
        <h2 class="text-2xl md:text-3xl lg:text-4xl font-ubuntu font-bold text-gr80 light:text-gr40 mt-6 md:mt-9 text-center">
            Ofrecemos una amplia variedad de viviendas de calidad
        </h2>

        <?php HousingMoving() ?>
    </section>

    <div class="spacer w-full h-32 md:h-48 lg:h-64"></div>

    <?php FeaturedProperties(); ?>

    <div class="spacer w-full h-32 md:h-48 lg:h-64"></div>

    <?php ServicesSection(); ?>

    <div class="spacer w-full h-32 md:h-48 lg:h-64"></div>

    <?php Testimonials(); ?>

    <div class="spacer w-full h-32 md:h-48 lg:h-64"></div>

    <?php CallToAction(); ?>

    <?php TemplateFooter(); ?>
</body>
</html>