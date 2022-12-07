<h2>List of Roles</h2>
<a href="{{url('create_role')}}">create Role</a>
<table>
    <tr><th>Name</th><th>Action</th></tr>
    @foreach ($roles as $role)
    <tr><td>{{$role->value}}</td><td><a href="{{url('edit_role/' .$role->id)}}">Edit</a><a href="{{url('role_info/' .$role->id)}}">Details</a>
        <form action="{{url('delete_role/' .$role->id)}}" method="post">
            {{method_field('DELETE')}}
            {{ csrf_field() }}
            <button type="submit" title="Delete role">Delete</button>
        </form>    
    </td></tr>
    @endforeach
</table>
