<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Portfolio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .display-title { font-family: 'Space Grotesk', sans-serif; }
    </style>
</head>
<body class="bg-[#f8f8f8] flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md p-8 bg-white border border-gray-100 shadow-xl rounded-3xl">
        <h1 class="display-title text-4xl font-extrabold uppercase tracking-tighter mb-8 text-center">Connexion</h1>
        
        <?php if (isset($error)): ?>
            <div class="mb-6 p-4 bg-red-50 text-red-600 text-sm border border-red-100 rounded-xl">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <form method="POST" class="space-y-8">
            <?php echo \App\Core\Security::csrfField(); ?>
            <div class="space-y-4">
                <div>
                    <label class="block text-[10px] font-bold uppercase tracking-widest text-gray-400 mb-2">Nom d'utilisateur</label>
                    <input type="text" name="username" required class="w-full p-4 bg-gray-50 border border-gray-100 rounded-xl outline-none focus:border-black transition-colors">
                </div>
                <div>
                    <label class="block text-[10px] font-bold uppercase tracking-widest text-gray-400 mb-2">Mot de passe</label>
                    <input type="password" name="password" required class="w-full p-4 bg-gray-50 border border-gray-100 rounded-xl outline-none focus:border-black transition-colors">
                </div>
            </div>
            <button type="submit" class="w-full p-4 bg-black text-white font-bold rounded-xl hover:bg-gray-800 transition-colors uppercase tracking-widest text-xs">
                Se connecter
            </button>
        </form>
    </div>
</body>
</html>
