<!DOCTYPE html>
<html>
<body>

<h2>Add user</h2>

<form action="{{url('store_user')}}" method="get">
    {!! csrf_field()!!}
  <label for="fname"> name:</label><br>
  <input type="text" id="name" name="name" ><br>
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