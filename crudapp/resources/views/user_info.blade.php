<h3>{{$user->name}}</h3>
<h3>{{$current_dep->name}}</h3>
<a href="{{url('edit_user/' .$user->id)}}">Edit</a>
<h4>add a new role</h4>
 
<form action="{{url('assign_role/' .$user->id)}}" method="get">
    {!! csrf_field()!!}
  <label for="lname">List of roles:</label><br>
  <select id="role" name="role">
    @foreach ($listofroles as $role)
      <option value="{{$role->id}}">{{$role->id}}</option>
    @endforeach
  </select> <br><br>


  <input type="submit" value="Submit">
</form> 


<h3>list of user's roles</h3>
@foreach ($list as $item)
    @foreach ($names as $name)
    @if ($item->role_id == $name->id)
    <p>{{$name->value}}</p>
    <p>list of permission of the role</p>
        @foreach ($listofpermissions as $permission)
        @if ($permission->role_id == $item->role_id)
        <p>{{$permission->value}}</p>
            
        @endif
            
        @endforeach
    @endif
        
    @endforeach
@endforeach

