<h2>List of departments</h2>
<a href="{{url('create_department')}}">create department</a>
<table>
    <tr><th>Name</th><th>Description</th><th>Action</th></tr>
    @foreach ($departments as $department)
    <tr><td>{{$department->name}}</td><td>{{$department->description}}</td><td><a href="{{url('edit_department/' .$department->id)}}">Edit</a><a href="{{url('department_details/'.$department->id)}}">Details</a>
        <form action="{{url('delete_department/' .$department->id)}}" method="post">
            {{method_field('DELETE')}}
            {{ csrf_field() }}
            <button type="submit" title="Delete department">Delete</button>
        </form>    
    </td></tr>
    @endforeach
</table>


