@extends('welcome')
@Section('MvioHome')
<section class="shop-details">
        <div class="product__details__pic">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product__details__breadcrumb">
                            <a href="./index.html">Home</a>
                            <?php 
                            $link=''
                            ?>
                            @if(!empty($categores))
                            @foreach($categores as $key=>$data)
                            <?php 
                            $link=$data->slug
                            ?>
                                <a href="{{URL::to('/shop/'.$data->slug)}}">{{$data->name}}</a>
                            @endforeach
                            @endif
                            <span>{{$product->name}}</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-lg-3 col-md-3">
                        <ul class="nav nav-tabs" role="tablist">
                        @foreach($imgs as $key=>$data)
                            <li class="nav-item">
                                <a class="nav-link @if($data->stt==1) active @endif" data-toggle="tab" href="#tabs-{{$key}}" role="tab">
                                    <div class="product__thumb__pic set-bg" data-setbg="{{asset('public/Img/product/'. $data->img .'')}}">
                                    </div>
                                </a>
                            </li>
                        @endforeach
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-9">
                        <div class="tab-content">
                        @foreach($imgs as $key=>$data)
                            <div class="tab-pane @if($data->stt==1) active @endif" id="tabs-{{$key}}" role="tabpanel">
                                <div class="product__details__pic__item">
                                    <img src="{{asset('public/Img/product/'. $data->img .'')}}" alt="">
                                </div>
                            </div>
                        @endforeach
                            <!-- <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <div class="product__details__pic__item">
                                    <img src="img/shop-details/product-big-3.png" alt="">
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-3" role="tabpanel">
                                <div class="product__details__pic__item">
                                    <img src="img/shop-details/product-big.png" alt="">
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-4" role="tabpanel">
                                <div class="product__details__pic__item">
                                    <img src="img/shop-details/product-big-4.png" alt="">
                                    <a href="https://www.youtube.com/watch?v=8PJ3_p7VqHw&list=RD8PJ3_p7VqHw&start_radio=1" class="video-popup"><i class="fa fa-play"></i></a>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product__details__content">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <div class="product__details__text">
                            <h4>{{$product->name}}</h4>
                            @if(!empty($product->price_sale))
                            <h3>{{$product->price_sale}}<span>{{$product->price}}</span></h3>
                            @else
                            <h3>{{$product->price}}</h3>
                            @endif
                            <p>{{$product->des}}</p>
                            <form id="form" method="post">
                            <div class="product__details__cart__option">
                                <table width="100%">
                                    <thead>
                                        <tr>
                                            <th style="display:none;">idSize</th>
                                            <th style="display:none;">nameSize</th>
                                            <th style="width: calc(100% / 3);">Size</th>
                                            <th style="width: calc(100% / 3);">Ready</th>
                                            <th style="width: calc(100% / 3);">quantity</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($size as $key=>$data)
                                    <tr>
                                        <td style="display:none"><input type="text" class="idSize" name="idSize" value="{{$data->id}}"></td>
                                        <td style="display:none"><input type="text" class="nameSize" name="nameSize" value="{{$data->name}}"></td>
                                        <td style="width: calc(100% / 3);">
                                            {{$data->name}}
                                        </td>
                                        <td style="width: calc(100% / 3);">{{$data->soluong}}</td>
                                        <td style="width: calc(100% / 3);">
                                        <div class="buttons_added">
                                            <input class="minus is-form" type="button" value="-">
                                            <input aria-label="quantity" class="input-qty quantity" max="{{$data->soluong}}" min="0" name="quantity" type="number" value="0">
                                            <input class="plus is-form" type="button" value="+">
                                        </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <button type="submit" class="primary-btn">add to cart</button>
                                </form>
                            </div>
                            <div class="product__details__last__option">
                                <h5><span>Guaranteed Safe Checkout</span></h5>
                                <img src="img/shop-details/details-payment.png" alt="">
                                <ul>
                                    <li><span>SKU:</span>{{$product->ma}}</li>
                                    <li><span>Stuff:</span>{{$product->pro_nguyenlieu}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="row">
                    <div class="col-lg-12">
                        <div class="product__details__tab">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#tabs-5"
                                    role="tab">Description</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabs-6" role="tab">Customer
                                    Previews(5)</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabs-7" role="tab">Additional
                                    information</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tabs-5" role="tabpanel">
                                    <div class="product__details__tab__content">
                                        <p class="note">Nam tempus turpis at metus scelerisque placerat nulla deumantos
                                            solicitud felis. Pellentesque diam dolor, elementum etos lobortis des mollis
                                            ut risus. Sedcus faucibus an sullamcorper mattis drostique des commodo
                                        pharetras loremos.</p>
                                        <div class="product__details__tab__content__item">
                                            <h5>Products Infomation</h5>
                                            <p>A Pocket PC is a handheld computer, which features many of the same
                                                capabilities as a modern PC. These handy little devices allow
                                                individuals to retrieve and store e-mail messages, create a contact
                                                file, coordinate appointments, surf the internet, exchange text messages
                                                and more. Every product that is labeled as a Pocket PC must be
                                                accompanied with specific software to operate the unit and must feature
                                            a touchscreen and touchpad.</p>
                                            <p>As is the case with any new technology product, the cost of a Pocket PC
                                                was substantial during it’s early release. For approximately $700.00,
                                                consumers could purchase one of top-of-the-line Pocket PCs in 2003.
                                                These days, customers are finding that prices have become much more
                                                reasonable now that the newness is wearing off. For approximately
                                            $350.00, a new Pocket PC can now be purchased.</p>
                                        </div>
                                        <div class="product__details__tab__content__item">
                                            <h5>Material used</h5>
                                            <p>Polyester is deemed lower quality due to its none natural quality’s. Made
                                                from synthetic materials, not natural like wool. Polyester suits become
                                                creased easily and are known for not being breathable. Polyester suits
                                                tend to have a shine to them compared to wool and cotton suits, this can
                                                make the suit look cheap. The texture of velvet is luxurious and
                                                breathable. Velvet is a great choice for dinner party jacket and can be
                                            worn all year round.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tabs-6" role="tabpanel">
                                    <div class="product__details__tab__content">
                                        <div class="product__details__tab__content__item">
                                            <h5>Products Infomation</h5>
                                            <p>A Pocket PC is a handheld computer, which features many of the same
                                                capabilities as a modern PC. These handy little devices allow
                                                individuals to retrieve and store e-mail messages, create a contact
                                                file, coordinate appointments, surf the internet, exchange text messages
                                                and more. Every product that is labeled as a Pocket PC must be
                                                accompanied with specific software to operate the unit and must feature
                                            a touchscreen and touchpad.</p>
                                            <p>As is the case with any new technology product, the cost of a Pocket PC
                                                was substantial during it’s early release. For approximately $700.00,
                                                consumers could purchase one of top-of-the-line Pocket PCs in 2003.
                                                These days, customers are finding that prices have become much more
                                                reasonable now that the newness is wearing off. For approximately
                                            $350.00, a new Pocket PC can now be purchased.</p>
                                        </div>
                                        <div class="product__details__tab__content__item">
                                            <h5>Material used</h5>
                                            <p>Polyester is deemed lower quality due to its none natural quality’s. Made
                                                from synthetic materials, not natural like wool. Polyester suits become
                                                creased easily and are known for not being breathable. Polyester suits
                                                tend to have a shine to them compared to wool and cotton suits, this can
                                                make the suit look cheap. The texture of velvet is luxurious and
                                                breathable. Velvet is a great choice for dinner party jacket and can be
                                            worn all year round.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tabs-7" role="tabpanel">
                                    <div class="product__details__tab__content">
                                        <p class="note">Nam tempus turpis at metus scelerisque placerat nulla deumantos
                                            solicitud felis. Pellentesque diam dolor, elementum etos lobortis des mollis
                                            ut risus. Sedcus faucibus an sullamcorper mattis drostique des commodo
                                        pharetras loremos.</p>
                                        <div class="product__details__tab__content__item">
                                            <h5>Products Infomation</h5>
                                            <p>A Pocket PC is a handheld computer, which features many of the same
                                                capabilities as a modern PC. These handy little devices allow
                                                individuals to retrieve and store e-mail messages, create a contact
                                                file, coordinate appointments, surf the internet, exchange text messages
                                                and more. Every product that is labeled as a Pocket PC must be
                                                accompanied with specific software to operate the unit and must feature
                                            a touchscreen and touchpad.</p>
                                            <p>As is the case with any new technology product, the cost of a Pocket PC
                                                was substantial during it’s early release. For approximately $700.00,
                                                consumers could purchase one of top-of-the-line Pocket PCs in 2003.
                                                These days, customers are finding that prices have become much more
                                                reasonable now that the newness is wearing off. For approximately
                                            $350.00, a new Pocket PC can now be purchased.</p>
                                        </div>
                                        <div class="product__details__tab__content__item">
                                            <h5>Material used</h5>
                                            <p>Polyester is deemed lower quality due to its none natural quality’s. Made
                                                from synthetic materials, not natural like wool. Polyester suits become
                                                creased easily and are known for not being breathable. Polyester suits
                                                tend to have a shine to them compared to wool and cotton suits, this can
                                                make the suit look cheap. The texture of velvet is luxurious and
                                                breathable. Velvet is a great choice for dinner party jacket and can be
                                            worn all year round.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
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
                var data = {idSize: $this.parents("tr").find(".idSize").val(), nameSize: $this.parents("tr").find(".nameSize").val(), quantity: $this.parents("tr").find(".quantity").val()}
                dataCart[$this.parents("tr").find(".idSize").val()] = data
            })
            })
            $('#form').on('submit', function (e) {

                e.preventDefault();

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "POST",
                    url: '{{ url('add-to-cart-detail/' .$product->id) }}',
                    data:{
                        dataCart: JSON.stringify(dataCart),
                        },
                    dataType : 'json',
                    success: function (response) {
                        window.location.reload();
                    },
                    error: function(error) {
                        window.location.reload();
                    }
                });

            });
        </script>
        <script>
            $(document).ready(function(){ 
                var dataCart =[];

            }
        </script>
    </section>
    <!-- Related Section Begin -->
    <section class="related spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="related-title">Related Product</h3>
                </div>
            </div>
            <div class="row">
            @foreach($related_product as $key=>$data)
                <div class="col-lg-3 col-md-6 col-sm-6 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="{{asset('public/Img/product/'. $data->image .'')}}">
                            @if($data->muc == 0)    
                                <span class="label">selling</span>
                            @endif
                            @if($data->muc == 1)    
                                <span class="label">New</span>
                            @endif
                            @if($data->muc == 2)    
                                <span class="label">sale</span>
                            @endif
                            <ul class="product__hover">
                                <li><a href="{{ url('detail/'.$link.'/'.$data->slug.'.html') }}"><img src="{{asset('Mvio/img/icon/search.png')}}" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6 style="text-align: center;">{{$data->name}}</h6>
                            <a href="{{ url('add-to-cart/'.$data->id) }}" class="add-cart">+ Add To Cart</a>
                            @if(!empty($data->price_sale))
                                <h5 style="text-align: center;">{{$data->price_sale}}<span style="color: #b7b7b7;font-size: 20px;font-weight: 400;margin-left: 10px;text-decoration: line-through">{{$data->price}}</span></h5>
                            @else
                                <h5 style="text-align: center;">{{$data->price}}</h5>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </section>
    <!-- Related Section End -->
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