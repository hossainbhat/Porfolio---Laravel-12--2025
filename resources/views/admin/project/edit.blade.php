@extends('layouts.admin.app')
@section('title', 'Edit Project')
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
                            <li class="breadcrumb-item active" aria-current="page">Project</li>
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
                                            <input type="text" placeholder="Enter Title" value="{{$project->title}}" id="title" name="title"
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">name</label>
                                            <input type="text" placeholder="Enter name" id="name" name="name" value="{{$project->name}}"
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="clint">clint</label>
                                            <input type="text" placeholder="Enter clint" id="clint" name="clint" value="{{$project->clint}}"
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="technology">technology</label>
                                            <input type="text" placeholder="Enter technology" id="technology" name="technology" value="{{$project->technology}}"
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="link">link</label>
                                            <input type="text" placeholder="Enter link" id="link" name="link" value="{{$project->link}}"
                                                class="form-control">
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
            var id = {{ $project->id }};
            utlt.asyncFalseRequest('PUT', 'admin/projects/' + id, '#FormData', null, 'admin/projects');
        });
    </script>
@endsection
