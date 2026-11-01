@foreach (['student_number' => 'Student Number', 'name' => 'Name', 'email' => 'Email', 'phone' => 'Phone'] as $field => $label)
    <div class="mb-3">
        <label class="form-label">{{ $label }}</label>
        <input type="text" name="{{ $field }}"
               class="form-control @error($field) is-invalid @enderror"
               value="{{ old($field, $student->$field ?? '') }}">
        @error($field)
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
@endforeach