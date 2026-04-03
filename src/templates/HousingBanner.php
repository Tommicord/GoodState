<?php

include_once "OptimizedImage.php";

function HousingExample() {
    $imgs = [
        "/assets/example-1.jpg",
        "/assets/example-2.jpg",
        "/assets/example-3.jpg",
    ];
    $poss = [
        "top: 200px; right: 200px;",
        "top: 270px; right: 270px;",
        "top: 340px; right: 340px;",
        "top: 410px; right: 410px;",
    ];

    foreach($imgs as $i => $img) {

    OptimizedImage(
        src: $img,
        alt: "Exp Img (Id : $i + 1)",
        class: "eg-img w-50 h-35 object-cover absolute rounded-lg aspect-video contrast-125 saturate-125 hidden opacity-0 transform-gpu",
        style: $poss[$i]
    );

    }
} 
?>