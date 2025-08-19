@php
    $html_tag_data = [];
    $title = 'Blog';
    $description = 'Blog for Md Hossain Bhat';
@endphp
@extends('layouts.them.app', ['html_tag_data' => $html_tag_data, 'title' => $title, 'description' => $description])
@section('content')

    <body class="blog">
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
                <!-- Articles Starts -->
                <div class="row">

                    @php $blogs = App\Models\Blog::where(['status'=>1])->paginate(6); @endphp
                    @if ($blogs->count() > 0)
                        <!-- Article Starts -->
                        @foreach ($blogs as $blog)
                            <div class="col-12 col-md-6 col-lg-6 col-xl-4 mb-30">
                                <article class="post-container">
                                    <div class="post-thumb">
                                        <a href="{{route('blog.show',$blog->slug)}}" class="d-block position-relative overflow-hidden">
                                            <img src="{{ asset('uploads/blog/'.$blog->image) }}" class="img-fluid"
                                                alt="{{$blog->title}}">
                                        </a>
                                    </div>
                                    <div class="post-content">
                                        <div class="entry-header">
                                            <h3><a href="{{route('blog.show',$blog->slug)}}">{{$blog->title}}</a>
                                            </h3>
                                        </div>
                                        <div class="entry-content open-sans-font">
                                            <p>{{$blog->description}}</p>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                        <!-- Article Ends -->
                    @endif


                    <!-- Article Ends -->
                    <!-- Pagination Starts -->
                    <div class="col-12 mt-4">
                        {{ $blogs->links('vendor.pagination.custom') }}
                    </div>
                    <!-- Pagination Ends -->
                </div>
                <!-- Articles Ends -->
            </div>

        </section>

        <!-- Template JS Files -->
        @include('layouts.them._layout.script')

    </body>
@endsection
