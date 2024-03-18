@extends('admin.layouts.master')
@section('title')
    الطلبات
@endsection
@section('models')
    <div class="modal fade" id="delete_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-center">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">هل تريد حذف المنتج ؟</h5>
                </div>
                <form class="modal-footer text-center">
                    <a type="button" class="custom-btn modalDLTBTN">مسح</a>
                    <a type="button" class="custom-btn red-bc" data-dismiss="modal">اغلاق</a>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="content">
        <div class="col-sm-12 page-heading">
            <div class="col-sm-6">
                <h2>الطلبات</h2>
            </div><!--End col-md-6-->
            <div class="col-sm-6">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.dashboard')}}">لوحة التحكم</a></li>
                    <li class="active">الطلبات</li>
                </ul>
            </div><!--End col-md-6-->
        </div>
        <div class="spacer-15"></div>
        <div class="widget">
            <div class="widget-content">
                <div class="spacer-15"></div>
                <div class="table-responsive">
                    <table id="datatable" class="table table-bordered table-hover text-center">
                        <thead>
                        <tr >
                            <th class="text-center">#</th>
                            <th class="text-center">الاسم</th>
                            <th class="text-center">المدينه</th>
                            <th class="text-center">رقم الجوال</th>
                            <th class="text-center">العنوان</th>
                            <th class="text-center">انشئ في</th>
                            <th class="text-center">الخيارات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($checkouts as $index => $checkout)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$checkout->name}}</td>
                                <td>{{$checkout->city}}</td>
                                <td>{{$checkout->phone}}</td>
                                <td>{{$checkout->address}}</td>
                                <td>{{$checkout->created_at->diffForHumans()}}</td>
                                <td class="text-center">
                                    <a href="{{route('admin.checkout.single',['id' => $checkout->id])}}" class="icon-btn blue-bc">
                                        <i class="fa fa-info"></i>
                                        عرض البيانات
                                    </a>
                                    <button data-url="{{route('admin.checkout.delete',['id' => $checkout->id])}}" data-toggle="modal" data-target="#delete_user" class="icon-btn red-bc deleteBTN">
                                        <i class="fa fa-trash-o"></i>
                                        حذف
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="spacer-15"></div>
                {!! $checkouts->links() !!}
            </div>
        </div>
    </div>
@endsection