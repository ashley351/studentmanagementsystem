<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $course->code }} - {{ $course->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <p class="mb-2">{{ $course->description }}</p>
                <p class="mb-4"><strong>Credits:</strong> {{ $course->credits }}</p>
                <a href="{{ route('courses.index') }}" class="text-gray-600 underline">Back</a>
            </div>
        </div>
    </div>
</x-app-layout>