<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <title>@yield('title')</title>

    <!-- Mobile Specific Metas
    ================================================== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Construction Html5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="author" content="Themefisher">
    <meta name="generator" content="Themefisher Constra HTML Template v1.0">

    <!-- theme meta -->
    <meta name="theme-name" content="aviato" />

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/icon-meta.png')}}" />

    <!-- Themefisher Icon font -->
    <link rel="stylesheet" href="{{asset('plugins/themefisher-font/style.css')}}">
    <!-- bootstrap.min css -->
    <link rel="stylesheet" href="{{asset('plugins/bootstrap/css/bootstrap.min.css')}}">

    <!-- Animate css -->
    <link rel="stylesheet" href="{{asset('plugins/animate/animate.css')}}">
    <!-- Slick Carousel -->
    <link rel="stylesheet" href="{{asset('plugins/slick/slick.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/slick/slick-theme.css')}}">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

</head>

<body id="body">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body" style="padding: 30px">
                <div class="row">
                    <div class="col-md-8 col-sm-6 col-xs-12">
                        <div class="modal-image">
                            <img class="img-responsive"
                                 id="img-modal-detail"
                                 src="{{ isset($product['image_product'][0]['image_url']) ? asset($product['image_product'][0]['image_url']) : '' }}"
                                 alt="product-img" />
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="product-short-details">
                            <h2 class="product-title">{{ $product['name'] }}</h2>
                            <p class="product-price">{{ number_format($product['price']) }}đ</p>
                            <p class="product-short-description">
                                {{ $product['description'] }}
                            </p>
                            <a class="btn btn-main mt-20">Thêm vào giỏ hàng</a>
                            <a id="product_detail" onclick="reloadDetail({{$product['id']}})" class="btn btn-transparent mt-20">Chi tiết sản phẩm</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<!--
Essential Scripts
=====================================-->

<!-- Main jQuery -->
<script src="{{asset('plugins/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.1 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- Bootstrap Touchpin -->
<script src="{{asset('plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js')}}"></script>
<!-- Instagram Feed Js -->
<script src="{{asset('plugins/instafeed/instafeed.min.js')}}"></script>
<!-- Video Lightbox Plugin -->
<script src="{{asset('plugins/ekko-lightbox/dist/ekko-lightbox.min.js')}}"></script>
<!-- Count Down Js -->
<script src="{{asset('plugins/syo-timer/build/jquery.syotimer.min.js')}}"></script>

<!-- slick Carousel -->
<script src="{{asset('plugins/slick/slick.min.js')}}"></script>
<script src="{{asset('plugins/slick/slick-animation.min.js')}}"></script>

<!-- Google Mapl -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
<script type="text/javascript" src="{{asset('plugins/google-map/gmap.js')}}"></script>

<!-- Main Js File -->
<script src="{{asset('js/script.js')}}"></script>

<script>
    function reloadDetail(id) {
        window.parent.reloadProductDetail(id);
    }
</script>
@stack('js')

</body>
</html>
