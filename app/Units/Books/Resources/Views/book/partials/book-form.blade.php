{{--
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}

@csrf

<div>
    <x-input-label for="Titulo" :value="__('Titulo')" />
    <x-text-input type="text" id="Titulo" name="Titulo" value="{{ old('Titulo', $book->Titulo) }}" />
    <x-input-error class="mt-2" :messages="$errors->get('Titulo')" />
</div>

<div>
    <x-input-label for="Editora" :value="__('Editora')" />
    <x-text-input type="text" id="Editora" name="Editora" value="{{ old('Editora', $book->Editora) }}" />
    <x-input-error class="mt-2" :messages="$errors->get('Editora')" />
</div>

<div>
    <x-input-label for="Edicao" :value="__('Edição')" />
    <x-text-input type="number" step="1" min="0" id="Edicao" name="Edicao" value="{{ old('Edicao', $book->Edicao) }}" oninput="this.value = this.value.replace(/[^0-9]/g, '')" />
    <x-input-error class="mt-2" :messages="$errors->get('Edicao')" />
</div>

<div>
    <x-input-label for="AnoPublicacao" :value="__('Ano Publicação')" />
    <x-text-input type="number" id="AnoPublicacao" name="AnoPublicacao" value="{{ old('AnoPublicacao', $book->AnoPublicacao) }}" oninput="this.value = this.value.replace(/[^0-9]/g, '')" placeholder="{{ \Carbon\Carbon::now()->year }}" />
    <x-input-error class="mt-2" :messages="$errors->get('AnoPublicacao')" />
</div>

<div>
    <x-input-label for="Valor" :value="__('Valor')" />
    <x-text-input type="number" step=".01" id="Valor" name="Valor" value="{{ old('Valor', $book->Valor) }}" placeholder="0" />
    <x-input-error class="mt-2" :messages="$errors->get('Valor')" />
</div>

<div>
    @php
        $bookAuthorsSelectedIds = old('author_ids', $book->authors()->pluck('CodAu')->toArray());
    @endphp

    <x-input-label for="author_ids" :value="__('Autores')" />
    <x-select-input multiple id="author_ids" name="author_ids[]">
        @foreach($authors as $author)
            <option value="{{ $author->CodAu }}" {{ in_array($author->CodAu, $bookAuthorsSelectedIds) ? 'selected' : '' }}>{{ $author->Nome }}</option>
        @endforeach
    </x-select-input>
    <x-input-error class="mt-2" :messages="$errors->get('author_ids')" />
</div>
<div>
    @php
        $bookSubjectSelectedIds = old('subject_ids', $book->subjects()->pluck('CodAs')->toArray());
    @endphp

    <x-input-label for="subject_ids" :value="__('Assuntos')" />
    <x-select-input multiple id="subject_ids" name="subject_ids[]">
        @foreach($subjects as $subject)
            <option value="{{ $subject->CodAs }}" {{ in_array($subject->CodAs, $bookSubjectSelectedIds) ? 'selected' : '' }}>{{ $subject->Descricao }}</option>
        @endforeach
    </x-select-input>
    <x-input-error class="mt-2" :messages="$errors->get('subject_ids')" />
</div>
