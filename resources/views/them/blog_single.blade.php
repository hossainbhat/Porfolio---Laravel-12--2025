@php
    $html_tag_data = [];
    $title = 'Blog Details';
    $description= 'Blog Details for Md Hossain Bhat'
@endphp
@extends('layouts.them.app',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])
@section('content')
<body class="blog-post">
    @include('layouts.them._layout.thems')
    <!-- Header Starts -->
    @include('layouts.them._layout.navbar')
    <!-- Header Ends -->
    <section class="title-section text-left text-sm-center revealator-slideup revealator-once revealator-delay1">
        <h1>my <span>blog</span></h1>
        <span class="title-bg">posts</span>
    </section>
    <!-- Page Title Ends -->
    <!-- Main Content Starts -->
    <section class="main-content revealator-slideup revealator-once revealator-delay1">
        <div class="container">
            <div class="row">
                <!-- Article Starts -->
                <article class="col-12">
                    <!-- Meta Starts -->
                    <div class="meta open-sans-font">
                        @if($blog->user->name)
                        <span><i class="fa fa-user"></i> {{$blog->user->name}}</span>
                        @endif 
                        @if($blog->created_at)
                        <span class="date"><i class="fa fa-calendar"></i> {{ \Carbon\Carbon::parse($blog->created_at)->format('d-M-Y') }}</span>
                         @endif 
                        
                    </div>
                    <!-- Meta Ends -->
                    <!-- Article Content Starts -->
                    <h1 class="text-uppercase text-capitalize">{{$blog->title}}</h1>
                    @if($blog->image)
                    <img src="{{asset('uploads/blog/'.$blog->image)}}" class="img-fluid" alt="{{$blog->title}}"/>
                    @endif 
                    <div class="blog-excerpt open-sans-font pb-5">
                        {!! $blog->description!!}
                    </div>
                    <!-- Article Content Ends -->
                </article>
                <!-- Article Ends -->
            </div>
        </div>
    </section>
    
    <!-- Template JS Files -->
    @include('layouts.them._layout.script')
    
    </body>

@endsection