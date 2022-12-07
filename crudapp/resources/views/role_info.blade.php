<h3>list of permissions of this role, with delete option</h3>
<table>
    <tr><th>permission</th><th>actions</th></tr>
@foreach ($listofpermissions as $lp)
<tr>
    <td>    
@foreach ($permissions as $p)

@if ($p->id == $lp->permission_id)
    <p>{{$p->value}}</p>
    
@endif

@endforeach
</td>
<td><a href="{{url('edit_permission/' .$p->id)}}">Edit</a><a href="{{url('delete_permission/' .$p->id)}}">delete</a></td>
</tr>
@endforeach


</table>

<h3>list of users with this role, with remove option</h3>
<h3>Department</h3>
<h3>add permission a new permission</h3>
<form action="{{url('add_permission/' .$roleId)}}" method="get">
    {!! csrf_field()!!}
  <label for="fname"> Value:</label><br>
  <input type="text" id="value" name="value" ><br>
  <label for="lname">Statue</label><br>
  <select id="active" name="active">
    <option selected='selected' value="0"> Not active</option>
    <option value="1"> Active</option>
  </select>

  <input type="submit" value="Submit">
</form> 

