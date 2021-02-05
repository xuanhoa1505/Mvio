@extends('welcome')
@Section('MvioHome')

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>{{$category->name}}</h4>
                        <div class="breadcrumb__links">
                            <a href="{{URL::to('/home')}}">Home</a>
                            @if(!empty($categores))
                            @foreach($categores as $key=>$data) 
                                <a href="{{URL::to('/shop/'.$data->slug)}}">{{$data->name}}</a>
                            @endforeach
                            @endif
                            <span>{{$category->name}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="shop__sidebar">
                        <div class="shop__sidebar__search">
                            <form action="#">
                                <input type="text" placeholder="Search...">
                                <button type="submit"><span class="icon_search"></span></button>
                            </form>
                        </div>
                        <div class="shop__sidebar__accordion">
                            <div class="accordion" id="accordionExample">
                            @include('home.layout.sidebar')
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="shop__product__option">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="shop__product__option__left">
                                    <p>Showing 1–12 of 126 results</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="shop__product__option__right">
                                    <p>Sort by Price:</p>
                                    <select>
                                        <option value="">Low To High</option>
                                        <option value="">$0 - $55</option>
                                        <option value="">$55 - $100</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($product as $key=>$data)
                        <div class="col-lg-4 col-md-6 col-sm-6">
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
                                        <li><a href="{{ url('detail/'.$category->slug.'/'.$data->slug.'.html') }}"><img src="{{asset('Mvio/img/icon/search.png')}}" alt=""></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6 style="text-align: center;">{{$data->name}}</h6>
                                    <a href="{{ url('add-to-cart/'.$data->id) }}" class="add-cart">+ Add To Cart</a>
                                    @if(!empty($data->price_sale))
                                        <h5 style="text-align: center;">$ {{$data->price_sale}}<span style="color: #b7b7b7;font-size: 20px;font-weight: 400;margin-left: 10px;text-decoration: line-through">{{$data->price}}</span></h5>
                                    @else
                                        <h5 style="text-align: center;"> $ {{$data->price}}</h5>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product__pagination">
                                <a class="active" href="#">1</a>
                                <a href="#">2</a>
                                <a href="#">3</a>
                                <span>...</span>
                                <a href="#">21</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->

@endsection