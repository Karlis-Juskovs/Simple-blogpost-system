<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-gray-900">
                    <div class="p-6">
                        {{-- Title --}}
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">{{ __('Tile') }}</label>
                            <input class="mt-1 block w-3/4 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                   type="text"
                                   value="{{ $blogPost->title }}"
                                   readonly
                            >
                        </div>

                        {{-- Content --}}
                        <div class="mb-4">
                            <label for="content" class="block text-sm font-medium text-gray-700">{{ __('Content') }}</label>
                            <div class="whitespace-pre-wrap mt-1 block w-full rounded-md border-2 p-5 border-gray-300 sm:text-sm"
                            >{{ $blogPost->content }}</div>
                        </div>

                        {{-- Categories --}}
                        <div class="mb-4">
                            <label for="categories" class="block text-sm font-medium text-gray-700">{{ __('Categories') }}</label>

                            <div id="categories" class="mt-2 flex flex-wrap gap-2">
                                @foreach ($blogPost->categories as $category)
                                    <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-indigo-100 text-indigo-800">
                                        {{ $category->name }}
                                    </span>
                                @endforeach
                            </div>
                        </div>

                        {{-- Comments --}}
                        <div class="mb-4">
                            <label for="categories" class="block text-sm font-medium text-gray-700">{{ __('Comments') }}</label>

                            {{-- todo --}}
                        </div>
                    </div>

                    <div class="py-6 bg-gray-50 border-t border-gray-200">
                        <div class="flex justify-start max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <x-ui.link-button :color="'gray'" :label="__('Close')" :route="route('home')"></x-ui.link-button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
