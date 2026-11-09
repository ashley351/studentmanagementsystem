<x-app-layout>
    <div class="min-h-screen bg-slate-100 px-4 py-10 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-3xl">
            <header class="mb-8">
                <a href="{{ route('students.index') }}" class="text-sm font-semibold text-blue-700 hover:text-blue-900">&larr; Back to students</a>
                <p class="mt-6 text-sm font-semibold uppercase tracking-wide text-blue-700">Student directory</p>
                <h1 class="mt-2 text-3xl font-bold tracking-tight text-slate-900">Add a student</h1>
                <p class="mt-2 text-slate-600">Enter the student’s basic details to create a record.</p>
            </header>
            <section class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
                <form method="POST" action="{{ route('students.store') }}" class="space-y-6">
                    @csrf
                    @include('students._form')
                    <div class="flex flex-wrap gap-3 border-t border-slate-100 pt-6">
                        <button type="submit" class="rounded-lg bg-blue-800 px-5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2">Save student</button>
                        <a href="{{ route('students.index') }}" class="rounded-lg border border-slate-300 bg-white px-5 py-2.5 text-sm font-semibold text-slate-700 hover:bg-slate-50">Cancel</a>
                    </div>
                </form>
            </section>
        </div>
    </div>
</x-app-layout>