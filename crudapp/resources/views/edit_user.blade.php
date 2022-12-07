<!DOCTYPE html>
<html>
<body>

<h2>Update User</h2>

<form action="{{url('update_user/'.$user->id)}}" method="post">
    {!! csrf_field()!!}
  <label for="fname">User name:</label><br>
  <input type="text" id="name" name="name" value="{{$user->name}}"><br>
  <label for="lname">Department:</label><br>
  <select id="department" name="department">
    <option selected="{{$current_dep->name}}" value="{{$user->dep_id}}">{{$current_dep->name}}</option>
    @foreach ($departments as $department)
      <option value="{{$department->id}}">{{$department->name}}</option>
    @endforeach
  </select> <br><br>
  <input type="submit" value="Update">
</form> 


</body>
</html>