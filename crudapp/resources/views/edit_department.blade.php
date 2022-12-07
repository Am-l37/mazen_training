<!DOCTYPE html>
<html>
<body>

<h2>Update department</h2>

<form action="{{url('update_department/'.$department->id)}}" method="post">
    {!! csrf_field()!!}
  <label for="fname">Department name:</label><br>
  <input type="text" id="name" name="name" value="{{$department->name}}"><br>
  <label for="lname">Description:</label><br>
  <input type="text" id="description" name="description" value="{{$department->description}}" ><br><br>
  <input type="submit" value="Update">
</form> 


</body>
</html>