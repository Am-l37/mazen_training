<!DOCTYPE html>
<html>
<body>

<h2>Add Role</h2>

<form action="{{url('store_role')}}" method="get">
    {!! csrf_field()!!}
  <label for="fname"> Value:</label><br>
  <input type="text" id="value" name="value" ><br>
  <label for="lname">Department:</label><br>
  <select id="department" name="department">
    @foreach ($departments as $department)
      <option value="{{$department->id}}">{{$department->name}}</option>
    @endforeach
  </select> <br><br>

  <input type="submit" value="Submit">
</form> 


</body>
</html>