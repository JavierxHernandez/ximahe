<div>
    <x-slot name="header">
        <x-header title="Companies" :route="route('companies.create')" textButton="Create" info="" />
    </x-slot>

    <div class="py-12">
        <x-table :object="$companies" />
    </div>

    <x-jet-modal wire:model="showDeleteModal">
        <div class="px-6 py-4 bg-gray-100">
            <div class="text-lg font-bold">
                {{ __('Delete') }}
            </div>
        </div>
        <div class="px-6 py-4">
            <div class="text-lg">
                <p>¿Are you sure want to delete?</p>
            </div>
        </div>
        <div class="flex flex-row justify-end px-6 py-4 bg-gray-100 text-right space-x-2">
            <x-jet-secondary-button wire:click="closeDeleteForm()">Cancel</x-jet-secondary-button>
            <x-jet-button wire:click="delete()">{{ __('Delete') }}</x-jet-button>
        </div>
    </x-jet-modal>


</div>

<style>
    html,
    body {
        height: 100%;
    }

    @media (min-width: 640px) {
        table {
            display: inline-table !important;
        }

        thead tr:not(:first-child) {
            display: none;
        }
    }

    td:not(:last-child) {
        border-bottom: 0;
    }

    th:not(:last-child) {
        border-bottom: 2px solid rgba(0, 0, 0, .1);
    }
</style>


{{-- <!--Container-->
<div class="container w-full md:w-4/5 xl:w-3/5  mx-auto px-2">




</div>
<!--/container--> --}}
