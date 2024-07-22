<x-app-layout>
    @guest
        <x-slot name="header">
            <a href="{{ route('login') }}">
                Log in
            </a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}">
                    Register
                </a>
            @endif
        </x-slot>
    @endguest

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Home") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
