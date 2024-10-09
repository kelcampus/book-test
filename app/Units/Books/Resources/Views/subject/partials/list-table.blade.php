<section class="container px-4 mx-auto">
    <div class="sm:flex sm:items-center sm:justify-between">
        <h2 class="text-lg font-medium text-gray-800 dark:text-white">Listagem de Assuntos</h2>
        <div class="flex items-center mt-4 gap-x-3">
            <a href="{{ route('subjects.create') }}">
                <x-primary-button class="ms-3">
                    {{ __('Adicionar Assunto') }}
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
                                <x-table-th>Descrição</x-table-th>
                                <th scope="col"></th>
                            </tr>
                        </x-slot>
                        @foreach ($subjects as $subject)
                        <tr>
                            <x-table-td>{{ $subject->CodAs }}</x-table-td>
                            <x-table-td>{{ $subject->Descricao }}</x-table-td>
                            <x-table-td class="text-right">
                                <a href="{{ route('subjects.edit', ['subject' => $subject]) }}">
                                    <x-primary-button class="ms-3">
                                        {{ __('Editar') }}
                                    </x-primary-button>
                                </a>

                                <a onclick="event.preventDefault(); document.getElementById('delete-form-{{ $subject->CodAs }}').submit();">
                                    <x-danger-button class="ms-3">
                                        {{ __('Excluir') }}
                                    </x-danger-button>
                                </a>

                                <form id="delete-form-{{$subject->CodAs}}" action="{{ route('subjects.destroy', ['subject' => $subject]) }}" method="POST" class="hide">
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

    {{ $subjects->links() }}
</section>
