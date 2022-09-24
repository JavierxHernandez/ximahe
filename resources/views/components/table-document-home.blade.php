@props(['object', 'objectName', 'route'])

<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div id="table-options" class="grid grid-cols-4 my-2">
        <div class="mr-2">
            <input wire:model.debounce.300ms="search" type="text"
                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                placeholder="{{ __('Search') }} {{ $objectName }}...">
        </div>
        <div class="mr-2">
            <select wire:model="orderBy"
                class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                id="grid-state">
                <option value="id">ID</option>
                <option value="name">{{ __('Name') }}</option>
                <option value="description">{{ __('Description') }}</option>
                <option value="created_at">{{ __('Sign Up Date') }}</option>
            </select>
        </div>
        <div class="mr-2">
            <select wire:model="orderAsc"
                class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                id="grid-state">
                <option value="1">{{ __('Ascending') }}</option>
                <option value="0">{{ __('Descending') }}</option>
            </select>
        </div>
        <div>
            <select wire:model="perPage"
                class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                id="grid-state">
                <option>10</option>
                <option>25</option>
                <option>50</option>
                <option>100</option>
            </select>
        </div>
    </div>
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <table class="border-collapse w-full">
            @if ($object->isEmpty())
                {{-- <tr
                class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0"> --}}
                <div class="p-5 border">
                    <p class="text-center text-gray-400">No hay documentos disponibles.</p>
                </div>

                {{-- </tr> --}}
            @else
                <thead>
                    <tr>
                        <th
                            class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                            ID</th>
                        {{-- <th
                        class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                        {{ __('Photo') }}</th> --}}
                        <th
                            class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                            {{ __('Name') }}</th>
                        <th
                            class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                            {{ __('Description') }}</th>
                        <th
                            class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                            {{ __('Department') }}</th>
                        {{-- <th
                        class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                        {{ __('Status') }}</th> --}}
                        <th
                            class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                            {{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($object as $model)
                        <tr
                            class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                            <td
                                class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                <span
                                    class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">ID</span>
                                {{ $model->id }}
                            </td>
                            {{-- <td
                            class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                            <span
                                class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">{{ __('Photo') }}</span>
                            <div class="flex justify-center">
                                <img class="object-fil rounded-lg w-20"
                                    src="{{ Storage::url($model->image) }}">
                            </div>
                        </td> --}}
                            <td
                                class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                <span
                                    class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">{{ __('name') }}</span>
                                {{ $model->name }}
                            </td>
                            <td
                                class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                <span
                                    class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">{{ __('Description') }}</span>
                                {{ Str::limit($model->description, 20) }}
                            </td>
                            <td
                                class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                <span
                                    class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">{{ __('Department') }}</span>
                                {{ $model->department->name }}
                            </td>
                            {{-- <td
                                class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                <span
                                class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">{{ __('Status') }}</span>
                                <div class="flex justify-center">
                                    <div style="padding-top: 0.1em; padding-bottom: 0.1rem" class="text-sm px-3 bg-green-200 text-black rounded-full w-24">{{ $model->documentStatus->name }}</div>
                                </div>
                            </td> --}}


                            <td
                                class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                <span
                                    class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">{{ __('Actions') }}</span>
                                @if ($model->documentStatus->id === 1)
                                <button wire:click='openPreviewModal()'
                                        class="bg-blue-300 hover:bg-blue-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </button>
                                @else
                                    <button wire:click='export({{ $model }})'
                                        class="bg-emerald-300 hover:bg-emerald-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                    </button>
                                    <button wire:click='openPreviewModal()'
                                        class="bg-blue-300 hover:bg-blue-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </button>
                                @endif
                            </td>
                        </tr>
                        <x-jet-dialog-modal wire:model="previewModal" :id="$model->id" maxWidth="6xl">
                            <x-slot name="title">
                                {{ __('Document: ') . $model->name }}
                            </x-slot>
                            <x-slot name="content">

                                <embed src="{{ Storage::url($model->file) }}#toolbar=0" type="application/pdf"
                                    class="w-full" height="700" alt="pdf">
                            </x-slot>
                            <x-slot name="footer">
                                <x-jet-secondary-button wire:click="closePreviewModal()">{{ __('Cancel') }}
                                </x-jet-secondary-button>
                            </x-slot>
                        </x-jet-dialog-modal>
                    @endforeach
            @endif
            </tbody>
        </table>
    </div>
    <div class="my-4">
        {!! $object->links() !!}
    </div>
</div>
