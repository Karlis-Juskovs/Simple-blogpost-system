<div id="confirmModal" class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50 hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <p class="text-lg mb-4">{{ __('Are you sure you want to delete this object?') }}</p>
        <div class="flex justify-end">
            <button id="cancelDelete" class="px-4 py-2 bg-gray-500 text-white rounded mr-2">{{ __('No') }}</button>
            <button id="confirmDelete" class="px-4 py-2 bg-red-500 text-white rounded">{{ __('Yes') }}</button>
        </div>
    </div>
</div>
