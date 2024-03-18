@extends('site.layouts.master')
@section('title')
    {{$product->name}}
@endsection
@section('content')
    <section class="page-head">
        <div class="container">
            <ul class="breadcrumb">
                <li>
                    <a href="{{route('site.index')}}">الرئيسية</a>
                </li>
                <li class="active">{{$product->name}}</li>
            </ul>
            <h4>{{$product->name}}</h4>
        </div><!--End Container-->
    </section>
    <div class="page-content">
        <section class="section-md order-detail">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="order-detail-img">
                            <img src="{{asset('storage/uploads/products/'.$product->image)}}">
                        </div><!--End order-detail-img-->
                    </div><!--End col-->
                    <div class="col-lg-6">
                        <div class="order-detail-desc">
                            <div class="order--title-price">
                                <h3 class="title">{{$product->name}}</h3>
                                <p class="price totalPrice">
                                    {{$product->categories()->get(['price'])->min('price')}}
                                    <span>ر.س</span>
                                </p>
                            </div><!--End order--title-price-->
                            
                        </div><!--End order-detail-desc-->
                    </div><!--End col-->

                </div><!--End row-->
                <div class="order-detil--app" id="order-detail--app">
                    <div class="order-app--head">
                        <h3>اطلب الان</h3>
                    </div><!--End order-app--head-->
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="order-app--form">
                                <form class="cart-form" action="{{route('site.cart.add',['slug' => $product->slug])}}" method="post">
                                    {!! csrf_field() !!}

                                    <div class="alert alert-success d-none SuccessMessage" id=""></div>
                                    <div class="alert alert-danger d-none ErrorMessage" id=""></div>

                                    <input type="hidden" name="price" id="ItemPrice">

                                    <div class="form-group">
                                        <label>الكمية *</label>
                                        <div class="count-number">
                                            <a href="#" class="number-up updatePrice" data-type="increase">
                                                <i class="fa fa-plus"></i>
                                            </a>
                                            <input value="1" class="form-control" name="qty" type="text" id="ItemQty">
                                            <a href="#" class="number-down updatePrice" data-type="decrease">
                                                <i class="fa fa-minus"></i>
                                            </a>
                                        </div><!--End count-number-->

                                    </div><!--End form-group-->
                                    <div class="form-group">
                                        <label>الحجم المطلوب *</label>
                                        @foreach($product->categories as $index => $category)
                                            <div class="radio-check-item hidden-check">
                                                <input name="kind" @if($index == 0){{'checked'}}@endif value="{{$category->name}}" data-value="{{$category->price}}" class="form-control ItemKind" id="kind{{$category->id}}" type="radio">
                                                <label for="kind{{$category->id}}">{{$category->name}}</label>
                                            </div><!-- End Radio-Check-Item -->
                                        @endforeach
                                    </div><!--End form-group-->

                                    <div class="form-group">
                                        <label>نوع الذبح *</label>
                                        <div class="radio-check-item">
                                            <input name="type" value="حي" class="form-control" id="live" type="radio">
                                            <label for="live">حى</label>
                                        </div><!-- End Radio-Check-Item -->
                                        <div class="radio-check-item">
                                            <input name="type" value="مذبوح" class="form-control" id="slaughtered" type="radio">
                                            <label for="slaughtered">مذبوح</label>
                                        </div><!-- End Radio-Check-Item -->
                                    </div><!--End form-group-->
                                    <div class="d-none" id="div1">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    @php
                                                        $cuttings = explode("," ,$product->cutting);
                                                    @endphp
                                                    <label>طريقة التقطيع</label>

                                                    <select class="form-control" name="cutting">
                                                        @foreach($cuttings as $cutting)
                                                            <option value="{{$cutting}}">{{$cutting}} </option>
                                                        @endforeach
                                                    </select>
                                                </div><!--End form-group-->
                                            </div><!--End col-md-5-->
                                        </div><!--End row-->
                                        @if($settings->packing == 1)
                                        <div class="form-group">
                                            <label>التغليف *</label>
                                            <div class="radio-check-item">
                                                <input name="packing" value="مغلف" class="form-control" id="yes-packing" type="radio">
                                                <label for="yes-packing">مغلف</label>
                                            </div><!-- End Radio-Check-Item -->
                                            <div class="radio-check-item">
                                                <input name="packing" value="بدون تغليف" class="form-control" id="no-packing" type="radio">
                                                <label for="no-packing"> بدون تغليف </label>
                                            </div><!-- End Radio-Check-Item -->
                                        </div><!--End form-group-->
                                        @endif
                                        <div class="form-group">
                                            <label>مفروم *</label>
                                            <div class="radio-check-item">
                                                <input name="minced" value="نعم" class="form-control minced" id="yes-minced" type="radio">
                                                <label for="yes-minced">نعم</label>
                                            </div><!-- End Radio-Check-Item -->
                                            <div class="radio-check-item">
                                                <input name="minced" value="لا" class="form-control minced" id="no-minced" type="radio">
                                                <label for="no-minced">لا</label>
                                            </div><!-- End Radio-Check-Item -->
                                        </div><!--End form-group-->
                                        <div class="form-group d-none weight">
                                            <label>كم كيلو ؟ *</label>
                                            <div class="radio-check-item">
                                                <input name="weight"  class="form-control" type="number">
                                            </div><!-- End Radio-Check-Item -->
                                        </div><!--End form-group-->
                                        @if($settings->head == 1)
                                            <div class="form-group">
                                                <label>الرأس *</label>
                                                <div class="radio-check-item">
                                                    <input name="head" value="مشلوط" class="form-control" id="paralyzed" type="radio">
                                                    <label for="paralyzed">مشلوط</label>
                                                </div><!-- End Radio-Check-Item -->
                                                <div class="radio-check-item">
                                                    <input name="head" value="مسلوخ" class="form-control" id="head-slaughtered" type="radio">
                                                    <label for="head-slaughtered">مسلوخ</label>
                                                </div><!-- End Radio-Check-Item -->
                                                <div class="radio-check-item">
                                                    <input name="head" value="بدون" class="form-control" id="no-head" type="radio">
                                                    <label for="no-head">بدون</label>
                                                </div><!-- End Radio-Check-Item -->
                                            </div><!--End form-group-->
                                        @endif
                                    </div><!--End div1-->
                                    <div class="form-group">
                                        <label>ملاحظات الطلب *</label>
                                        <textarea rows="5" class="form-control" name="comments"></textarea>
                                    </div><!--End form-group-->
                                    <div class="order-ap--submit">
                                        <button class="custom-btn" type="submit">
                                            <i class="fas fa-shopping-basket"></i>
                                            اضف الى السلة
                                        </button>
                                        <p>
                                            السعر الاجمالي
                                            <span class="totalPrice">{{$product->categories()->get(['price'])->min('price')}}</span>
                                            <span>ر.س</span>
                                        </p>
                                    </div><!--End form-group-->
                                </form>
                            </div><!--End order-app--form-->
                        </div><!--End col-->
                    </div><!--End row-->
                </div><!---End order-app--form-->
            </div><!--End container-->
        </section>
    </div><!--End page-content-->
@endsection

@section('js')
    <script type="text/javascript">
        $('.minced').on('click' ,function(){
            if($(this).val() == 'نعم'){
            $('.weight').removeClass('d-none');
        }else{
            $('.weight').addClass('d-none');
        }
        });
    </script>
@endsection