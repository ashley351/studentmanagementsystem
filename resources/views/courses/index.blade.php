<x-app-layout>
    <div class="min-h-screen bg-slate-100 px-4 py-10 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-7xl">
            <header class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-wide text-blue-700">Academic catalogue</p>
                    <h1 class="mt-2 text-3xl font-bold tracking-tight text-slate-900">Courses</h1>
                    <p class="mt-2 text-slate-600">Browse course codes, credit units and lecturers.</p>
                </div>
                <a href="{{ route('dashboard') }}" class="inline-flex w-fit items-center rounded-lg border border-slate-300 bg-white px-4 py-2 text-sm font-semibold text-slate-700 shadow-sm hover:bg-slate-50">Back to dashboard</a>
            </header>

            <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
                <div class="border-b border-slate-200 px-6 py-4">
                    <p class="text-sm text-slate-600"><span class="font-semibold text-slate-900">{{ $courses->total() }}</span> courses</p>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-slate-200 text-left text-sm">
                        <thead class="bg-slate-50 text-xs uppercase tracking-wide text-slate-500">
                            <tr>
                                <th scope="col" class="px-6 py-3 font-semibold">Course code</th>
                                <th scope="col" class="px-6 py-3 font-semibold">Course title</th>
                                <th scope="col" class="px-6 py-3 font-semibold">Credit units</th>
                                <th scope="col" class="px-6 py-3 font-semibold">Lecturer</th>
                                <th scope="col" class="px-6 py-3 font-semibold">Registrations</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-slate-700">
                            @forelse ($courses as $course)
                                <tr class="hover:bg-slate-50">
                                    <td class="whitespace-nowrap px-6 py-4 font-semibold text-blue-800">{{ $course->code }}</td>
                                    <td class="min-w-60 px-6 py-4 font-medium text-slate-900">{{ $course->title }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $course->credit_units }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $course->lecturer?->name ?? 'Not assigned' }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $course->registrations_count }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-12 text-center">
                                        <p class="font-semibold text-slate-800">No courses found</p>
                                        <p class="mt-1 text-slate-500">Courses will appear here when they are added to the system.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @if ($courses->hasPages())
                    <div class="border-t border-slate-200 px-6 py-4">{{ $courses->links() }}</div>
                @endif
            </section>
        </div>
    </div>
</x-app-layout>
