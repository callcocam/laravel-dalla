@if ($showLabel && $showField)
    @if ($options['wrapper'] !== false)
        <div {!! $options['wrapperAttrs'] !!} >
            @endif
            @endif

            @if ($showLabel && $options['label'] !== false && $options['label_show'])
                {!! Form::customLabel(__($name), __($options['label']), $options['label_attr']) !!}
            @endif
            <div class="col-md-6 col-sm-6 ">
                @if ($showField)
                    {!! Form::input($type, $name, $options['value'], array_merge([
                'placeholder'=>isset($options['label']) && !empty($options['label'])?$options['label']:$name
                ],$options['attr'])) !!}
                    @include('laravel-form-builder::errors')
                    @include('laravel-form-builder::help_block')
                @endif
            </div>
            @if ($showLabel && $showField)
                @if ($options['wrapper'] !== false)
        </div>
    @endif
@endif
