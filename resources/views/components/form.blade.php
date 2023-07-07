@props(['title', 'description' => null, 'button', 'size' => 'md'])

<form {{ $attributes->merge(['method' => 'post', 'id' => 'submit', 'class' => 'row g-3']) }}>
    @csrf

    {{ $slot }}

    <div class="col-12 text-center mt-4">
        @isset($button)
            <x-submit-button :text="$button" />
        @endisset
        <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">
            Cancel
        </button>
    </div>
</form>
