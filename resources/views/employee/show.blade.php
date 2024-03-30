
@extends('base.layout')
  
@section('content')
<div class="hold-transition sidebar-mini">
    <div class="wrapper">
        <div class="content-wrapper">
            <div class="content-header">
   <div class="container-fluid">
   
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Employee Details</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <strong><i class="fas fa-book mr-1"></i> Company Name</strong>

          <p class="text-muted">
           {{$show_data->company_name}}
          </p>

          <hr>

          <strong><i class="fas fa-book mr-1"></i> Employee First Name</strong>

          <p class="text-muted">
           {{$show_data->firstname}}
          </p>

          <hr>

          <strong><i class="fas fa-map-marker-alt mr-1"></i> Employee Last Name</strong>

          <p class="text-muted"> {{$show_data->lastname}}</p>

          <hr>
          <strong><i class="fas fa-map-marker-alt mr-1"></i> Employee Email</strong>

          <p class="text-muted"> {{$show_data->email}}</p>

          <hr>

          <strong><i class="fas fa-map-marker-alt mr-1"></i> Employee Phone</strong>

          <p class="text-muted"> {{$show_data->phone}}</p>
        </div>
        
      </div>
   
   </div>
  
    </div>
</div>
  </div>
</div>

@endsection