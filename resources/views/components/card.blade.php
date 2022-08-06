@props(['company'])

<div class="w-full rounded overflow-hidden shadow-lg">
    <img class="w-full" src="{{ $company->photo_path }}" alt="Sunset in the mountains">
    <div class="px-6 py-4">
        <div class="font-bold text-xl mb-2">{{ $company->name }}</div>
        <p class="text-gray-700 text-base">
            {{ Str::limit($company->description, 200) }}
        </p>
    </div>
</div>
