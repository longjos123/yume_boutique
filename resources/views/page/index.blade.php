<?php
    use \App\Constants\CategoryConstant;
?>
@extends('app')

@section('title', 'Yume Boutique')

@section('content')
    <div class="hero-slider">
        <div class="slider-item th-fullpage hero-area" style="background-image: url(images/slider/slider-1.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 text-center">
                        <p data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1">PRODUCTS</p>
                        <h1 data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5">The beauty of nature <br> is hidden in details.</h1>
                        <a data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".8" class="btn" href="shop.html">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="slider-item th-fullpage hero-area" style="background-image: url(images/slider/slider-3.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 text-left">
                        <p data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1">PRODUCTS</p>
                        <h1 data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5">The beauty of nature <br> is hidden in details.</h1>
                        <a data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".8" class="btn" href="shop.html">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="slider-item th-fullpage hero-area" style="background-image: url(images/slider/slider-2.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 text-right">
                        <p data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1">PRODUCTS</p>
                        <h1 data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5">The beauty of nature <br> is hidden in details.</h1>
                        <a data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".8" class="btn" href="shop.html">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="product-category section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title text-center">
                        <h2>Danh mục sản phẩm</h2>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="category-box">
                        <a href="#!">
                            <img src="images/shop/category/men-cate.jpg" alt="" />
                            <div class="content">
                                <h3 style="color: #ffffff">{{ $categories[0][CategoryConstant::INPUT_NAME] }}</h3>
                                <p style="color: #ffffff">Thời trang thời cho phái mạnh</p>
                            </div>
                        </a>
                    </div>
                    <div class="category-box">
                        <a href="#!">
                            <img src="images/shop/category/category-2.jpg" alt="" />
                            <div class="content">
                                <h3>{{ $categories[1][CategoryConstant::INPUT_NAME] }}</h3>
                                <p>Thời trang phái đẹp</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="category-box category-box-2">
                        <a href="#!">
                            <img src="images/shop/category/accessories-icon.jpg" alt="" />
                            <div class="content">
                                <h3 style="color: #ffffff">{{ $categories[2][CategoryConstant::INPUT_NAME] }}</h3>
                                <p style="color: #ffffff">Thiết kế sang trọng</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="products section bg-gray">
        <div class="container">
            <div class="row">
                <div class="title text-center">
                    <h2>Sản phẩm bán chạy</h2>
                </div>
            </div>
            <div class="row">
                @foreach($products as $product)
                    <div class="col-md-4">
                        <div class="product-item">
                            <div class="product-thumb">
                                <span class="bage">Sale</span>
                                <img class="img-responsive" src="{{isset($product['image_product'][0]['image_url']) ? asset($product['image_product'][0]['image_url']) : ''}}" alt="product-img" />
                                <div class="preview-meta">
                                    <ul>
                                        <li>
									<span class="icon-detail-product" onclick="popupDetail({{$product['id']}})" data-toggle="modal" data-target="#product-modal">
										<i class="tf-ion-ios-search-strong"></i>
									</span>
                                        </li>
                                        <li>
                                            <a href="#!" ><i class="tf-ion-ios-heart"></i></a>
                                        </li>
                                        <li>
                                            <a href="#!"><i class="tf-ion-android-cart"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <h4><a href="product-single.html">{{ $product['product_name'] }}</a></h4>
                                <p class="price">{{ number_format($product['price']) }}đ</p>
                            </div>
                        </div>
                    </div>
                @endforeach

                <!-- Modal -->
                    <div class="modal product-modal fade" id="product-modal">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="tf-ion-close"></i>
                        </button>
                        <iframe id="iframe-product-detail"
                                src=""
                                title="product-detail"
                                width="100%"
                                height="100%"
                        >
                        </iframe>
                    </div>
                <!-- /.modal -->
            </div>
        </div>
    </section>


    <!--
    Start Call To Action
    ==================================== -->
    <section class="call-to-action bg-gray section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="title">
                        <h2>SUBSCRIBE TO NEWSLETTER</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat, <br> facilis numquam impedit ut sequi. Minus facilis vitae excepturi sit laboriosam.</p>
                    </div>
                    <div class="col-lg-6 col-md-offset-3">
                        <div class="input-group subscription-form">
                            <input type="text" class="form-control" placeholder="Enter Your Email Address">
                            <span class="input-group-btn">
				        <button class="btn btn-main" type="button">Subscribe Now!</button>
				      </span>
                        </div><!-- /input-group -->
                    </div><!-- /.col-lg-6 -->

                </div>
            </div> 		<!-- End row -->
        </div>   	<!-- End container -->
    </section>   <!-- End section -->

    <section class="section instagram-feed">
        <div class="container">
            <div class="row">
                <div class="title">
                    <h2>View us on instagram</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="instagram-slider" id="instafeed" data-accessToken="IGQVJYeUk4YWNIY1h4OWZANeS1wRHZARdjJ5QmdueXN2RFR6NF9iYUtfcGp1NmpxZA3RTbnU1MXpDNVBHTzZAMOFlxcGlkVHBKdjhqSnUybERhNWdQSE5hVmtXT013MEhOQVJJRGJBRURn"></div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
    <script>
        function popupDetail(productId) {
            var origin   = window.location.origin;
            var url = origin + '/modal-product-detail/' + productId;
            $('#iframe-product-detail').attr('src', url);
        }

        function reloadProductDetail(id) {
            var url = origin + '/product-detail/' + id;
            window.location = url;
        }
    </script>
@endpush
