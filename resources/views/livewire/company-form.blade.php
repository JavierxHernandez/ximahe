<div>
    <x-slot name="header">
        <x-header title="Company" :route="route('companies.index')" textButton="" info="false" />
    </x-slot>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <x-jet-form-section submit="save">
            <x-slot name="title">
                {{ __('New Company') }}
            </x-slot>

            <x-slot name="description">
                {{ __('New description') }}
            </x-slot>

            <x-slot name="form">
                <div class="col-span-6 sm:col-span-4">
                    <x-select-image wire:model="image" :image="$image" :existing="$company->image" />
                    <x-jet-input-error for="image" class="mt-2" />
                </div>
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="name" :value="__('Name')" />
                    <x-jet-input id="name" wire:model="company.name" type="text" class="mt-1 w-full block" />
                    <x-jet-input-error for="company.name" class="mt-2" />
                </div>
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="description" :value="__('Description')" />
                    <x-textarea id="description" wire:model="company.description" type="text"
                        class="mt-1 w-full block" />
                    <x-jet-input-error for="company.description" class="mt-2" />
                </div>
                <x-slot name="actions">
                    <x-jet-button>
                        {{ __('save') }}
                    </x-jet-button>
                </x-slot>
            </x-slot>
        </x-jet-form-section>
    </div>
</div>
