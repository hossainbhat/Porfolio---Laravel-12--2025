@php
    $html_tag_data = [];
    $title = 'Contact';
    $description = 'Contact for Md Hossain Bhat';
@endphp
@extends('layouts.them.app', ['html_tag_data' => $html_tag_data, 'title' => $title, 'description' => $description])
@section('content')

    <body class="contact">
        @include('layouts.them._layout.thems')
        <!-- Header Starts -->
        @include('layouts.them._layout.navbar')
        <!-- Header Ends -->
        <section class="title-section text-left text-sm-center revealator-slideup revealator-once revealator-delay1">
            <h1>get in <span>touch</span></h1>
            <span class="title-bg">contact</span>
        </section>
        <!-- Page Title Ends -->
         @php $user = App\Models\User::select('id','email','mobile','facebook','twitter','linkdin','github')->first(); @endphp
        <!-- Main Content Starts -->
        <section class="main-content revealator-slideup revealator-once revealator-delay1">
            <div class="container">
                <div class="row">
                    <!-- Left Side Starts -->
                    <div class="col-12 col-lg-4">
                        <h3 class="text-uppercase custom-title mb-0 ft-wt-600 pb-3">Don't be shy !</h3>
                        <p class="open-sans-font mb-3">Feel free to get in touch with me. I am always open to discussing new
                            projects, creative ideas or opportunities to be part of your visions.</p>
                        @if($user->email)
                        <p class="open-sans-font custom-span-contact position-relative">
                            <i class="fa fa-envelope-open position-absolute"></i>
                            <span class="d-block">mail me</span>{{$user->email}}
                        </p>
                         @endif 
                        @if($user->mobile)
                        <p class="open-sans-font custom-span-contact position-relative">
                            <i class="fa fa-phone-square position-absolute"></i>
                            <span class="d-block">call me</span>+88{{$user->mobile}}
                        </p>
                         @endif 
                        <ul class="social list-unstyled pt-1 mb-5">
                            @if($user->facebook)
                            <li class="facebook"><a title="Facebook" href="{{$user->facebook}}"><i class="fa fa-facebook"></i></a>
                            </li>
                            @endif 
                            @if($user->twitter)
                            <li class="twitter"><a title="Twitter" href="{{$user->twitter}}"><i class="fa fa-twitter"></i></a>
                            </li>
                             @endif 
                            @if($user->linkdin)
                            <li class="youtube"><a title="Youtube" href="{{$user->linkdin}}"><i class="fa fa-youtube"></i></a>
                            </li>
                             @endif 
                            @if($user->github)
                            <li class="dribbble"><a title="Dribbble" href="{{$user->github}}"><i class="fa fa-dribbble"></i></a>
                            </li>
                             @endif 
                        </ul>
                    </div>
                    <!-- Left Side Ends -->
                    <!-- Contact Form Starts -->
                    <div class="col-12 col-lg-8">
                        @if (session('success'))
                            <div class="alert alert-primary d-flex align-items-center" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img"
                                    aria-label="Info:">
                                    <use xlink:href="#info-fill" />
                                </svg>
                                <div>
                                    {{ session('success') }}
                                </div>
                            </div>
                        @endif

                        <form class="" method="post" action="{{ route('contact') }}">
                            @csrf
                            <div class="contactform">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <input type="text" name="name" placeholder="YOUR NAME">
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <input type="email" name="email" placeholder="YOUR EMAIL">
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <input type="text" name="subject" placeholder="YOUR SUBJECT">
                                    </div>
                                    <div class="col-12">
                                        <textarea name="message" placeholder="YOUR MESSAGE"></textarea>
                                        <button type="submit" class="button">
                                            <span class="button-text">Send Message</span>
                                            <span class="button-icon fa fa-send"></span>
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Contact Form Ends -->
                </div>
            </div>

        </section>

        <!-- Template JS Files -->
        @include('layouts.them._layout.script')

    </body>
@endsection
