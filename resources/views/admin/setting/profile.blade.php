@extends('layouts.admin.app')
@section('title', 'Profile')
@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="page-content">
                <!--breadcrumb-->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">User Profile</div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">{{ auth()->user()->name }}</li>
                            </ol>
                        </nav>
                    </div>

                </div>
                <!--end breadcrumb-->
                <div class="container">
                    <div class="main-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex flex-column align-items-center text-center">
                                            @if (auth()->user()->image)
                                                <img src="{{ asset('uploads/photo/' . auth()->user()->image) }}" alt="Admin"
                                                    class="rounded-circle p-1 bg-primary" width="110">
                                            @else
                                                <img src="assets/images/avatars/no-image.png" alt="Admin"
                                                    class="rounded-circle p-1 bg-primary" width="110">
                                            @endif
                                            <div class="mt-3">
                                                <h4>{{ auth()->user()->name }}</h4>
                                                <p class="text-secondary mb-1">{{ auth()->user()->email }}</p>
                                                <p class="text-muted font-size-sm">{{ auth()->user()->address }}</p>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <form id="updateProfileForm">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row mb-3">
                                                <div class="col-sm-4">
                                                    <h6 class="mb-0">Full Name</h6>
                                                </div>
                                                <div class="col-sm-8 text-secondary">
                                                    <input type="text" name="name" id="name" class="form-control"
                                                        value="{{ auth()->user()->name }}" placeholder="Your Name">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-4">
                                                    <h6 class="mb-0">Email</h6>
                                                </div>
                                                <div class="col-sm-8 text-secondary">
                                                    <input type="text" readonly class="form-control"
                                                        value="{{ auth()->user()->email }}">
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-sm-4">
                                                    <h6 class="mb-0">Mobile</h6>
                                                </div>
                                                <div class="col-sm-8 text-secondary">
                                                    <input type="text" name="mobile" id="mobile" class="form-control"
                                                        value="{{ auth()->user()->mobile }}" placeholder="Your Mobile">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-4">
                                                    <h6 class="mb-0">Address</h6>
                                                </div>
                                                <div class="col-sm-8 text-secondary">
                                                    <input type="text" name="address" id="address" class="form-control"
                                                        value="{{ auth()->user()->address }}" placeholder="Your Address">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-4">
                                                    <h6 class="mb-0">Photo</h6>
                                                </div>
                                                <div class="col-sm-8 text-secondary">
                                                    <input type="file" name="photo" id="photo" class="form-control"
                                                        onchange="previewImage(event)">
                                                    @if (auth()->user()->photo)
                                                        <img class="mt-2"
                                                            src="{{ asset('uploads/photo/' . auth()->user()->photo) }}"
                                                            alt="photo" style="max-width: 100px; max-height: 100px;" />
                                                    @endif
                                                    <div id="preview-container" style="margin-top: 15px;">
                                                        <img id="logo-preview"
                                                            src="{{ asset('uploads/photo/' . auth()->user()->photo) }}"
                                                            alt="Image Preview"
                                                            style="display: none; max-width: 100px; max-height: 100px;" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4"></div>
                                                <div class="col-sm-8 text-secondary">
                                                    <input type="button" id="updateProfileBtn" class="btn btn-primary px-4"
                                                        value="Update">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <form id="changePasswordForm">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row mb-3">
                                                <div class="col-sm-4">
                                                    <h6 class="mb-0">Current Password</h6>
                                                </div>
                                                <div class="col-sm-8 text-secondary">
                                                    <input type="password" name="current_pwd" id="current_pwd"
                                                        class="form-control" placeholder="*****">
                                                    <span id="chkPwd"></span>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-4">
                                                    <h6 class="mb-0">New Password</h6>
                                                </div>
                                                <div class="col-sm-8 text-secondary">
                                                    <input type="password" name="new_pwd" id="new_pwd"
                                                        class="form-control" placeholder="*****">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-4">
                                                    <h6 class="mb-0">Confirm New Password</h6>
                                                </div>
                                                <div class="col-sm-8 text-secondary">
                                                    <input type="password" name="confirm_pwd" id="confirm_pwd"
                                                        class="form-control" placeholder="*****">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-4"></div>
                                                <div class="col-sm-8 text-secondary">
                                                    <input type="button" id="updatePasswordBtn"
                                                        class="btn btn-primary px-4" value="Update">
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
    </div>

@endsection
@section('page_script')
    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('click', '#updateProfileBtn', function(e) {
                e.preventDefault();
                utlt.asyncFalseRequest('post', 'admin/profile', '#updateProfileForm', null,
                    'admin/profile');
            });

            $(document).on('click', '#updatePasswordBtn', function(e) {
                e.preventDefault();
                utlt.asyncFalseRequest('post', 'admin/update-pwd', '#changePasswordForm', null,
                    'admin/profile');
            });


        });

        $(document).ready(function() {
            $("#current_pwd").keyup(function() {
                var current_pwd = $("#current_pwd").val();

                $.ajax({
                    type: 'post',
                    url: '/admin/check-pwd',
                    data: {
                        current_pwd: current_pwd
                    },
                    success: function(resp) {
                        // alert(resp);
                        if (resp == "false") {
                            $("#chkPwd").html(
                                "<font color='red'>Current Password is Incorrect</font>");
                        } else if (resp == "true") {
                            $("#chkPwd").html(
                                "<font color='green'>Current Password is Correct</font>");
                        }
                    },
                    error: function() {
                        alert("Error");
                    }
                });
            });
        });
    </script>
    <script>
        function previewImage(event) {
            const preview = document.getElementById('logo-preview');
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };

                reader.readAsDataURL(file);
            } else {
                preview.style.display = 'none';
            }
        }
    </script>
@endsection
