<div>
    <x-slot name="header">
        <x-header title="Department" :route="route('departments.index')" textButton="" info="false" />
    </x-slot>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <x-jet-form-section submit="save">
            <x-slot name="title">
                {{ __('New Department') }}
            </x-slot>

            <x-slot name="description">
                {{ __('New description') }}
            </x-slot>

            <x-slot name="form">
                <div class="col-span-6 sm:col-span-4">
                    <x-select-image wire:model="image" :image="$image" :existing="$department->image" />
                    <x-jet-input-error for="image" class="mt-2" />
                </div>
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="name" :value="__('Name')" />
                    <x-jet-input id="name" wire:model="department.name" type="text" class="mt-1 w-full block" />
                    <x-jet-input-error for="department.name" class="mt-2" />
                </div>
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="company_id" :value="__('Company')" />
                    {{-- <div class="flex space-x-2 mt-1"> --}}
                        <x-select id="company_id" wire:model="department.company_id" :placeholder="__('Select company')" :options="$companies"
                            class="mt-1 w-full block" />
                            {{-- <x-jet-secondary-button  wire:click="openCategoryForm()" class="!p-2.5"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                              </svg></x-jet-secondary-button> --}}
                    {{-- </div> --}}
                    <x-jet-input-error for="department.company_id" class="mt-2" />
                </div>
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="description" :value="__('Description')" />
                    <x-textarea id="description" wire:model="department.description" type="text"
                        class="mt-1 w-full block" />
                    <x-jet-input-error for="department.description" class="mt-2" />
                </div>
                <x-slot name="actions">
                    <x-jet-button>
                        {{ __('Save') }}
                    </x-jet-button>
                </x-slot>
            </x-slot>
        </x-jet-form-section>
    </div>
</div>
