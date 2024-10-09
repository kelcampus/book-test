@csrf

<div>
    <x-input-label for="Descricao" :value="__('Descrição')" />
    <x-text-input type="text" id="Descricao" name="Descricao" value="{{ old('Descricao', $subject->Descricao) }}" />
    <x-input-error class="mt-2" :messages="$errors->get('Descricao')" />
</div>
