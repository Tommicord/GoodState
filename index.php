<?php
    include 'src/templates/Head.php';
    include 'src/templates/Header.php';
    include 'src/templates/Housing.php';
?>

<!DOCTYPE html>
<html lang="es" data-theme="light">
<head>
    <?php TemplateHead("Encuentra tu hogar"); ?>
</head>
<body class="w-screen h-screen bg-secondary light:bg-gr20 overflow-x-hidden font-roboto">
    <?php TemplateHeader(); ?>

    <section class="hero w-full h-120 flex items-center justify-center relative">
        <div class="container flex flex-row mx-auto text-left">
            <div class="hero-title-ctn mx-20">
                <h1 class="title text-5xl text-gr80 font-ubuntu font-bold">
                    La vivienda de tus sueños <br> esta en
                    <span class="text-accent span-app">GoodState</span>, <br>
                    ¡Encuentrala ahora!
                </h1>
            </div>
        </div>
        <div class="housing-eg absolute top-0 left-0 right-0 grid grid-cols-3 -z-10 w-fit gap-1">
            <?php HousingBanner(); ?>
        </div>
    </section>
</body>
</html>