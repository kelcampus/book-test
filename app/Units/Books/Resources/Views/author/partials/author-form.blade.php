@csrf

<div>
    <x-input-label for="Nome" :value="__('Nome')" />
    <x-text-input type="text" id="Nome" name="Nome" value="{{ old('Nome', $author->Nome) }}" />
    <x-input-error class="mt-2" :messages="$errors->get('Nome')" />
</div>
