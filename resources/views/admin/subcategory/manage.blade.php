@extends('admin.master')
@section('title')
    SubCategory Manage | {{env('APP_NAME')}}
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
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
                <h4 class="page-title">SubCategory Manage</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane show active" id="alt-pagination-preview">
                            <table id="alternative-page-datatable" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                <tr>
                                    <th>S.N</th>
                                    <th>Name</th>
                                    <th>Category Name</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($subcategories as $subcategory)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$subcategory->name}}</td>
                                        <td>{{$subcategory->category->category_name}}</td>
                                        <td>{{$subcategory->description}}</td>
                                        <td>
                                            <img src="{{asset($subcategory->image)}}" alt="" style="height: 80px">
                                        </td>
                                        <td>
                                            @if($subcategory->status == 1)
                                                <span class="badge badge-success-lighten">Active</span>
                                            @else
                                                <span class="badge badge-danger-lighten">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('subcategory.edit', ['id' => $subcategory->id,$subcategory->slug])}}" class="btn btn-success" title="Edit"><i class="uil-edit-alt"></i></a>
                                            <button type="button" onclick="confirmDelete({{$subcategory->id}});" class="btn btn-danger btn-sm" title="Delete">
                                                <i class="ri-chat-delete-fill"></i>
                                            </button>
                                            <form action="{{route('subcategory.delete', ['id' =>$subcategory->id,$subcategory->slug])}}" method="POST" id="BrandDeleteForm{{$subcategory->id}}">
                                                @csrf
                                            </form>
                                            <script>
                                                function confirmDelete(dataId) {
                                                    var confirmDelete = confirm('Are you sure you want to delete this?');
                                                    if (confirmDelete) {
                                                        document.getElementById('BrandDeleteForm' + dataId).submit();
                                                    } else {
                                                        return false;
                                                    }
                                                }
                                            </script>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div> <!-- end preview-->
                    </div> <!-- end tab-content-->

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div> <!-- end row-->
@endsection




