@extends('site.layouts.master')
@section('title')
    الطلبات
@endsection
@section('content')
    <section class="page-head">
        <div class="container">
            <ul class="breadcrumb">
                <li>
                    <a href="{{route('site.index')}}">الرئيسية</a>
                </li>
                <li class="active">الطلبات</li>
            </ul>
            <h4>الطلبات</h4>
        </div><!--End Container-->
    </section>
    <div class="page-content">
        <section class="section-md">
            <div class="container">
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
        </section>
    </div><!--End page-content-->
@endsection