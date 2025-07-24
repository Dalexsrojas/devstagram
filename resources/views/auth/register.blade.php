@extends('layouts.app')

@section('title')
  Crea tu cuenta
@endsection

@section('content')
  <div class="flex max-w-5xl mx-auto mt-10 gap-8 px-4 flex-wrap lg:flex-nowrap">

    <form method="POST" action="{{ route('registro.store') }}" id="registroForm" enctype="multipart/form-data"
          class="bg-white dark:bg-[#121212] border border-gray-300 dark:border-gray-700 rounded-xl shadow-md p-6 space-y-4 w-full lg:w-[55%] min-w-[320px]">
      @csrf

      <input type="hidden" name="role" value="user">

      <p class="text-gray-700 dark:text-gray-300">
        Únete a DevStagram y conecta con una comunidad de desarrolladores como tú.
      </p>

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



      {{-- Campos de formulario sin mensajes individuales debajo --}}
      <div>
        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nombre</label>
        <input type="text" name="name" id="name" required
               class="w-full rounded-lg border border-gray-300 px-3 py-2 dark:bg-[#1a1a1a] dark:border-gray-600 dark:text-white"
               minlength="2" maxlength="255" pattern="^[\p{L}\s'-]+$"
               title="Solo letras, espacios, comillas simples y guiones bajos"
               value="{{ old('name') }}">
      </div>

      <div>
        <label for="username" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nombre de usuario</label>
        <input type="text" name="username" id="username" required
               class="w-full rounded-lg border border-gray-300 px-3 py-2 dark:bg-[#1a1a1a] dark:border-gray-600 dark:text-white"
               minlength="3" maxlength="50" pattern="^[a-zA-Z0-9_]+$"
               title="Solo letras, números y guiones bajos"
               value="{{ old('username') }}">
      </div>

      <div>
        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
        <input type="email" name="email" id="email" required
               class="w-full rounded-lg border border-gray-300 px-3 py-2 dark:bg-[#1a1a1a] dark:border-gray-600 dark:text-white"
               maxlength="255"
               value="{{ old('email') }}">
      </div>

      <div>
        <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Imagen de perfil</label>
        <input type="file" name="image" id="image" accept="image/*"
               class="w-full rounded-lg border border-gray-300 px-3 py-2 dark:bg-[#1a1a1a] dark:border-gray-600 dark:text-white file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-pink-50 file:text-pink-700 hover:file:bg-pink-100">
      </div>

      <div>
        <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Contraseña</label>
        <div class="relative">
          <input type="password" name="password" id="password" required
                 class="w-full rounded-lg border border-gray-300 px-3 py-2 pr-10 dark:bg-[#1a1a1a] dark:border-gray-600 dark:text-white"
                 minlength="8" autocomplete="new-password"
                 title="Debe tener al menos 8 caracteres, una letra, un número y un símbolo">
          <button type="button" onclick="togglePassword('password', this)" class="absolute inset-y-0 right-2 flex items-center text-gray-500 dark:text-gray-400">
            {{-- Aquí el icono igual que antes --}}
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
        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Confirmar contraseña</label>
        <div class="relative">
          <input type="password" name="password_confirmation" id="password_confirmation" required
                 class="w-full rounded-lg border border-gray-300 px-3 py-2 pr-10 dark:bg-[#1a1a1a] dark:border-gray-600 dark:text-white"
                 minlength="8" autocomplete="new-password">
          <button type="button" onclick="togglePassword('password_confirmation', this)" class="absolute inset-y-0 right-2 flex items-center text-gray-500 dark:text-gray-400">
            {{-- Icono igual que antes --}}
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
          Registrarse
        </button>
      </div>

      <div class="mt-4 text-sm text-gray-600 dark:text-gray-400">
        ¿Ya tienes una cuenta?
        <a href="{{ route('login.index') }}" class="text-pink-600 hover:underline dark:text-pink-400">
          Iniciar sesión
        </a>
      </div>
    </form>

    {{-- Contenedor imagen --}}
    <div class="w-full lg:w-[45%] bg-white dark:bg-[#121212] border border-gray-300 dark:border-gray-700 rounded-xl shadow-md flex flex-col items-center justify-center p-8">
      <img src="{{ asset('img/register.png') }}" alt="Registro" class="rounded-lg mb-6 shadow-md w-full h-auto max-h-[480px] object-contain" />
      <p class="text-center text-gray-700 dark:text-gray-300 text-lg px-4">
        Crea tu cuenta y forma parte de nuestra comunidad DevStagram. Comparte, aprende y crece con nosotros.
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
