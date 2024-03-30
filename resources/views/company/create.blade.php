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
                                        <h3 class="card-title">Add Company</h3>
                                    </div>

                                    <form action="{{ route('companies.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="company_name">Company Name</label>
                                                        <input type="text" required class="form-control"
                                                            name="company_name" id="company_name"
                                                            placeholder="Enter Company Name">
                                                        @error('company_name')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="company_email">Company Email</label>
                                                        <input type="email" class="form-control" name="company_email"
                                                            required id="company_email" placeholder="Enter Company Email">
                                                        @error('company_email')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="company_logo">Company Logo
                                                            (min_width=100,min_height=100)</label>
                                                        <input type="file" class="form-control" required accept="image/*"
                                                            name="company_logo" id="company_logo">
                                                        @error('company_logo')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="company_website">Company Website</label>
                                                        <input type="text" class="form-control" required
                                                            name="company_website" id="company_website"
                                                            placeholder="Enter Company Website">
                                                        @error('company_website')
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
