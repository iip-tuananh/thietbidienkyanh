@extends('site.layouts.master')
@section('title')
    {{ $blog_title }}
@endsection
@section('description')
    {{ strip_tags($blog->intro) }}
@endsection
@section('image')
    {{ $blog->image ? $blog->image->path : 'https://placehold.co/600x400' }}
@endsection

@section('css')
    <link href="/site/css/breadcrumb_style.scss.css?1753947700397" rel="stylesheet" type="text/css" media="all" />
    <link href="/site/css/paginate.scss.css?1753947700397" rel="stylesheet" type="text/css" media="all" />
    <link href="/site/css/blog_article_style.scss.css?1753947700397" rel="stylesheet" type="text/css" media="all" />
    <link href="/site/css/sidebar_style.scss.css?1753947700397" rel="stylesheet" type="text/css" media="all" />
    <style>
        .text-limit-3-line {
            line-height: 1.5;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
@endsection

@section('content')
    <div class="bodywrap">
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
                        <a href="{{ route('front.list-blog', $category->slug) }}"><span>{{ $cate_title }}</span></a>
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
                    <li><strong><span>{{ $blog_title }}</span></strong></li>
                </ul>
            </div>
        </section>
        <section class="blogpage">
            <div class="container layout-article" itemscope itemtype="https://schema.org/Article">
                <div class="bg_blog">
                    <article class="article-main">
                        <div class="row">
                            <div class="right-content col-lg-9 col-12 ">
                                <div class="article-details clearfix">
                                    <h1 class="article-title">{{ $blog_title }}</
                                    </h1>
                                    <div class="posts">
                                        <div class="time-post f">
                                            <svg aria-hidden="true" focusable="false" data-prefix="fal"
                                                data-icon="clock" role="img" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 512 512" class="svg-inline--fa fa-clock fa-w-16">
                                                <path fill="currentColor"
                                                    d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm216 248c0 118.7-96.1 216-216 216-118.7 0-216-96.1-216-216 0-118.7 96.1-216 216-216 118.7 0 216 96.1 216 216zm-148.9 88.3l-81.2-59c-3.1-2.3-4.9-5.9-4.9-9.7V116c0-6.6 5.4-12 12-12h14c6.6 0 12 5.4 12 12v146.3l70.5 51.3c5.4 3.9 6.5 11.4 2.6 16.8l-8.2 11.3c-3.9 5.3-11.4 6.5-16.8 2.6z"
                                                    class=""></path>
                                            </svg>
                                            {{ $blog->created_at->format('d') }} Tháng {{ $blog->created_at->format('m') }} {{ $blog->created_at->format('Y') }}
                                        </div>
                                        <div class="time-post">
                                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user"
                                                role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                                class="svg-inline--fa fa-user fa-w-14">
                                                <path fill="currentColor"
                                                    d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"
                                                    class=""></path>
                                            </svg>
                                            <span>By Admin</span>
                                        </div>
                                    </div>
                                    <div class="goto-wrapper ftoc-head">
                                        <a class="title-goto-wrapper" href="javascript:;">Nội dung chính
                                        </a>
                                        <div class="bean-toc"></div>
                                    </div>
                                    <div class="article-content rte">
                                        {!! $blog->body !!}
                                    </div>
                                    <div class='share-group d-flex align-items-center mt-3'>
                                        <strong class='share-group__heading mr-3'>Chia sẻ</strong>
                                        <div class='share-group__list'>
                                            <a class='share-group__item facebook' title="Chia sẽ lên Facebook"
                                                target="_blank"
                                                href='http://www.facebook.com/sharer.php?u={{ route('front.detail-blog', $blog->slug) }}'>
                                                <img width="100" height="100"
                                                    src="/site/images/icon_face.png"
                                                    alt="Facebook" />
                                            </a>
                                            <a class='share-group__item pinterest' title="Chia sẽ lên Pinterest"
                                                target="_blank"
                                                href='http://pinterest.com/pin/create/button/?url={{ route('front.detail-blog', $blog->slug) }}'>
                                                <img width="100" height="100"
                                                    src="/site/images/icon_print.png"
                                                    alt="Pinterest" />
                                            </a>
                                            <a class='share-group__item twitter' target="_blank"
                                                title="Chia sẽ lên Twitter"
                                                href='http://twitter.com/share?text={{ route('front.detail-blog', $blog->slug) }}'>
                                                <img width="100" height="100"
                                                    src="/site/images/icon_tw.png"
                                                    alt="Twitter" />
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="blog_left_base col-lg-3 col-12">
                                @include('site.blogs.nav-blog', [
                                    'newBlogs' => $newBlogs,
                                ])
                            </div>
                            <div class="col-md-12 col-12 blog-lienquan order-lg-4">
                                <div class="title">
                                    <h3>
                                        <a href="javascript:void(0)" title="Tin liên quan">Tin liên quan</a>
                                    </h3>
                                </div>
                                <div class="list-blogs related-blogs">
                                    <div class="blog-swiper swiper-container">
                                        <div class="swiper-wrapper">
                                            @foreach ($other_blogs as $other_blog)
                                            <div class="swiper-slide">
                                                <div class="item-blog">
                                                    <div class="block-thumb">
                                                        <a class="thumb"
                                                            href="{{ route('front.detail-blog', $other_blog->slug) }}"
                                                            title="{{ $other_blog->name }}">
                                                            <img width="600" height="380" class="lazyload"
                                                                src="/site/images/lazy.png"
                                                                data-src="{{ $other_blog->image ? $other_blog->image->path : 'https://placehold.co/600x400' }}"
                                                                alt="{{ $other_blog->name }}">
                                                        </a>
                                                    </div>
                                                    <div class="day_time">
                                                        <span class="day_item">{{ $other_blog->created_at->format('d') }}</span>
                                                        <span class="myear_item">{{ $other_blog->created_at->format('m/Y') }}</span>
                                                    </div>
                                                    <div class="block-content">
                                                        <h3><a href="{{ route('front.detail-blog', $other_blog->slug) }}"
                                                                title="{{ $other_blog->name }}">{{ $other_blog->name }}</a></h3>
                                                        <p class="justify">
                                                            {!! $other_blog->intro !!}
                                                        </p>
                                                    </div>
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
                            </div>
                        </div>
                    </article>
                </div>
            </div>
            <div class="setmenuclick auto hidescroll">
                <span class="tabClick" style="opacity: 0.996141;">
                    <img width="150" height="150"
                        src="/site/images/list-scroll.svg"
                        alt="Mục lục">
                </span>
                <div class="fixMenu hidescroll">
                    <div class="closeftoc">
                        <img width="150" height="150"
                            src="/site/images/list-scroll.svg"
                            alt="Mục lục">Nội dung bài viết<span>x</span>
                    </div>
                    <div class="bean-toc-bottom"></div>
                </div>
                <div class="bg"></div>
            </div>
        </section>
        <script>
            $(document).ready(function() {
                var swiperwish = new Swiper('.blog-swiper', {
                    slidesPerView: 1,
                    loop: false,
                    grabCursor: true,
                    spaceBetween: 20,
                    roundLengths: true,
                    slideToClickedSlide: false,
                    navigation: {
                        nextEl: '.blog-swiper .swiper-button-next',
                        prevEl: '.blog-swiper .swiper-button-prev',
                    },
                    autoplay: false,
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
        <script>
            var $heading2 = $('.article-content h2');
            $heading2.attr("id", function() {
                return $(this)
                    .text() // get the h1 text
                    .trim() // remove spaces from start and the end
                    .toLowerCase() // optional
                    .replace(/\s/g, '_'); // convert all spaces to underscores
            });
            var $heading3 = $('.article-content h3');
            $heading3.attr("id", function() {
                return $(this)
                    .text() // get the h1 text
                    .trim() // remove spaces from start and the end
                    .toLowerCase() // optional
                    .replace(/\s/g, '_'); // convert all spaces to underscores
            });

            $('.title-goto-wrapper').click(function() {
                $(this).find('.fa').toggleClass('fa-angle-up');
                $(this).find('.fa').toggleClass('fa-angle-down');
                $('.bean-toc').toggleClass('hidden');
            });
            $(document).ready(function() {
                $('.setmenuclick.auto .tabClick').click(function() {
                    $(this).addClass('hidescroll');
                    $('.fixMenu').removeClass('hidescroll');
                });
                $('.fixMenu .closeftoc span').click(function(event) {
                    event.stopPropagation();
                    $('.setmenuclick.auto .tabClick').removeClass('hidescroll');
                    $('.fixMenu').addClass('hidescroll');
                });
                $(document).click(function(event) {
                    if (!$(event.target).closest('.setmenuclick.auto').length) {
                        $('.setmenuclick.auto .tabClick').removeClass('hidescroll');
                        $('.setmenuclick.auto .fixMenu').addClass('hidescroll');
                    }
                });

                $(window).scroll(function() {
                    var khoan_cach_all = $('.product-content').height();
                    if ($(this).scrollTop() > 500 && $(this).scrollTop() < khoan_cach_all) {
                        $('.setmenuclick').removeClass('hidescroll');
                    } else {
                        $('.setmenuclick').addClass('hidescroll');
                    }
                });
            });
        </script>
        <script src="/site/js/tocbot.min.js" type="text/javascript"></script>
        <script>
            $(document).ready(function($) {
                tocbot.init({
                    tocSelector: '.bean-toc',
                    contentSelector: '.article-content',
                    headingSelector: 'h2,h3'
                });
                tocbot.init({
                    tocSelector: '.bean-toc-bottom',
                    contentSelector: '.article-content',
                    headingSelector: 'h2,h3'
                });
            });
        </script>
    </div>
@endsection

@push('script')
@endpush
