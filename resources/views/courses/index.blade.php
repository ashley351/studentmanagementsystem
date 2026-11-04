<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Courses') }}</h2>
            <a href="{{ route('courses.create') }}"
               class="px-4 py-2 bg-gray-800 text-white rounded-md text-sm hover:bg-gray-700">Add Course</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="mb-4 p-4 bg-red-100 text-red-800 rounded">{{ session('error') }}</div>
            @endif

            <div class="bg-white shadow-sm sm:rounded-lg p-6 overflow-x-auto">
                <table class="min-w-full text-left text-sm">
                    <thead class="border-b font-semibold">
                        <tr>
                            <th class="py-2 pr-4">Code</th>
                            <th class="py-2 pr-4">Title</th>
                            <th class="py-2 pr-4">Credit Units</th>
                            <th class="py-2 pr-4">Lecturer</th>
                            <th class="py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($courses as $course)
                            <tr class="border-b">
                                <td class="py-2 pr-4">{{ $course->code }}</td>
                                <td class="py-2 pr-4">{{ $course->title }}</td>
                                <td class="py-2 pr-4">{{ $course->credit_units }}</td>
                                <td class="py-2 pr-4">{{ $course->lecturer?->name ?? 'Unassigned' }}</td>
                                <td class="py-2 flex gap-3">
                                    <a href="{{ route('courses.show', $course) }}" class="text-blue-600 underline">View</a>
                                    <a href="{{ route('courses.edit', $course) }}" class="text-yellow-600 underline">Edit</a>
                                    <form action="{{ route('courses.destroy', $course) }}" method="POST"
                                          onsubmit="return confirm('Delete this course?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 underline">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="5" class="py-4 text-center">No courses found.</td></tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-4">{{ $courses->links() }}</div>
            </div>
        </div>
    </div>
</x-app-layout>