<h2>List of Users</h2>
<a href="{{url('create_user')}}">create new user</a>
<table>
    <tr><th>Name</th><th>Department</th><th>blahblah</th>
    @foreach ($users as $user)
    <tr><td>{{$user->name}}</td><td>{{$user->dep_id}}</td><td><a href="{{url('edit_user/' .$user->id)}}">Edit</a><a href="{{url('user_info/' .$user->id)}}">Details</a>
        <form action="{{url('delete_user/' .$user->id)}}" method="post">
            {{method_field('DELETE')}}
            {{ csrf_field() }}
            <button type="submit" title="Delete user">Delete</button>
        </form>   
    </td></tr>
    @endforeach
</table>




