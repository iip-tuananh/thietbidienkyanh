@extends('site.layouts.master')
@section('title')
    {{ $product->name }}
@endsection
@section('description')
    {{ strip_tags($product->intro) }}
@endsection
@section('image')
    {{ $product->image ? $product->image->path : $product->galleries[0]->image->path }}
@endsection

@section('css')
    <link href="/site/css/breadcrumb_style.scss.css?1753947700397" rel="stylesheet" type="text/css" media="all" />
    <link href="/site/css/product_style.scss.css?1753947700397" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@6.0/dist/fancybox/fancybox.css" />
    <style>
        .text-limit-3-line {
            line-height: 1.5;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .hidden {
            display: none;
        }

        .product-attributes {
            margin-bottom: 0 !important;
        }

        .product-attributes label {
            font-weight: 600;
            margin-bottom: 0 !important;
        }

        .product-attribute-values {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }

        .product-attribute-values .badge,
        .product-attribute-values .badge+.badge {
            width: auto;
            border: 1px solid #0974ba;
            padding: 2px 10px;
            border-radius: 5px;
            font-size: 14px;
            color: #0974ba;
            height: 30px;
            cursor: pointer;
            pointer-events: auto;
        }

        .product-attribute-values .badge:hover {
            background-color: #0974ba;
            color: #fff;
        }

        .product-attribute-values .badge.active {
            background-color: #0974ba;
            color: #fff;
        }

        .countdown {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            margin-top: 20px;
        }

        .countdown .countdown-content {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }

        .countdown-item {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 6px 10px;
            border-radius: 2px;
            background: linear-gradient(to bottom, #ff5e00, #f4955e);
        }

        .countdown-item-number {
            font-size: 24px;
            font-weight: 600;
            color: #fff;
        }

        .countdown-item-label {
            font-size: 14px;
            font-weight: 600;
            color: #fff;
        }

        .countdown-item-separator {
            font-size: 14px;
            font-weight: 600;
        }

        .btn-fixed-bottom {
            display: none;
            position: fixed;
            width: 80% !important;
            bottom: 65px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #0974ba;
            color: #fff;
            padding: 10px 20px;
            text-align: center;
            font-size: 16px;
            font-weight: 600;
            border-radius: 50px;
            z-index: 1000;
            box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.1);
            border: 1px solid #cccccc;
        }

        @media (max-width: 768px) {
            .btn-fixed-bottom {
                display: block;
            }
        }
    </style>
@endsection

@section('content')
    <div class="bodywrap" ng-controller="ProductDetailController">
        <section class="bread-crumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li class="home">
                        <a href="{{ route('front.home-page') }}"><span>Trang chủ</span></a>
                        <span class="mr_lr">
                            &nbsp;
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right"
                                role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                                class="svg-inline--fa fa-chevron-right fa-w-10">
                                <path fill="currentColor"
                                    d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"
                                    class=""></path>
                            </svg>
                            &nbsp;
                        </span>
                    </li>
                    <li>
                        <a class="changeurl"
                            href="{{ $product->category->category_url }}"><span>{{ $product->category->name }}</span></a>
                        <span class="mr_lr">
                            &nbsp;
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right"
                                role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                                class="svg-inline--fa fa-chevron-right fa-w-10">
                                <path fill="currentColor"
                                    d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"
                                    class=""></path>
                            </svg>
                            &nbsp;
                        </span>
                    </li>
                    <li><strong><span>{{ $product->name }}</span></strong>
                    <li>
                </ul>
            </div>
        </section>
        <section class="product layout-product">
            <div class="container">
                <div class="details-product">
                    <div class="row">
                        <div class="product-detail-left product-images col-12 col-md-12 col-lg-5 col-xl-4">
                            <div class="box_pro_img">
                                <div class="product-image-block relative">
                                    <div class="swiper-container gallery-top">
                                        <div class="swiper-wrapper" id="lightgallery">
                                            <a class="swiper-slide" data-hash="0" data-fancybox="gallery"
                                                href="{{ $product->image ? $product->image->path : 'https://placehold.co/480x480' }}"
                                                title="Click để xem">
                                                <img height="480" width="480"
                                                    src="{{ $product->image ? $product->image->path : 'https://placehold.co/480x480' }}"
                                                    alt="{{ $product->name }}"
                                                    data-image="{{ $product->image ? $product->image->path : 'https://placehold.co/480x480' }}"
                                                    class="img-responsive mx-auto d-block swiper-lazy" />
                                            </a>
                                            @foreach ($product->galleries as $key => $gallery)
                                                <a class="swiper-slide" data-hash="{{ $key + 1 }}" data-fancybox="gallery"
                                                    href="{{ $gallery->image ? $gallery->image->path : 'https://placehold.co/480x480' }}"
                                                    title="Click để xem">
                                                    <img height="480" width="480"
                                                        src="{{ $gallery->image ? $gallery->image->path : 'https://placehold.co/480x480' }}"
                                                        alt="{{ $product->name }}"
                                                        data-image="{{ $gallery->image ? $gallery->image->path : 'https://placehold.co/480x480' }}"
                                                        class="img-responsive mx-auto d-block swiper-lazy" />
                                                </a>
                                            @endforeach
                                        </div>
                                        @if ($product->base_price > 0 && $product->price > 0 && $product->price < $product->base_price)
                                            <div class="product-percent"><span class="label_product">-
                                                    {{ number_format(100 - ($product->price / $product->base_price) * 100, 0) }}%
                                                </span><span>OFF </span>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="swiper-container gallery-thumbs">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide" data-hash="0">
                                                <div class="p-100">
                                                    <img height="100" width="100"
                                                        src="{{ $product->image ? $product->image->path : 'https://placehold.co/480x480' }}"
                                                        alt="{{ $product->name }}"
                                                        data-image="{{ $product->image ? $product->image->path : 'https://placehold.co/480x480' }}"
                                                        class="swiper-lazy" />
                                                </div>
                                            </div>
                                            @foreach ($product->galleries as $key => $gallery)
                                                <div class="swiper-slide" data-hash="{{ $key + 1 }}">
                                                    <div class="p-100">
                                                        <img height="100" width="100"
                                                            src="{{ $gallery->image ? $gallery->image->path : 'https://placehold.co/480x480' }}"
                                                            alt="{{ $product->name }}"
                                                            data-image="{{ $gallery->image ? $gallery->image->path : 'https://placehold.co/480x480' }}"
                                                            class="swiper-lazy" />
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="swiper-button-next">
                                        </div>
                                        <div class="swiper-button-prev">
                                        </div>
                                    </div>
                                </div>
                                <div class='share-group d-flex align-items-center mt-3'>
                                    <strong class='share-group__heading mr-3'>Chia sẻ</strong>
                                    <div class='share-group__list'>
                                        <a class='share-group__item facebook' title="Chia sẽ lên Facebook"
                                            target="_blank"
                                            href='http://www.facebook.com/sharer.php?u={{ urlencode(route('front.show-product-detail', $product->slug)) }}'>
                                            <img width="100" height="100" src="/site/images/icon_face.png"
                                                alt="Facebook" />
                                        </a>
                                        <a class='share-group__item pinterest' title="Chia sẽ lên Pinterest"
                                            target="_blank"
                                            href='http://pinterest.com/pin/create/button/?url={{ urlencode(route('front.show-product-detail', $product->slug)) }}'>
                                            <img width="100" height="100" src="/site/images/icon_print.png"
                                                alt="Pinterest" />
                                        </a>
                                        <a class='share-group__item twitter' target="_blank" title="Chia sẽ lên Twitter"
                                            href='http://twitter.com/share?text={{ urlencode(route('front.show-product-detail', $product->slug)) }}'>
                                            <img width="100" height="100" src="/site/images/icon_tw.png"
                                                alt="Twitter" />
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" col-12 col-md-12 col-lg-7 col-xl-5">
                            <div class="details-pro">
                                <h1 class="title-product">{{ $product->name }}</h1>
                                <div class="inventory_quantity">
                                    <div class="thump-break">
                                        <span class="mb-break">
                                            <span class="stock-brand-title">Thương hiệu:</span>
                                            <span class="a-vendor">{{ $product->origin_name }}
                                            </span>
                                        </span>
                                        <span class="line">&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                                        <span class="mb-break inventory">
                                            <span class="stock-brand-title">Tình trạng:</span>
                                            <span class="a-stock">
                                                {{ $product->state == 1 ? 'Còn hàng' : 'Hết hàng' }}
                                            </span>
                                        </span>
                                    </div>
                                    <span class="mb-break skus-box">
                                        <span class="stock-brand-title">Danh mục:</span>
                                        <span class="variant-sku"><span
                                                class="a-sku">{{ $product->category->name }}</span></span>
                                    </span>
                                </div>
                                <div class="price-box clearfix">
                                    @if ($product->base_price > 0 && $product->price > 0 && $product->price < $product->base_price)
                                        <span class="special-price">
                                            Giá: <span
                                                class="price product-price">{{ formatCurrency($product->price) }}₫</span>
                                        </span>
                                        <!-- Giá Khuyến mại -->
                                        <span class="old-price">
                                            Giá thị trường: <del class="price product-price-old">
                                                {{ formatCurrency($product->base_price) }}₫
                                            </del>
                                        </span>
                                        <!-- Giás gốc -->
                                        <span class="save-price">Tiết kiệm:
                                            <span
                                                class="price product-price-save">{{ formatCurrency($product->base_price - $product->price) }}₫</span>
                                            so với giá thị trường
                                        </span> <!-- Tiết kiệm -->
                                    @elseif ($product->base_price > 0 && $product->price == 0)
                                        <span class="special-price">
                                            Giá: <span
                                                class="price product-price">{{ formatCurrency($product->base_price) }}₫</span>
                                        </span>
                                    @elseif ($product->base_price == 0 && $product->price > 0)
                                        <span class="special-price">
                                            Giá: <span
                                                class="price product-price">{{ formatCurrency($product->price) }}₫</span>
                                        </span>
                                    @else
                                        <span class="special-price">
                                            Giá: <span class="price product-price">Liên hệ</span>
                                        </span>
                                    @endif
                                </div>
                                @if ($product->price > 0 || $product->base_price > 0)
                                <form id="add-to-cart-form" class="form-inline">
                                    <div class="form-product">
                                        <div class="clearfix form-group ">
                                            <div class="flex-quantity">
                                                <div class="custom custom-btn-number show">
                                                    <label>Số lượng:</label>
                                                    <div class="input_number_product">
                                                        <button class="btn_num num_1 button button_qty"
                                                            onClick="var result = document.getElementById('qtym'); var qtypro = result.value; if( !isNaN( qtypro ) &amp;&amp; qtypro &gt; 1 ) result.value--;return false;"
                                                            type="button">&minus;</button>
                                                        <input type="text" id="qtym" name="quantity"
                                                            value="1" maxlength="3"
                                                            class="form-control prd_quantity"
                                                            onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;"
                                                            onchange="if(this.value == 0)this.value=1;">
                                                        <button class="btn_num num_2 button button_qty"
                                                            onClick="var result = document.getElementById('qtym'); var qtypro = result.value; if( !isNaN( qtypro )) result.value++;return false;"
                                                            type="button"><span>&plus;</span></button>
                                                    </div>
                                                </div>
                                                <div class="btn-mua button_actions clearfix">
                                                    <div style='display: flex; flex-wrap: wrap; width: 100%'>
                                                        <button type="submit"
                                                            class="btn btn_base normal_button btn_add_cart add_to_cart btn-cart">
                                                            <span class="txt-main text_1" ng-click="addToCartFromProductDetail()">Thêm vào giỏ hàng</span>
                                                        </button>
                                                        <a href="javascript:void(0)" class="btn buynow" ng-click="addToCartCheckoutFromProductDetail()"
                                                            title="Mua ngay" >Mua ngay</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                @endif
                                <div class="chinhsach-pro">
                                    {!! $product->intro !!}
                                </div>
                            </div>
                        </div>
                        <div class=" col-12 col-md-12 col-lg-12 col-xl-3">
                            {{-- <fieldset class="pro-discount">
                                <legend>
                                    <img alt="MÃ GIẢM GIÁ"
                                        src="//bizweb.dktcdn.net/100/509/495/themes/943203/assets/code_dis.gif?1753947700397">
                                    MÃ GIẢM GIÁ
                                </legend>
                                <div class="item_discount">
                                    <div class="top_discount">
                                        <div class="item-name">
                                            <p class="code_dis">
                                                50K
                                            </p>
                                        </div>
                                    </div>
                                    <div class="coupon_desc">
                                        Nhập mã BEA50 giảm 50K đơn từ 750K
                                    </div>
                                    <div class="copy_discount">
                                        <p class="code_zip">
                                            BEA50
                                        </p>
                                        <button class="btn dis_copy" data-copy="BEA50">
                                            <span>Lưu mã</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="item_discount">
                                    <div class="top_discount">
                                        <div class="item-name">
                                            <p class="code_dis">
                                                15%
                                            </p>
                                        </div>
                                    </div>
                                    <div class="coupon_desc">
                                        Nhập mã BEA15 giảm 15% đơn từ 1.500.000đ
                                    </div>
                                    <div class="copy_discount">
                                        <p class="code_zip">
                                            BEA15
                                        </p>
                                        <button class="btn dis_copy" data-copy="BEA15">
                                            <span>Lưu mã</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="item_discount">
                                    <div class="top_discount">
                                        <div class="item-name">
                                            <p class="code_dis">
                                                99K
                                            </p>
                                        </div>
                                    </div>
                                    <div class="coupon_desc">
                                        Nhập mã BEAN99K giảm ngay 99K
                                    </div>
                                    <div class="copy_discount">
                                        <p class="code_zip">
                                            BEAN99K
                                        </p>
                                        <button class="btn dis_copy" data-copy="BEAN99K">
                                            <span>Lưu mã</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="item_discount">
                                    <div class="top_discount">
                                        <div class="item-name">
                                            <p class="code_dis">
                                                0K
                                            </p>
                                        </div>
                                    </div>
                                    <div class="coupon_desc">
                                        Nhập mã FREESHIP miễn phí vận chuyển
                                    </div>
                                    <div class="copy_discount">
                                        <p class="code_zip">
                                            FREESHIP
                                        </p>
                                        <button class="btn dis_copy" data-copy="FREESHIP">
                                            <span>Lưu mã</span>
                                        </button>
                                    </div>
                                </div>
                            </fieldset>
                            <script>
                                $(document).on('click', '.dis_copy', function(e) {
                                    e.preventDefault();
                                    var copyText = $(this).attr('data-copy');
                                    var copyTextarea = document.createElement("textarea");
                                    copyTextarea.textContent = copyText;
                                    document.body.appendChild(copyTextarea);
                                    copyTextarea.select();
                                    document.execCommand("copy");
                                    document.body.removeChild(copyTextarea);
                                    var cur_text = $(this).text();
                                    var $cur_btn = $(this);
                                    $(this).addClass("disabled");
                                    $(this).text("Đã lưu");
                                    $(this).parent().addClass('active');
                                    setTimeout(function() {
                                        $cur_btn.removeClass("disabled");
                                        $cur_btn.parent().removeClass('active');
                                        $cur_btn.text(cur_text);
                                    }, 2500)
                                })
                            </script> --}}
                            <div class="box_buy_now">
                                <div class="title_buy_now">Tư vấn hỗ trợ 24/7</div>
                                <div class="box_phone_inf">
                                    <div class="item_phone_info">
                                        <img class="icon_phone_info"
                                            src="https://bizweb.dktcdn.net/100/430/553/themes/869096/assets/customer-service.png?1705655184097"
                                            alt="Tư vấn" width="68" height="80">
                                        <div class="tuvanmuahang">
                                            @php
                                                $zalo_chat = json_decode($config->zalo_chat, true);
                                            @endphp
                                            @foreach ($zalo_chat as $item)
                                            <a class="a-hotline" href="tel:{{ str_replace(' ', '', $item['phone']) }}" title="{{ $item['title'] }}">
                                                {{ $item['title'] }}: <span>{{ $item['phone'] }}</span>
                                            </a>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-lg-12 col-col-md-12">
                            <div class="content-pro">
                                <div class="product-tab e-tabs not-dqtab" id="tab-product">
                                    <ul class="tabs tabs-title clearfix">
                                        <li class="tab-link active" data-tab="#tab-1">
                                            <h3>Mô tả sản phẩm</h3>
                                        </li>
                                    </ul>
                                    <div class="tab-float">
                                        <div id="tab-1" class="tab-content active content_extab">
                                            <div class="rte product_getcontent content_coll">
                                                {!! $product->body !!}
                                                <div class="bg_cl"></div>
                                            </div>
                                            <div class="view_mores">
                                                <a class="one">Xem thêm <img width="90" height="90"
                                                        src="/site/images/sortdown.png" alt="Bean Tools"></a>
                                                <a class="two active">Thu gọn <img width="90" height="90"
                                                        src="/site/images/sortdown.png" alt="Bean Tools"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if ($productsRelated->count() > 0)
                <div class="container content-pro">
                    <div class="productRelate productRelate-lq">
                        <div class="title">
                            <h3>
                                <a href="javascript:void(0)" title="Sản phẩm liên quan">
                                    Sản phẩm liên quan
                                    <span class="icon_title">
                                        <svg height="512" viewBox="0 0 24 24" width="512"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g id="_19" data-name="19">
                                                <path
                                                    d="m12 19a1 1 0 0 1 -.71-1.71l5.3-5.29-5.3-5.29a1 1 0 0 1 1.41-1.41l6 6a1 1 0 0 1 0 1.41l-6 6a1 1 0 0 1 -.7.29z" />
                                                <path
                                                    d="m6 19a1 1 0 0 1 -.71-1.71l5.3-5.29-5.3-5.29a1 1 0 0 1 1.42-1.42l6 6a1 1 0 0 1 0 1.41l-6 6a1 1 0 0 1 -.71.3z" />
                                            </g>
                                        </svg>
                                    </span>
                                </a>
                            </h3>
                        </div>
                        <div class="product-relate-swiper swiper-container">
                            <div class="swiper-wrapper">
                                @foreach ($productsRelated as $relatedProduct)
                                    <div class="swiper-slide">
                                        @include('site.products.product_item', [
                                            'product' => $relatedProduct,
                                        ])
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                </div>
            @endif
        </section>
        <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@6.0/dist/fancybox/fancybox.umd.js"></script>
        <script>
            Fancybox.bind('[data-fancybox]', {
                //
            });
        </script>
        <script>
            function activeTab(obj) {
                $('.product-tab ul li').removeClass('active');
                $(obj).addClass('active');
                var id = $(obj).attr('data-tab');
                $('.tab-content').removeClass('active');
                $(id).addClass('active');
            }

            $('.product-tab ul li').click(function() {
                activeTab(this);
                return false;
            });
            var variantsize = false;
            var ww = $(window).width();

            jQuery(function($) {

                // Add label if only one product option and it isn't 'Title'. Could be 'Size'.

                // Hide selectors if we only have 1 variant and its title contains 'Default'.

                $('.selector-wrapper').hide();

                $('.selector-wrapper').css({
                    'text-align': 'left',
                    'margin-bottom': '15px'
                });
            });

            jQuery('.swatch :radio').change(function() {
                var optionIndex = jQuery(this).closest('.swatch').attr('data-option-index');
                var optionValue = jQuery(this).val();
                jQuery(this)
                    .closest('form')
                    .find('.single-option-selector')
                    .eq(optionIndex)
                    .val(optionValue)
                    .trigger('change');
                $(this).closest('.swatch').find('.header .value-roperties').html(optionValue);
            });

            setTimeout(function() {
                $('.swatch .swatch-element').each(function() {
                    $(this).closest('.swatch').find('.header .value-roperties').html($(this).closest('.swatch')
                        .find('input:checked').val());
                });
            }, 500);
        </script>
        <script>
            setTimeout(function() {
                var ch = $('.product_getcontent').height(),
                    smore = $('.show-more');
                if (ch > 700) {
                    $('.ba-text-fpt').addClass('has-height');
                    smore.removeClass('d-none');
                }
            }, 200);
            $('.btn--view-more').on('click', function(e) {
                e.preventDefault();
                var $this = $(this);
                $this.parents('.product_getcontent').toggleClass('expanded');
                $('html, body').animate({
                    scrollTop: $('.product_getcontent').offset().top - 110
                }, 'slow');
                $(this).toggleClass('active');

            });
            $('.product-tab .tab-link h3').on('click', function(e) {
                $(this).closest('.tab-link').find('.tab-content').slideToggle();
                $(this).closest('.tab-link').toggleClass('active');
            });

            $(document).ready(function() {
                var galleryThumbs = new Swiper('.gallery-thumbs', {
                    spaceBetween: 5,
                    slidesPerView: 20,
                    freeMode: true,
                    lazy: true,
                    watchSlidesVisibility: true,
                    watchSlidesProgress: true,
                    hashNavigation: true,
                    slideToClickedSlide: true,
                    breakpoints: {
                        300: {
                            slidesPerView: 3,
                            spaceBetween: 10,
                        },
                        500: {
                            slidesPerView: 3,
                            spaceBetween: 10,
                        },
                        640: {
                            slidesPerView: 4,
                            spaceBetween: 10,
                        },
                        768: {
                            slidesPerView: 5,
                            spaceBetween: 10,
                        },
                        992: {
                            slidesPerView: 4,
                            spaceBetween: 10,
                        },
                        1024: {
                            slidesPerView: 4,
                            spaceBetween: 10
                        },
                        1199: {
                            slidesPerView: 4,
                            spaceBetween: 10
                        }
                    },
                    navigation: {
                        nextEl: '.gallery-thumbs .swiper-button-next',
                        prevEl: '.gallery-thumbs .swiper-button-prev',
                    },
                });
                var galleryTop = new Swiper('.gallery-top', {
                    spaceBetween: 0,
                    lazy: true,
                    hashNavigation: true,
                    thumbs: {
                        swiper: galleryThumbs
                    }
                });
                var swiper = new Swiper('.product-relate-swiper', {
                    slidesPerView: 5,
                    loop: false,
                    grabCursor: true,
                    roundLengths: true,
                    slideToClickedSlide: false,
                    spaceBetween: 15,
                    autoplay: false,
                    navigation: {
                        nextEl: '.product-relate-swiper .swiper-button-next',
                        prevEl: '.product-relate-swiper .swiper-button-prev',
                    },
                    breakpoints: {
                        280: {
                            slidesPerView: 2,
                            spaceBetween: 15
                        },
                        500: {
                            slidesPerView: 2,
                            spaceBetween: 15
                        },
                        640: {
                            slidesPerView: 2,
                            spaceBetween: 15
                        },
                        768: {
                            slidesPerView: 3,
                            spaceBetween: 15
                        },
                        991: {
                            slidesPerView: 4,
                            spaceBetween: 15
                        },
                        1200: {
                            slidesPerView: 5,
                            spaceBetween: 15
                        }
                    }
                });
            });

            $('.view_mores a.one').click(function() {
                $(this).addClass('active');
                $('.view_mores a.two').removeClass('active');
                $('.content_coll').addClass('active');
                $('.bg_cl').addClass('active');
            });
            $('.view_mores a.two').click(function() {
                $(this).addClass('active');
                $('.view_mores a.one').removeClass('active');
                $('.content_coll').removeClass('active');
                $('.bg_cl').removeClass('active');
            });


            $('.reviews_details_product').click(function() {
                scrollToxx();
            })

            function scrollToxx() {
                if ($(window).width() > 767) {
                    $('html, body').animate({
                        scrollTop: $('.product-tab.e-tabs').offset().top
                    }, 'slow');
                    $('.tab-content, .product-tab .tab-link').removeClass('active');
                    $('#tab-3, .product-tab .tab-link:nth-child(3)').addClass('active');
                    return false;
                } else {
                    $('html, body').animate({
                        scrollTop: $('.product-tab.e-tabs #tab-3').offset().top
                    }, 'slow');
                    $('.product-tab.e-tabs #tab-3').addClass('active');
                }
            }
        </script>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('.countdown-content').each(function() {
                const $container = $(this);
                const key = 'countdown_end_time'; // localStorage key
                const timeStr = $container.data('time'); // "HH:MM:SS"
                const timeParts = timeStr.split(':').map(Number);
                const cycleSeconds = timeParts[0] * 3600 + timeParts[1] * 60 + timeParts[2];

                function setNewEndTime() {
                    const newEnd = Date.now() + cycleSeconds * 1000;
                    localStorage.setItem(key, newEnd);
                    return newEnd;
                }

                // Lấy endTime từ localStorage hoặc khởi tạo mới
                let endTime = parseInt(localStorage.getItem(key), 10);
                if (!endTime || isNaN(endTime) || endTime <= Date.now()) {
                    endTime = setNewEndTime();
                }

                function updateDisplay(secondsLeft) {
                    const hrs = String(Math.floor(secondsLeft / 3600)).padStart(2, '0');
                    const mins = String(Math.floor((secondsLeft % 3600) / 60)).padStart(2, '0');
                    const secs = String(secondsLeft % 60).padStart(2, '0');

                    const $numbers = $container.find('.countdown-item-number');
                    $numbers.eq(0).text(hrs);
                    $numbers.eq(1).text(mins);
                    $numbers.eq(2).text(secs);
                }

                updateDisplay(Math.floor((endTime - Date.now()) / 1000)); // Hiển thị ban đầu

                setInterval(function() {
                    const now = Date.now();
                    let remainingSeconds = Math.floor((endTime - now) / 1000);

                    if (remainingSeconds <= 0) {
                        endTime = setNewEndTime(); // Reset lại thời gian mới
                        remainingSeconds = cycleSeconds;
                    }

                    updateDisplay(remainingSeconds);
                }, 1000);
            });
        });

        // Plus number quantiy product detail
        var plusQuantity = function() {
            if (jQuery('input[name="quantity"]').val() != undefined) {
                var currentVal = parseInt(jQuery('input[name="quantity"]').val());
                if (!isNaN(currentVal)) {
                    jQuery('input[name="quantity"]').val(currentVal + 1);
                } else {
                    jQuery('input[name="quantity"]').val(1);
                }
            } else {
                console.log('error: Not see elemnt ' + jQuery('input[name="quantity"]').val());
            }
        }
        // Minus number quantiy product detail
        var minusQuantity = function() {
            if (jQuery('input[name="quantity"]').val() != undefined) {
                var currentVal = parseInt(jQuery('input[name="quantity"]').val());
                if (!isNaN(currentVal) && currentVal > 1) {
                    jQuery('input[name="quantity"]').val(currentVal - 1);
                }
            } else {
                console.log('error: Not see elemnt ' + jQuery('input[name="quantity"]').val());
            }
        }
        app.controller('ProductDetailController', function($scope, $http, $interval, cartItemSync, $rootScope, $compile) {
            $scope.product = @json($product);
            $scope.form = {
                quantity: 1
            };

            $scope.selectedAttributes = [];
            jQuery('.product-attribute-values .badge').click(function() {
                if (!jQuery(this).hasClass('active')) {
                    jQuery(this).parent().find('.badge').removeClass('active');
                    jQuery(this).addClass('active');
                    if ($scope.selectedAttributes.length > 0 && $scope.selectedAttributes.find(item => item
                            .index == jQuery(this).data('index'))) {
                        $scope.selectedAttributes.find(item => item.index == jQuery(this).data('index'))
                            .value = jQuery(this).data('value');
                    } else {
                        let index = jQuery(this).data('index');
                        $scope.selectedAttributes.push({
                            index: index,
                            name: jQuery(this).data('name'),
                            value: jQuery(this).data('value'),
                        });
                    }
                } else {
                    jQuery(this).parent().find('.badge').removeClass('active');
                    jQuery(this).removeClass('active');
                    $scope.selectedAttributes = $scope.selectedAttributes.filter(item => item.index !=
                        jQuery(this).data('index'));
                }
                $scope.$apply();
            });

            $scope.addToCartFromProductDetail = function() {
                let quantity = $('#add-to-cart-form input[name="quantity"]').val();

                url = "{{ route('cart.add.item', ['productId' => 'productId']) }}";
                url = url.replace('productId', $scope.product.id);

                jQuery.ajax({
                    type: 'POST',
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    data: {
                        'qty': parseInt(quantity),
                        'attributes': $scope.selectedAttributes
                    },
                    success: function(response) {
                        if (response.success) {
                            if (response.count > 0) {
                                $scope.hasItemInCart = true;
                            }

                            $interval.cancel($rootScope.promise);

                            $rootScope.promise = $interval(function() {
                                cartItemSync.items = response.items;
                                cartItemSync.total = response.total;
                                cartItemSync.count = response.count;
                            }, 1000);
                            toastr.success('Thao tác thành công !')
                        }
                    },
                    error: function() {
                        toastr.error('Thao tác thất bại !')
                    },
                    complete: function() {
                        $scope.$applyAsync();
                    }
                });
            }

            $scope.addToCartCheckoutFromProductDetail = function() {
                let quantity = $('#add-to-cart-form input[name="quantity"]').val();
                url = "{{ route('cart.add.item', ['productId' => 'productId']) }}";
                url = url.replace('productId', $scope.product.id);

                jQuery.ajax({
                    type: 'POST',
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    data: {
                        'qty': parseInt(quantity),
                        'attributes': $scope.selectedAttributes
                    },
                    success: function(response) {
                        if (response.success) {
                            if (response.count > 0) {
                                $scope.hasItemInCart = true;
                            }

                            $interval.cancel($rootScope.promise);

                            $rootScope.promise = $interval(function() {
                                cartItemSync.items = response.items;
                                cartItemSync.total = response.total;
                                cartItemSync.count = response.count;
                            }, 1000);
                            toastr.success('Thao tác thành công !')
                            window.location.href = "{{ route('cart.checkout') }}";
                        }
                    },
                    error: function() {
                        toastr.error('Thao tác thất bại !')
                    },
                    complete: function() {
                        $scope.$applyAsync();
                    }
                });
            }
        });
    </script>
@endpush
