<x-guest-layout title="Recuperar contraseña">
    
    <div class="max-w-md w-full mx-auto mt-10 bg-white dark:bg-gray-900 shadow-lg rounded-xl p-8">

        <!-- Título -->
        <h1 class="text-2xl font-bold text-text-light dark:text-white mb-2">
            Recuperar contraseña
        </h1>

        <p class="text-gray-600 dark:text-gray-400 text-sm mb-6">
            Ingresá tu correo y te enviaremos un enlace para restablecer tu contraseña.
        </p>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Formulario -->
        <form method="POST" action="{{ route('password.email') }}" class="flex flex-col gap-5">
            @csrf

            <!-- Email -->
            <div class="flex flex-col">
                <label for="email" class="text-text-light dark:text-gray-300 text-sm font-medium pb-2">
                    Correo electrónico
                </label>

                <div class="flex w-full items-stretch rounded-lg shadow-sm">

                    <!-- Icono -->
                    <div
                        class="text-gray-400 flex border border-border-light dark:border-gray-700 bg-white dark:bg-gray-800 items-center justify-center pl-4 rounded-l-lg border-r-0">
                        <span class="material-symbols-outlined text-lg">mail</span>
                    </div>

                    <!-- Input -->
                    <input id="email" name="email" type="email" required autofocus
                        placeholder="su.correo@ejemplo.com"
                        class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg
                               text-text-light dark:text-white focus:outline-0 focus:ring-2 focus:ring-primary/50
                               focus:border-primary border border-border-light dark:border-gray-700
                               bg-white dark:bg-gray-800 h-12 placeholder:text-gray-400 p-3 rounded-l-none text-base"
                        value="{{ old('email') }}" />
                </div>

                @error('email')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            <!-- Submit -->
            <button
                class="w-full h-12 flex items-center justify-center bg-[#D17950] text-white text-base font-medium
                rounded-lg shadow-md hover:bg-[#b86440] focus:outline-none focus:ring-2
                focus:ring-offset-2 focus:ring-primary dark:focus:ring-offset-background-dark
                transition-colors duration-200 mt-4"
                type="submit">
                Enviar enlace de restablecimiento
            </button>

        </form>

        <!-- Volver al login -->
        <a href="{{ route('login') }}"
            class="w-full h-12 flex items-center justify-center bg-primary text-white text-base font-medium
                    rounded-lg shadow-md hover:bg-primary/80 focus:outline-none focus:ring-2
                    focus:ring-offset-2 focus:ring-primary dark:focus:ring-offset-background-dark
                    transition-colors duration-200 mt-4">
            Volver al inicio de sesión
        </a>







        <p class="text-center text-gray-500 dark:text-gray-400 text-xs mt-8">
            © {{ now()->year }} Municipalidad de San José de Feliciano. Todos los derechos reservados.
        </p>

    </div>

</x-guest-layout>
