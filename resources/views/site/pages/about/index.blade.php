@extends('site.layouts.master')
@section('title')
    من نحن
@endsection
@section('content')
    <section class="page-head">
        <div class="container">
            <ul class="breadcrumb">
                <li>
                    <a href="{{route('site.index')}}">الرئيسية</a>
                </li>
                <li class="active">من نحن</li>
            </ul>
            <h4>من نحن</h4>
        </div><!--End Container-->
    </section>
    <div class="page-content">
        <section class="section-md about-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="home-about-cont">
                            <h3 class="title title-bg title-lg-bg">{{$about->title}}</h3>
                            @foreach(explode("\n" , $about->description) as $description)
                                <p>{{$description}}</p>
                            @endforeach
                        </div><!--End home-about-cont-->
                    </div><!--End col-->
                    <div class="col-lg-5">
                        <div class="about-img">
                            <img src="{{asset('storage/uploads/about/'.$about->image)}}">
                        </div><!--End about-img-->
                    </div><!--End col-->
                </div><!--End row-->
            </div><!--End container	-->
        </section><!--End home-about-->
        <section class="feature-section">
            <div class="feature-section-wrap">
                <div class="container text-center">
                    <h3 class="title title-bg title-lg-bg">مميزات ذبائح القصيم</h3>
                    <div class="row">
                        @foreach($features as $feature)
                            <div class="col-md-4">
                                <div class="icon-box icon-side">
                                    <div class="icon-box-head">
                                        <img src="{{asset('storage/uploads/features/'.$feature->image)}}">
                                    </div><!--End icon-box-head-->
                                    <div class="icon-box-cont">
                                        <h3 class="title">{{$feature->name}}</h3>
                                        <p>{{$feature->description}}</p>
                                    </div><!--End icon-box-cont-->
                                </div><!--End icon-box-->
                            </div><!--End col-->
                        @endforeach
                    </div><!--End row-->
                </div><!--End container	-->
            </div><!--End feature-section-wrap-->
        </section><!--End about-->
        <section class="section-md testimonial">
            <div class="container text-center">
                <h3 class="title title title-bg title-lg-bg">اراء العملاء</h3>
                <div class="section-content">
                    <div id="testimonial-1" class="owl-carousel">
                        @foreach($testimonials as $testimonial)
                            <div class="testmonial-item">
                                <div class="testmonial-content">
                                    <p>{{$testimonial->description}}</p>
                                </div><!--End testmonial-content-->
                                <div class="testmonial-author">
                                    <div class="author-info">
                                        <h2 class="author-name">{{$testimonial->name}}</h2>
                                        <span class="author-place">{{$testimonial->location}}</span>
                                    </div>
                                </div><!--End testmonial-author-->
                            </div><!--End Testmonial-->
                        @endforeach
                    </div><!--End owl-carousel-->
                </div><!-- End Section-Content -->
            </div><!-- End container -->
        </section><!-- End Section -->

    </div><!--End page-content-->
@endsection