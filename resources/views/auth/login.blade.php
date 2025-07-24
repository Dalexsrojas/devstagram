@extends('layouts.app')

@section('title')
  Iniciar sesión
@endsection

@section('content')
  <div class="flex max-w-5xl mx-auto mt-10 gap-8 px-4 flex-wrap lg:flex-nowrap">

    <form method="POST" action="{{ route('login.store') }}" id="loginForm"
          class="bg-white dark:bg-[#121212] border border-gray-300 dark:border-gray-700 rounded-xl shadow-md p-6 space-y-4 w-full lg:w-[55%] min-w-[320px] max-h-[350px] overflow-auto">
      @csrf

      {{-- Mensaje de éxito --}}
      @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
          {{ session('success') }}
        </div>
      @endif

      {{-- Mostrar todos los errores --}}
      @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
          <ul class="list-disc list-inside space-y-1">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <div>
        <label for="username" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nombre de usuario</label>
        <input type="text" name="username" id="username" required
               class="w-full rounded-lg border border-gray-300 px-3 py-2 dark:bg-[#1a1a1a] dark:border-gray-600 dark:text-white"
               minlength="3" maxlength="50" pattern="^[a-zA-Z0-9_]+$"
               title="Solo letras, números y guiones bajos"
               value="{{ old('username') }}">
      </div>

      <div>
        <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Contraseña</label>
        <div class="relative">
          <input type="password" name="password" id="password" required
                 class="w-full rounded-lg border border-gray-300 px-3 py-2 pr-10 dark:bg-[#1a1a1a] dark:border-gray-600 dark:text-white"
                 minlength="8" autocomplete="current-password">
          <button type="button" onclick="togglePassword('password', this)" class="absolute inset-y-0 right-2 flex items-center text-gray-500 dark:text-gray-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" >
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a10.05 10.05 0 011.102-2.434M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 3l18 18" />
            </svg>
          </button>
        </div>
      </div>

      <div>
        <button type="submit" class="bg-pink-600 hover:bg-pink-500 text-white px-4 py-2 rounded-lg w-full">
          Iniciar sesión
        </button>
      </div>

      <div class="mt-4 text-sm text-gray-600 dark:text-gray-400">
        ¿No tienes una cuenta?
        <a href="{{ route('registro.index') }}" class="text-pink-600 hover:underline dark:text-pink-400">
          Crea una cuenta
        </a>
      </div>
    </form>

    <div class="w-full lg:w-[45%] bg-white dark:bg-[#121212] border border-gray-300 dark:border-gray-700 rounded-xl shadow-md flex flex-col items-center justify-center p-8">
      <img src="{{ asset('img/login.png') }}" alt="Login" class="rounded-lg mb-6 shadow-md w-full h-auto max-h-[480px] object-contain" />
      <p class="text-center text-gray-700 dark:text-gray-300 text-lg px-4">
        Bienvenido de nuevo a DevStagram. Inicia sesión para conectar con la comunidad.
      </p>
    </div>
  </div>

  <script>
    function togglePassword(fieldId, btn) {
      const field = document.getElementById(fieldId);
      const isPassword = field.type === 'password';
      field.type = isPassword ? 'text' : 'password';

      if (isPassword) {
        btn.innerHTML = `
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" >
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
          </svg>`;
      } else {
        btn.innerHTML = `
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" >
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a10.05 10.05 0 011.102-2.434M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M3 3l18 18" />
          </svg>`;
      }
    }
  </script>
@endsection
