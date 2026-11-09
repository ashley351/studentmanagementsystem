@foreach (['registration_number' => 'Registration Number', 'name' => 'Name', 'email' => 'Email'] as $field => $label)
    <div>
        <label for="{{ $field }}" class="mb-2 block text-sm font-semibold text-slate-700">{{ $label }}</label>
        <input id="{{ $field }}" type="{{ $field === 'email' ? 'email' : 'text' }}" name="{{ $field }}"
               value="{{ old($field, $student->$field ?? '') }}"
             required
               class="block w-full rounded-lg border-slate-300 text-slate-900 shadow-sm placeholder:text-slate-400 focus:border-blue-600 focus:ring-blue-600 @error($field) border-red-500 @enderror"
               placeholder="{{ $field === 'registration_number' ? 'e.g. 24/U/12345/PS' : ($field === 'email' ? 'student@example.com' : 'Enter full name') }}">
        @error($field)
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
@endforeach