<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Adicionar Autor') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Preencha as informações e clique em salvar.") }}
        </p>
    </header>

    <form method="post" action="{{ route('authors.store') }}" class="mt-6 space-y-6">
        @include('books::author.partials.author-form')

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Cadastrar Autor') }}</x-primary-button>

            <x-secondary-link-button href="{{ route('authors.index') }}">
                {{ __('Cancelar') }}
            </x-secondary-link-button>
        </div>
    </form>

</section>
