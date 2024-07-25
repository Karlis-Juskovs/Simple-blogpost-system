<x-app-layout>
    @guest
        <x-slot name="header">
            @include('login_header')
        </x-slot>
    @endguest

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-gray-900">
                    <div class="p-6">
                        {{-- Title --}}
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">{{ __('Tile') }}</label>
                            <input class="mt-1 block w-3/4 rounded-md border-gray-300 sm:text-sm"
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
                            <label class="block text-sm font-medium text-gray-700">{{ __('Comments') }}</label>

                            {{-- Existing comments block --}}
                            <div class="border p-4 mb-4">
                                @foreach($comments as $comment)
                                    @if (!$loop->first)
                                        <hr class="my-4">
                                    @endif

                                    <div class="flex justify-between items-center mb-2">
                                        <span class="font-bold">{{ $comment->owner->name }}</span>
                                        <span class="text-sm text-gray-500">
                                            @if($comment->isOwner())
                                                <span
                                                    class="text-red-500 hover:text-red-700 cursor-pointer mr-5 delete_object"
                                                    data-form_id="{{ 'delete_comment_' . $comment->id }}"
                                                >{{ __('delete comment') }}</span>
                                            @endif
                                            {{ $comment->created_at->format('M d, Y H:i') . ' UTC' }}
                                        </span>
                                    </div>
                                    <div class="text-gray-700">
                                        {{ $comment->content }}
                                    </div>

                                    @if($comment->isOwner())
                                        <form method="POST" action="{{ route('comment.destroy', ['comment' => $comment]) }}"
                                              id="{{ 'delete_comment_' . $comment->id }}">
                                            @method('DELETE')
                                            @csrf

                                            <input type="hidden" name="blog_post_id" value="{{ $blogPost->id }}">
                                        </form>
                                    @endif
                                @endforeach
                            </div>

                            @auth
                                @include('modals.delete_object_confirmation')
                            @endauth

                            {{-- Pagination Links --}}
                            <div class="mt-4">
                                {{ $comments->links() }}
                            </div>
                        </div>

                        @auth
                            <div class="mb-4">
                                <form method="POST" action="{{ route('comment.store') }}">
                                    @csrf

                                    <input type="hidden" name="blog_post_id" value="{{ $blogPost->id }}">

                                    <label for="content" class="block text-sm font-medium text-gray-700">{{ __('Add new comment') }}</label>
                                    <textarea class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                              id="content"
                                              name="content"
                                              rows="2"
                                              required
                                    ></textarea>

                                    <div class="flex justify-end mt-5">
                                        <x-ui.button :color="'green'" :label="__('Add')"></x-ui.button>
                                    </div>
                                </form>
                            </div>
                        @else
                            <p class="italic text-gray-700">{{ __('Login if you also wish to leave a comment') }}</p>
                        @endauth
                    </div>

                    <div class="py-6 bg-gray-50 border-t border-gray-200">
                        <div class="flex {{ $blogPost->isOwner() ? 'justify-between' : 'justify-start' }} max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <x-ui.link-button :color="'gray'" :label="__('Close')" :route="route('home')"></x-ui.link-button>

                            @if($blogPost->isOwner())
                                <x-ui.link-button :color="'blue'" :label="__('Edit')" :route="route('blog_post.edit', $blogPost)"></x-ui.link-button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
