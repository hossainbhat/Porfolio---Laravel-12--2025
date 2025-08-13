@extends('layouts.admin.app')
@section('title', 'Create Skill')
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
                            <li class="breadcrumb-item active" aria-current="page">Skill</li>
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
                                            <input type="text" placeholder="Enter Title" value="{{$skill->title}}" id="title" name="title"
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="percentage">Percentage</label>
                                            <input type="number" value="{{$skill->percentage}}" placeholder="Enter Percentage" id="percentage"
                                                name="percentage" class="form-control">
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
            var id = {{ $skill->id }};
            utlt.asyncFalseRequest('PUT', 'admin/skills/' + id, '#FormData', null, 'admin/skills');
        });
    </script>
@endsection
