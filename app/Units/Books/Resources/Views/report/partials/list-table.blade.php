<section class="container px-4 mx-auto">
    <div class="sm:flex sm:items-center sm:justify-between">
        <h2 class="text-lg font-medium text-gray-800 dark:text-white">Autores - Visão Geral</h2>
    </div>

    <div class="flex flex-col mt-6">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-800">
                            <tr>
                                <th scope="col" class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    Cod. Autor
                                </th>

                                <th scope="col" class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    Nome
                                </th>

                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    Livros
                                </th>

                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    Qtd. Livros
                                </th>

                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    Assuntos
                                </th>

                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    Qtd. Assuntos
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                            @foreach ($authors as $author)
                            <tr>
                                <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 overflow-hidden text-ellipsis" style="max-width: 100px;">{{ $author->CodAu }}</td>
                                <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 overflow-hidden text-ellipsis" style="max-width: 150px;">{{ $author->Autor }}</td>
                                <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 overflow-hidden text-ellipsis" style="max-width: 200px;">{{ $author->Livros }}</td>
                                <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300">{{ $author->Qtd_Livros }}</td>
                                <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 overflow-hidden text-ellipsis" style="max-width: 200px;">{{ $author->Assuntos }}</td>
                                <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300">{{ $author->Qtd_Assuntos }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{ $authors->links() }}
</section>
