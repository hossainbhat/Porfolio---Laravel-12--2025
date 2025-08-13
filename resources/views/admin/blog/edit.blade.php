@extends('layouts.admin.app')
@section('title', 'Edit Blog')
@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Tables</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Blog</li>
                        </ol>
                    </nav>
                </div>

            </div>
            <!--end breadcrumb-->

            <h6 class="mb-0 text-uppercase">Edit</h6>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <form id="FormData">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" placeholder="Enter Title" id="title" name="title" value="{{ $blog->title }}"
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="description">description</label>
                                            <textarea name="description" id="description" class="form-control" cols="30" rows="3">{{$blog->description}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="meta_title">meta_title</label>
                                            <input type="text" placeholder="Enter meta_title" id="meta_title" name="meta_title" value="{{ $blog->meta_title }}"
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="meta_description">meta_description</label>
                                            <textarea name="meta_description" id="meta_description" class="form-control" cols="30" rows="3">{{$blog->meta_description}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="image">image</label>
                                            <input type="file" placeholder="Enter image" id="image" name="image" 
                                                class="form-control">
                                        </div>

                                        <div class="form-group mt-3">
                                            <input type="button" id="updateBtn" value="Update" class="btn btn-primary">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
@section('page_script')
       <script type="text/javascript">
        $(document).on('click', '#updateBtn', function(e) {
            e.preventDefault();
            var id = {{ $blog->id }};
            utlt.asyncFalseRequest('PUT', 'admin/blogs/' + id, '#FormData', null, 'admin/blogs');
        });
    </script>
@endsection
