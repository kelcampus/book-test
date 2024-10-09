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
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-800">
                            <tr>
                                <th scope="col" class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    Código
                                </th>

                                <th scope="col" class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    Título
                                </th>

                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    Editora
                                </th>

                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    Edição
                                </th>

                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    Ano de Publicação
                                </th>

                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    Valor
                                </th>

                                <th scope="col" class="relative py-3.5 px-4">
                                    <span class="sr-only">Alterar</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                            @foreach ($books as $book)
                            <tr>
                                <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">{{ $book->Codl }}</td>
                                <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                    {{ $book->Titulo }}
                                </td>
                                <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">{{ $book->Editora }}</td>
                                <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">{{ $book->Edicao }}</td>
                                <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">{{ $book->AnoPublicacao }}</td>
                                <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">R$ {{ $book->Valor }}</td>
                                <td class="px-4 py-4 text-sm whitespace-nowrap">
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

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{ $books->links() }}
</section>
