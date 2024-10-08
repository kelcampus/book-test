<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Editar Livro') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Preencha as informações e clique em salvar.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('books.update', ['book' => $book]) }}" class="mt-6 space-y-6">
        @include('books::book.partials.book-form')
        @method('patch')

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Alterar Despesa') }}</x-primary-button>

            <x-secondary-link-button href="{{ route('books.index') }}">
                {{ __('Cancelar') }}
            </x-secondary-link-button>
        </div>
    </form>
</section>
