<div>
    <div class="flex items-center justify-center h-48 -mb-40 bg-orange-400" w-full">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
          </svg>
        <h1 class="font-bold text-5xl text-white">Documentos</h1>
    </div>
    <div class="min-h-screen flex items-center justify-center">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                {{-- @if ($documents->isEmpty()) --}}
                    {{-- <div class="flex flex-col items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <h1 class="font-bold text-xl max-w-xs p-4 text-center">No hay documentos disponibles para el
                            departamento seleccionado.</h1>
                        <a href="{{ route('departments.cards', $department->company) }}"><button type="button"
                                class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Ver
                                departamentos</button></a>
                    </div> --}}
                {{-- @else --}}
                <x-table-document-home :object="$documents" objectName="{{ __('documents') }}" route="documents.edit"/>
                {{-- @endif --}}
            </div>
        </div>
    </div>
</div>
