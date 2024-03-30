
@extends('base.layout')
  
@section('content')
<div class="hold-transition sidebar-mini">
    <div class="wrapper">
        <div class="content-wrapper">
            <div class="content-header">
   <div class="container-fluid">
   
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Company Details</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <strong><i class="fas fa-book mr-1"></i> Company Name</strong>

          <p class="text-muted">
           {{$show_data->name}}
          </p>

          <hr>

          <strong><i class="fas fa-map-marker-alt mr-1"></i> Company Email</strong>

          <p class="text-muted"> {{$show_data->email}}</p>

          <hr>
          <strong><i class="fas fa-map-marker-alt mr-1"></i> Company Website</strong>

          <p class="text-muted"> {{$show_data->website}}</p>

          <hr>

          <strong><i class="fas fa-map-marker-alt mr-1"></i> Company logo</strong>

          <p class="text-muted mt-3"> <img src="{{ asset('storage/'.$show_data->company_logo) }}" alt="Company Logo" style="min-width: 100px; max-width: 120px; min-height: 100px; max-height: 120px;"></p>
        </div>
        
      </div>
   
   </div>
  
    </div>
</div>
  </div>
</div>

@endsection