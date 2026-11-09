<x-app-layout>
    <div class="min-h-screen bg-slate-100 px-4 py-10 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-4xl">
            <header class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <a href="{{ route('students.index') }}" class="text-sm font-semibold text-blue-700 hover:text-blue-900">&larr; Back to students</a>
                    <p class="mt-5 text-sm font-semibold uppercase tracking-wide text-blue-700">Student profile</p>
                </div>
                <a href="{{ route('students.edit', $student) }}" class="inline-flex w-fit items-center rounded-lg bg-blue-800 px-5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-blue-900">Edit student</a>
            </header>

            <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
                <div class="bg-gradient-to-r from-blue-900 to-blue-700 px-6 py-8 text-white sm:px-8">
                    <div class="flex items-center gap-4">
                        <span class="flex h-16 w-16 shrink-0 items-center justify-center rounded-2xl bg-white/15 text-2xl font-bold">{{ \Illuminate\Support\Str::upper(\Illuminate\Support\Str::substr($student->name, 0, 1)) }}</span>
                        <div class="min-w-0">
                            <h1 class="truncate text-2xl font-bold sm:text-3xl">{{ $student->name }}</h1>
                            <p class="mt-1 text-sm text-blue-100">{{ $student->registration_number }}</p>
                        </div>
                    </div>
                </div>

                <div class="grid gap-6 px-6 py-7 sm:grid-cols-2 sm:px-8">
                    <div class="rounded-xl bg-slate-50 p-5">
                        <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">Registration number</p>
                        <p class="mt-2 break-words font-semibold text-slate-900">{{ $student->registration_number }}</p>
                    </div>
                    <div class="rounded-xl bg-slate-50 p-5">
                        <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">Email address</p>
                        <a href="mailto:{{ $student->email }}" class="mt-2 block break-all font-semibold text-blue-700 hover:text-blue-900">{{ $student->email }}</a>
                    </div>
                </div>

                <div class="border-t border-slate-200 px-6 py-6 sm:px-8">
                    <div class="mb-4 flex items-center justify-between">
                        <h2 class="text-lg font-semibold text-slate-900">Registered courses</h2>
                        <span class="rounded-full bg-blue-50 px-3 py-1 text-xs font-semibold text-blue-800">{{ $student->courses->count() }}</span>
                    </div>
                    <ul class="divide-y divide-slate-100">
                        @forelse ($student->courses as $course)
                            <li class="flex items-center justify-between gap-4 py-4">
                                <span class="font-medium text-slate-800">{{ $course->title }}</span>
                                <span class="shrink-0 rounded-md bg-slate-100 px-2.5 py-1 text-xs font-semibold text-slate-600">{{ $course->code }}</span>
                            </li>
                        @empty
                            <li class="rounded-lg bg-slate-50 px-4 py-5 text-sm text-slate-500">This student is not registered in any courses yet.</li>
                        @endforelse
                    </ul>
                </div>
            </section>
        </div>
    </div>
</x-app-layout>