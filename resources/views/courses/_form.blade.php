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
    <x-input-label for="credits" :value="__('Credits')" />
    <x-text-input id="credits" name="credits" type="number" class="mt-1 block w-full"
                  :value="old('credits', $course->credits ?? '')" />
    <x-input-error :messages="$errors->get('credits')" class="mt-2" />
</div>