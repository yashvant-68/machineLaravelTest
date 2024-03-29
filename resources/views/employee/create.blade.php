
@extends('base.layout')
  
@section('content')
<div class="hold-transition sidebar-mini">
    <div class="wrapper">
        <div class="content-wrapper">
            <div class="content-header">
   <div class="container-fluid">
   <div class="row">
    <div class="col-md-12">
 
 <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Add Employee</h3>
    </div>
   
    <form action="{{route('employees.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
      <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="company_id">Company</label>
                    <select name="company_id" required class="form-control" id="company_id">
                        <option value="">Select Company</option>
                        @foreach($company_details as $val)
                            <option value="{{$val->id}}">{{$val->name}}</option>
                        @endforeach
                    </select>
                    @error('company_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            

            <div class="col-md-6">
                <div class="form-group">
                    <label for="employee_first_name">Employee First Name</label>
                    <input type="text" required  class="form-control" name="employee_first_name" id="employee_first_name" placeholder="Enter Employee Name">
                    @error('employee_first_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                  </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="employee_last_name">Employee Last Name</label>
                    <input type="text" required  class="form-control" name="employee_last_name" id="employee_last_name" placeholder="Enter Employee Last Name">
                    @error('employee_last_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                  </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="employee_email">Employee Email</label>
                    <input type="email" class="form-control" name="employee_email" id="employee_email" placeholder="Enter Employee Email">
                    @error('employee_email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                  </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="employee_phone">Employee Phone</label>
                    <input type="number" class="form-control" name="employee_phone" id="employee_phone" placeholder="Enter Employee Phone">
                    @error('employee_phone')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                  </div>
            </div>


        </div>
        
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
 

 
    </div>
   </div>

   
   </div>
  
    </div>
</div>
  </div>
</div>

@endsection