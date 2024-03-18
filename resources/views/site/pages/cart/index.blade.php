@extends('site.layouts.master')
@section('title')
    عربه الشراء
@endsection
@section('content')
    <section class="page-head">
        <div class="container">
            <ul class="breadcrumb">
                <li>
                    <a href="{{route('site.index')}}">الرئيسية</a>
                </li>
                <li class="active">عربه الشراء</li>
            </ul>
            <h4>عربه الشراء</h4>
        </div><!--End Container-->
    </section>
    <div class="page-content">
        <section class="section-md cart-page">
            <div class="container" id="cart-view">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="box-wrap brdr-rd-3">
                            <table class="table-cart">
                                <thead>
                                <tr>
                                    <th class="product-thumbnail">المنتج</th>
                                    <th class="product-name">النوع</th>
                                    <th class="product-desc">التفاصيل</th>
                                    <th class="product-price">السعر</th>
                                    <th class="product-quantity">الكمية</th>
                                    <th class="product-subtotal">الاجمالى</th>
                                    <th class="product-remove">مسح </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr class="cart-item-row" id="item-{{$product->id}}" data-item-id="{{$product->id}}">
                                        <td class="product-thumbnail">
                                            <a href="{{route('site.orders.single',['slug' => str_slug($product->name)])}}">
                                                <img src="{{asset('storage/uploads/products/'.$product->options['image'])}}">
                                            </a>
                                        </td>
                                        <td class="product-name">
                                            <a href="{{route('site.orders.single',['slug' => str_slug($product->name)])}}">{{$product->name}} </a>
                                        </td>
                                        <td class="product-desc">
                                            <a href="" data-toggle="modal" data-target="#cart-modal{{$product->id}}">مشاهدة التفاصيل</a>
                                        </td>
                                        <td class="product-price">
                                            {{$product->price}} ر.س
                                        </td>
                                        <td class="product-quantity">
                                            <div class="count-number count-sm">
                                                <a href="{{route('site.cart.update',['rowId' => $product->rowId])}}" class="number-up cart-amount-btn" data-type="increase">
                                                    <i class="fa fa-plus"></i>
                                                </a>
                                                <input value="{{$product->qty}}" class="form-control cart-amount-input" min="1" name="qty" type="text">
                                                <a href="{{route('site.cart.update',['rowId' => $product->rowId])}}" class="number-down cart-amount-btn" data-type="decrease">
                                                    <i class="fa fa-minus"></i>
                                                </a>
                                            </div><!--End count-number-->
                                        </td>
                                        <td class="product-subtotal cart-item-total">
                                            {{$product->price * $product->qty}} ر.س
                                        </td>
                                        <td class="product-remove">
                                            <a href="{{route('site.cart.remove' ,['id' => $product->rowId])}}">
                                                <i class="far fa-times-circle"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div><!--End Cart-content-->
                    </div><!--End Col-md-9-->
                    <div class="col-lg-3">
                        <div class="total-widget">
                            <div class="total-widget-head">
                                <h3 class="title">اجمالي المشتريات</h3>
                            </div><!-- Total-Widget-Head -->
                            <div class="total-widget-content">
                                <div class="total-price">
                                    <p>
                                        <span>اجمالي السعر:</span>
                                        <span id="cartTotal">{{\Cart::subtotal()}} ر.س</span>
                                    </p>
                                    
                                </div><!-- End Total-Widget-Price -->
                                <div class="total-price grand-total">
                                    <p>
                                        <span>المبلغ المطلوب:</span>
                                        <span id="totalPrice">{{\Cart::total()}} ر.س</span>
                                    </p>
                                </div><!-- End Grand-Total -->
                            </div><!-- End Total-Content -->
                            <div class="total-widget-footer">
                                <a href="{{route('site.checkout')}}" class="custom-btn">متابعة للدفع</a>
                            </div><!-- End Total-Widget-Footer -->
                        </div><!-- End Total -->
                    </div><!--End Col-md-8-->
                </div><!--End Row-->
            </div><!--End container-fluid-->

        </section>

    </div><!--End page-content-->
    @foreach($products as $product)
        <div class="modal fade" id="cart-modal{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="cart-modalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <table class="table">
                            <tbody>
                            <tr>
                                <td>
                                    <p>النوع</p>
                                </td>
                                <td>
                                    <p>{{$product->options['kind']}}</p>
                                </td>
                                <td>
                                    <p>نوع الذبح</p>
                                </td>
                                <td>
                                    <p>{{$product->options['type']}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>التقطيع</p>
                                </td>
                                <td>
                                    <p>{{$product->options['cutting']}}</p>
                                </td>
                                <td>
                                    <p>التغليف</p>
                                </td>
                                <td>
                                    <p>{{$product->options['packing']}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>الرأس</p>
                                </td>
                                <td colspan="3">
                                    <p>{{$product->options['head']}}</p>
                                </td>

                            </tr>
                            <tr>
                                <td>
                                    <p>ملاحظات</p>
                                </td>
                                <td colspan="3">
                                    <p>{{$product->options['comments']}} </p>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div><!--End modal-body-->
                </div><!--End modal-content-->
            </div><!--End modal-dialog-->
        </div><!--End modal-->
    @endforeach
@endsection