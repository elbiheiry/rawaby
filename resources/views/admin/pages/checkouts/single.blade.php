@extends('admin.layouts.master')
@section('title')
    تفاصيل الطلب
@endsection
@section('content')
    <div class="content">
        <div class="col-sm-12 page-heading">
            <div class="col-sm-6">
                <h2>تفاصيل الطلب</h2>
            </div><!--End col-md-6-->
            <div class="col-sm-6">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.dashboard')}}">لوحة التحكم</a></li>
                    <li class="active">تفاصيل الطلب</li>
                </ul>
            </div><!--End col-md-6-->
        </div>
        <div class="spacer-15"></div>
        <div class="widget">
            <div class="widget-content">
                <div class="col-md-6 form-group">
                    <label>الاسم</label>
                    <blockquote>{{$checkout->name}}</blockquote>
                </div>
                <div class="col-md-6 form-group">
                    <label>المدينه</label>
                    <blockquote>{{$checkout->city}}</blockquote>
                </div>
                <div class="col-md-6 form-group">
                    <label>رقم الجوال</label>
                    <blockquote>{{$checkout->phone}}</blockquote>
                </div>
                <div class="col-md-6 form-group">
                    <label>العنوان</label>
                    <blockquote>{{$checkout->address}}</blockquote>
                </div>
                <div class="col-md-6 form-group">
                    <label>طريقه الاستلام</label>
                    <blockquote>{{$checkout->receive}}</blockquote>
                </div>
                <div class="col-md-6 form-group">
                    <label>طريقه الدفع</label>
                    <blockquote>{{$checkout->payment}}</blockquote>
                </div>
                <div class="col-md-6 form-group">
                    <label>اجمالي المبلغ المطلوب</label>
                    <blockquote>{{$checkout->price}}</blockquote>
                </div>
            </div>
        </div>
        <div class="spacer-15"></div>
        <div class="widget">
            <div class="widget-content">
                <div class="spacer-15"></div>
                <div class="table-responsive">
            <table class="table table-bordered table-hover text-center">
                <thead>
                <tr >
                    <th class="text-center">#</th>
                    <th class="text-center">اسم المنتج</th>
                    <th class="text-center">الكمبه</th>
                    <th class="text-center">السعر</th>
                    <th class="text-center">الحجم المطلوب</th>
                    <th class="text-center">نوع الذبج</th>
                    <th class="text-center">طريقه التقطيع</th>
                    <th class="text-center">التغليف</th>
                    <th class="text-center">الراس</th>
                    <th class="text-center">مفروم</th>
                    <th class="text-center">عدد الكيلوات</th>
                    <th class="text-center">الملاحظات</th>
                    <th class="text-center">اجمالي السعر</th>
                </tr>
                </thead>
                <tbody>
                @foreach($checkout->orders as $index => $order)
                    <tr>
                        <td>{{$index+1}}</td>
                        <td>{{$order->name}}</td>
                        <td>{{$order->qty}}</td>
                        <td>{{$order->price}}</td>
                        <td>{{$order->kind}}</td>
                        <td>{{$order->type}}</td>
                        <td>{{$order->cutting}}</td>
                        <td>{{$order->packing}}</td>
                        <td>{{$order->head}}</td>
                        <td>{{$order->minced}}</td>
                        <td>{{$order->weight}}</td>
                        <td>{{$order->comments}}</td>
                        <td>{{$order->total}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
            </div>
        </div>
    </div>
@endsection