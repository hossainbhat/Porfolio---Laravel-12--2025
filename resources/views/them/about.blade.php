@php
    $html_tag_data = [];
    $title = 'About';
    $description = 'About Md Hossain Bhat';
@endphp
@extends('layouts.them.app', ['html_tag_data' => $html_tag_data, 'title' => $title, 'description' => $description])
@section('content')

    <body class="about">
        @include('layouts.them._layout.thems')
        <!-- Header Starts -->
        @include('layouts.them._layout.navbar')
        <!-- Header Ends -->
        <!-- Page Title Starts -->
        <section class="title-section text-left text-sm-center revealator-slideup revealator-once revealator-delay1">
            <h1>ABOUT <span>ME</span></h1>
            <span class="title-bg">Resume</span>
        </section>
        <!-- Page Title Ends -->
        @php $user = App\Models\User::first(); @endphp
        <!-- Main Content Starts -->
        <section class="main-content revealator-slideup revealator-once revealator-delay1">
            <div class="container">
                <div class="row">
                    <!-- Personal Info Starts -->
                    <div class="col-12 col-lg-5 col-xl-6">
                        <div class="row">
                            <div class="col-12">
                                <h3 class="text-uppercase custom-title mb-0 ft-wt-600">personal infos</h3>
                            </div>
                            <div class="col-12 d-block d-sm-none">
                                <img src="{{ asset('frontend/img/img-mobile.jpg') }}" class="img-fluid main-img-mobile"
                                    alt="my picture" />
                            </div>
                            <div class="col-6">
                                <ul class="about-list list-unstyled open-sans-font">
                                    @if ($user->name)
                                        <li> <span class="title">Full Name :</span> <span
                                                class="value d-block d-sm-inline-block d-lg-block d-xl-inline-block">{{ $user->name }}</span>
                                        </li>
                                    @endif
                                    @if ($user->age)
                                        <li> <span class="title">Age :</span> <span
                                                class="value d-block d-sm-inline-block d-lg-block d-xl-inline-block">{{ $user->age }}</span>
                                        </li>
                                    @endif
                                    @if ($user->nationality)
                                        <li> <span class="title">Nationality :</span> <span
                                                class="value d-block d-sm-inline-block d-lg-block d-xl-inline-block">{{ $user->nationality }}</span>
                                        </li>
                                    @endif
                                    @if ($user->freelance)
                                        <li> <span class="title">Freelance :</span> <span
                                                class="value d-block d-sm-inline-block d-lg-block d-xl-inline-block">{{ $user->freelance }}</span>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                            <div class="col-6">
                                <ul class="about-list list-unstyled open-sans-font">
                                    @if ($user->freelance)
                                        <li> <span class="title">Address :</span> <span
                                                class="value d-block d-sm-inline-block d-lg-block d-xl-inline-block">{{$user->address}}</span>
                                        </li>
                                    @endif
                                    @if ($user->freelance)
                                        <li> <span class="title">phone :</span> <span
                                                class="value d-block d-sm-inline-block d-lg-block d-xl-inline-block">+88{{$user->mobile}}</span>
                                        </li>
                                    @endif
                                    @if ($user->freelance)
                                        <li> <span class="title">Email :</span> <span
                                                class="value d-block d-sm-inline-block d-lg-block d-xl-inline-block">{{$user->email}}</span>
                                        </li>
                                    @endif
                                    @if ($user->freelance)
                                        <li> <span class="title">Team :</span> <span
                                                class="value d-block d-sm-inline-block d-lg-block d-xl-inline-block">{{$user->team}}</span> </li>
                                    @endif
                                    @if ($user->langages)
                                        <li> <span class="title">langages :</span> <span
                                                class="value d-block d-sm-inline-block d-lg-block d-xl-inline-block">{{$user->langages}}</span> </li>
                                    @endif
                                </ul>
                            </div>
                            @if($user->cv)
                            <div class="col-12 mt-3">
                                <a class="button" href="{{asset('uploads/cv/'.$user->cv)}}">
                                    <span class="button-text">Download CV</span>
                                    <span class="button-icon fa fa-download"></span>
                                </a>
                            </div>
                            @endif 
                        </div>
                    </div>
                    <!-- Personal Info Ends -->
                    <!-- Boxes Starts -->
                    <div class="col-12 col-lg-7 col-xl-6 mt-5 mt-lg-0">
                        <div class="row">
                            @if($user->years_of_experience)
                            <div class="col-6">
                                <div class="box-stats with-margin">
                                    <h3 class="poppins-font position-relative">{{$user->years_of_experience}}</h3>
                                    <p class="open-sans-font m-0 position-relative text-uppercase">years of <span
                                            class="d-block">experience</span></p>
                                </div>
                            </div>
                            @endif 
                            @if($user->complete_project)
                            <div class="col-6">
                                <div class="box-stats with-margin">
                                    <h3 class="poppins-font position-relative">{{$user->complete_project}}</h3>
                                    <p class="open-sans-font m-0 position-relative text-uppercase">completed <span
                                            class="d-block">projects</span></p>
                                </div>
                            </div>
                             @endif 
                            @if($user->happy_customer)
                            <div class="col-6">
                                <div class="box-stats">
                                    <h3 class="poppins-font position-relative">{{$user->happy_customer}}</h3>
                                    <p class="open-sans-font m-0 position-relative text-uppercase">Happy<span
                                            class="d-block">customers</span></p>
                                </div>
                            </div>
                             @endif 
                            @if($user->number_of_award)
                            <div class="col-6">
                                <div class="box-stats">
                                    <h3 class="poppins-font position-relative">{{$user->number_of_award}}</h3>
                                    <p class="open-sans-font m-0 position-relative text-uppercase">awards <span
                                            class="d-block">won</span></p>
                                </div>
                            </div>
                             @endif 
                        </div>
                    </div>
                    <!-- Boxes Ends -->
                </div>
                @php $skills = App\Models\Skill::where(['status'=>1])->get(); @endphp
                @if ($skills->count() > 0)
                    <hr class="separator">
                    <!-- Skills Starts -->

                    <div class="row">
                        <div class="col-12">
                            <h3
                                class="text-uppercase pb-4 pb-sm-5 mb-3 mb-sm-0 text-left text-sm-center custom-title ft-wt-600">
                                My Skills</h3>
                        </div>

                        @foreach ($skills as $skill)
                            <div class="col-6 col-md-3 mb-3 mb-sm-5">
                                <div class="c100 p{{ $skill->percentage }}">
                                    <span>{{ $skill->percentage }}%</span>
                                    <div class="slice">
                                        <div class="bar"></div>
                                        <div class="fill"></div>
                                    </div>
                                </div>
                                <h6 class="text-uppercase open-sans-font text-center mt-2 mt-sm-4">{{ $skill->title }}</h6>
                            </div>
                        @endforeach

                    </div>
                @endif
                <!-- Skills Ends -->
                <hr class="separator mt-1">
                <!-- Experience & Education Starts -->
                <div class="row">
                    <div class="col-12">
                        <h3 class="text-uppercase pb-5 mb-0 text-left text-sm-center custom-title ft-wt-600">Experience
                            <span>&</span> Education
                        </h3>
                    </div>
                    @php $experiencess = App\Models\Experience::where(['status'=>1])->get(); @endphp
                    @if ($experiencess->count() > 0)
                        <div class="col-lg-6 m-15px-tb">
                            <div class="resume-box">
                                <ul>
                                    @foreach ($experiencess as $experience)
                                        <li>
                                            <div class="icon">
                                                <i class="fa fa-briefcase"></i>
                                            </div>
                                            <span class="time open-sans-font text-uppercase">{{ $experience->year }}</span>
                                            <h5 class="poppins-font text-uppercase">{{ $experience->title }}</h5>
                                            <p class="open-sans-font">{{ $experience->description }}</p>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                    @php $educations = App\Models\Education::where(['status'=>1])->get(); @endphp
                    @if ($educations->count() > 0)
                        <div class="col-lg-6 m-15px-tb">
                            <div class="resume-box">
                                <ul>
                                    @foreach ($educations as $education)
                                        <li>
                                            <div class="icon">
                                                <i class="fa fa-graduation-cap"></i>
                                            </div>
                                            <span class="time open-sans-font text-uppercase">{{ $education->year }}</span>
                                            <h5 class="poppins-font text-uppercase">{{ $education->title }}</h5>
                                            <p class="open-sans-font">{{ $education->description }}</p>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                </div>
                <!-- Experience & Education Ends -->
            </div>
        </section>
        <!-- Main Content Ends -->

        <!-- Template JS Files -->
        @include('layouts.them._layout.script')

    </body>
@endsection
