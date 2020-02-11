@if($row->permissions)
    <ul class="list-group list-group-flash">
        <li class="list-group-item border-0">
            @foreach($row->permissions as $permission)
                @can('admin.permissions.edit')
                    <a href="{{ route('admin.permissions.edit', $permission->id) }}" class="badge badge-{{ get_tag_color() }} r-badge">{{ $permission->name }}</a>
                @endcan
                @cannot('admin.permissions.edit')
                    <span class="badge badge-{{ get_tag_color() }} r-badge">{{ $permission->name }}</span>
                @endcannot
            @endforeach
        </li>
    </ul>
@endif
