@extends('../layouts.app') 
@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update an Employee</h1>

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
        <form method="POST" action="/employee/update/{{$employee->id}}">
            @method('PATCH') 
            @csrf
            <div class="form-group">

                <label for="first_name">First Name:</label>
                <input type="text" class="form-control" name="first_name" value={{ $employee->first_name }} />
            </div>

            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" class="form-control" name="last_name" value={{ $employee->last_name }} />
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control" name="email" value={{ $employee->email }} />
            </div>
            <div class="form-group">
                <label for="city">Phone:</label>
                <input type="text" class="form-control" name="phone" value={{ $employee->phone }} />
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
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
