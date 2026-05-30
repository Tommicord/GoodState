<?php

function TemplateHead(
    string $page = "Bienes raices Venezuela",
    string $description = "Encuentra tu nuevo hogar en Venezuela con GoodState. Explora una amplia selección de casas y apartamentos en venta o alquiler. Tu nuevo hogar te espera."
) {

    ?>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="GoodState &vert; <?php echo $page; ?>">
    <meta name="description" content="<?php echo $description; ?>">
    <meta name="keywords" content="Bienes Raices Venezuela, Casas en venta, Apartamentos, Alquiler de casas, Alquiler de apartamentos, Inmuebles, Propiedades">
    <link rel="stylesheet" href="/build/css/app.css">
    <link as="style" href="/build/css/app.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <script src="build/js/main.min.js" defer></script>
    <title>GoodState &vert; <?php echo $page; ?></title>

<?php } ?>