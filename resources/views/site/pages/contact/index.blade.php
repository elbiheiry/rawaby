@extends('site.layouts.master')
@section('title')
    تواصل معنا
@endsection
@section('content')
    <section class="page-head">
        <div class="container">
            <ul class="breadcrumb">
                <li>
                    <a href="{{route('site.index')}}">الرئيسية</a>
                </li>
                <li class="active">اتصل بنا</li>
            </ul>
            <h4>اتصل بنا</h4>
        </div><!--End Container-->
    </section>
    <div class="page-content">
        <section class="section-md contact-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="contact-head">
                            <h3 class="title title-bg title-lg-bg">ابق على تواصل معنا</h3>
                        </div><!--End contact-head-->
                        <div class="contact-cont">
                            <form class="ajax-form" method="post" action="{{route('site.contact')}}">
                                <div class="alert alert-success d-none SuccessMessage" id="" ></div>
                                <div class="alert alert-danger d-none ErrorMessage" id="" ></div>
                                {!! csrf_field() !!}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input class="form-control" name="name" placeholder="الاسم بالكامل" type="text">
                                        </div><!--End form-group-->
                                    </div><!--End col-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input class="form-control" name="phone" placeholder="رقم الجوال" type="text">
                                        </div><!--End form-group-->
                                    </div><!--End col-->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea class="form-control" name="message" placeholder="رسالتك" rows="5"></textarea>
                                        </div><!--End form-group-->
                                    </div><!--End col-->
                                </div><!--End row-->
                                <div class="form-group">
                                    <button class="custom-btn" type="submit">ارسل رسالة</button>
                                </div><!--End form-group-->
                            </form><!--End contact-form-->
                        </div><!--End contact-cont-->
                    </div><!--End col-->
                    <div class="col-lg-6">
                        <div class="map-wrap">
                            <div id="map"></div>
                        </div><!--End map-wrap-->

                    </div><!--End col-->

                </div><!--End row-->

            </div><!--End container-->
        </section>
    </div><!--End page-content-->
@endsection
@section('js')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDNXfGS2lFuuVhGUxAUKQJvhCKUd1Y9xmI&callback=initMap"></script>
    <script src="{{asset('assets/site/js/google.js')}}"></script>
@endsection