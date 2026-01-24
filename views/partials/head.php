<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- 
        Configuration de base et méta-données 
        @author Martial MAYAMOU
        @version 1.1.0
    -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Martial MAYAMOU | Portfolio Développeur</title>
    
    <!-- Framework CSS : Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Typographies : Google Fonts (Inter & Space Grotesk) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Space+Grotesk:wght@500;700;800&display=swap" rel="stylesheet">
    
    <!-- Bibliothèques d'icônes et de défilement -->
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://unpkg.com/lenis@1.0.45/dist/lenis.min.js"></script>
    
    <style>
        /* 
           Styles spécifiques pour les animations de feedback 
           utilisés lors de la soumission du formulaire de contact.
        */
        @keyframes slideInUp {
            from { transform: translateY(10px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        .feedback-pro {
            animation: slideInUp 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }
    </style>
    
    <!-- Styles personnalisés du projet -->
    <link rel="stylesheet" href="<?php echo asset('css/index.css'); ?>">
</head>
<body class="bg-white">
