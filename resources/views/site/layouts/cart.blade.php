<a class="cart-head-icon" href="" data-toggle="dropdown">
    <i class="fas fa-shopping-basket"></i>
    <span>{{\Cart::content()->count()}}</span>
</a><!--End cart-head-icon-->
<div class="dropdown-menu cart-head-content">
    <div class="cart-head-content-wrap">
        @if(!empty(\Cart::content()))
            @foreach(\Cart::content() as $cart)
                <div class="cart-head-item">
                    <div class="cart-head-item--img">
                        <img src="{{asset('storage/uploads/products/'.$cart->options['image'])}}">
                    </div><!--End cart-head-item--img-->
                    <div class="cart-head-item--content">
                        <h3 class="title">{{$cart->name}}</h3>
                        <ul>
                            <li>
                                <span>الكمية:</span>
                                <span>{{$cart->qty}}</span>
                            </li>
                            <li>
                                <span>السعر:</span>
                                <span>{{$cart->price}} ر.س</span>
                            </li>
                        </ul>
                    </div><!--End cart-head-item--content-->
                    <div class="cart-head--del">
                        <a href="{{route('site.cart.remove' ,['id' => $cart->rowId])}}">
                            <i class="far fa-times-circle"></i>
                        </a>
                    </div><!--End cart-head--cont--del-->
                </div><!--End cart-head-item-->
            @endforeach
        @endif
    </div><!--End cart-head-content-wrap-->
    <div class="cart-head-content--foot">
        <p>
            <span>الإجمــــــالي:</span>
            {{\Cart::content()->count()}}
        </p>
        <a href="{{route('site.cart')}}" class="custom-btn">متابعة الي الدفع</a>
    </div><!--End cart-head-content--foot-->
</div><!--End cart-head-content-->