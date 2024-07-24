<button
    class="{{ $idName ? 'delete_object' : '' }} {{ $class }} border-{{ $color }}-400 hover:bg-{{ $color }}-400 focus:bg-{{ $color }}-600 px-4 py-2 border-2 text-sm font-medium rounded-full "
    data-form_id="{{ $idName }}"
    type="{{ $idName ? 'button' : 'submit' }}"
>
    {{ $label }}
</button>
