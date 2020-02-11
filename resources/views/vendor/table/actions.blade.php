
@isset($destroy)
    <btn-delete-component event="{{ sprintf("form-%s", $destroy['id']) }}">
        <form ref="form" action="{{ $destroy['name'] }}" method="POST">
            @csrf
            @method("DELETE")
        </form>
    </btn-delete-component>
@endisset
@isset($edit)
    <a class="btn btn-warning" href="{{ $edit['name'] }}"><i class="fa fa-edit"></i></a>
@endisset
@isset($show)
    <a class="btn btn-success" href="{{ $show['name'] }}"><i class="fa fa-eye"></i></a>
@endisset