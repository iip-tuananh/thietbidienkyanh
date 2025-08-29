@extends('site.layouts.master')
@section('title')
    {{ $config->meta_title ?? $config->web_title }}
@endsection
@section('description')
    {{ $config->web_des }}
@endsection
@section('image')
    {{ url('' . $banners[0]->image->path) }}
@endsection
@section('css')
@endsection
@section('content')
    <div class="bodywrap">
        <div class="container">
            <div class="box_slide_banner">
                <div class="home-slider swiper-container">
                    <div class="swiper-wrapper">
                        @foreach ($banners as $banner)
                            <div class="swiper-slide">
                                <a href="{{ $banner->link }}" class="clearfix" title="{{ $banner->title }}">
                                    <picture>
                                        <source media="(min-width: 1200px)"
                                            srcset="{{ $banner->image ? $banner->image->path : 'https://placehold.co/870x445' }}">
                                        <source media="(min-width: 992px)"
                                            srcset="{{ $banner->image ? $banner->image->path : 'https://placehold.co/870x445' }}">
                                        <source media="(min-width: 991px)"
                                            srcset="{{ $banner->image ? $banner->image->path : 'https://placehold.co/870x445' }}">
                                        <source media="(max-width: 767px)"
                                            srcset="{{ $banner->image ? $banner->image->path : 'https://placehold.co/870x445' }}">
                                        <img width="870" height="445"
                                            src="{{ $banner->image ? $banner->image->path : 'https://placehold.co/870x445' }}"
                                            alt="Slider 1" class="img-responsive" />
                                    </picture>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="banner_slide">
                    @foreach ($smallBanners as $bannerSmall)
                        <a href="{{ $bannerSmall->link }}" title="{{ $bannerSmall->title }}">
                            <img width="418" height="240"
                                src="{{ $bannerSmall->image ? $bannerSmall->image->path : 'https://placehold.co/418x240' }}"
                                alt="Banner" />
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
        <script>
            var swiper = new Swiper('.home-slider', {
                loop: true,
                autoplay: {
                    delay: 4500,
                }
            });
        </script>
        {{-- <section class="section_search">
            <div class="container">
                <div class="widget_search_box advance_option pc offFunction clearfix">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 col-12">
                            <div class="option_ advance_1">
                                <select name="category1" id="category1">
                                    <option value="">Chọn danh mục</option>
                                    <option data-link="3309834" value="/cong-cu-cam-tay">Công cụ cầm tay</option>
                                    <option data-link="3309906" value="/may-bom">Máy bơm</option>
                                    <option data-link="3310334" value="/may-han-phu-kien">Máy hàn - phụ kiện</option>
                                    <option data-link="3310400" value="/thiet-bi-nang-do">Thiết bị nâng đỡ</option>
                                    <option data-link="3310454" value="/dong-co-xang">Động cơ xăng</option>
                                    <option data-link="3310790" value="/thiet-bi-gia-dinh">Thiết bị gia đình</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 col-12">
                            <div class="option_ advance_2">
                                <select class="subcat" id="category2" name="category2">
                                    <option disabled="disabled" selected="selected">Chọn thương hiệu</option>
                                    <optgroup label="Chọn thương hiệu" data-rel="/cong-cu-cam-tay">
                                        <option data-link="Makita" value="Makita">Makita</option>
                                        <option data-link="Makute" value="Makute">Makute</option>
                                        <option data-link="Stihl" value="Stihl">Stihl</option>
                                        <option data-link="Hyundai" value="Hyundai">Hyundai</option>
                                        <option data-link="Stanley" value="Stanley">Stanley</option>
                                        <option data-link="Black%20Decker" value="Black Decker">Black Decker</option>
                                        <option data-link="Dewalt" value="Dewalt">Dewalt</option>
                                        <option data-link="Bosch" value="Bosch">Bosch</option>
                                    </optgroup>
                                    <optgroup label="Chọn thương hiệu" data-rel="/may-bom">
                                        <option data-link="Honda" value="Honda">Honda</option>
                                        <option data-link="Lavor" value="Lavor">Lavor</option>
                                        <option data-link="Panasonic" value="Panasonic">Panasonic</option>
                                        <option data-link="Pentax" value="Pentax">Pentax</option>
                                        <option data-link="Super%20Win" value="Super Win">Super Win</option>
                                    </optgroup>
                                    <optgroup label="Chọn thương hiệu" data-rel="/may-han-phu-kien">
                                        <option data-link="Hồng%20Ký" value="Hồng Ký">Hồng Ký</option>
                                        <option data-link="Black%20Decker" value="Black Decker">Black Decker</option>
                                        <option data-link="Dewalt" value="Dewalt">Dewalt</option>
                                    </optgroup>
                                    <optgroup label="Chọn thương hiệu" data-rel="/thiet-bi-nang-do">
                                        <option data-link="Honda" value="Honda">Honda</option>
                                        <option data-link="Stanley" value="Stanley">Stanley</option>
                                        <option data-link="Arwa" value="Arwa">Arwa</option>
                                        <option data-link="AVT" value="AVT">AVT</option>
                                        <option data-link="Yamado" value="Yamado">Yamado</option>
                                    </optgroup>
                                    <optgroup label="Chọn thương hiệu" data-rel="/dong-co-xang">
                                        <option data-link="Honda" value="Honda">Honda</option>
                                    </optgroup>
                                    <optgroup label="Chọn thương hiệu" data-rel="/thiet-bi-gia-dinh">
                                        <option data-link="HiClean" value="HiClean">HiClean</option>
                                        <option data-link="Bosch" value="Bosch">Bosch</option>
                                        <option data-link="Dewalt" value="Dewalt">Dewalt</option>
                                        <option data-link="Makita" value="Makita">Makita</option>
                                        <option data-link="Advindeq" value="Advindeq">Advindeq</option>
                                        <option data-link="Sumo" value="Sumo">Sumo</option>
                                        <option data-link="Super%20Win" value="Super Win">Super Win</option>
                                        <option data-link="Stanley" value="Stanley">Stanley</option>
                                        <option data-link="Hasaki" value="Hasaki">Hasaki</option>
                                        <option data-link="FujiE" value="FujiE">FujiE</option>
                                        <option data-link="Cello" value="Cello">Cello</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 col-12">
                            <div class="option_ advance_3">
                                <select class="subcat" id="category3" name="category3">
                                    <option disabled="disabled" selected="selected">Loại sản phẩm</option>
                                    <optgroup label="Loại sản phẩm" data-rel="/cong-cu-cam-tay">
                                        <option data-link="Máy%20đánh%20bóng" value="Máy đánh bóng">Máy đánh bóng</option>
                                        <option data-link="Máy%20chà" value="Máy chà">Máy chà</option>
                                        <option data-link="Phụ%20kiện%20dụng%20cụ" value="Phụ kiện dụng cụ">Phụ kiện dụng
                                            cụ</option>
                                        <option data-link="Máy%20cưa" value="Máy cưa">Máy cưa</option>
                                        <option data-link="Máy%20mài" value="Máy mài">Máy mài</option>
                                        <option data-link="Máy%20khoan%20xoay" value="Máy khoan xoay">Máy khoan xoay
                                        </option>
                                        <option data-link="Máy%20khoan%20pin" value="Máy khoan pin">Máy khoan pin</option>
                                        <option data-link="Máy%20khoan%20động%20lực" value="Máy khoan động lực">Máy khoan
                                            động lực</option>
                                    </optgroup>
                                    <optgroup label="Loại sản phẩm" data-rel="/may-bom">
                                        <option data-link="Máy%20nén" value="Máy nén">Máy nén</option>
                                        <option data-link="Máy%20bơm" value="Máy bơm">Máy bơm</option>
                                    </optgroup>
                                    <optgroup label="Loại sản phẩm" data-rel="/may-han-phu-kien">
                                        <option data-link="Máy%20hàn" value="Máy hàn">Máy hàn</option>
                                        <option data-link="Máy%20cắt" value="Máy cắt">Máy cắt</option>
                                        <option data-link="Phụ%20kiện%20dụng%20cụ" value="Phụ kiện dụng cụ">Phụ kiện dụng
                                            cụ</option>
                                    </optgroup>
                                    <optgroup label="Loại sản phẩm" data-rel="/thiet-bi-nang-do">
                                        <option data-link="Máy%20bơm" value="Máy bơm">Máy bơm</option>
                                        <option data-link="Máy%20phun" value="Máy phun">Máy phun</option>
                                        <option data-link="Máy%20cắt" value="Máy cắt">Máy cắt</option>
                                        <option data-link="Xe%20đẩy%20hàng" value="Xe đẩy hàng">Xe đẩy hàng</option>
                                        <option data-link="Kích%20thủy%20lực" value="Kích thủy lực">Kích thủy lực</option>
                                        <option data-link="Máy%20tời" value="Máy tời">Máy tời</option>
                                    </optgroup>
                                    <optgroup label="Loại sản phẩm" data-rel="/dong-co-xang">
                                        <option data-link="Máy%20bơm" value="Máy bơm">Máy bơm</option>
                                        <option data-link="Máy%20phun" value="Máy phun">Máy phun</option>
                                        <option data-link="Máy%20cắt" value="Máy cắt">Máy cắt</option>
                                    </optgroup>
                                    <optgroup label="Loại sản phẩm" data-rel="/thiet-bi-gia-dinh">
                                        <option data-link="Máy%20lọc%20không%20khí" value="Máy lọc không khí">Máy lọc
                                            không khí</option>
                                        <option data-link="Máy%20giặt%20thảm" value="Máy giặt thảm">Máy giặt thảm</option>
                                        <option data-link="Máy%20hút%20bụi" value="Máy hút bụi">Máy hút bụi</option>
                                        <option data-link="Thang%20rút" value="Thang rút">Thang rút</option>
                                        <option data-link="Thang%20nhôm" value="Thang nhôm">Thang nhôm</option>
                                        <option data-link="Thang%20ghế" value="Thang ghế">Thang ghế</option>
                                        <option data-link="Quạt%20thông%20gió" value="Quạt thông gió">Quạt thông gió
                                        </option>
                                        <option data-link="Quạt%20công%20nghiệp" value="Quạt công nghiệp">Quạt công nghiệp
                                        </option>
                                        <option data-link="Máy%20làm%20mát" value="Máy làm mát">Máy làm mát</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 col-12">
                            <a href="javascript:;" class="widget_search_btn widget_search_box_item">Tìm kiếm</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script>
            $(function() {
                var $cat = $("#category1"),
                    $subcat = $(".subcat");
                var optgroups = {};
                $subcat.each(function(i, v) {
                    var $e = $(v);
                    var _id = $e.attr("id");
                    optgroups[_id] = {};
                    $e.find("optgroup").each(function() {
                        var _r = $(this).data("rel");
                        $(this).find("option").addClass("is-dyn");
                        optgroups[_id][_r] = $(this).html();
                    });
                });
                $subcat.find("optgroup").remove();
                var _lastRel;
                $cat.on("change", function() {
                    var _rel = $(this).val();
                    if (_lastRel === _rel) return true;
                    _lastRel = _rel;
                    $subcat.find("option").attr("style", "");
                    $subcat.val("");
                    $subcat.find(".is-dyn").remove();
                    if (!_rel) return $subcat.prop("disabled", true);
                    $subcat.each(function() {
                        var $el = $(this);
                        var _id = $el.attr("id");
                        $el.append(optgroups[_id][_rel]);
                    });
                    $subcat.prop("disabled", false);
                });
            });
            $('.widget_search_btn').click(function(e) {
                var category = $('.advance_1 option:selected').attr('data-link'),
                    vendor = $('.advance_2 option:selected').attr('data-link'),
                    type = $('.advance_3 option:selected').attr('data-link'),
                    and = '%20AND%20',
                    or = '%20OR%20';
                if (typeof category === 'undefined') {
                    var categorys = '';
                } else {
                    var categorys = category;
                }
                if (typeof vendor === 'undefined') {
                    var vendors = '';
                } else {
                    var vendors = vendor;
                }
                if (typeof type === 'undefined') {
                    var types = '';
                } else {
                    var types = type;
                }
                if (categorys == '' && vendors == '' && types == '') {
                    alert("Bạn cần chọn trường tìm kiếm");
                } else if (categorys != '' && vendors == '' && types == '') {
                    window.location.href = '/search?query=collections:' + categorys + '';
                } else if (categorys != '' && vendors != '' && types == '') {
                    window.location.href = '/search?query=collections:' + categorys + '' + and + 'vendor:(' + vendors +
                        ')';
                } else if (categorys != '' && vendors == '' && types != '') {
                    window.location.href = '/search?query=collections:' + categorys + '' + and + 'product_type:(' +
                        types + ')';
                } else if (categorys != '' && vendors != '' && types != '') {
                    window.location.href = '/search?query=collections:' + categorys + '' + and + 'vendor:(' + vendors +
                        ')' + and + 'product_type:(' + types + ')';
                }
            });
        </script> --}}

        @if (isset($productCategories) && $productCategories->count() > 0)
            <section class="section_cate container">
                <h2 class="title-module">
                    <a href="javascript:void(0)" title="Danh mục nổi bật">
                        Danh mục nổi bật
                        <span class="icon_title">
                            <svg height="512" viewBox="0 0 24 24" width="512" xmlns="http://www.w3.org/2000/svg">
                                <g id="_19" data-name="19">
                                    <path
                                        d="m12 19a1 1 0 0 1 -.71-1.71l5.3-5.29-5.3-5.29a1 1 0 0 1 1.41-1.41l6 6a1 1 0 0 1 0 1.41l-6 6a1 1 0 0 1 -.7.29z" />
                                    <path
                                        d="m6 19a1 1 0 0 1 -.71-1.71l5.3-5.29-5.3-5.29a1 1 0 0 1 1.42-1.42l6 6a1 1 0 0 1 0 1.41l-6 6a1 1 0 0 1 -.71.3z" />
                                </g>
                            </svg>
                        </span>
                    </a>
                </h2>
                <div class="box_cate_index">
                    @foreach ($productCategories as $category)
                        <div class="item-cate">
                            <a href="{{ $category->category_url }}" title="{{ $category->name }}" class="opaci_href"></a>
                            <div class="item-cate-content">
                                <div class="item-pro-cate">
                                        <img width="480" height="480" class="lazyload"
                                            src="{{ $category->image ? $category->image->path : 'https://placehold.co/480x480' }}"
                                            alt="{{ $category->name }}" />
                                </div>
                                <div class="item-cate-content-title">
                                    <h3>{{ $category->name }}</h3>
                                    <span>( {{ $category->products->count() }} sản phẩm )</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <style>
                        .item-cate-content {
                            display: flex;
                            align-items: center;
                            gap: 10px;
                            align-content: center;
                            justify-content: space-between;
                        }

                        .item-pro-cate {
                            max-width: 45%;
                            max-height: 120px;
                        }

                        .item-pro-cate img {
                            width: 100%;
                            height: 120px;
                            object-fit: cover;
                        }

                        .item-cate-content-title {
                            width: 55%;
                        }
                    </style>
                </div>
            </section>
        @endif

        @if (isset($categorySpecialFlashsale))
            <section class="section_flash_sale container">
                <div class="title">
                    <h2 class="title-module-flash">
                        <a href="{{ $categorySpecialFlashsale->category_url }}"
                            title="{{ $categorySpecialFlashsale->name }}">
                            <img width="20" height="36" src="/site/images/flash.svg"
                                alt="{{ $categorySpecialFlashsale->name }}" /> {{ $categorySpecialFlashsale->name }}
                        </a>
                    </h2>
                    <div class="count-down">
                        <div class="timer-view" data-countdown="countdown"
                            data-date="{{ date('Y-m-d-H-i-s', strtotime($categorySpecialFlashsale->end_date)) }}"></div>
                    </div>
                </div>
                <div class="box_flash_sale">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 d-lg-block d-none">
                            <a href="{{ $categorySpecialFlashsale->category_url }}"
                                title="{{ $categorySpecialFlashsale->name }}" class="img_flash_sale">
                                <img alt="{{ $categorySpecialFlashsale->name }}" width="800" height="800"
                                    class="lazyload img_about"
                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                                    data-src="{{ $categorySpecialFlashsale->image ? $categorySpecialFlashsale->image->path : 'https://placehold.co/800x800' }}">
                            </a>
                        </div>
                        <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12">
                            <div class="product-flash-swiper swiper-container">
                                <div class="swiper-wrapper load-after" data-section="section_flash_sale">
                                    @foreach ($categorySpecialFlashsale->products as $product)
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-xs-12 swiper-slide item_null">
                                            @include('site.products.product_item', ['product' => $product])
                                        </div>
                                    @endforeach
                                </div>
                                <div class="swiper-button-prev"></div>
                                <div class="swiper-button-next"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <script>
                $(document).ready(function($) {
                    function runSwiperSale() {
                        var swi_deal_pro = null;

                        function initSwiperSale() {
                            swi_deal_pro = new Swiper('.product-flash-swiper', {
                                slidesPerView: 3,
                                loop: false,
                                grabCursor: true,
                                roundLengths: true,
                                slideToClickedSlide: false,
                                spaceBetween: 15,
                                autoplay: false,
                                navigation: {
                                    nextEl: '.product-flash-swiper .swiper-button-next',
                                    prevEl: '.product-flash-swiper .swiper-button-prev',
                                },
                                breakpoints: {
                                    300: {
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
                                        slidesPerView: 3,
                                        spaceBetween: 15
                                    },
                                    1200: {
                                        slidesPerView: 3,
                                        spaceBetween: 15
                                    }
                                }
                            });
                        }

                        function destroySwiperSale() {
                            if (swi_deal_pro) {
                                swi_deal_pro.destroy(true, true);
                                swi_deal_pro = null;
                            }
                        }

                        function toggleSwiperPro1() {
                            if ($(window).width() <= 767 && swi_deal_pro) {
                                destroySwiperSale();
                            } else if ($(window).width() > 767 && !swi_deal_pro) {
                                initSwiperSale();
                            }
                        }
                        toggleSwiperPro1();
                        $(window).resize(toggleSwiperPro1);
                    }
                    lazyBlockProduct('section_flash_sale', '0px 0px -250px 0px', runSwiperSale);
                });
            </script>
        @endif

        @foreach ($categorySpecial as $key => $category)
            @if ($key == 0)
                <section class="section_product_1">
                    <div class="container">
                        <h2 class="title-module">
                            <a href="{{ $category->category_url }}" title="{{ $category->name }}">
                                {{ $category->name }}
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
                        </h2>
                        <div class="product-col1-swiper swiper-container">
                            <div class="swiper-wrapper load-after" data-section="section_product_1">
                                @foreach ($category->products as $product)
                                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-xs-12 swiper-slide item_null">
                                        @include('site.products.product_item', ['product' => $product])
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </section>
                <script>
                    $(document).ready(function($) {
                        function runSwiperCol1() {
                            var col1_pro = null;

                            function initSwiperCol1() {
                                col1_pro = new Swiper('.product-col1-swiper', {
                                    slidesPerView: 5,
                                    loop: false,
                                    grabCursor: true,
                                    roundLengths: true,
                                    slideToClickedSlide: false,
                                    spaceBetween: 15,
                                    autoplay: false,
                                    navigation: {
                                        nextEl: '.product-col1-swiper .swiper-button-next',
                                        prevEl: '.product-col1-swiper .swiper-button-prev',
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
                            }

                            function destroySwiperCol1() {
                                if (col1_pro) {
                                    col1_pro.destroy(true, true);
                                    col1_pro = null;
                                }
                            }

                            function toggleSwiperCol1() {
                                if ($(window).width() <= 767 && col1_pro) {
                                    destroySwiperCol1();
                                } else if ($(window).width() > 767 && !col1_pro) {
                                    initSwiperCol1();
                                }
                            }
                            toggleSwiperCol1();
                            $(window).resize(toggleSwiperCol1);
                        }
                        lazyBlockProduct('section_product_1', '0px 0px -250px 0px', runSwiperCol1);
                    });
                </script>
                <section class="section_3_banner">
                    <div class="container">
                        <div class="box_banner_index row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <a class="three_banner" href="{{ $category->category_url }}"
                                    title="{{ $category->name }}">
                                    <img width="1920" height="225" class="lazyload"
                                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                                        data-src="{{ $category->image ? $category->image->path : 'https://placehold.co/1920x225' }}"
                                        alt="{{ $category->name }}" />
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
            @else
                <section class="section_product_2">
                    <div class="container">
                        <h2 class="title-module">
                            <a href="{{ $category->category_url }}" title="{{ $category->name }}">
                                {{ $category->name }}
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
                        </h2>
                        <div class="row">
                            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12 col-12 order-2 order-lg-1">
                                <div class="banner_col_2">
                                    <a class="banner_men" href="{{ $category->category_url }}"
                                        title="{{ $category->name }}">
                                        <img width="380" height="720" class="lazyload"
                                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                                            data-src="{{ $category->image ? $category->image->path : 'https://placehold.co/380x720' }}"
                                            alt="{{ $category->name }}" />
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 order-1 order-lg-2 col-xs-12 col-12">
                                <div class="product-col2-swiper swiper-container">
                                    <div class="swiper-wrapper load-after" data-section="section_product_2">
                                        @foreach ($category->products as $product)
                                            <div
                                                class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-xs-12 swiper-slide item_null">
                                                @include('site.products.product_item', [
                                                    'product' => $product,
                                                ])
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="swiper-button-prev"></div>
                                    <div class="swiper-button-next"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <script>
                    $(document).ready(function($) {
                        function runSwiperCol2() {
                            var col2_pro = null;

                            function initSwiperCol2() {
                                col2_pro = new Swiper('.product-col2-swiper', {
                                    slidesPerView: 5,
                                    loop: false,
                                    grabCursor: true,
                                    roundLengths: true,
                                    slideToClickedSlide: false,
                                    spaceBetween: 15,
                                    autoplay: false,
                                    navigation: {
                                        nextEl: '.product-col2-swiper .swiper-button-next',
                                        prevEl: '.product-col2-swiper .swiper-button-prev',
                                    },
                                    breakpoints: {
                                        300: {
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
                                            slidesPerView: 3,
                                            spaceBetween: 15,
                                            slidesPerColumn: 2,
                                            slidesPerColumnFill: 'row',
                                        },
                                        1200: {
                                            slidesPerView: 4,
                                            spaceBetween: 15,
                                            slidesPerColumn: 2,
                                            slidesPerColumnFill: 'row',
                                        }
                                    }
                                });
                            }

                            function destroySwiperCol2() {
                                if (col2_pro) {
                                    col2_pro.destroy(true, true);
                                    col2_pro = null;
                                }
                            }

                            function toggleSwiperCol2() {
                                if ($(window).width() <= 767 && col2_pro) {
                                    destroySwiperCol2();
                                } else if ($(window).width() > 767 && !col2_pro) {
                                    initSwiperCol2();
                                }
                            }
                            toggleSwiperCol2();
                            $(window).resize(toggleSwiperCol2);
                        }
                        lazyBlockProduct('section_product_2', '0px 0px -250px 0px', runSwiperCol2);
                    });
                </script>
            @endif
        @endforeach

        <section class="section_brand">
            <div class="container">
                <h2 class="title-module">
                    <a href="javascript:void(0)" title="Thương hiệu nổi bật">
                        Thương hiệu nổi bật
                        <span class="icon_title">
                            <svg height="512" viewBox="0 0 24 24" width="512" xmlns="http://www.w3.org/2000/svg">
                                <g id="_19" data-name="19">
                                    <path
                                        d="m12 19a1 1 0 0 1 -.71-1.71l5.3-5.29-5.3-5.29a1 1 0 0 1 1.41-1.41l6 6a1 1 0 0 1 0 1.41l-6 6a1 1 0 0 1 -.7.29z" />
                                    <path
                                        d="m6 19a1 1 0 0 1 -.71-1.71l5.3-5.29-5.3-5.29a1 1 0 0 1 1.42-1.42l6 6a1 1 0 0 1 0 1.41l-6 6a1 1 0 0 1 -.71.3z" />
                                </g>
                            </svg>
                        </span>
                    </a>
                </h2>
                <div class="swiper_brands swiper-container control-top">
                    <div class="swiper-wrapper box_list_brand">
                        @foreach ($partners as $partner)
                            <div class="swiper-slide">
                                <div class="item_list_brand">
                                    <a href="{{ $partner->link }}" title="{{ $partner->name }}" class="brand-item">
                                        <img data-src="{{ $partner->image ? $partner->image->path : 'https://placehold.co/225x113' }}"
                                            alt="{{ $partner->name }}" width="225" height="113" class="lazyload"
                                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" />
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
        </section>
        <script>
            $(document).ready(function($) {
                var swiper_brand = null;

                function initSwiperBrand() {
                    swiper_brand = new Swiper('.swiper_brands', {
                        slidesPerView: 8,
                        spaceBetween: 20,
                        watchOverflow: true,
                        slidesPerGroup: 1,
                        navigation: {
                            nextEl: '.swiper_brands .swiper-button-next',
                            prevEl: '.swiper_brands .swiper-button-prev',
                        },
                        breakpoints: {
                            640: {
                                slidesPerView: 5,
                                spaceBetween: 0
                            },
                            768: {
                                slidesPerView: 5,
                                spaceBetween: 0
                            },
                            992: {
                                slidesPerView: 5,
                                spaceBetween: 0
                            },
                            1024: {
                                slidesPerView: 6,
                                spaceBetween: 0
                            },
                            1200: {
                                slidesPerView: 8,
                                spaceBetween: 0
                            }
                        }
                    });
                }

                function destroySwiperBrand() {
                    if (swiper_brand) {
                        swiper_brand.destroy(true, true);
                        swiper_brand = null;
                    }
                }

                function toggleSwiperBrand() {
                    if ($(window).width() <= 767 && swiper_brand) {
                        destroySwiperBrand();
                    } else if ($(window).width() > 767 && !swiper_brand) {
                        initSwiperBrand();
                    }
                }
                toggleSwiperBrand();
                $(window).on('resize', function() {
                    toggleSwiperBrand();
                });
            });
        </script>

        {{-- <section class="section_product_4">
            <div class="container">
                <div class="row load-after" data-section="section_product_4">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="item_product_four">
                            <div class="product-thumbnail">
                                <a class="image_thumb scale_hover" href="/may-loc-khong-khi-ket-noi-wifi-fujie"
                                    title="Máy lọc không khí kết nối Wifi FujiE">
                                    <img width="520" height="520" class="lazyload image1 loaded"
                                        src="//bizweb.dktcdn.net/thumb/large/100/509/495/products/ap300-6-c97c48ca208b466e811ec80d08fd83f8.jpg?v=1708591027793"
                                        data-src="//bizweb.dktcdn.net/thumb/large/100/509/495/products/ap300-6-c97c48ca208b466e811ec80d08fd83f8.jpg?v=1708591027793"
                                        alt="Máy lọc không khí kết nối Wifi FujiE" data-was-processed="true">
                                </a>
                                <div class="smart"><span>-
                                        9%
                                    </span>
                                </div>
                                <div class="badge">
                                    <span class="new">Hàng mới</span>
                                </div>
                            </div>
                            <div class="product-info">
                                <h3 class="product-name"><a class="line-clamp line-clamp-2"
                                        href="/may-loc-khong-khi-ket-noi-wifi-fujie"
                                        title="Máy lọc không khí kết nối Wifi FujiE">Máy lọc không khí kết nối Wifi
                                        FujiE</a></h3>
                                <p class="content_pro line-clamp line-clamp-2">
                                    Máy lọc không khí kết nối Wifi FujiE AP300
                                    Ưu điểm nổi bật:
                                    Tốc độ quạt gió:...
                                </p>
                                <div class="price-box">
                                    2.800.000₫
                                    <span class="compare-price">3.080.000₫</span>
                                </div>
                                <div class="star_compar">
                                    <a href="javascript:void(0)" class="setCompare btn-views js-compare-product-add"
                                        data-compare="may-loc-khong-khi-ket-noi-wifi-fujie" data-type="Máy lọc không khí"
                                        tabindex="0" title="So sánh">
                                        <i></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="item_product_four">
                            <div class="product-thumbnail">
                                <a class="image_thumb scale_hover" href="/may-hut-bui-3-chuc-nang"
                                    title="Máy hút bụi 3 chức năng">
                                    <img width="520" height="520" class="lazyload image1 loaded"
                                        src="//bizweb.dktcdn.net/thumb/large/100/509/495/products/dacs-dxv23p3-f1ccc60d7ac548a9ae1.jpg?v=1708576223153"
                                        data-src="//bizweb.dktcdn.net/thumb/large/100/509/495/products/dacs-dxv23p3-f1ccc60d7ac548a9ae1.jpg?v=1708576223153"
                                        alt="Máy hút bụi 3 chức năng" data-was-processed="true">
                                </a>
                                <div class="smart"><span>-
                                        10%
                                    </span>
                                </div>
                                <div class="badge">
                                    <span class="new">Hàng mới</span>
                                    <span class="best">Bán chạy</span>
                                </div>
                            </div>
                            <div class="product-info">
                                <h3 class="product-name"><a class="line-clamp line-clamp-2"
                                        href="/may-hut-bui-3-chuc-nang" title="Máy hút bụi 3 chức năng">Máy hút bụi 3 chức
                                        năng</a></h3>
                                <p class="content_pro line-clamp line-clamp-2">
                                    Máy hút bụi 3 chức năng Dewalt DXV23P
                                    Máy hút bụi 3 chức năng Dewalt USA...
                                </p>
                                <div class="price-box">
                                    3.950.000₫
                                    <span class="compare-price">4.390.000₫</span>
                                </div>
                                <div class="star_compar">
                                    <a href="javascript:void(0)" class="setCompare btn-views js-compare-product-add"
                                        data-compare="may-hut-bui-3-chuc-nang" data-type="Máy hút bụi" tabindex="0"
                                        title="So sánh">
                                        <i></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="item_product_four">
                            <div class="product-thumbnail">
                                <a class="image_thumb scale_hover" href="/quat-cong-nghiep-24-inch-stanley"
                                    title="Quạt công nghiệp 24 inch Stanley">
                                    <img width="520" height="520" class="lazyload image1 loaded"
                                        src="//bizweb.dktcdn.net/thumb/large/100/509/495/products/quat-cong-nghiep-24-inch-stanley.jpg?v=1708508923143"
                                        data-src="//bizweb.dktcdn.net/thumb/large/100/509/495/products/quat-cong-nghiep-24-inch-stanley.jpg?v=1708508923143"
                                        alt="Quạt công nghiệp 24 inch Stanley" data-was-processed="true">
                                </a>
                                <div class="smart"><span>-
                                        21%
                                    </span>
                                </div>
                            </div>
                            <div class="product-info">
                                <h3 class="product-name"><a class="line-clamp line-clamp-2"
                                        href="/quat-cong-nghiep-24-inch-stanley"
                                        title="Quạt công nghiệp 24 inch Stanley">Quạt công nghiệp 24 inch Stanley</a></h3>
                                <p class="content_pro line-clamp line-clamp-2">
                                    Quạt công nghiệp 24 inch Stanley SLF306027
                                    Ưu Điểm Nổi Bật:
                                    3 cánh hợp kim nhôm nhẹ...
                                </p>
                                <div class="price-box">
                                    3.290.000₫
                                    <span class="compare-price">4.140.000₫</span>
                                </div>
                                <div class="star_compar">
                                    <a href="javascript:void(0)" class="setCompare btn-views js-compare-product-add"
                                        data-compare="quat-cong-nghiep-24-inch-stanley" data-type="Quạt công nghiệp"
                                        tabindex="0" title="So sánh">
                                        <i></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="item_product_four">
                            <div class="product-thumbnail">
                                <a class="image_thumb scale_hover" href="/may-phun-thuoc-honda"
                                    title="Máy phun thuốc Honda">
                                    <img width="520" height="520" class="lazyload image1 loaded"
                                        src="//bizweb.dktcdn.net/thumb/large/100/509/495/products/may-phun-thuoc-honda-wjr4025t-gc.jpg?v=1708490931677"
                                        data-src="//bizweb.dktcdn.net/thumb/large/100/509/495/products/may-phun-thuoc-honda-wjr4025t-gc.jpg?v=1708490931677"
                                        alt="Máy phun thuốc Honda" data-was-processed="true">
                                </a>
                                <div class="smart"><span>-
                                        19%
                                    </span>
                                </div>
                            </div>
                            <div class="product-info">
                                <h3 class="product-name"><a class="line-clamp line-clamp-2" href="/may-phun-thuoc-honda"
                                        title="Máy phun thuốc Honda">Máy phun thuốc Honda</a></h3>
                                <p class="content_pro line-clamp line-clamp-2">
                                    Thông tin chi tiết máy phun thuốc Honda WJR4025T GCV
                                    Trong ngành nông nghiệp, ngành trồng...
                                </p>
                                <div class="price-box">
                                    7.200.000₫
                                    <span class="compare-price">8.900.000₫</span>
                                </div>
                                <div class="star_compar">
                                    <a href="javascript:void(0)" class="setCompare btn-views js-compare-product-add"
                                        data-compare="may-phun-thuoc-honda" data-type="Máy phun" tabindex="0"
                                        title="So sánh">
                                        <i></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="item_product_four">
                            <div class="product-thumbnail">
                                <a class="image_thumb scale_hover" href="/toi-treo-chay-tren-dam-hr-yamado"
                                    title="Tời treo chạy trên dầm HR Yamado">
                                    <img width="520" height="520" class="lazyload image1 loaded"
                                        src="//bizweb.dktcdn.net/thumb/large/100/509/495/products/9646921023518-36b667f35fb94f689c9a7633fd565708-grande.jpg?v=1708487097747"
                                        data-src="//bizweb.dktcdn.net/thumb/large/100/509/495/products/9646921023518-36b667f35fb94f689c9a7633fd565708-grande.jpg?v=1708487097747"
                                        alt="Tời treo chạy trên dầm HR Yamado" data-was-processed="true">
                                </a>
                                <div class="smart"><span>-
                                        2%
                                    </span>
                                </div>
                                <div class="badge">
                                    <span class="best">Bán chạy</span>
                                </div>
                            </div>
                            <div class="product-info">
                                <h3 class="product-name"><a class="line-clamp line-clamp-2"
                                        href="/toi-treo-chay-tren-dam-hr-yamado"
                                        title="Tời treo chạy trên dầm HR Yamado">Tời treo chạy trên dầm HR Yamado</a></h3>
                                <p class="content_pro line-clamp line-clamp-2">
                                    Tời treo chạy trên dầm HR Yamado HR-1200
                                    - TTời treo chạy trên dầm&nbsp;HR Yamado HR-1200...
                                </p>
                                <div class="price-box">
                                    8.880.000₫
                                    <span class="compare-price">9.080.000₫</span>
                                </div>
                                <div class="star_compar">
                                    <a href="javascript:void(0)" class="setCompare btn-views js-compare-product-add"
                                        data-compare="toi-treo-chay-tren-dam-hr-yamado" data-type="Máy tời"
                                        tabindex="0" title="So sánh">
                                        <i></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="item_product_four">
                            <div class="product-thumbnail">
                                <a class="image_thumb scale_hover" href="/may-phun-ap-luc-nuoc-lavor"
                                    title="Máy phun áp lực nước Lavor">
                                    <img width="520" height="520" class="lazyload image1 loaded"
                                        src="//bizweb.dktcdn.net/thumb/large/100/509/495/products/ninja-plus-130-6x4-d56a6da5a5864e91a30b1cbdd688bb85-grande.jpg?v=1708484232663"
                                        data-src="//bizweb.dktcdn.net/thumb/large/100/509/495/products/ninja-plus-130-6x4-d56a6da5a5864e91a30b1cbdd688bb85-grande.jpg?v=1708484232663"
                                        alt="Máy phun áp lực nước Lavor" data-was-processed="true">
                                </a>
                                <div class="smart"><span>-
                                        9%
                                    </span>
                                </div>
                                <div class="badge">
                                    <span class="new">Hàng mới</span>
                                    <span class="best">Bán chạy</span>
                                </div>
                            </div>
                            <div class="product-info">
                                <h3 class="product-name"><a class="line-clamp line-clamp-2"
                                        href="/may-phun-ap-luc-nuoc-lavor" title="Máy phun áp lực nước Lavor">Máy phun áp
                                        lực nước Lavor</a></h3>
                                <p class="content_pro line-clamp line-clamp-2">
                                    Máy phun áp lực nước Lavor NINJA-PLUS130
                                    Máy hoạt động với 3 Piston thép, đầu bơm...
                                </p>
                                <div class="price-box">
                                    2.400.000₫
                                    <span class="compare-price">2.650.000₫</span>
                                </div>
                                <div class="star_compar">
                                    <a href="javascript:void(0)" class="setCompare btn-views js-compare-product-add"
                                        data-compare="may-phun-ap-luc-nuoc-lavor" data-type="Máy nén" tabindex="0"
                                        title="So sánh">
                                        <i></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}

        {{-- <section class="section_why_choose">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 ">
                        <div class="img_thm">
                            <div class="box_img">
                                <img width="720" height="400" class="lazyload"
                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                                    data-src="//bizweb.dktcdn.net/100/509/495/themes/943203/assets/bg_video_why.jpg?1753947700397"
                                    alt="Tại sao chọn chúng tôi" />
                            </div>
                            <div class="icon_video open_video" data-video="5RCh8JzLL5Y">
                                <span><i></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 ">
                        <h2 class="title_choose_2">Tại sao chọn chúng tôi</h2>
                        <p class="content_choose">Chuyên nhập khẩu và phân phối các sản phẩm máy công cụ chính hãng thuộc
                            các ngành hàng Máy cầm tay, Máy ngoài trời, Dụng cụ cầm tay và các thiết bị chuyên dùng, máy
                            công cụ hỗ trợ cho các ngành sản xuất nông nghiệp, lâm nghiệp, xây dựng cơ bản, DIY...</p>
                        <ul class="faq">
                            <li class="active">
                                <h3><i class="icon_mask"></i> Hỗ trợ 24/7</h3>
                            </li>
                            <li>
                                <h3><i class="icon_mask"></i> Giá cả rõ ràng</h3>
                            </li>
                            <li>
                                <h3><i class="icon_mask"></i> Dễ dàng đổi trả</h3>
                            </li>
                            <li>
                                <h3><i class="icon_mask"></i> An toàn tối đa</h3>
                            </li>
                            <li>
                                <h3><i class="icon_mask"></i> Vận chuyển nhanh chóng</h3>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="popup_video position-fixed w-100 h-100 justify-content-center align-items-center d-flex">
                <div class="position-relative max-100">
                    <a href="javascript:;"
                        class="close_video position-absolute d-flex m_white_bg_module justify-content-center align-items-center"
                        title="Đóng"><img width="16" height="16" alt="Đóng"
                            src="//bizweb.dktcdn.net/100/509/495/themes/943203/assets/close.svg?1753947700397"></a>
                    <div class="b_video p-2 p-md-3 m_white_bg_module rounded m-auto"></div>
                </div>
            </div>
        </section>
        <script>
            let videos = document.querySelectorAll('.open_video');
            let popupVideo = document.querySelector('.popup_video');
            let close_vd = document.querySelectorAll('.close_video');
            var dataset = '5RCh8JzLL5Y';
            videos.forEach(v => v.addEventListener('click', function(e) {
                e.preventDefault();
                e.target.dataset.video = dataset;
                popupVideo.classList.add('open');
                popupVideo.querySelector('.b_video').innerHTML =
                    `<div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item" src="https://www.youtube.com/embed/${e.target.dataset.video}?enablejsapi=1" allow="autoplay; encrypted-media" allowfullscreen></iframe></div>`
            }));
            close_vd.forEach(v => v.addEventListener('click', function(e) {
                e.preventDefault();
                popupVideo.classList.remove('open');
                setTimeout(function() {
                    popupVideo.querySelector('.b_video').innerHTML = ``
                }, 500);
            }))
            $('.faq li h3').on('click', function(e) {
                e.preventDefault();
                var $this = $(this);
                $this.parents('li').find('.content-faq').slideToggle();
                $this.parents('li').toggleClass('active');
                return false;
            });
        </script> --}}


        <section class="section_danh_gia lazyload" data-src="/site/images/bg_danh_gia.jpg">
            <div class="container">
                <h2 class="title_danh_gia">Đánh giá khách hàng</h2>
                <p class="content_danh_gia">Những lời đánh giá chân thật từ những khách hàng đã tin tưởng vào chúng tôi.
                </p>
                <div class="swiper_feedback swiper-container control-top">
                    <div class="swiper-wrapper">
                        @foreach ($reviews as $review)
                            <div class=" swiper-slide">
                                <div class="review_box">
                                    {{-- <div class="title_rev reviw1">Giao hàng rất nhanh</div> --}}
                                    <p class="content_review">{{ $review->message }}</p>
                                    <div class="review_img">
                                        <img width="200" height="200" class="lazyload" src="/site/images/lazy.png"
                                            data-src="{{ $review->image ? $review->image->path : 'https://placehold.co/200x200' }}"
                                            alt="{{ $review->name }}" />
                                    </div>
                                    <h3 class="name_review">{{ $review->name }}</h3>
                                    <div class="icon_gach">
                                        <img width="167" height="25" class="lazyload" src="/site/images/lazy.png"
                                            data-src="/site/images/gach2.png" alt="{{ $review->name }}" />
                                    </div>
                                    <p class="job_review">{{ $review->position }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>
        <script>
            $(document).ready(function($) {
                var swiper_feedback = new Swiper('.swiper_feedback', {
                    slidesPerView: 1,
                    spaceBetween: 15,
                    watchOverflow: true,
                    slidesPerGroup: 1,
                    grabCursor: true,
                    pagination: {
                        el: '.swiper_feedback .swiper-pagination',
                        clickable: true
                    },
                    breakpoints: {
                        640: {
                            slidesPerView: 1,
                            spaceBetween: 15
                        },
                        768: {
                            slidesPerView: 2,
                            spaceBetween: 20
                        },
                        992: {
                            slidesPerView: 3,
                            spaceBetween: 20
                        },
                        1024: {
                            slidesPerView: 3,
                            spaceBetween: 20
                        },
                        1200: {
                            slidesPerView: 4,
                            spaceBetween: 20
                        },
                        1500: {
                            slidesPerView: 4,
                            spaceBetween: 20
                        }
                    }
                });
            });
        </script>

        @foreach ($categorySpecialPost as $category)
            <section class="section_blog">
                <div class="container">
                    <h2 class="title-module">
                        <a href="{{ route('front.list-blog', $category->slug) }}" title="{{ $category->name }}">
                            {{ $category->name }}
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
                    </h2>
                    <div class="swiper_blogs swiper-container">
                        <div class="swiper-wrapper load-after" data-section="section_blog">
                            @foreach ($category->posts as $post)
                                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-xs-12 swiper-slide">
                                    <div class="item-blog">
                                        <div class="block-thumb">
                                            <a class="thumb" href="{{ route('front.detail-blog', $post->slug) }}"
                                                title="{{ $post->name }}">
                                                <img width="600" height="380" class="lazyload"
                                                    src="/site/images/lazy.png"
                                                    data-src="{{ $post->image ? $post->image->path : 'https://placehold.co/600x380' }}"
                                                    alt="{{ $post->name }}">
                                            </a>
                                        </div>
                                        <div class="day_time">
                                            <span class="day_item">{{ $post->created_at->format('d') }}</span>
                                            <span class="myear_item">{{ $post->created_at->format('m/Y') }}</span>
                                        </div>
                                        <div class="block-content">
                                            <h3><a href="{{ route('front.detail-blog', $post->slug) }}"
                                                    title="{{ $post->name }}">{{ $post->name }}</a></h3>
                                            <p class="justify">{{ $post->intro }}</p>
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                    <div class="see-more">
                        <a href="{{ route('front.list-blog', $category->slug) }}" title="Xem tất cả">Xem tất cả</a>
                    </div>
                </div>
            </section>
            <script>
                $(document).ready(function($) {
                    function runSwiperBlogs() {
                        var blogs_pro = null;

                        function initSwiperBlogs() {
                            blogs_pro = new Swiper('.swiper_blogs', {
                                slidesPerView: 4,
                                spaceBetween: 20,
                                watchOverflow: true,
                                slidesPerGroup: 1,
                                grabCursor: true,
                                navigation: {
                                    nextEl: '.swiper_blogs .swiper-button-next',
                                    prevEl: '.swiper_blogs .swiper-button-prev',
                                },
                                breakpoints: {
                                    640: {
                                        slidesPerView: 1,
                                        spaceBetween: 15
                                    },
                                    768: {
                                        slidesPerView: 2,
                                        spaceBetween: 20
                                    },
                                    992: {
                                        slidesPerView: 3,
                                        spaceBetween: 20
                                    },
                                    1024: {
                                        slidesPerView: 3,
                                        spaceBetween: 20
                                    },
                                    1200: {
                                        slidesPerView: 4,
                                        spaceBetween: 20
                                    },
                                    1500: {
                                        slidesPerView: 4,
                                        spaceBetween: 20
                                    }
                                }
                            });
                        }

                        function destroySwiperBlogs() {
                            if (blogs_pro) {
                                blogs_pro.destroy(true, true);
                                blogs_pro = null;
                            }
                        }

                        function toggleSwiperBlogs() {
                            if ($(window).width() <= 767 && blogs_pro) {
                                destroySwiperBlogs();
                            } else if ($(window).width() > 767 && !blogs_pro) {
                                initSwiperBlogs();
                            }
                        }
                        toggleSwiperBlogs();
                        $(window).resize(toggleSwiperBlogs);
                    }
                    lazyBlockProduct('section_blog', '0px 0px -250px 0px', runSwiperBlogs);
                });
            </script>
        @endforeach
    @endsection
    @push('script')
    @endpush
