<!DOCTYPE html>
<html>
<body>

<h2>Update Role</h2>

<form action="{{url('update_role/'.$role->id)}}" method="post">
    {!! csrf_field()!!}
  <label for="fname">Role value:</label><br>
  <input type="text" id="value" name="value" value="{{$role->value}}"><br>
  
  <input type="submit" value="Update">
</form> 


</body>
</html>