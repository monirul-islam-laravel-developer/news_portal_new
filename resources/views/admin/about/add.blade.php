@extends('admin.master')
@section('title')
    About Page| {{env('APP_NAME')}}
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
                <h4 class="page-title">About page</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane show active" id="basic-form-preview">
                            @if(isset($aboutus))
                            <form action="{{route('about.update',['id'=>$aboutus->id])}}" method="POST" enctype="multipart/form-data">
                                @else
                                    <form action="{{route('about.new')}}" method="POST" enctype="multipart/form-data">
                                        @endif
                                @csrf
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-md-2 col-form-label">About Us</label>
                                    <div class="col-md-10">
                                        <textarea type="text" id="summernote" name="about_us" class="form-control @error('about_us') is-invalid @enderror" aria-describedby="emailHelp" placeholder="About Us">{{old('about_us', $aboutus->about_us ?? '') }}</textarea>
                                        @error('about_us')
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
    <script>
        $('#summernote').summernote({
            tabsize: 2,
            height: 300
        });
        $('#summernote2').summernote({
            tabsize: 2,
            height: 300
        });
    </script>
    <!-- end row -->



@endsection




