<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>DevStagram</title>
@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-b from-white to-gray-100 text-black
             dark:from-[#1a1a1a] dark:to-[#0d0d0d] dark:text-white min-h-screen transition-colors duration-300">

  <!-- Header fijo -->
  <header class="fixed top-0 w-full z-50 bg-white border-b border-gray-200 shadow-sm dark:bg-[#121212] dark:border-neutral-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">

        <!-- Logo -->
        <div class="flex items-center space-x-2">
          <a href="{{ route('welcome') }}"
            class="text-xl font-bold bg-gradient-to-r from-pink-500 via-purple-500 to-indigo-500 bg-clip-text text-transparent">
            DevStagram
          </a>
        </div>

<!-- Navegación -->
<nav class="hidden md:flex items-center space-x-6 text-sm font-medium text-gray-700 dark:text-neutral-300">
  
  @if (request()->routeIs('login.index'))
  <a href="{{ route('welcome') }}" class="hover:text-pink-600 dark:hover:text-pink-400 transition">Inicio</a>
@else
    <a href="{{ route('login.index') }}" class="hover:text-pink-600 dark:hover:text-pink-400 transition ">Login</a>  
  @endif
  @if (request()->routeIs('registro.index'))
    <a href="{{ route('welcome') }}" class="hover:text-pink-600 dark:hover:text-pink-400 transition">Inicio</a>
  @else
    <a href="{{ route('registro.index') }}" class="hover:text-pink-600 dark:hover:text-pink-400 transition">Registro</a>
  @endif
</nav>


        </nav>
      </div>
    </div>
  </header>

  <!-- Espaciador para el header fijo -->
  <div class="h-16"></div>

  <!-- Contenido principal -->
  <main class="container mx-auto px-4 mt-6">

    <!-- Título -->
    @hasSection('title')
      <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-4">
        @yield('title')
      </h2>
    @endif

    <!-- Contenido de la página -->
    @yield('content')
  </main>

  <!-- Footer -->
  <footer class="text-center py-6 text-sm text-gray-500 dark:text-neutral-400 mt-10">
    DevStagram &copy; {{ date('Y') }}
  </footer>

</body>
</html>
