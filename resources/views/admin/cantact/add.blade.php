@extends('admin.master')
@section('title')
    Contact US| {{env('APP_NAME')}}
@endsection

@section('body')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <form class="d-flex">
                        <div class="input-group">
                            <input type="text" class="form-control form-control-light" id="dash-daterange">
                            <span class="input-group-text bg-primary border-primary text-white">
                                                    <i class="mdi mdi-calendar-range font-13"></i>
                                                </span>
                        </div>
                        <a href="javascript: void(0);" class="btn btn-primary ms-2">
                            <i class="mdi mdi-autorenew"></i>
                        </a>
                        <a href="javascript: void(0);" class="btn btn-primary ms-1">
                            <i class="mdi mdi-filter-variant"></i>
                        </a>
                    </form>
                </div>
                <h4 class="page-title">Contact Page</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane show active" id="basic-form-preview">
                            @if(isset($cantact))
                                <form action="{{route('cantact.update',['id'=>$cantact->id])}}" method="POST" enctype="multipart/form-data">
                                    @else
                                        <form action="{{route('cantact.new')}}" method="POST" enctype="multipart/form-data">
                                            @endif
                                            @csrf
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-md-2 col-form-label">Phone Number</label>
                                    <div class="col-md-10">
                                        <input type="number" name="phone" value="{{old('phone', $cantact->phone ?? '') }}" class="form-control @error('phone') is-invalid @enderror" aria-describedby="emailHelp" placeholder="Enter Phone Number">
                                        @error('privacy')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-md-2 col-form-label">Mobile Number</label>
                                    <div class="col-md-10">
                                        <input type="number"  name="mobile" value="{{old('mobile', $cantact->mobile ?? '') }}" class="form-control @error('mobile') is-invalid @enderror" aria-describedby="emailHelp" placeholder="Enter Phone Number">
                                        @error('mobile')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-md-2 col-form-label">Email</label>
                                    <div class="col-md-10">
                                        <input type="email"  name="email" value="{{old('email', $cantact->email ?? '') }}" class="form-control @error('email') is-invalid @enderror" aria-describedby="emailHelp" placeholder="Enter Email">
                                        @error('mobile')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-md-2 col-form-label">Address</label>
                                    <div class="col-md-10">
                                        <input type="text"  name="address" value="{{old('address', $cantact->address ?? '') }}" class="form-control @error('address') is-invalid @enderror" aria-describedby="emailHelp" placeholder="Enter Address">
                                        @error('address')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-md-2 col-form-label"></label>
                                    <div class="col-md-10">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div> <!-- end preview-->
                    </div> <!-- end tab-content-->

                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->



@endsection




