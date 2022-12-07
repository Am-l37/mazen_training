<!DOCTYPE html>
<html>
<body>

<h2>Add Permission</h2>

<form action="{{url('store_permission')}}" method="get">
    {!! csrf_field()!!}
  <label for="fname"> Value:</label><br>
  <input type="text" id="value" name="value" ><br>
  <label for="lname">Active:</label><br>
  <input type="text" id="active" name="active" ><br>
  <label for="lname">Role:</label><br>
  <select id="role" name="role">
    @foreach ($roles as $role)
      <option value="{{$role->id}}">{{$role->value}}</option>
    @endforeach
  </select> <br><br>

  <input type="submit" value="Submit">
</form> 


</body>
</html>