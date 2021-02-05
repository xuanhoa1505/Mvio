@extends('welcome')
@Section('MvioHome')
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shopping Cart</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.html">Home</a>
                            <a href="./shop.html">Shop</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Size</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $total = 0 ?>
                            @if(session('cart'))
                            @foreach(session('cart') as $key => $data)
                            <?php
                            if($data['price_sale'] != '') {
                                $total += $data['price_sale'] * $data['quantity'];
                            } else {
                                $total += $data['price'] * $data['quantity'];
                            }
                                 
                            ?>
                                <tr>
                                    <td class="product__cart__item">
                                        <div class="product__cart__item__pic">
                                            <img style="max-width: 100px;" src="{{asset('public/Img/product/'. $data['image'] .'')}}" alt="">
                                        </div>
                                        <div class="product__cart__item__text">
                                            <h6>{{$data['name']}}</h6>
                                            @if($data['price_sale'] != '')
                                            <h5>$ {{$data['price_sale']}}</h5>
                                            @else
                                            <h5>$ {{$data['price']}}</h5>
                                            @endif
                                        </div>
                                        <input type="text" class="idSize" name="idSize" value="{{$key}}" style="display:none;">
                                    </td>
                                    <td>{{$data['sizeName']}}</td>
                                    <td class="quantity__item">
                                        <input class="minus is-form" type="button" value="-">
                                        <input aria-label="quantity" class="input-qty quantity" max="{{$data['maxQuantity']}}" min="0" name="quantity" type="number" value="{{$data['quantity']}}">
                                        <input class="plus is-form" type="button" value="+">
                                    </td>
                                    @if($data['price_sale'] != '')
                                    <td class="cart__price">$ {{$data['price_sale'] * $data['quantity']}}</td>
                                    @else
                                    <td class="cart__price">$ {{$data['price'] * $data['quantity']}}</td>
                                    @endif
                                    <td class="cart__close"><a href="javascript:;" data-id="{{ $key }}" id="remove-item"><i class="fa fa-close"></i></a></td>
                                </tr>
                            @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a href="#">Continue Shopping</a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn update__btn">
                                <a href="javascript:;" class="update-cart"><i class="fa fa-spinner"></i> Update cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cart__discount">
                        <h6>Discount codes</h6>
                        <form action="#">
                            <input type="text" placeholder="Coupon code">
                            <button type="submit">Apply</button>
                        </form>
                    </div>
                    <div class="cart__total">
                        <h6>Cart total</h6>
                        <ul>
                            <li>Total <span>$ {{$total}}</span></li>
                        </ul>
                        <a href="#" class="primary-btn">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
            var dataCart = {}
            $('input.input-qty').each(function() {
            var $this = $(this),
                qty = $this.parent().find('.is-form'),
                min = Number($this.attr('min')),
                max = Number($this.attr('max'))
            if (min == 0) {
                var d = 0
            } else d = min
            $(qty).on('click', function() {
                if ($(this).hasClass('minus')) {
                if (d > min) d += -1
                } else if ($(this).hasClass('plus')) {
                var x = Number($this.val()) + 1
                if (x <= max) d += 1
                }
                $this.attr('value', d).val(d)
                var data = {idSize: $this.parents("tr").find(".idSize").val(), quantity: $this.parents("tr").find(".quantity").val()}
                dataCart[$this.parents("tr").find(".idSize").val()] = data
            })
            })
        $(".update-cart").click(function (e) {
           e.preventDefault();

           var ele = $(this);

            $.ajax({
               url: '{{ url('update-cart') }}',
               method: "patch",
               data: {_token: '{{ csrf_token() }}', dataCart: JSON.stringify(dataCart)},
               success: function (response) {
                   window.location.reload();
               }
            });
        });

        $("#remove-item").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            if(confirm("Are you sure")) {
                $.ajax({
                    url: '{{ url('remove-from-cart') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });

    </script>
    </section>
    <!-- Shopping Cart Section End -->
    <style>
    .buttons_added {
    opacity:1;
    display:inline-block;
    display:-ms-inline-flexbox;
    display:inline-flex;
    white-space:nowrap;
    vertical-align:top;
}
.is-form {
    overflow:hidden;
    position:relative;
    background-color:#f9f9f9;
    height:2.2rem;
    width:1.9rem;
    padding:0;
    text-shadow:1px 1px 1px #fff;
    border:1px solid #ddd;
}
.is-form:focus,.input-text:focus {
    outline:none;
}
.is-form.minus {
    border-radius:4px 0 0 4px;
}
.is-form.plus {
    border-radius:0 4px 4px 0;
}
.input-qty {
    min-width: 35px;
    width: 35px;
    background-color:#fff;
    height:2.2rem;
    text-align:center;
    font-size:1rem;
    display:inline-block;
    vertical-align:top;
    margin:0;
    border-top:1px solid #ddd;
    border-bottom:1px solid #ddd;
    border-left:0;
    border-right:0;
    padding:0;
}
.input-qty::-webkit-outer-spin-button,.input-qty::-webkit-inner-spin-button {
    -webkit-appearance:none;
    margin:0;
}
</style>
@endsection