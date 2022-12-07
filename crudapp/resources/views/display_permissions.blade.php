<h2>List of Permissions</h2>
<a href="{{url('create_permission')}}">create permission</a>
<table>
    <tr><th>Value</th><th>Active</th><th>Action</th></tr>
    @foreach ($permissions as $permission)
    <tr><td>{{$permission->value}}</td><td>{{$permission->active}}</td><td><a href="{{url('edit_permission/' .$permission->id)}}">Edit</a><a href="">Roles</a>
        <form action="{{url('delete_permission/' .$permission->id)}}" method="post">
            {{method_field('DELETE')}}
            {{ csrf_field() }}
            <button type="submit" title="Delete permission">Delete</button>
        </form>    
    </td></tr>
    @endforeach
</table>
