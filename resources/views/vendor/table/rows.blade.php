@if($render)
    @foreach($render as $td)
        <tr>{!! implode("",$td) !!}</tr>
    @endforeach
@endif