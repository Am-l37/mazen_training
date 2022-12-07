<!DOCTYPE html>
<html>
<body>

<h2>Update Permission</h2>

<form action="{{url('update_permission/'.$permission->id)}}" method="post">
    {!! csrf_field()!!}
  <label for="fname">Permission value:</label><br>
  <input type="text" id="value" name="value" value="{{$permission->value}}"><br>
  <label for="lname">Active:</label><br>
  
      
  <select id="active" name="active">
    <option selected='selected' value="0"> Not active</option>
    <option value="1"> Active</option>
  </select>
  <input type="submit" value="Update">
</form> 

    
</body>
</html>
