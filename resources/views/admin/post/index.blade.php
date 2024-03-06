@extends('admin.master')
@section('title')
    Post Add | {{env('APP_NAME')}}
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
                <h4 class="page-title">Post Add </h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane show active" id="basic-form-preview">
                            <form action="{{route('post.new')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-md-2 col-form-label">Category Name</label>
                                    <div class="col-md-10">
                                        <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" onchange="getPostSubCategory(this.value)">
                                            <option disabled selected>--Select Category--</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}"  {{ old('category_id') == $category->id ? 'selected' : '' }}>{{$category->category_name}}</option>
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
                                        <select class="form-control @error('subcategory_id') is-invalid @enderror" name="subcategory_id" id="subCategoryId">
                                            <option disabled selected>--Select Sub Category--</option>
                                            @foreach($subcategories as $subcategory)
                                                <option value="{{$subcategory->id}}"  {{ old('subcategory_id') == $subcategory->id ? 'selected' : '' }}>{{$subcategory->name}}</option>
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
                                                <option value="{{$reporter->id}}" {{ old('reporter_id') == $reporter->id ? 'selected' : '' }}>{{$reporter->name}},{{$reporter->designation}}</option>
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
                                        <input type="text" class="form-control @error('title') is-invalid @enderror"  value="{{old('title')}}" name="title" id="inputEmail3" placeholder="Title"/>
                                        @error('title')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-md-2 col-form-label">Body</label>
                                    <div class="col-md-10">
                                        <textarea type="text" class="form-control @error('body') is-invalid @enderror" name="body" id="summernote" placeholder="Body">{{old('body')}}</textarea>
                                        @error('body')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-2 col-form-label">Image</label>
                                    <div class="col-md-10">
                                        <input type="file" id="imageInput" class="form-control @error('image') is-invalid @enderror" name="image" value=“{{ old('image') ? 'selected' : ''}}”/>
                                        @error('image')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-2 col-form-label">Image Caption</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control @error('image_caption') is-invalid @enderror" name="image_caption" value="{{ old('image_caption')}}" placeholder="Image Title"/>
                                        @error('image_caption')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-md-2 col-form-label">Slider News</label>
                                    <div class="col-md-10">
                                        {{--<input type="checkbox" id="switch2" name="status" @if($notice->status == 1) checked @endif data-switch="bool"/>--}}
                                        <input type="checkbox" id="switch2" value="1" class="form-control" name="slider_news" data-switch="bool"/>
                                        <label for="switch2" data-on-label="On" data-off-label="Off"></label>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-md-2 col-form-label">Status</label>
                                    <div class="col-md-10">
                                        {{--                                        <input type="checkbox" id="switch1" name="status" @if($notice->status == 1) checked @endif data-switch="bool"/>--}}
                                        <input type="checkbox" id="switch1" value="1" name="status" checked class="form-control" data-switch="bool"/>
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
        $('#summernote').summernote({
            tabsize: 2,
            height: 300
        });
    </script>
    <script>
        function getPostSubCategory(id)
        {
           $.ajax(
                {
                    method:"GET",
                    url:"{{route('get-sub-category-by-id')}}",
                    data:{id:id},
                    dataType:"JSON",
                    success:function (response) {

                        // console.log(response);
                        var subCategoryId =$('#subCategoryId');
                        subCategoryId.empty();

                        var option ='<option value="">--Select SubCategory--</option>';
                        option +='';
                        $.each(response,function (key,value) {
                            option +='<option value=" '+value.id+' ">'+value.name+' </option>';


                        });
                        subCategoryId.append(option);

                    }
                });
        }
    </script>

@endsection






