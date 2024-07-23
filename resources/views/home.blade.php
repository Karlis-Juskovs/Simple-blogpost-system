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

        <a href="{{ route('blog_post.create') }}" class="border-solid border-2 border-sky-500 bg-green-700">
            Create new blog post
        </a>

{{--        <x-ui.button label="Create new blog post" color="green" route="{{ route('blog_post.create') }}"></x-ui.button>--}}

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Home") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
