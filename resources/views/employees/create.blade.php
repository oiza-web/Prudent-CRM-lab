@extends('../layouts.app')

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
<br /> 
@endif
<div class="container">
  <form action="/employee/store" method="POST">
    <div class="form-group">
      <label for="employee-first-name">First Name:</label>
      <input type="text" name="first_name" class="form-control" placeholder="Enter first name">
      {{-- <small id="emailHelp" class="form-text text-muted"> --}}
    <div class="form-group">
      <label for="employee-last-name">Last name:</label>
      <input type="text" class="form-control" name="last_name" placeholder="Enter last name">
      {{-- <small id="emailHelp" class="form-text text-muted"></small> --}}
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Email address:</label>
      <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
      <small id="emailHelp" class="form-text text-muted"></small>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Phone number:</label>
      <input type="text" name="phone" class="form-control" placeholder="Enter phone number">
      <small id="emailHelp" class="form-text text-muted"></small>
    </div>
    <div class="form-group">
      <label for="Company">Company:</label>
      <select class="form-control" name="company_id">
        @foreach($companies as $company)
          <option value="{{$company->id}}">{{$company->name}} </option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="Created By">Created By:</label>
      <select class="form-control" name="user_id">
        @foreach($users as $user)
          <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
      </select>
    </div> 
    <button type="submit" class="btn btn-primary">Submit</button>
    @csrf
  </form>
</div>


@endsection

