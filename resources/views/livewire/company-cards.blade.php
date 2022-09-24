<div>
    <div class="flex items-center justify-center h-48 -mb-40 @if($companies->isEmpty()) hidden @else bg-gradient-to-r from-sky-500 to-indigo-500" w-full @endif">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
          </svg>
        <h1 class="font-bold text-5xl text-white">Empresas</h1>
    </div>
    <div class="min-h-screen flex items-center justify-center">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @if ($companies->isEmpty())
                <div class="flex flex-col items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <h1 class="font-bold text-xl max-w-xs p-4 text-center">No hay empresas disponibles.</h1>
                    <a href="{{ route('companies.cards') }}"><button type="button" class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Ver empresas</button></a>
                </div>
                @else
                <h1 class="font-extrabold text-xl my-5">Selecciona una empresa:</h1>
                <div class="grid gap-4 md:gap-4 md:grid-cols-2 lg:gap-4 lg:grid-cols-4">

                    @foreach ($companies as $company)
                    <a href="{{ route('departments.cards', $company) }}">
                        <div class="h-100 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                                <img class="rounded-t-lg w-full h-64 object-cover" src="{{ Storage::url($company->image) }}" alt="" />
                            <div class="p-5">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $company->name }}</h5>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ Str::limit($company->description, 200) }}</p>
                            </div>
                        </div>
                    </a>

                    @endforeach
                </div>
                <div class="m-4">
                    {{ $companies->links() }}
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
