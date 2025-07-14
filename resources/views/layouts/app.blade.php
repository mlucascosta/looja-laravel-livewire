    <!DOCTYPE html>
    <html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>@yield('title', 'Looja')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Looja – Catálogo de produtos modernos e responsivos.">

        @livewireStyles
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

        <!-- Fonte Inter (Apple-like) -->
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

        <style>
            html {
                font-family: 'Inter', system-ui, -apple-system, BlinkMacSystemFont, sans-serif;
            }
        </style>
    </head>

    <body class="bg-neutral-50 text-neutral-800 antialiased">
        <div class="min-h-screen flex flex-col">
            <!-- Header -->
            <header class="bg-white/80 backdrop-blur-md shadow-sm sticky top-0 z-20 border-b border-gray-200">
                <div class="container mx-auto max-w-5xl px-4 py-4 flex items-center justify-between">
                    <h1 class="text-2xl font-semibold tracking-tight text-neutral-900">🛍️ Looja</h1>
                    <div class="text-sm text-neutral-500">
                        {{-- Futuro: menu ou perfil --}}
                    </div>
                </div>
            </header>

            <!-- Conteúdo -->
            <main class="flex-1 container mx-auto max-w-5xl px-4 py-8">
                @yield('content')
            </main>

            <!-- Footer -->
            <footer class="bg-white border-t border-gray-200">
                <div class="container mx-auto max-w-5xl px-4 py-4 text-center text-sm text-neutral-500">
                    &copy; {{ date('Y') }} Looja. Todos os direitos reservados.
                </div>
            </footer>
        </div>

        {{-- Habilita navegação SPA via wire:navigate --}}
        @livewireScripts(['navigate' => true])
    </body>
    </html>
