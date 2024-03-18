@extends('admin.layouts.master')
@section('title')
    بيانات الموقع
@endsection
@section('content')
    <div class="content">
        <div class="col-sm-12 page-heading">
            <div class="col-sm-6">
                <h2>الأعدادات العامة</h2>
            </div><!--End col-md-6-->
            <div class="col-sm-6">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.dashboard')}}">لوحة التحكم</a></li>
                    <li class="active">الأعدادات العامة</li>
                </ul>
            </div><!--End col-md-6-->
        </div>
        <div class="spacer-15"></div>
        <div class="widget">
            <form class="widget-content ajax-form" action="{{route('admin.settings')}}" method="post" enctype="multipart/form-data">

                <div class="alert alert-success hidden SuccessMessage" id=""></div>
                <div class="alert alert-danger hidden ErrorMessage" id=""></div>

                {!! csrf_field() !!}

                <div class="col-sm-6 form-group">
                    <label>إسم الموقع</label>
                    <input class="form-control" type="text" value="{{$settings->name}}" name="name">
                </div>
                <div class="col-sm-6 form-group">
                    <label>العنوان</label>
                    <input class="form-control" type="text" value="{{$settings->address}}" name="address">
                </div>
                <div class="col-sm-6 form-group">
                    <label>رقم الهاتف</label>
                    <input class="form-control" type="text" value="{{$settings->phone}}" name="phone">
                </div>
                <div class="col-sm-6 form-group">
                    <label>البريد الألكترونى</label>
                    <input class="form-control" type="email" value="{{$settings->email}}" name="email">
                </div>
                <div class="col-sm-6 form-group">
                    <label> رابط الموقع على الفيسبوك </label>
                    <input class="form-control" type="url" value="{{$settings->facebook}}" name="facebook">
                </div>
                <div class="col-sm-6 form-group">
                    <label>رابط الموقع على  تويتر</label>
                    <input class="form-control" type="url" name="twitter" value="{{$settings->twitter}}">
                </div>
                <div class="col-sm-6 form-group">
                    <label>رابط الموقع على يوتيوب</label>
                    <input class="form-control" type="url" name="youtube" value="{{$settings->youtube}}">
                </div>
                <div class="col-sm-6 form-group">
                    <label>اظهار الراس عند الاضافه</label>
                    <select class="form-control" name="head">
                        <option value="1" @if($settings->head == 1){{'selected'}}@endif>نعم</option>
                        <option value="0" @if($settings->head == 0){{'selected'}}@endif>لا</option>
                    </select>
                </div>
                <div class="col-sm-6 form-group">
                    <label>طريقه التغليف</label>
                    <select class="form-control" name="packing">
                        <option value="1" @if($settings->packing == 1){{'selected'}}@endif>نعم</option>
                        <option value="0" @if($settings->packing == 0){{'selected'}}@endif>لا</option>
                    </select>
                </div>
                <div class="col-sm-12 form-group">
                    <label>وصف مختصر للموقع</label>
                    <textarea class="form-control" name="brief">{{$settings->brief}}</textarea>
                </div>
                <div class="spacer-15"></div>
                <div class="progress">
                    <div class="bar"></div >
                    <div class="percent">0%</div >
                </div>
                <div class="col-sm-12 save-btn">
                    <button class="custom-btn green-bc" type="submit">حفظ التعديلات</button>
                </div>
            </form>
        </div>
    </div>
@endsection