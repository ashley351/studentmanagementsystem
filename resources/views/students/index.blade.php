<x-app-layout>
    <div class="min-h-screen bg-slate-100 px-4 py-10 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-7xl">
            <header class="mb-8 flex flex-col gap-5 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-wide text-blue-700">Student directory</p>
                    <h1 class="mt-2 text-3xl font-bold tracking-tight text-slate-900">Students</h1>
                    <p class="mt-2 text-slate-600">A clear overview of student records and contact details.</p>
                </div>
                <a href="{{ route('students.create') }}" class="inline-flex w-fit items-center gap-2 rounded-lg bg-blue-800 px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2">
                    <span aria-hidden="true" class="text-lg leading-none">+</span> Add student
                </a>
            </header>

            @if (session('success'))
                <div class="mb-6 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-800" role="status">{{ session('success') }}</div>
            @endif

            <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
                <div class="flex flex-col gap-1 border-b border-slate-200 px-6 py-4 sm:flex-row sm:items-center sm:justify-between">
                    <h2 class="font-semibold text-slate-900">All students</h2>
                    <p class="text-sm text-slate-500">{{ $students->total() }} {{ \Illuminate\Support\Str::plural('record', $students->total()) }}</p>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-slate-200 text-left text-sm">
                        <thead class="bg-slate-50 text-xs uppercase tracking-wide text-slate-500">
                            <tr>
                                <th scope="col" class="px-6 py-3 font-semibold">Student</th>
                                <th scope="col" class="px-6 py-3 font-semibold">Registration number</th>
                                <th scope="col" class="px-6 py-3 font-semibold">Email address</th>
                                <th scope="col" class="px-6 py-3 text-right font-semibold">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-slate-700">
                            @forelse ($students as $student)
                                <tr class="transition hover:bg-slate-50">
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-blue-100 text-sm font-bold text-blue-800">{{ \Illuminate\Support\Str::upper(\Illuminate\Support\Str::substr($student->name, 0, 1)) }}</span>
                                            <span class="font-semibold text-slate-900">{{ $student->name }}</span>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4 font-medium text-slate-700">{{ $student->registration_number }}</td>
                                    <td class="whitespace-nowrap px-6 py-4 text-slate-600">{{ $student->email }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <div class="flex items-center justify-end gap-2">
                                            <a href="{{ route('students.show', $student) }}" class="rounded-lg px-3 py-2 text-xs font-semibold text-blue-700 hover:bg-blue-50">View</a>
                                            <a href="{{ route('students.edit', $student) }}" class="rounded-lg px-3 py-2 text-xs font-semibold text-slate-700 hover:bg-slate-100">Edit</a>
                                            <form method="POST" action="{{ route('students.destroy', $student) }}" onsubmit="return confirm('Delete this student?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="rounded-lg px-3 py-2 text-xs font-semibold text-red-700 hover:bg-red-50">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-14 text-center">
                                        <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-slate-100 text-slate-500" aria-hidden="true">&#128100;</div>
                                        <p class="mt-4 font-semibold text-slate-900">No students yet</p>
                                        <p class="mt-1 text-sm text-slate-500">Add a student to start building your directory.</p>
                                        <a href="{{ route('students.create') }}" class="mt-4 inline-flex text-sm font-semibold text-blue-700 hover:text-blue-900">Add the first student <span class="ml-1" aria-hidden="true">&rarr;</span></a>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @if ($students->hasPages())
                    <div class="border-t border-slate-200 px-6 py-4">{{ $students->links() }}</div>
                @endif
            </section>
        </div>
    </div>
</x-app-layout>