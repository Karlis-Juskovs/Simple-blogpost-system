<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-gray-900">
                    @include('error_messages')

                    <form method="POST" action="{{ route('blog_post.update', ['blogPost' => $blogPost]) }}">
                        @csrf
                        @method('PATCH')

                        <div class="p-6">
                            <div class="mb-4">
                                <label for="title"
                                       class="block text-sm font-medium text-gray-700">{{ __('Tile') }}</label>
                                <input
                                    class="@error('title') border-red-500 @enderror mt-1 block w-3/4 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    type="text"
                                    name="title"
                                    id="title"
                                    placeholder="{{ __('Enter the title') }}"
                                    value="{{ old('title', $blogPost->title) }}"
                                >
                            </div>

                            <div class="mb-4">
                                <label for="content"
                                       class="block text-sm font-medium text-gray-700">{{ __('Content') }}</label>
                                <textarea
                                    class="@error('content') border-red-500 @enderror mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    id="content"
                                    name="content"
                                    rows="5"
                                >{{ old('content', $blogPost->content) }}</textarea>
                            </div>

                            <div class="mb-4">
                                <label for="categories"
                                       class="block text-sm font-medium text-gray-700">{{ __('Existing categories') }}</label>

                                @isset($categories)
                                    @foreach ($categories as $category)
                                        <input
                                            class="h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500"
                                            type="checkbox"
                                            id="category_{{$category->id}}"
                                            name="categories[]"
                                            value="{{$category->id}}"
                                            {{ in_array($category->id, $assignCategories) ? 'checked' : '' }}
                                        >
                                        <label for="category_{{$category->id}}"
                                               class="ml-2 text-sm text-gray-600">{{ $category->name }}</label>
                                        <br>
                                    @endforeach
                                @endisset
                            </div>

                            <div class="mb-4">
                                <label for="new_category"
                                       class="block text-sm font-medium text-gray-700">{{ __('Create and add new categories (separator ";")') }}</label>
                                <input
                                    class="mt-1 block w-1/4 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    id="new_category"
                                    type="text"
                                    name="new_category"
                                    placeholder="{{ __('ex. Parenting;Arts & Culture') }}"
                                    value="{{ old('new_category') }}"
                                >
                            </div>
                        </div>

                        <div class="py-6 bg-gray-50 border-t border-gray-200">
                            <div class="flex justify-between max-w-7xl mx-auto sm:px-6 lg:px-8">
                                <x-ui.link-button :color="'gray'" :label="__('Close')"
                                                  :route="route('home')"></x-ui.link-button>
                                <div>
                                    <x-ui.button
                                        :color="'red'"
                                        :label="__('Delete')"
                                        :idName="'delete_blog_post_form'"
                                        :class="'mr-5'"
                                    ></x-ui.button>
                                    <x-ui.button :color="'green'" :label="__('Save')"></x-ui.button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <form method="POST" action="{{ route('blog_post.destroy', ['blogPost' => $blogPost]) }}"
                          id="delete_blog_post_form">
                        @method('DELETE')
                        @csrf
                    </form>

                    @include('modals.delete_object_confirmation')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
