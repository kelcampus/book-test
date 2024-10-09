<section class="container px-4 mx-auto">
    <div class="sm:flex sm:items-center sm:justify-between">
        <h2 class="text-lg font-medium text-gray-800 dark:text-white">Listagem de Autores</h2>
        <div class="flex items-center mt-4 gap-x-3">
            <a href="{{ route('authors.create') }}">
                <x-primary-button class="ms-3">
                    {{ __('Adicionar Autor') }}
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
                                <x-table-th>Nome</x-table-th>
                                <th scope="col"></th>
                            </tr>
                        </x-slot>
                        @foreach ($authors as $author)
                        <tr>
                            <x-table-td>{{ $author->CodAu }}</x-table-td>
                            <x-table-td>{{ $author->Nome }}</x-table-td>
                            <x-table-td class="text-right">
                                <a href="{{ route('authors.edit', ['author' => $author]) }}">
                                    <x-primary-button class="ms-3">
                                        {{ __('Editar') }}
                                    </x-primary-button>
                                </a>

                                <a onclick="event.preventDefault(); document.getElementById('delete-form-{{ $author->CodAu }}').submit();">
                                    <x-danger-button class="ms-3">
                                        {{ __('Excluir') }}
                                    </x-danger-button>
                                </a>

                                <form id="delete-form-{{$author->CodAu}}" action="{{ route('authors.destroy', ['author' => $author]) }}" method="POST" class="hide">
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

    {{ $authors->links() }}
</section>
