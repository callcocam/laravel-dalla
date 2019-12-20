<div class="col-12">
    <div class="not-found-wrap text-center">
        <p class="text-36 subheading mb-3">{{ __('Error!') }}</p>
        <p class="mb-5 text-muted text-18">{{ __('Sorry! The page you were looking for doesn\'t exist.') }}</p>
        @isset($url)
            <a class="btn btn-lg btn-primary btn-rounded" href="{{ $url }}">{{ __('Go to create') }}</a>
        @else
            <a class="btn btn-lg btn-primary btn-rounded" href="{{ route('admin.admin.index') }}">{{ __('Go back to dashboard') }}</a>
        @endisset
    </div>
</div>
