<x-app-layout>
    <div class="min-h-screen bg-slate-100 px-4 py-10 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-7xl">
            <header class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-wide text-blue-700">Enrolment records</p>
                    <h1 class="mt-2 text-3xl font-bold tracking-tight text-slate-900">Course Registrations</h1>
                    <p class="mt-2 text-slate-600">Review which students are registered in each course.</p>
                </div>
                <a href="{{ route('dashboard') }}" class="inline-flex w-fit items-center rounded-lg border border-slate-300 bg-white px-4 py-2 text-sm font-semibold text-slate-700 shadow-sm hover:bg-slate-50">Back to dashboard</a>
            </header>

            <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
                <div class="border-b border-slate-200 px-6 py-4">
                    <p class="text-sm text-slate-600"><span class="font-semibold text-slate-900">{{ $registrations->total() }}</span> registrations</p>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-slate-200 text-left text-sm">
                        <thead class="bg-slate-50 text-xs uppercase tracking-wide text-slate-500">
                            <tr>
                                <th scope="col" class="px-6 py-3 font-semibold">Student</th>
                                <th scope="col" class="px-6 py-3 font-semibold">Registration number</th>
                                <th scope="col" class="px-6 py-3 font-semibold">Course</th>
                                <th scope="col" class="px-6 py-3 font-semibold">Course code</th>
                                <th scope="col" class="px-6 py-3 font-semibold">Registered on</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-slate-700">
                            @forelse ($registrations as $registration)
                                <tr class="hover:bg-slate-50">
                                    <td class="whitespace-nowrap px-6 py-4 font-medium text-slate-900">{{ $registration->student?->name ?? 'Student unavailable' }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $registration->student?->registration_number ?? '—' }}</td>
                                    <td class="min-w-60 px-6 py-4">{{ $registration->course?->title ?? 'Course unavailable' }}</td>
                                    <td class="whitespace-nowrap px-6 py-4 font-semibold text-blue-800">{{ $registration->course?->code ?? '—' }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $registration->created_at?->format('M j, Y') ?? '—' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-12 text-center">
                                        <p class="font-semibold text-slate-800">No registrations found</p>
                                        <p class="mt-1 text-slate-500">Student course registrations will appear here.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @if ($registrations->hasPages())
                    <div class="border-t border-slate-200 px-6 py-4">{{ $registrations->links() }}</div>
                @endif
            </section>
        </div>
    </div>
</x-app-layout>
