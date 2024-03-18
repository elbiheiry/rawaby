@extends('admin.layouts.master')
@section('title')
    المشتركين
@endsection
@section('models')
    <div class="modal fade" id="delete_subscriber" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-center">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">هل تريد حذف هذا المشترك ؟</h5>
                </div>
                <form class="modal-footer text-center">
                    <a type="button" class="custom-btn red-bc modalDLTBTN">مسح</a>
                    <a type="button" class="custom-btn green-bc" data-dismiss="modal">اغلاق</a>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="content">
        <div class="col-sm-12 page-heading">
            <div class="col-sm-6">
                <h2>المشتركين</h2>
            </div><!--End col-md-6-->
            <div class="col-sm-6">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.dashboard')}}">الرئيسيه</a></li>
                    <li class="active">المشتركين</li>
                </ul>
            </div><!--End col-md-6-->
        </div>
        <div class="spacer-15"></div>
        <div class="widget">
            <div class="widget-content">
                <div class="spacer-15"></div>
                <div class="table-responsive">
                    <table id="datatable"  class="table table-bordered table-hover text-center">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>البريد الالكتروني</th>
                            <th>الخيارات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($subscribers as $index => $subscriber)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>
                                    {{$subscriber->email}}
                                </td>
                                <td class="text-center">
                                    <button data-url="{{route('admin.subscribers.delete',['id' => $subscriber->id])}}" data-toggle="modal" data-target="#delete_subscriber" class="icon-btn red-bc deleteBTN">
                                        <i class="fa fa-trash-o"></i>
                                        مسح
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection