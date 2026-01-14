<x-guest-layout title="Restablecer contraseña">

    <div class="max-w-md w-full mx-auto mt-10 bg-white dark:bg-gray-900 shadow-lg rounded-xl p-8">

        <!-- Título -->
        <h1 class="text-2xl font-bold text-text-light dark:text-white mb-2">
            Restablecer contraseña
        </h1>

        <p class="text-gray-600 dark:text-gray-400 text-sm mb-6">
            Ingresá tu nueva contraseña y confirmala para completar el proceso.
        </p>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Formulario -->
        <form method="POST" action="{{ route('password.store') }}" class="flex flex-col gap-5">
            @csrf

            <!-- Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email -->
            <div class="flex flex-col">
                <label for="email" class="text-text-light dark:text-gray-300 text-sm font-medium pb-2">
                    Correo electrónico
                </label>

                <div class="flex w-full items-stretch rounded-lg shadow-sm">
                    <!-- Icono -->
                    <div
                        class="text-gray-400 flex border border-border-light dark:border-gray-700 bg-white dark:bg-gray-800
                               items-center justify-center pl-4 rounded-l-lg border-r-0">
                        <span class="material-symbols-outlined text-lg">mail</span>
                    </div>

                    <input id="email" name="email" type="email" required
                        value="{{ old('email', $request->email) }}"
                        class="form-input flex w-full min-w-0 flex-1 rounded-lg rounded-l-none text-text-light dark:text-white
                               border border-border-light dark:border-gray-700 bg-white dark:bg-gray-800
                               h-12 placeholder:text-gray-400 p-3 focus:outline-0 focus:ring-2
                               focus:ring-primary/50 focus:border-primary text-base" />
                </div>

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Contraseña -->
            <div class="flex flex-col">
                <label for="password" class="text-text-light dark:text-gray-300 text-sm font-medium pb-2">
                    Nueva contraseña
                </label>

                <div class="flex w-full items-stretch rounded-lg shadow-sm relative">

                    <!-- Icono izquierda -->
                    <div
                        class="text-gray-400 flex border border-border-light dark:border-gray-700 bg-white dark:bg-gray-800
                   items-center justify-center pl-4 rounded-l-lg border-r-0">
                        <span class="material-symbols-outlined text-lg">lock</span>
                    </div>

                    <!-- Input -->
                    <input id="password" name="password" type="password" required
                        class="form-input flex w-full min-w-0 flex-1 rounded-lg rounded-l-none text-text-light dark:text-white
                   border border-border-light dark:border-gray-700 bg-white dark:bg-gray-800
                   h-12 placeholder:text-gray-400 p-3 pr-12 focus:outline-0 focus:ring-2
                   focus:ring-primary/50 focus:border-primary text-base" />

                    <!-- Botón mostrar -->
                    <button type="button" onclick="togglePassword('password', this)"
                        class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 dark:text-gray-300">
                        <span class="material-symbols-outlined text-xl">visibility</span>
                    </button>

                </div>

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>


            <!-- Confirmar contraseña -->
            <div class="flex flex-col">
                <label for="password_confirmation" class="text-text-light dark:text-gray-300 text-sm font-medium pb-2">
                    Confirmar contraseña
                </label>

                <div class="flex w-full items-stretch rounded-lg shadow-sm relative">

                    <!-- Icono izquierda -->
                    <div
                        class="text-gray-400 flex border border-border-light dark:border-gray-700 bg-white dark:bg-gray-800
                   items-center justify-center pl-4 rounded-l-lg border-r-0">
                        <span class="material-symbols-outlined text-lg">lock_reset</span>
                    </div>

                    <!-- Input -->
                    <input id="password_confirmation" name="password_confirmation" type="password" required
                        class="form-input flex w-full min-w-0 flex-1 rounded-lg rounded-l-none text-text-light dark:text-white
                   border border-border-light dark:border-gray-700 bg-white dark:bg-gray-800
                   h-12 placeholder:text-gray-400 p-3 pr-12 focus:outline-0 focus:ring-2
                   focus:ring-primary/50 focus:border-primary text-base" />

                    <!-- Botón mostrar -->
                    <button type="button" onclick="togglePassword('password_confirmation', this)"
                        class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 dark:text-gray-300">
                        <span class="material-symbols-outlined text-xl">visibility</span>
                    </button>

                </div>

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>


            <!-- Botón -->
            <button
                class="w-full h-12 flex items-center justify-center bg-[#D17950] text-white text-base font-medium
                rounded-lg shadow-md hover:bg-[#b86440] focus:outline-none focus:ring-2
                focus:ring-offset-2 focus:ring-primary dark:focus:ring-offset-background-dark
                transition-colors duration-200 mt-3"
                type="submit">
                Restablecer contraseña
            </button>

        </form>

        <!-- Volver al login -->
        <a href="{{ route('login') }}"
            class="w-full h-12 flex items-center justify-center bg-primary text-white text-base font-medium
                   rounded-lg shadow-md hover:bg-primary/80 focus:outline-none focus:ring-2
                   focus:ring-offset-2 focus:ring-primary dark:focus:ring-offset-background-dark
                   transition-colors duration-200 mt-5">
            Volver al inicio de sesión
        </a>

        <p class="text-center text-gray-500 dark:text-gray-400 text-xs mt-8">
            © {{ now()->year }} Municipalidad de San José de Feliciano. Todos los derechos reservados.
        </p>

    </div>
    <script>
        function togglePassword(id, btn) {
            const input = document.getElementById(id);
            const icon = btn.querySelector("span");

            if (input.type === "password") {
                input.type = "text";
                icon.textContent = "visibility_off";
            } else {
                input.type = "password";
                icon.textContent = "visibility";
            }
        }
    </script>


</x-guest-layout>
