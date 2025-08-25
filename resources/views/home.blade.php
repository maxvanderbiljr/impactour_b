<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Impactour - Welcome</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-gradient-to-br from-green-50 via-white to-green-100 min-h-screen flex flex-col justify-center items-center">

    <div class="text-center">
        <h1 class="text-5xl font-extrabold text-green-700 drop-shadow mb-6">
        Tailwind Funcionando!
        </h1>
        <p class="text-lg text-gray-700 mb-6">
            Se você está vendo este layout bonito, o Tailwind já está carregando no seu projeto.
        </p>
        <a href="{{ route('home') }}"
           class="px-6 py-3 bg-green-600 text-white font-semibold rounded-2xl shadow hover:bg-green-700 transition">
           Ir para Home
        </a>
    </div>

</body>
</html>