<x-guest-layout>
    <!-- Session Status -->
    @if (session('status'))
        <div class="mb-4 text-green-500">
            {{ session('status') }}
        </div>
    @endif
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <h1 class="block font-medium text-sm text-white" for="email" >Email</h1>
            <input class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                   id="email" type="email" name="email"
                   required autofocus autocomplete="username"/>
            @if ($errors->has('email'))
                <div class="mt-2 text-sm text-red-600 space-y-1">
                    @foreach ($errors->get('email') as $error)
                        <span>{{ $error }}</span><br>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- Password -->
        <div class="mt-4">
            <h1 class="block font-medium text-sm text-white" for="password" >Password</h1>
            <input class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                   id="password" type="password" name="password"
                   required autofocus autocomplete="current-password"/>
            @if ($errors->has('password'))
                <div class="mt-2 text-sm text-red-600 space-y-1">
                    @foreach ($errors->get('password') as $error)
                        <span>{{ $error }}</span><br>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-white">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent
            rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700
            focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500
            focus:ring-offset-2 transition ease-in-out duration-150">
                <a>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    {{ __('Log in') }}
                </a>
            </button>
        </div>
    </form>

</x-guest-layout>
