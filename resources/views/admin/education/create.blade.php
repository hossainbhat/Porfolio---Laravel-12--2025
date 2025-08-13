@extends('layouts.admin.app')
@section('title', 'Create Education')
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
                            <li class="breadcrumb-item active" aria-current="page">Education</li>
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
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" placeholder="Enter Title" id="title" name="title"
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="year">Year</label>
                                            <input type="text" placeholder="Enter year" id="year" name="year"
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="description">description</label>
                                            <textarea name="description" id="description" class="form-control" cols="30" rows="10"></textarea>
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
                utlt.asyncFalseRequest('post', 'admin/education', '#FormData', null, 'admin/education');
            });
        });
    </script>
@endsection
