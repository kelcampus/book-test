@csrf

<div>
    @php
        $bookAuthorsSelectedIds = old('author_ids', $book->authors()->pluck('CodAu')->toArray());
    @endphp

    <x-input-label for="author_ids" :value="__('Autores')" />
    <x-select-input multiple id="author_ids[]" name="author_ids[]">
        @foreach($authors as $author)
            <option value="{{ $author->CodAu }}" {{ in_array($author->id, $bookAuthorsSelectedIds) ? 'selected' : '' }} >{{ $author->Nome }}</option>
        @endforeach
    </x-select-input>
    <x-input-error class="mt-2" :messages="$errors->get('author_ids')" />
</div>

<div>
    <x-input-label for="Titulo" :value="__('Titulo')" />
    <x-text-input type="text" id="Titulo" name="Titulo"  value="{{ old('Titulo', $book->Titulo) }}" />
    <x-input-error class="mt-2" :messages="$errors->get('Titulo')" />
</div>

<div>
    <x-input-label for="Editora" :value="__('Editora')" />
    <x-text-input type="text" id="Editora" name="Editora"  value="{{ old('Editora', $book->Editora) }}" />
    <x-input-error class="mt-2" :messages="$errors->get('Editora')" />
</div>

<div>
    <x-input-label for="Edicao" :value="__('Edicao')" />
    <x-text-input type="number" step="1" min="0"  id="Edicao" name="Edicao"  value="{{ old('Edicao', $book->Edicao) }}" oninput="this.value = this.value.replace(/[^0-9]/g, '')"  />
    <x-input-error class="mt-2" :messages="$errors->get('Edicao')" />
</div>



<div>
    <x-input-label for="name" :value="__('Valor')" />
    <x-text-input type="number" step=".01"  id="valor" name="valor"  value="{{ old('Valor', $book->Valor) }}" placeholder="0" />
    <x-input-error class="mt-2" :messages="$errors->get('Valor')" />
</div>



