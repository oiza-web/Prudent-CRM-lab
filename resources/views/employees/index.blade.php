@extends('../layouts.app')

@section('content')
  <div class="container">
    <div class="card">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th></th>
            <th></th>
            <th><a class="btn btn-warning btn-sm" href="/employee/create" role="button">Create Employee</a></th>
          </tr>
        </thead>
        @foreach ($employees as $employee)
        <tr>
          <td> {{ $employee->first_name }} </td>
          <td> {{ $employee->last_name }} </td>
          <td> {{ $employee->email }} </td>
          <td> {{ $employee->phone }} </td>
          <td> <a class="btn btn-info btn-sm" href="/employee/show/{{$employee->id}}" role="button">View</a> </td>
          <td> <a class="btn btn-info btn-sm" href="/employee/edit/{{$employee->id}}" role="button">Edit</a> </td>
          <td> <form action="/employee/delete/{{$employee->id}}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm" type="submit">Delete</button>
          </form> </td>


        </tr>
        @endforeach
      </table>
    </div>
  </div>
@endsection