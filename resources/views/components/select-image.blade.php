<div x-data="{ focused: false }" class="relative">
    @php($id = $attributes->wire('model')->value)
    @if ($image instanceof Livewire\TemporaryUploadedFile)
        <x-jet-danger-button wire:click="$set('{{ $id }}')" class="absolute bottom-2 right-2">
            {{ __('Change Image') }}
        </x-jet-danger-button>
        @if ($errors->any())
        <div class="h-32 bg-gray-50 border-2 border-dashed rounded flex items-center justify-center">
            <b>{{ $image->getClientOriginalName() }}</b>
        </div>
        @else
            <img src="{{ $image->temporaryUrl() }}" class="border-2 rounded" alt="">
        @endif
    @elseif($existing)
        <label for="{{ $id }}"
            class="absolute bottom-2 right-2 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 disabled:opacity-25 transition cursor-pointer"
            :class="{ 'outline-none border-gray-900 ring ring-gray-300': focused }">{{ __('Change Image') }}</label>

        <img src="{{ Storage::url($existing) }}" class="border-2 rounded" alt="">
    @else
        <div class="h-32 bg-gray-50 border-2 border-dashed rounded flex items-center justify-center">
            <label for="{{ $id }}"
                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 disabled:opacity-25 transition cursor-pointer"
                :class="{ 'outline-none border-gray-900 ring ring-gray-300': focused }">{{ __('Selected Image') }}</label>
        </div>
    @endif
    @unless($image)
        <x-jet-input x-on:focus="focused = true" x-on:blur="focused = false" :id="$id"
            wire:model="{{ $id }}" type="file" class="sr-only" />
    @endunless
</div>
