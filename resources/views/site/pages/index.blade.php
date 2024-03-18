@extends('site.layouts.master')
@section('title')
    الصفحه الرئيسيه
@endsection
@section('content')
    <div class="home-slider">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="home-slider--cont">
                        <h3 class="title">{{$sections[0]->title}}</h3>
                        <p>{{$sections[0]->description}}</p>
                    </div><!--End home-slider--cont-->
                </div><!--End col-->
                <div class="col-lg-6">
                    <div class="home-slider--img">
                        <img src="{{asset('storage/uploads/sections/'.$sections[0]->image)}}">
                    </div><!--End home-slider--img-->
                </div><!--End col-->

            </div><!--End row-->
        </div><!--End container-->
    </div><!--End home-slider-->
    <div class="page-content">
        <section class="section-md about-section home-about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="home-about-img">
                            <img src="{{asset('storage/uploads/sections/'.$sections[1]->image)}}">
                        </div><!--End home-about-img-->
                    </div><!--End col-->
                    <div class="col-lg-6">
                        <div class="home-about-cont">
                            <h3 class="title title-bg title-lg-bg">{{$sections[1]->title}}</h3>
                            @foreach(explode("\n" , $sections[1]->description) as $description)
                                <p>{{$description}}</p>
                            @endforeach
                        </div><!--End home-about-cont-->
                    </div><!--End col-->
                </div><!--End row-->
            </div><!--End container	-->
        </section><!--End home-about-->

        <section class="section-md home-order">
            <div class="container text-center">
                <h3 class="title title-bg title-lg-bg">طريقة الطلب</h3>
                <div class="row justify-content-center">
                    <div class="col col-lg-4 offset-lg-2">
                        <div class="icon-box">
                            <div class="icon-box-head">
                                <img src="{{asset('assets/site/images/icons/phone.png')}}">
                            </div><!--End icon-box-head-->
                            <div class="icon-box-cont">
                                <h3 class="title">الاتصال المباشر</h3>
                                <p>تواصل معنا مباشرة وابلغنا بطلبك على الرقم</p>
                                <h4>{{$settings->phone}}</h4>
                            </div><!--End icon-box-cont-->
                            <div class="icon-box-foot">
                                <a href="https://api.whatsapp.com/send?phone=966530883131" class="custom-btn" target="_blank">
                                    <i class="fab fa-whatsapp"></i>
                                    واتس اب
                                </a>
                                <a href="tel:0530883131" class="custom-btn border-btn">
                                    <i class="fab fa-whatsapp"></i>
                                    هاتف
                                </a>

                            </div><!--End icon-box-foot-->
                        </div><!--End icon-box-->

                    </div><!--End col-->
                    <div class="col col-lg-4">
                        <div class="icon-box">
                            <div class="icon-box-head">
                                <img src="{{asset('assets/site/images/icons/web.png')}}">
                            </div><!--End icon-box-head-->
                            <div class="icon-box-cont">
                                <h3 class="title">الطلب من الموقع الالكتروني </h3>
                                <p>اختر طلبك مباشرة مع امكانية تحديد
                                    التفاصيل الخاصة بالطلب وسيقوم احد مندوبينا بالتواصل معك مباشرة</p>
                            </div><!--End icon-box-cont-->
                            <div class="icon-box-foot">
                                <a href="" class="custom-btn">
                                    <i class="fab fa-whatsapp"></i>
                                    اطلب الان
                                </a>
                            </div><!--End icon-box-foot-->
                        </div><!--End icon-box-->

                    </div><!--End col-->
                </div><!--End row-->
            </div><!--End container-->
        </section>
        <section class="section-md home-products">
            <div class="container text-center">
                <h3 class="title title-bg title-lg-bg">الطلبات</h3>
                <div class="row">
                    @foreach($products as $product)
                        <div class="col-lg-3 col-md-6">
                            <div class="order-item">
                                <div class="order-item-head">
                                    <div class="order-head-img">
                                        <img src="{{asset('storage/uploads/products/'.$product->image)}}">
                                    </div><!--End order-head-img-->
                                    <div class="order-head-actions">
                                        <a href="javascript:;" data-url="{{route('site.cart.add',['slug' => $product->slug])}}" data-token="{!! csrf_token() !!}" class="CartBTN">
                                            <i class="fas fa-shopping-basket"></i>
                                        </a>
                                        <a href="{{route('site.orders.single' ,['slug' => $product->slug])}}">
                                            عرض التفاصيل
                                        </a>
                                    </div><!--End order-head-actions-->
                                </div><!--End order-item-head-->
                                <div class="order-item-cont">
                                    <h3 class="title">{{$product->name}}</h3>
                                    <p>يبدأ من {{$product->categories()->get(['price'])->min('price')}} ر.س</p>
                                </div><!--End order-item-cont-->
                            </div><!--End order-item-->
                        </div><!--End col-->
                    @endforeach
                </div><!--End row-->

            </div><!--End container-->
        </section><!--End home-products-->
    </div><!--End page-content-->
@endsection