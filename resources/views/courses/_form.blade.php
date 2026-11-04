<div>
    <x-input-label for="code" :value="__('Course Code')" />
    <x-text-input id="code" name="code" type="text" class="mt-1 block w-full"
                  :value="old('code', $course->code ?? '')" />
    <x-input-error :messages="$errors->get('code')" class="mt-2" />
</div>

<div class="mt-4">
    <x-input-label for="title" :value="__('Title')" />
    <x-text-input id="title" name="title" type="text" class="mt-1 block w-full"
                  :value="old('title', $course->title ?? '')" />
    <x-input-error :messages="$errors->get('title')" class="mt-2" />
</div>

<div class="mt-4">
    <x-input-label for="description" :value="__('Description')" />
    <textarea id="description" name="description" rows="3"
              class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('description', $course->description ?? '') }}</textarea>
    <x-input-error :messages="$errors->get('description')" class="mt-2" />
</div>

<div class="mt-4">
    <x-input-label for="credit_units" :value="__('Credit Units')" />
    <x-text-input id="credit_units" name="credit_units" type="number" min="1" max="10" class="mt-1 block w-full"
                  :value="old('credit_units', $course->credit_units ?? 3)" />
    <x-input-error :messages="$errors->get('credit_units')" class="mt-2" />
</div>

<div class="mt-4">
    <x-input-label for="lecturer_id" :value="__('Lecturer')" />
    <select id="lecturer_id" name="lecturer_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        <option value="">Unassigned</option>
        @foreach ($lecturers as $lecturer)
            <option value="{{ $lecturer->id }}" @selected(old('lecturer_id', $course->lecturer_id ?? '') == $lecturer->id)>
                {{ $lecturer->name }}
            </option>
        @endforeach
    </select>
    <x-input-error :messages="$errors->get('lecturer_id')" class="mt-2" />
</div>