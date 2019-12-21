<div class="col-12">
    <div class="not-found-wrap text-center">
        <p class="text-36 subheading mb-3">{{ __('Opa!') }}</p>
        <p class="mb-5 text-muted text-18">{{ __('Nenhum registro foi encontrado!!') }}</p>
        @isset($url)
            <a class="btn btn-lg btn-primary btn-rounded" href="{{ $url }}">{{ __('Cadastrar Novo') }}</a>
        @else
            <a class="btn btn-lg btn-primary btn-rounded" href="{{ route('admin.admin.index') }}">{{ __('Voltar para a pagina inicial') }}</a>
        @endisset
    </div>
</div>
