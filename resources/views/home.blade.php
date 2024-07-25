<x-app-layout>
    @guest
        <x-slot name="header">
            @include('login_header')
        </x-slot>
    @endguest

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mx-2 mb-4">
                <form action="{{ route('home') }}" method="GET" class="flex-grow max-w-lg">
                    <input type="text" name="search" placeholder="{{ __('Search blog posts...') }}" value="{{ $search }}" class="w-full px-4 py-2 border-2 border-gray-300 rounded-full">
                </form>
                <x-ui.link-button :color="'green'" :label="__('Create new blog post')" :route="route('blog_post.create')"></x-ui.link-button>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        @foreach ($blogPosts as $blogPost)
                            <a href="{{ route('blog_post.show', $blogPost->id) }}" class="flex flex-col justify-between p-4 bg-gray-100 border border-gray-200 rounded-lg hover:bg-gray-200 h-full">
                                <div>
                                    <h2 class="font-bold text-lg">{{ $blogPost->title }}</h2>
                                    <p class="text-sm text-gray-600">
                                        {{ Str::limit($blogPost->content, 100) }}
                                    </p>
                                </div>
                                <div class="mt-4 text-gray-500 text-sm">
                                    <p>{{ __('By: ') . $blogPost->owner->name }}</p>
                                    <p>{{ __('Published on: ') . $blogPost->created_at->format('M d, Y H:i') . ' UTC' }}</p>
                                </div>
                            </a>
                        @endforeach
                    </div>

                    <div class="mt-6">
                        {{ $blogPosts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
