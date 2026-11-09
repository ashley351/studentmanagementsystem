<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Student Management System') }} | MUBS</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/img/logo.png') }}">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-50 font-sans text-slate-900 antialiased">
    <div class="relative isolate min-h-screen overflow-hidden">
        <div class="absolute inset-x-0 top-0 -z-10 h-[680px] bg-gradient-to-br from-blue-950 via-blue-900 to-indigo-900"></div>
        <div class="absolute right-[-8rem] top-24 -z-10 h-80 w-80 rounded-full bg-blue-400/20 blur-3xl"></div>
        <div class="absolute left-[-6rem] top-72 -z-10 h-64 w-64 rounded-full bg-indigo-400/20 blur-3xl"></div>

        <header class="mx-auto flex max-w-7xl items-center justify-between px-5 py-5 sm:px-8 lg:px-10">
            <a href="{{ url('/') }}" class="flex items-center gap-3 text-white" aria-label="Student Management System home">
                <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-white p-1.5 shadow-sm">
                    <img src="{{ asset('assets/img/logo.png') }}" alt="MUBS crest" class="h-full w-full object-contain">
                </span>
                <span>
                    <span class="block text-sm font-bold tracking-wide sm:text-base">Student Management</span>
                    <span class="block text-xs text-blue-200">Makerere University Business School</span>
                </span>
            </a>

            <nav class="flex items-center gap-3" aria-label="Account navigation">
                @auth
                    <a href="{{ route('dashboard') }}" class="rounded-lg bg-white px-4 py-2.5 text-sm font-semibold text-blue-900 shadow-sm transition hover:bg-blue-50">Open dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="rounded-lg px-3 py-2.5 text-sm font-semibold text-white transition hover:bg-white/10">Sign in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="rounded-lg bg-white px-4 py-2.5 text-sm font-semibold text-blue-900 shadow-sm transition hover:bg-blue-50">Create account</a>
                    @endif
                @endauth
            </nav>
        </header>

        <main class="mx-auto max-w-7xl px-5 pb-16 pt-12 sm:px-8 sm:pt-20 lg:px-10 lg:pt-24">
            <section class="grid items-center gap-12 lg:grid-cols-[1.05fr_0.95fr] lg:gap-16" aria-labelledby="hero-title">
                <div class="max-w-2xl">
                    <span class="inline-flex items-center gap-2 rounded-full border border-blue-300/30 bg-white/10 px-3.5 py-1.5 text-xs font-semibold uppercase tracking-[0.16em] text-blue-100">
                        <span class="h-2 w-2 rounded-full bg-amber-300"></span>
                        MUBS academic services
                    </span>
                    <h1 id="hero-title" class="mt-6 text-4xl font-extrabold leading-tight tracking-tight text-white sm:text-5xl lg:text-6xl">
                        Student records,<br class="hidden sm:block"> <span class="text-blue-200">made simpler.</span>
                    </h1>
                    <p class="mt-6 max-w-xl text-base leading-7 text-blue-100 sm:text-lg sm:leading-8">
                        A single, easy-to-use workspace for managing students, academic courses and course registrations.
                    </p>
                    <div class="mt-8 flex flex-wrap items-center gap-3">
                        @auth
                            <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-2 rounded-xl bg-amber-300 px-5 py-3 text-sm font-bold text-blue-950 shadow-lg shadow-blue-950/20 transition hover:bg-amber-200 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-blue-900">
                                Go to your dashboard <span aria-hidden="true">&rarr;</span>
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="inline-flex items-center gap-2 rounded-xl bg-amber-300 px-5 py-3 text-sm font-bold text-blue-950 shadow-lg shadow-blue-950/20 transition hover:bg-amber-200 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-blue-900">
                                Sign in to continue <span aria-hidden="true">&rarr;</span>
                            </a>
                            <a href="#features" class="rounded-xl border border-white/25 px-5 py-3 text-sm font-semibold text-white transition hover:bg-white/10">Explore the system</a>
                        @endauth
                    </div>
                    <p class="mt-5 text-sm text-blue-200">Designed for administrators, lecturers and students.</p>
                </div>

                <div class="relative mx-auto w-full max-w-lg">
                    <div class="absolute -inset-4 rounded-[2rem] bg-blue-300/10 blur-2xl"></div>
                    <div class="relative rounded-[1.75rem] border border-white/20 bg-white p-5 shadow-2xl shadow-blue-950/30 sm:p-7">
                        <div class="flex items-center justify-between border-b border-slate-100 pb-5">
                            <div>
                                <p class="text-xs font-semibold uppercase tracking-wider text-blue-700">Academic overview</p>
                                <h2 class="mt-1 text-lg font-bold text-slate-900">One connected system</h2>
                            </div>
                            <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-blue-50 text-blue-800">
                                <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2Z" />
                                </svg>
                            </span>
                        </div>
                        <div class="space-y-3 pt-5">
                            <div class="flex items-center gap-4 rounded-xl bg-slate-50 p-4">
                                <span class="flex h-10 w-10 items-center justify-center rounded-lg bg-blue-100 text-blue-800">
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M16 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2m16 0v-2a4 4 0 0 0-3-3.87M14 3.13a4 4 0 0 1 0 7.75M14 7a4 4 0 1 1-8 0 4 4 0 0 1 8 0Z" /></svg>
                                </span>
                                <div><p class="font-semibold text-slate-900">Student directory</p><p class="mt-0.5 text-sm text-slate-500">Keep student details organized</p></div>
                            </div>
                            <div class="flex items-center gap-4 rounded-xl bg-slate-50 p-4">
                                <span class="flex h-10 w-10 items-center justify-center rounded-lg bg-indigo-100 text-indigo-800">
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2Z" /></svg>
                                </span>
                                <div><p class="font-semibold text-slate-900">Course catalogue</p><p class="mt-0.5 text-sm text-slate-500">Keep academic offerings in view</p></div>
                            </div>
                            <div class="flex items-center gap-4 rounded-xl bg-slate-50 p-4">
                                <span class="flex h-10 w-10 items-center justify-center rounded-lg bg-amber-100 text-amber-800">
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3M4 11h16M5 5h14a1 1 0 0 1 1 1v14H4V6a1 1 0 0 1 1-1Z" /><path stroke-linecap="round" stroke-linejoin="round" d="m9 16 2 2 4-4" /></svg>
                                </span>
                                <div><p class="font-semibold text-slate-900">Course registrations</p><p class="mt-0.5 text-sm text-slate-500">Track enrolments with clarity</p></div>
                            </div>
                        </div>
                        <div class="mt-5 flex items-center gap-2 border-t border-slate-100 pt-4 text-xs font-medium text-slate-500">
                            <span class="h-2 w-2 rounded-full bg-emerald-500"></span>
                            Secure access based on user roles
                        </div>
                    </div>
                </div>
            </section>

            <section id="features" class="mt-20 grid gap-5 sm:grid-cols-3 lg:mt-28" aria-label="System features">
                <article class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                    <p class="text-xs font-bold uppercase tracking-wider text-blue-700">01 / Records</p>
                    <h2 class="mt-3 text-lg font-bold text-slate-900">Student management</h2>
                    <p class="mt-2 text-sm leading-6 text-slate-600">Maintain student profiles and find essential details in one organized directory.</p>
                </article>
                <article class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                    <p class="text-xs font-bold uppercase tracking-wider text-indigo-700">02 / Learning</p>
                    <h2 class="mt-3 text-lg font-bold text-slate-900">Academic courses</h2>
                    <p class="mt-2 text-sm leading-6 text-slate-600">Browse the course catalogue, credit units and lecturer assignments.</p>
                </article>
                <article class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                    <p class="text-xs font-bold uppercase tracking-wider text-amber-700">03 / Enrolment</p>
                    <h2 class="mt-3 text-lg font-bold text-slate-900">Course registrations</h2>
                    <p class="mt-2 text-sm leading-6 text-slate-600">Review student course registrations through a clear, connected view.</p>
                </article>
            </section>
        </main>

        <footer class="border-t border-slate-200 bg-white">
            <div class="mx-auto flex max-w-7xl flex-col gap-2 px-5 py-6 text-sm text-slate-500 sm:flex-row sm:items-center sm:justify-between sm:px-8 lg:px-10">
                <p class="font-semibold text-slate-700">Student Management System <span class="font-normal text-slate-500">| MUBS</span></p>
                <p>&copy; {{ date('Y') }} Makerere University Business School</p>
            </div>
        </footer>
    </div>
</body>
</html>
