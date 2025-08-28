@extends('site.layouts.master')
@section('title')
    {{ $title }}
@endsection
@section('description')
    {{ $short_des }}
@endsection
@section('css')
    <link href="/site/css/breadcrumb_style.scss.css?1753947700397" rel="stylesheet" type="text/css" media="all" />
    <link href="/site/css/paginate.scss.css?1753947700397" rel="stylesheet" type="text/css" media="all" />
    <link href="/site/css/sidebar_style.scss.css?1753947700397" rel="stylesheet" type="text/css" media="all" />
    <link href="/site/css/collection_style.scss.css?1753947700397" rel="stylesheet" type="text/css" media="all" />
@endsection

@section('content')
    <div class="bodywrap" ng-controller="ProductCategoryController">
        <div class="layout-collection">
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
                        <li><strong><span>{{ $title }}</span></strong></li>
                    </ul>
                </div>
            </section>
            <div class="container">
                @if (isset($category->banner))
                    <div class="section_3_banner">
                        <div class="banner-swiper swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <a class="three_banner" href="javascript:void(0);" title="Banner">
                                        <img class="lazyload"
                                            src="data:image/png;base64,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"
                                            data-src="{{ $category->banner ? $category->banner->path : 'https://placehold.co/1920x320' }}"
                                            alt="Banner" />
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                @endif
                <div class="box-round">
                    <div class="title_cus">Danh mục sản phẩm</div>
                    <div class="box-height-col">
                        <div class="box-cate-col">
                            @foreach ($categories as $cate)
                                <a href="{{ $cate->category_url }}" class="cate-link"
                                    title="{{ $cate->name }}">
                                    <div class="item_cate">
                                        <div class="img_cate">
                                            <img width="100" height="100" class="lazyload"
                                                src="data:image/png;base64,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"
                                                data-src="{{ $cate->image ? $cate->image->path : 'https://placehold.co/480x480' }}"
                                                alt="{{ $cate->name }}" />
                                        </div>
                                        <span>{{ $cate->name }}</span>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                        <div class="control-menu-2">
                            <a href="#" id="prevcol">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                    <path fill="#fff"
                                        d="M41.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 256 278.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z" />
                                </svg>
                            </a>
                            <a href="#" id="nextcol">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                    <path fill="#fff"
                                        d="M342.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L274.7 256 105.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="block-collection col-lg-12 col-12">
                        <h1 class="title-page d-md-block d-none">{{ $title }}</h1>
                        <div class="category-products products-view products-view-grid list_hover_pro">
                            <div id="sort-by">
                                <label class="left"><img width="16" height="16" alt="Sắp xếp"
                                        src="/site/images/sort.png" />Sắp
                                    xếp: </label>
                                <ul id="sortBy">
                                    <li>
                                        <span>Mặc định</span>
                                        <ul>
                                            <li><a href="javascript:;" ng-click="filterSort('default')" title="Mặc định">Mặc
                                                    định</a></li>
                                            <li><a href="javascript:;" ng-click="filterSort('alpha-asc')"
                                                    title="A &rarr; Z">A
                                                    &rarr; Z</a></li>
                                            <li><a href="javascript:;" ng-click="filterSort('alpha-desc')"
                                                    title="Z &rarr; A">Z &rarr; A</a></li>
                                            <li><a href="javascript:;" ng-click="filterSort('price-asc')"
                                                    title="Giá tăng dần">Giá tăng dần</a></li>
                                            <li><a href="javascript:;" ng-click="filterSort('price-desc')"
                                                    title="Giá giảm dần">Giá giảm dần</a></li>
                                            <li><a href="javascript:;" ng-click="filterSort('created-desc')"
                                                    title="Hàng mới nhất">Hàng mới nhất</a></li>
                                            <li><a href="javascript:;" ng-click="filterSort('created-asc')"
                                                    title="Hàng cũ nhất">Hàng cũ nhất</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="category-products pagenav" id="product-list">
                                <div class="collection-paginate clearfix relative nav_pagi w_100">
                                    <div class="row row-fix">
                                        @foreach ($products as $product)
                                            <div class="col-6 col-md-4 col-xl-3 col-fix">
                                                @include('site.products.product_item', [
                                                    'product' => $product,
                                                ])
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="text-center">
                                        <nav class="clearfix relative nav_pagi w_100 ">
                                            {{ $products->links() }}
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if (isset($category->intro))
                            <div class="descrip_coll content_coll add_apper">
                                {!! html_entity_decode($category->intro) !!}
                            </div>
                            <div class="view_mores">
                                <a class="one">Xem thêm <img width="90" height="90"
                                        src="//bizweb.dktcdn.net/100/509/495/themes/943203/assets/sortdown.png?1753947700397"
                                        alt="Bean Tools"></a>
                                <a class="two active">Thu gọn <img width="90" height="90"
                                        src="//bizweb.dktcdn.net/100/509/495/themes/943203/assets/sortdown.png?1753947700397"
                                        alt="Bean Tools"></a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="opacity_sidebar"></div>
        <script>
            $(document).ready(function() {
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
                var colName = "Máy khoan";

                var colId = 3309843;

                var selectedViewData = "data";
                var swiperbanner1 = new Swiper('.banner-swiper', {
                    slidesPerView: 3,
                    loop: false,
                    grabCursor: true,
                    spaceBetween: 30,
                    roundLengths: true,
                    slideToClickedSlide: false,
                    navigation: {
                        nextEl: '.banner-swiper .swiper-button-next',
                        prevEl: '.banner-swiper .swiper-button-prev',
                    },
                    autoplay: false,
                    breakpoints: {
                        300: {
                            slidesPerView: 1,
                            spaceBetween: 10
                        },
                        500: {
                            slidesPerView: 1,
                            spaceBetween: 10
                        },
                        640: {
                            slidesPerView: 2,
                            spaceBetween: 10
                        },
                        768: {
                            slidesPerView: 2,
                            spaceBetween: 20
                        },
                        991: {
                            slidesPerView: 3,
                            spaceBetween: 20
                        },
                        1200: {
                            slidesPerView: 3,
                            spaceBetween: 20
                        }
                    }
                });

                function horizontalCate() {
                    return {
                        wrappercol: $('.box-height-col'),
                        navigationcol: $('.box-height-col .box-cate-col'),
                        itemcol: $('.box-height-col .box-cate-col .cate-link'),
                        totalStepCol: 0,
                        onCalcColOverView: function() {
                            let itemHeightCol = this.itemcol.eq(0).outerWidth(),
                                lilengthcol = this.itemcol.length,
                                totalcol = 0;
                            for (var i = 0; i < lilengthcol; i++) {
                                itemHeightCol = this.itemcol.eq(i).outerWidth();
                                totalcol += itemHeightCol;
                            }
                            return Math.ceil(totalcol)
                        },
                        onCalcTotalCol: function() {
                            let navHeightCol = this.navigationcol.width();
                            return Math.ceil(navHeightCol)
                        },
                        init: function() {
                            this.totalStepCol = this.onCalcColOverView();
                            this.totalToCol = this.onCalcTotalCol();
                            if (this.totalStepCol > this.totalToCol) {
                                this.wrappercol.addClass('overflow');
                                $('.control-menu-2').addClass("d-lg-block");
                            }
                        }
                    }
                }
                $(document).ready(function($) {
                    horizontalCate().init()
                    $(window).on('resize', () => horizontalCate().init())
                    var margin_left_col = 0;
                    $('#prevcol').on('click', function(e) {
                        e.preventDefault();
                        animateMargincol(190);
                    });
                    $('#nextcol').on('click', function(e) {
                        e.preventDefault();
                        animateMargincol(-190);
                    });
                    const animateMargincol = (amount) => {
                        margin_left_col = Math.min(0, Math.max(getMaxMargincol(), margin_left_col +
                            amount));
                        $('.box-cate-col').animate({
                            'margin-left': margin_left_col
                        }, 300);
                    };
                    const getMaxMargincol = () =>
                        $('.box-cate-col').parent().width() - $('.box-cate-col')[0].scrollWidth;
                });
            });
        </script>
    </div>
@endsection

@push('script')
    <script>
        app.controller('ProductCategoryController', function($scope, $http) {
            $scope.category = @json($category ?? null);
            $scope.filter_sort = 'asc';
            $scope.filterSort = function(sort) {
                $scope.filter_sort = sort;
                $scope.filter();
            }
            $scope.filter_tag = [];
            $scope.onChangeFilter = function(id) {
                if ($scope.filter_tag.includes(id)) {
                    $scope.filter_tag = $scope.filter_tag.filter(function(item) {
                        return item !== id;
                    });
                } else {
                    $scope.filter_tag.push(id);
                }
                $scope.filter();
            }

            $scope.filter = function() {
                $.ajax({
                    url: '{{ route('front.filter-product') }}',
                    type: 'GET',
                    data: {
                        sort: $scope.filter_sort,
                        category: $scope.category.id,
                        cate_slug: $scope.category.slug,
                        tag: $scope.filter_tag,
                    },
                    success: function(response) {
                        $('#product-list').html(response.html);
                    },
                    error: function(response) {
                        console.log(response);
                    },
                    complete: function() {}
                });
            }

            $scope.filterCategory = function(slug) {
                url = '{{ route('front.show-product-category', ['categorySlug' => ':categorySlug', 'parentSlug' => ':parentSlug', 'oldParentSlug' => ':oldParentSlug']) }}'
                    .replace(
                        ':categorySlug', slug)
                    .replace(
                        ':parentSlug', $scope.category.categoryParent ? $scope.category.categoryParent.slug : null)
                    .replace(
                        ':oldParentSlug', $scope.category.categoryParent && $scope.category.categoryParent.categoryParent ? $scope.category.categoryParent.categoryParent.slug : null);
                window.location.href = url;
            }
        });
    </script>
@endpush
