@extends('pages.layout')
@section('content')
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All Categories</span>
                        </div>
                        @php
                        $categories = App\Category::where('status', 1)->get();
                        @endphp
                        <ul>
                        @foreach($categories as $category)
                            <li><a href="#">{{$category->category_name}}</a></li>
                        @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+65 11.188.888</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="breadcrumb-section set-bg" data-setbg="{{asset('frontend')}}/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="index-2.html">Home</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                 @foreach($cards as $card)
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img src="{{$card->product->image_one}}" height="80px" width="80px" alt="">
                                        <h5>{{$card->product->product_name}}</h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        ${{$card->price}}
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <form action="{{route('qty.update', ['id'=>$card->id])}}" method="post">
                                            @csrf
                                            <div class="pro-qty">
                                                <input type="text" name="qty" value="{{$card->qty}}">
                                            </div>
                                            <button type="submit" class="btn btn-success">update</button>
                                            </form>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total">
                                        ${{$card->price * $card->qty}}
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <a href="{{route('card.delete', ['id'=>$card->id])}}">
                                            <span class="icon_close"></span>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="{{url('/')}}" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    @if(Session::has('coupon'))
                    @else
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Discount Codes</h5>
                            <form action="{{route('coupon.apply')}}" method="post">
                                @csrf
                                <input type="text" name="coupon_name" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn">APPLY COUPON</button>
                            </form>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            @if(Session::has('coupon'))
                            <li>Subtotal <span>${{ $subtotal }}</span></li>
                            <li>Discount<span>{{ session()->get('coupon')['coupon_discaunt'] }}% (${{ $discount = $subtotal *session()->get('coupon')['coupon_discaunt']/100 }})</span>
                            <li>Total <span>${{ $subtotal - $discount }}</span></li>
                            </li>
                            @else
                            <li>Subtotal <span>${{ $subtotal  }}</span></li>
                            @endif

                            
                        </ul>
                                @php
                                $id = Session::get('id');
                                @endphp
                                @if($id!=Null)
                                <a href="{{route('checkout')}}" class="primary-btn">PROCEED TO CHECKOUT</a>
                                @else
                                <a href="{{route('login.page')}}" class="primary-btn"> CHECKOUT</a>
                                @endif
                        
                    </div> 
                </div>
            </div>
        </div>
    </section>

@endsection