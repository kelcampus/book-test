<section class="container px-4 mx-auto">
    <div class="sm:flex sm:items-center sm:justify-between">
        <h2 class="text-lg font-medium text-gray-800 dark:text-white">Autores - Visão Geral</h2>
    </div>

    <div class="flex flex-col mt-6">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                    <x-table>
                        <x-slot name="header">
                            <tr>
                                <x-table-th>Cod. Autor</x-table-th>
                                <x-table-th>Nome</x-table-th>
                                <x-table-th>Livros</x-table-th>
                                <x-table-th>Qtd. Livros</x-table-th>
                                <x-table-th>Assuntos</x-table-th>
                                <x-table-th>Qtd. Assuntos</x-table-th>
                            </tr>
                        </x-slot>
                        @foreach ($authors as $author)
                        <tr>
                            <x-table-td style="max-width: 100px;">{{ $author->CodAu }}</x-table-td>
                            <x-table-td style="max-width: 150px;">{{ $author->Autor }}</x-table-td>
                            <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 overflow-hidden text-ellipsis" style="max-width: 200px;">{{ $author->Livros }}</td>
                            <x-table-td>{{ $author->Qtd_Livros }}</x-table-td>
                            <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 overflow-hidden text-ellipsis" style="max-width: 200px;">
                                {{ $author->Assuntos }}
                            </td>
                            <x-table-td>{{ $author->Qtd_Assuntos }}</x-table-td>
                        </tr>
                        @endforeach
                    </x-table>
                </div>
            </div>
        </div>
    </div>

    {{ $authors->links() }}
</section>
