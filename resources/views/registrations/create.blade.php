<x-app-layout>
    <div class="min-h-screen bg-slate-100 px-4 py-10 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-3xl">
            <header class="mb-8">
                <p class="text-sm font-semibold uppercase tracking-wide text-blue-700">Enrolment records</p>
                <h1 class="mt-2 text-3xl font-bold tracking-tight text-slate-900">Register a student</h1>
                <p class="mt-2 text-slate-600">Select a student and course to record an enrolment.</p>
            </header>

            <section class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
                @if (session('success'))
                    <div class="mb-6 rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-800" role="status">{{ session('success') }}</div>
                @endif

                @if ($errors->any())
                    <div class="mb-6 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-800" role="alert">
                        <p class="font-semibold">Please correct the following:</p>
                        <ul class="mt-2 list-inside list-disc">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if ($students->isEmpty() || $courses->isEmpty())
                    <p class="rounded-lg bg-amber-50 px-4 py-3 text-sm text-amber-800">Add at least one student and one course before creating a registration.</p>
                @else
                    <form action="{{ route('registrations.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <div>
                            <label for="student_id" class="mb-2 block text-sm font-semibold text-slate-700">Student</label>
                            <select id="student_id" name="student_id" required class="block w-full rounded-lg border-slate-300 text-slate-900 shadow-sm focus:border-blue-600 focus:ring-blue-600">
                                <option value="">Choose a student</option>
                                @foreach ($students as $student)
                                    <option value="{{ $student->id }}" @selected(old('student_id') == $student->id)>{{ $student->name }} — {{ $student->registration_number }}</option>
                                @endforeach
                            </select>
                            @error('student_id') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="course_id" class="mb-2 block text-sm font-semibold text-slate-700">Course</label>
                            <select id="course_id" name="course_id" required class="block w-full rounded-lg border-slate-300 text-slate-900 shadow-sm focus:border-blue-600 focus:ring-blue-600">
                                <option value="">Choose a course</option>
                                @foreach ($courses as $course)
                                    <option value="{{ $course->id }}" @selected(old('course_id') == $course->id)>{{ $course->code }} — {{ $course->title }}</option>
                                @endforeach
                            </select>
                            @error('course_id') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div class="flex flex-wrap gap-3">
                            <button type="submit" class="inline-flex items-center rounded-lg bg-blue-800 px-5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2">Save registration</button>
                            <a href="{{ route('registrations.index') }}" class="inline-flex items-center rounded-lg border border-slate-300 bg-white px-5 py-2.5 text-sm font-semibold text-slate-700 hover:bg-slate-50">View registrations</a>
                        </div>
                    </form>
                @endif
            </section>
        </div>
    </div>
</x-app-layout>