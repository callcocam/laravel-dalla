@inject('resources', 'App\Services\StageService')
<?php
$delivery_date = 0;
?>
@foreach ($resources->load() as $stage)
    <div class="ul-widget-s6__items ul-widget-card__position">
        <div class="ul-widget-card__item">
            <span class="ul-widget-s6__badge ul-widget-card__dot">
                @if($stage->input($rows))
                    <a href="{{ route('admin.inputs.edit',[
                    'ordem_servicos_etapas_entrada'=>$stage->inputGet('id'),
                    'stage'=>$stage->id,
                    'ordem_servico'=>$rows->id
                    ]) }}">
                        <p data-toggle="tooltip" class="badge-dot-{{ $stage->inputStatusClass() }} ul-widget6__dot ul-widget-card__dot-xl" title="{{ $stage->inputStatusMessage($rows) }}">
                            <i class="i-{{ $stage->inputStatusIcon() }} text-white"></i>
                        </p>
                    </a>
                    @else
                    <a href="{{ route('admin.inputs.create',[
                    'stage'=>$stage->id,
                    'stage_name'=>$stage->name,
                    'delivery'=>($delivery_date += $stage->alert_time),
                    'ordem_servico'=>$rows->id
                    ]) }}">
                        <p data-toggle="tooltip" class="badge-dot-primary ul-widget6__dot ul-widget-card__dot-xl" title="Iniciar etapa de {{ $stage->name }} para a ordem de serviço {{ str_pad($rows->codigo, 5, '0', STR_PAD_LEFT) }}">
                            <i class="i-Add text-white"></i>
                        </p>
                    </a>
                @endif
            </span>
            <div class="ul-widget-card__info-v2"><span class="t-font-boldest">{{ $stage->name }}</span>
                <span class="t-font-bold">{{ $stage->description }}
                    @if($stage->inputExist())
                     <p>
                        <b>{{ $stage->inputStatusMessage($rows) }}</b><br>
                        <b>Fornecedor:</b> {{$stage->inputGet('provider')->name }}<br>
                        <b>Responsavel:</b> {{$stage->inputGet('user')->name }}<br>
                        <b>Data:</b> {{ date_carbom_format($stage->inputGet('date'))->toLongDateString() }}<br>
                        <b>Data Prevista Para Entrega:</b> {{ date_carbom_format($stage->inputGet('expected_delivery_date'))->toLongDateString() }}<br>
                        <b>Número de peças:</b> {{ $stage->inputGet('number_of_pieces') }}<br>
                        <b>Número de peças danificadas:</b> {{ $stage->inputGet('number_of_damaged_pieces') }}<br>
                        <b>Valor Por Peça:</b> {{form_read( $stage->inputGet('piece_value')) }}<br>
                        <b>Valor Total:</b> {{Calcular(form_read( $stage->inputGet('piece_value')),Calcular(form_read( $stage->inputGet('number_of_pieces')),form_read( $stage->inputGet('number_of_damaged_pieces')), '-'), '*') }}<br>
                        {{ $stage->inputGet('description') }}<br>
                    </p>
                    @endif
                </span>
                Data prevista de entraga:<small class="text-mute">{{ date_carbom_format(today()->addDays($delivery_date)->format("Y-m-d"))->toLongDateString() }}</small>
            </div>
        </div>
    </div>
@endforeach
@push("scripts")
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@endpush