<!DOCTYPE html>
<html>
<body>

<h2>Add department</h2>

<form action="{{url('store_department')}}" method="get">
    {!! csrf_field()!!}
  <label for="fname">Department name:</label><br>
  <input type="text" id="name" name="name" ><br>
  <label for="lname">Description:</label><br>
  <input type="text" id="description" name="description" ><br><br>
  <input type="submit" value="Submit">
</form> 


</body>
</html>


