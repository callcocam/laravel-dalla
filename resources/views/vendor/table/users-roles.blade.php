@if($row->roles)
    <ul class="list-group list-group-flash">
        <li class="list-group-item border-0">
            @foreach($row->roles as $role)
                @can('admin.roles.edit')
                    <a href="{{ route('admin.roles.edit', $role->id) }}" class="badge badge-{{ get_tag_color() }} r-badge">{{ $role->name }}</a>
                @endcan
                @cannot('admin.roles.edit')
                    <span class="badge badge-{{ get_tag_color() }} r-badge">{{ $role->name }}</span>
                @endcannot

            @endforeach
        </li>
    </ul>
@endif