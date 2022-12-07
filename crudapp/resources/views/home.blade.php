<h1>this is where i try stuff... don't mind meh</h1>
<!--display departments' details-->
@foreach ($departments as $department)
<h3>{{$department->name}}</h3>
    <p>{{$department->description}}</p>
@endforeach