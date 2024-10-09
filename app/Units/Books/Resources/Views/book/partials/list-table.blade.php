<section class="container px-4 mx-auto">
    <div class="sm:flex sm:items-center sm:justify-between">
        <h2 class="text-lg font-medium text-gray-800 dark:text-white">Listagem de Livros</h2>
        <div class="flex items-center mt-4 gap-x-3">
            <a href="{{ route('books.create') }}">
                <x-primary-button class="ms-3">
                    {{ __('Adicionar Livro') }}
                </x-primary-button>
            </a>
        </div>
    </div>

    <div class="flex flex-col mt-6">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                    <x-table>
                        <x-slot name="header">
                            <tr>
                                <x-table-th>Código</x-table-th>
                                <x-table-th>Título</x-table-th>
                                <x-table-th>Editora</x-table-th>
                                <x-table-th>Edição</x-table-th>
                                <x-table-th>Ano de Publicação</x-table-th>
                                <x-table-th>Valor</x-table-th>
                                <th scope="col"></th>
                            </tr>
                        </x-slot>

                        @foreach ($books as $book)
                            <tr>
                                <x-table-td>{{ $book->Codl }}</x-table-td>
                                <x-table-td>{{ $book->Titulo }}</x-table-td>
                                <x-table-td>{{ $book->Editora }}</x-table-td>
                                <x-table-td>{{ $book->Edicao }}</x-table-td>
                                <x-table-td>{{ $book->AnoPublicacao }}</x-table-td>
                                <x-table-td>R$ {{ $book->Valor }}</x-table-td>
                                <x-table-td class="text-right">
                                    <a href="{{ route('books.edit', ['book' => $book]) }}">
                                        <x-primary-button class="ms-3">
                                            {{ __('Editar') }}
                                        </x-primary-button>
                                    </a>

                                    <a onclick="event.preventDefault(); document.getElementById('delete-form-{{ $book->Codl }}').submit();">
                                        <x-danger-button class="ms-3">
                                            {{ __('Excluir') }}
                                        </x-danger-button>
                                    </a>

                                    <form id="delete-form-{{$book->Codl}}" action="{{ route('books.destroy', ['book' => $book]) }}" method="POST" class="hide">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </x-table-td>
                            </tr>
                        @endforeach
                    </x-table>
                </div>
            </div>
        </div>
    </div>

    {{ $books->links() }}
</section>
