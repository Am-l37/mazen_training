<h3>{{$department->name}}</h3>
<p>{{$department->description}}</p>

<a href="{{url('edit_department/' .$department->id)}}">Edit</a>




<table>
    <tr><th>List of users</th><th>Action</th></tr>
    @foreach ($users as $user)
        <tr>
           <td> {{$user->name}}</td>
           <td>
            <td><a href="{{url('edit_user/' .$user->id)}}">Edit</a><a href="{{url('user_info/'.$user->id)}}">Details</a>
                <form action="{{url('remove_user/' .$user->id)}}" method="get">
                    {{method_field('GET')}}
                    {{ csrf_field() }}
                    <button type="submit" title="remove user">Remove</button>
                </form>    
            </td>
           </td>
        </tr>
    @endforeach
</table>

<table>
    <tr><th>List of roles</th><th>Action</th></tr>
    
        @foreach ($listofroles as $role)
        <tr>
    <td>{{$role->value}}</td>
    <td> 
        <td><a href="{{url('edit_role/' .$role->id)}}">Edit</a><a href="{{url('role_info/'.$role->id)}}">Details</a>
            <form action="{{url('delete_role/' .$role->id)}}" method="post">
                {{method_field('DELETE')}}
                {{ csrf_field() }}
                <button type="submit" title="Delete role">Delete</button>
            </form>    
        </td>
    </td>
        </tr>
@endforeach
    
</table>

<!--displaying users and their assigned roles along with the list of permissions in the department-->

