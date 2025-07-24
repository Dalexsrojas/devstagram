@extends('layouts.app')

@section('content')
  <div class="max-w-5xl mx-auto px-4 py-10 space-y-16">

    {{-- Encabezado principal --}}
    <div class="space-y-6 text-center">
      <h1 class="text-4xl font-bold text-gray-900 dark:text-white">
        ¡Bienvenido a 
        <span class="text-transparent bg-clip-text animate-rainbow bg-gradient-to-r from-pink-500 via-yellow-400 to-blue-500" style="background-size: 200% 200%;">
          DevStagram
        </span>!
      </h1>
      <p class="text-xl text-gray-700 dark:text-gray-300 max-w-3xl mx-auto">
        Descubre una comunidad vibrante donde desarrolladores comparten ideas, proyectos y crecen juntos en un entorno creativo y colaborativo.
      </p>

      {{-- Botón mejorado --}}
      <a 
        href="{{ route('registro.index') }}"
        class="inline-block mt-4 px-8 py-3 bg-indigo-600 hover:bg-indigo-700 text-white text-lg font-semibold rounded-full shadow-lg hover:shadow-xl transform transition-all duration-300 hover:scale-105"
      >
        🚀 Únete ahora
      </a>
    </div>

    {{-- NUEVO: Cada imagen en su propio recuadro --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      @php
        $features = [
          ['img' => 'ideas.png', 'title' => 'Comparte tus ideas', 'desc' => 'Publica artículos, tutoriales y proyectos que te apasionan.'],
          ['img' => 'feedbackw.png', 'title' => 'Recibe feedback', 'desc' => 'Conecta con otros devs y mejora tus habilidades a través del intercambio de ideas.'],
          ['img' => 'colaborate.png', 'title' => 'Colabora y crece', 'desc' => 'Forma parte de proyectos colaborativos y haz crecer tu red profesional.']
        ];
      @endphp

      @foreach ($features as $feature)
        <div class="rounded-xl bg-white dark:bg-[#121212] border border-gray-200 dark:border-gray-700 shadow-md hover:shadow-xl transition-all duration-300 p-6 flex flex-col items-center text-center space-y-4">
          <div class="bg-indigo-100 dark:bg-indigo-800 p-4 rounded-full shadow-inner">
            <img 
              src="{{ asset('img/' . $feature['img']) }}" 
              alt="{{ $feature['title'] }}" 
              class="h-24 md:h-28 lg:h-32 object-contain transition-transform duration-300 ease-in-out hover:scale-105"
            >
          </div>
          <h3 class="text-lg font-semibold text-indigo-700 dark:text-indigo-300">{{ $feature['title'] }}</h3>
          <p class="text-gray-700 dark:text-gray-300">{{ $feature['desc'] }}</p>
        </div>
      @endforeach
    </div>

    {{-- Mensaje final --}}
    <div class="text-center mt-12">
      <p class="text-lg text-gray-500 dark:text-gray-400">
        💡 Aquí cada línea de código cuenta una historia. ¡Empieza a contar la tuya hoy!
      </p>
    </div>

  </div>
@endsection
