<x-app-layout>
    <div class="min-h-screen bg-slate-100 px-4 py-10 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-7xl">
            <header class="mb-8">
                <p class="text-sm font-semibold uppercase tracking-wide text-blue-700">{{ $roleLabel }} workspace</p>
                <h1 class="mt-2 text-3xl font-bold tracking-tight text-slate-900">Student Management System</h1>
                <p class="mt-2 text-slate-600">Welcome, {{ auth()->user()->name }}. Here is your system overview.</p>
            </header>

            <section class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3" aria-label="Management sections">
                @foreach ([
                    ['title' => 'Students', 'description' => 'Browse and manage student records.', 'count' => $totals['students'], 'label' => 'student records', 'route' => 'students.index'],
                    ['title' => 'Courses', 'description' => 'View academic courses and assigned lecturers.', 'count' => $totals['courses'], 'label' => 'courses', 'route' => 'courses.index'],
                    ['title' => 'Registrations', 'description' => 'Review student course registrations.', 'count' => $totals['registrations'], 'label' => 'registrations', 'route' => 'registrations.index'],
                ] as $section)
                    <article class="flex flex-col rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <h2 class="text-xl font-semibold text-slate-900">{{ $section['title'] }}</h2>
                                <p class="mt-2 text-sm leading-6 text-slate-600">{{ $section['description'] }}</p>
                            </div>
                            <span class="rounded-xl bg-blue-50 px-3 py-2 text-lg font-bold text-blue-800">{{ $section['count'] }}</span>
                        </div>
                        <a href="{{ route($section['route']) }}" class="mt-6 inline-flex items-center gap-2 text-sm font-semibold text-blue-700 hover:text-blue-900">
                            View {{ $section['title'] }} <span aria-hidden="true">&rarr;</span>
                        </a>
                    </article>
                @endforeach
            </section>

            <footer class="mt-8 rounded-2xl border border-blue-100 bg-blue-900 px-6 py-5 text-sm text-blue-50 sm:flex sm:items-center sm:justify-between">
                <p class="font-semibold">Student Management System <span class="font-normal text-blue-200">| MUBS</span></p>
                <p class="mt-1 text-blue-200 sm:mt-0">A unified overview for administrators, lecturers and students.</p>
            </footer>
        </div>
    </div>
</x-app-layout> 