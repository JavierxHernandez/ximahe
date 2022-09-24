<div>
    {{-- <x-jet-banner /> --}}
    <x-slot name="header">
        <x-header title="Companies" :route="route('companies.create')" textButton="Create" info="false" />
    </x-slot>

    <div class="py-12">
        <x-table :object="$companies" objectName="{{ __('companies') }}" route="companies.edit" />
    </div>

    <x-jet-modal wire:model="showDeleteModal">
        <div class="px-6 py-4 bg-gray-100">
            <div class="text-lg font-bold">
                {{ __('Delete') }}
            </div>
        </div>
        <div class="px-6 py-4">
            <div class="text-lg">
                <p>{{ __('¿Are you sure want to delete?') }}</p>
            </div>
        </div>
        <div class="flex flex-row justify-end px-6 py-4 bg-gray-100 text-right space-x-2">
            <x-jet-secondary-button wire:click="closeDeleteForm()">{{ __('Cancel') }}</x-jet-secondary-button>
            <x-jet-button wire:click="delete()">{{ __('Delete') }}</x-jet-button>
        </div>
    </x-jet-modal>
</div>
