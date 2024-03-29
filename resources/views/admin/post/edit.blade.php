@extends('admin.master')
@section('title')
    Post Edit | {{env('APP_NAME')}}
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
                <h4 class="page-title">Post Edit </h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane show active" id="basic-form-preview">
                            <form action="{{route('post.update',['id'=>$post->id,$post->slug])}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-md-2 col-form-label">Category Name</label>
                                    <div class="col-md-10">
                                        <select class="form-control @error('category_id') is-invalid @enderror" name="category_id">
                                            <option disabled selected>--Select Category--</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}" {{$category->id==$post->category_id ? 'selected' : ''}}>{{$category->category_name}}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                        <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-md-2 col-form-label">Sub Category Name</label>
                                    <div class="col-md-10">
                                        <select class="form-control @error('subcategory_id') is-invalid @enderror" name="subcategory_id">
                                            <option disabled selected>--Select Sub Category--</option>
                                            @foreach($subcategories as $subcategory)
                                                <option value="{{$subcategory->id}}" {{$subcategory->id == $post->subcategory_id ? 'selected' : ''}}>{{$subcategory->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('subcategory_id')
                                        <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-md-2 col-form-label">Reporter Name</label>
                                    <div class="col-md-10">
                                        <select class="form-control @error('reporter_id') is-invalid @enderror" name="reporter_id">
                                            <option disabled selected>--Select Reporter--</option>
                                            @foreach($reporters as $reporter)
                                                <option value="{{$reporter->id}}" {{$reporter->id ==$post->reporter_id ? 'selected' : ''}}>{{$reporter->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('reporter_id')
                                        <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-md-2 col-form-label">Title</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control @error('title') is-invalid @enderror"  value="{{$post->title}}" name="title"  placeholder="Title"/>
                                        @error('title')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-md-2 col-form-label">Body</label>
                                    <div class="col-md-10">
                                        <textarea type="text" class="form-control @error('body') is-invalid @enderror" name="body" id="summernote" placeholder="Body">{{old('body')}}{{$post->body}}</textarea>
                                        @error('body')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-2 col-form-label">Image</label>
                                    <div class="col-md-10">
                                        <input type="file" id="imageInput" class="form-control @error('image') is-invalid @enderror" name="image" value=“{{ old('image') ? 'selected' : ''}}”/>
                                        <img src="{{asset($post->image)}}" alt="" width="150" height="120">
                                        @error('image')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-2 col-form-label">Image Caption</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control @error('image_caption') is-invalid @enderror" name="image_caption" value="{{ $post->image_caption}}" placeholder="Image Title"/>
                                        @error('image_caption')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-md-2 col-form-label">Slider News</label>
                                    <div class="col-md-10">
                                        {{--<input type="checkbox" id="switch2" name="status" @if($notice->status == 1) checked @endif data-switch="bool"/>--}}
                                        <input type="checkbox" id="switch2" value="1" class="form-control" name="slider_news" @if($post->slider_news ==1) checked @endif  data-switch="bool"/>
                                        <label for="switch2" data-on-label="On" data-off-label="Off"></label>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-md-2 col-form-label">Status</label>
                                    <div class="col-md-10">
                                        {{--                                        <input type="checkbox" id="switch1" name="status" @if($notice->status == 1) checked @endif data-switch="bool"/>--}}
                                        <input type="checkbox" id="switch1" value="1" name="status"  @if($post->status ==1) checked @endif class="form-control" data-switch="bool"/>
                                        <label for="switch1" data-on-label="On" data-off-label="Off"></label>
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
    <script>
        function previewImage(event) {
            var input = event.target;
            var reader = new FileReader();

            reader.onload = function(){
                var imagePreview = document.getElementById('imagePreview');
                imagePreview.src = reader.result;
                imagePreview.style.display = 'block';
            };

            reader.readAsDataURL(input.files[0]);
        }

        var imageInput = document.getElementById('imageInput');
        imageInput.addEventListener('change', previewImage);
    </script>
    <script>
        $('#summernote').summernote({
            tabsize: 2,
            height: 300
        });
    </script>
@endsection






