@extends('base.login_layout')
  
@section('content')
<main class="login-form">
  <div class="container-fluid">
    <div class="login-form-content">
        <!-- left column -->
        <div class="">
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Administrator Login</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('login.post') }}" method="POST">
            @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Enter email" required autofocus>
              @if ($errors->has('email'))
              <span class="text-danger">{{ $errors->first('email') }}</span>
          @endif
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1" name="password" required placeholder="Password">
              @if ($errors->has('password'))
              <span class="text-danger">{{ $errors->first('password') }}</span>
          @endif
            </div>
            <div class="form-check">
              <input type="checkbox" name="remember" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Login</button>
          </div>
        </form>
      </div>
      <!-- /.card -->

        </div>
    </div>
      
  </div>
</main>
@endsection