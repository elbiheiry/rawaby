<div class="side-menu">
    <div class="logo">
        <div class="main-logo"><img src="{{asset('assets/admin/images/logo.png')}}"></div>
    </div><!--End Logo-->
    <aside class="sidebar">
        <ul class="side-menu-links">
            <li class="@if(Request::route()->getName() == 'admin.dashboard'){{'active'}}@endif"><a href="{{route('admin.dashboard')}}">الرئيسية</a></li>
            <li class="@if(Request::route()->getName() == 'admin.settings'){{'active'}}@endif"><a href="{{route('admin.settings')}}">اعدادت الموقع</a></li>
            <li class="@if(Request::route()->getName() == 'admin.sections'){{'active'}}@endif"><a href="{{route('admin.sections')}}">الصفحه الرئيسيه</a></li>
            <li class="sub-menu @if(Request::route()->getName() == 'admin.testimonials'
            || Request::route()->getName() == 'admin.about'
            || Request::route()->getName() == 'admin.features'
            || Request::route()->getName() == 'admin.messages'
            ){{'active'}}@endif">
                <a rel="nofollow" rel="noreferrer"href="javascript:void(0);">
                    من نحن
                    <i class="fa fa-angle-down"></i>
                </a>
                <ul>
                    <li class="@if(Request::route()->getName() == 'admin.about'){{'active'}}@endif"><a href="{{route('admin.about')}}">المحتوي</a></li>
                    <li class="@if(Request::route()->getName() == 'admin.features'){{'active'}}@endif"><a href="{{route('admin.features')}}">المميزات</a></li>
                    <li class="@if(Request::route()->getName() == 'admin.testimonials'){{'active'}}@endif"><a href="{{route('admin.testimonials')}}">اراء العملاء</a></li>
                    <li class="@if(Request::route()->getName() == 'admin.messages'){{'active'}}@endif"><a href="{{route('admin.messages')}}">الرسائل</a></li>
                </ul>
            </li>
            <li class="@if(Request::route()->getName() == 'admin.products'){{'active'}}@endif"><a href="{{route('admin.products')}}">المنتجات</a></li>
            <li class="@if(Request::route()->getName() == 'admin.checkout'){{'active'}}@endif"><a href="{{route('admin.checkout')}}">الطلبات</a></li>
            <li class="@if(Request::route()->getName() == 'admin.cities'){{'active'}}@endif"><a href="{{route('admin.cities')}}">المدن</a></li>
            <li class="@if(Request::route()->getName() == 'admin.subscribers'){{'active'}}@endif"><a href="{{route('admin.subscribers')}}">المشتركين</a></li>
        </ul>
    </aside>
</div>