@extends('layouts.admin.app')
@section('title', 'Create Project')
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

            <h6 class="mb-0 text-uppercase">Create New</h6>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <form id="FormData">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group mt-3">
                                            <label for="title">Title</label>
                                            <input type="text" value="{{ old('title') }}" placeholder="Enter Title"
                                                id="title" name="title" class="form-control">
                                            <span class="invalid-feedback"></span>
                                        </div>
                                        <div class="form-group mt-3">
                                            <label for="name">Name</label>
                                            <input type="text" placeholder="Enter name" id="name" name="name"
                                                class="form-control">
                                            <span class="invalid-feedback"></span>
                                        </div>
                                        <div class="form-group mt-3">
                                            <label for="clint">Clint</label>
                                            <input type="text" placeholder="Enter clint" id="clint" name="clint"
                                                class="form-control">
                                            <span class="invalid-feedback"></span>
                                        </div>
                                        <div class="form-group mt-3">
                                            <label for="technology">Technology</label>
                                            <input type="text" placeholder="Enter technology" id="technology"
                                                name="technology" class="form-control">
                                            <span class="invalid-feedback"></span>
                                        </div>
                                        <div class="form-group mt-3">
                                            <label for="link">Link</label>
                                            <input type="text" placeholder="Enter link" id="link" name="link"
                                                class="form-control">
                                            <span class="invalid-feedback"></span>
                                        </div>
                                        <div class="form-group mt-3">
                                            <label for="image">Image</label>
                                            <input type="file" placeholder="Enter image" id="image" name="image"
                                                class="form-control">
                                            <span class="invalid-feedback"></span>
                                        </div>
                                        <div class="form-group mt-3">
                                            <input type="button" id="addBtn" value="Create" class="btn btn-primary">
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
        $(document).ready(function() {
            // create
            $(document).on('click', '#addBtn', function(e) {
                e.preventDefault();
                utlt.asyncFalseRequest('post', 'admin/projects', '#FormData', null, 'admin/projects');
            });
        });
    </script>
@endsection
