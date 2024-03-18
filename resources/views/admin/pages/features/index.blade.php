@extends('admin.layouts.master')
@section('title')
    المميزات
@endsection
@section('content')
    <div class="content">
        <div class="col-sm-12 page-heading">
            <div class="col-sm-6">
                <h2>المميزات</h2>
            </div><!--End col-md-6-->
            <div class="col-sm-6">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.dashboard')}}">لوحة التحكم</a></li>
                    <li class="active">المميزات</li>
                </ul>
            </div><!--End col-md-6-->
        </div>
        <div class="spacer-15"></div>
        <div>
            <div class="alert alert-success hidden SuccessMessage" id=""></div>
            <div class="alert alert-danger hidden ErrorMessage" id=""></div>
        </div>
        <div class="spacer-15"></div>
        @foreach($features as $feature)
            <div class="widget">
                <form class="widget-content ajax-form" action="{{route('admin.features.edit',['id' => $feature->id])}}" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}

                    <div class="col-md-9">
                        <div class="form-group">
                            <label>العنوان</label>
                            <input class="form-control" type="text" value="{{$feature->name}}" name="name">
                        </div>
                        <div class="form-group">
                            <label>المحتوي</label>
                            <textarea class="form-control" name="description">{{$feature->description}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="img-block">
                            <img src="{{asset('storage/uploads/features/'.$feature->image)}}" class="img-responsive btn-product-image" style="cursor: pointer;">
                            <input type="file" name="image" style="display: none;">
                        </div>
                    </div>
                    <div class="spacer-15"></div>

                    <div class="col-sm-12 save-btn">
                        <button class="custom-btn green-bc" type="submit">حفظ التعديلات</button>
                    </div>
                </form>
            </div>
        @endforeach
    </div>
@endsection