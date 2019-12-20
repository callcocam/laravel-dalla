@if ($showLabel && $showField)
    @if ($options['wrapper'] !== false)
        <div {!! $options['wrapperAttrs'] !!} >
            @endif
            @endif

            @if ($showLabel && $options['label'] !== false && $options['label_show'])
                {!! Form::customLabel($name, $options['label'], $options['label_attr']) !!}
            @endif
            <div class="col-md-6 col-sm-6 ">
                @if ($showField)
                    @isset($options['choices'])
                        @foreach($options['choices'] as $key => $option)
                            <label class="checkbox checkbox-outline-success">
                                @if($options['multiple'])
                                    {{ Form::checkbox(sprintf("%s[]",$name), $key, $key === $options['value'], $options['attr']) }} <span>{{ __($option) }}</span><span class="checkmark"></span>
                                @else
                                    {{ Form::checkbox($name, $key, $key === $options['value'], $options['attr']) }} <span>{{ __($option) }}</span><span class="checkmark"></span>
                                @endif
                            </label>
                        @endforeach
                    @endif
                @endif

                @include('laravel-form-builder::errors')
            </div>
            @if ($showLabel && $showField)
                @if ($options['wrapper'] !== false)
        </div>
    @endif
@endif
