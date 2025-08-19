@extends('layouts.admin.app')
@section('title', 'Profile')
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
                            <li class="breadcrumb-item active" aria-current="page">Site Settings</li>
                        </ol>
                    </nav>
                </div>

            </div>
            <!--end breadcrumb-->

            <h6 class="mb-0 text-uppercase">Site Settings</h6>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">

                            <form id="settingForm">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-12 mt-3">
                                                <div class="form-group">
                                                    <label for="meta_title">Meta Title</label>
                                                    <input type="text" placeholder="Enter meta title" id="meta_title"
                                                        name="meta_title" class="form-control" value="">
                                                </div>
                                            </div>
                                            <div class="col-md-12 mt-3">
                                                <div class="form-group">
                                                    <label for="meta_description">Meta Description</label>
                                                    <textarea name="meta_description" id="meta_description" class="form-control" placeholder="Enter Meta Description"
                                                        cols="30" rows="3"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mt-3">
                                                <div class="form-group">
                                                    <label for="logo">Upload Logo</label>
                                                    <input type="file" id="logo" name="logo"
                                                        class="form-control">
                                                    <img class="mt-2" width="70" src="{{ asset('uploads/setting/') }}"
                                                        alt="">

                                                </div>
                                            </div>
                                            <div class="col-md-12 mt-3">
                                                <div class="form-group">
                                                    <label for="fav_icon">Upload Fav Icon</label>
                                                    <input type="file" id="fav_icon" name="fav_icon"
                                                        class="form-control">
                                                    <img class="mt-2" width="70" src="{{ asset('uploads/setting/') }}"
                                                        alt="">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group mt-2">
                                                    <button type="button" class="btn btn-primary"
                                                        id="updateBtn">Update</button>
                                                </div>
                                            </div>
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

@endsection
