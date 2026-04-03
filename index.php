<?php
    include 'src/templates/Head.php';
    include 'src/templates/Header.php';
    include 'src/templates/HousingBanner.php';
    include 'src/templates/HousingMoving.php'
?>

<!DOCTYPE html>
<html lang="es" data-theme="dark" class="scroll-smooth md:scroll-auto scrollbar-thin scrollbar-thumb-gr40 scrollbar-track-gr80">
<head>
    <?php TemplateHead("Encuentra tu hogar"); ?>
</head>
<body class="w-screen h-screen bg-black light:bg-gr80 overflow-x-hidden font-roboto">
    <?php TemplateHeader(); ?>

    <section class="hero w-full h-150 flex items-center justify-center overflow-hidden">
        <div class="container flex flex-row mx-auto text-left">
            <div class="hero-title-ctn mx-20">
                <h1 class="title text-5xl text-gr80 light:text-gr20 font-ubuntu font-bold leading-tight">
                    La vivienda de tus sueños <br> esta en
                    <span class="text-accent span-app">GoodState</span>, <br>
                    ¡Encuéntrala ahora!
                </h1>
            </div>
        </div>
        <div class="housing-eg relative ml-8 w-full h-full">
            <?php HousingExample(); ?>
        </div>
    </section>

    <div class="spacer w-full h-48"></div>

    <section class="housing-moving w-full flex flex-col items-center justify-center">
        <h2 class="text-4xl font-ubuntu font-bold text-gr80 light:text-gr40 mt-16">
            Ofrecemos una amplia variedad de viviendas de calidad
        </h2>

        <?php HousingMoving() ?>
    </section>
</body>
</html>